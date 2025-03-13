<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\MessageNotification;
use App\Models\Payment;
use App\Models\Receipt;
use Illuminate\Support\Facades\Mail;
use App\Models\AvailableAppointment;


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
        $request->validate([
            'id' => 'required|exists:appointments,id',
            'action' => 'required|in:approve,cancel,attended,delete,reschedule',
            'message' => 'nullable|string',
        ]);

        $appointment = Appointment::find($request->id);

        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        switch ($request->action) {
            case 'approve':
                $appointment->update(['status' => 'Approved']);

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

                if ($request->filled('message')) {
                    DB::table('messages')->insert([
                        'appointment_id' => $request->id,
                        'message' => $request->message,
                        // 'created_at' => now(),
                        // 'updated_at' => now(),
                    ]);
                
                    if (!empty($appointment->email)) {
                        $status = match ($request->action) {
                            'approve' => 'Approved',
                            'cancel' => 'Cancelled',
                            'attended' => 'Attended',
                            default => 'Unattended',
                        };

                        $patientName = Appointment::where('id', $appointment->id)->value('patient_name');
                
                        Mail::to($appointment->email)->send(new MessageNotification($request->message, $status, $patientName));
                    }
                }

            return redirect()->route('appointments.index')->with('success', 'Status updated and message sent.');
        }
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

    //Reschedule
    public function getAvailableSlots(Request $request)
    {
        $selectedDate = $request->input('date');
        if (!$selectedDate) {
            return response()->json(['error' => 'Date not provided'], 400);
        }

        $availableappointments = AvailableAppointment::where('date', $selectedDate)
            ->select('time_slot', 'max_slots')
            ->get()
            ->map(function ($appointment) use ($selectedDate) {
                // Count how many appointments are booked for this slot
                $bookedSlots = Appointment::where('date', $selectedDate)
                    ->where('time', $appointment->time_slot)
                    ->whereIn('status', ['Pending', 'Approved'])
                    ->count();

                // Deduct booked slots from max slots to get remaining slots
                $appointment->remaining_slots = max(0, $appointment->max_slots - $bookedSlots);
                return $appointment;
            });

        return response()->json($availableappointments);
    }

    public function reschedule(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'date' => 'required|date',
            'time'         => 'required|string',
        ]);

        // Find the appointment to reschedule
        $appointment = Appointment::findOrFail($id);

        // Parse the new date and time
        $newDate = Carbon::parse($request->input('date'))->format('Y-m-d');
        $newTime = $request->input('time');

        // Check if the selected slot exists
        $availableSlot = AvailableAppointment::where('date', $newDate)
            ->where('time_slot', $newTime)
            ->first();

        if (!$availableSlot) {
            return redirect()->back()->with('error', 'The selected time slot is not available.');
        }

        // Count booked slots for the selected date and time
        $bookedSlots = Appointment::where('date', $newDate)
            ->where('time', $newTime)
            ->whereIn('status', ['pending', 'approved'])
            ->count();

        // Check if the slot is fully booked
        if ($bookedSlots >= $availableSlot->max_slots) {
            return redirect()->back()->with('error', 'The selected time slot is fully booked.');
        }

        // Update only the date and time of the appointment
        $appointment->update([
            'date' => $newDate,
            'time' => $newTime,
            'status' => 'Pending', // Reset status to pending for approval
        ]);

        // Log the change in the audit trail
        AuditTrail::create([
            'user_id'    => Auth::user()->id,
            'action'     => 'Rescheduled Appointment',
            'model'      => 'Appointment',
            'changes'    => json_encode(['new_date' => $newDate, 'new_time' => $newTime]),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        return redirect()->back()->with('success', 'Appointment rescheduled successfully.');
    }

}