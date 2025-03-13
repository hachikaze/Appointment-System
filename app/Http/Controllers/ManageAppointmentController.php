<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageAppointmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $filter = $request->query('filter', '');
        $perPage = $request->query('perPage', 10);

        $appointments = Appointment::when($search, function ($query, $search) {
            return $query->where('patient_name', 'like', "%{$search}%");
        })
            ->when($filter, function ($query, $filter) {
                return $query->where('status', $filter);
            })
            ->orderBy('date', 'desc')
            ->paginate($perPage);

        // Calculate statistics for the dashboard cards
        $stats = [
            'total' => Appointment::count(),
            'pending' => Appointment::where('status', 'Pending')->count(),
            'approved' => Appointment::where('status', 'Approved')->count(),
            'attended' => Appointment::where('status', 'Attended')->count(),
            'unattended' => Appointment::where('status', 'Unattended')->count(),
        ];

        return view('admin.manage_appointments', compact('appointments', 'search', 'filter', 'stats'));
    }

    public function updateStatus(Request $request)
    {
        $appointment = DB::table('appointments')->where('id', $request->id)->first();
        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        $action = $request->input('action');
        $messageContent = $request->input('message'); // ✅ Capture the message input

        if ($action === 'approve') {
            DB::table('appointments')->where('id', $request->id)
                ->update(['status' => 'Approved', 'updated_at' => Carbon::now()]);
        } elseif ($action === 'cancel') {
            DB::table('appointments')->where('id', $request->id)
                ->update(['status' => 'Unattended', 'updated_at' => Carbon::now()]);
        } elseif ($action === 'attended') {
            DB::table('appointments')->where('id', $request->id)
                ->update(['status' => 'Attended', 'updated_at' => Carbon::now()]);
        } elseif ($action === 'delete') {
            DB::table('appointments')->where('id', $request->id)->delete();
            return redirect()->route('appointments.index')->with('success', 'Appointment deleted.');
        }

        // ✅ Store the message
        if (!empty($messageContent)) {
            DB::table('messages')->insert([
                'appointment_id' => $request->id,
                'message' => $messageContent,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('appointments.index')->with('success', 'Status updated and message sent.');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id', // Fixed table name
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'appointment_id' => $request->appointment_id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'phone' => 'required|string|max:11|regex:/^[0-9]+$/',
            'doctor' => 'required|string|max:255',
            'date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (strtotime($value) < strtotime(date('Y-m-d'))) {
                        $fail('The ' . $attribute . ' must not be below the current date.');
                    }
                }
            ],
            'time' => 'required',
            'appointments' => 'required|string',
        ]);

        $validated['patient_name'] = Auth::user()->name;
        $email = Auth::user()->email;
        $validated['email'] = $email;

        $existingApplication = Appointment::where('email', $email)->first();
        if ($existingApplication) {
            return redirect()->back()->withErrors(['email' => 'You already have an existing appointment. Please cancel it before creating a new one.']);
        }

        $appointment = Appointment::create($validated);
        return redirect()->route(route: 'calendar')->with('success', 'Appointment booked successfully!');
    }
}