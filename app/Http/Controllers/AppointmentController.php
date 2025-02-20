<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Ensure the model is imported
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $filter = $request->query('filter', '');
        $appointments = Appointment::when($search, function ($query, $search) {
                return $query->where('patient_name', 'like', "%{$search}%");
            })
            ->when($filter, function ($query, $filter) {
                return $query->where('status', $filter);
            })
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('admin.manage_appointments', compact('appointments', 'search', 'filter'));
    }

    public function updateStatus(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);
        $action = $request->query('action');

        if ($action === 'approve') {
            $appointment->status = 'Approved';
        } elseif ($action === 'cancel') {
            $appointment->status = 'Unattended';
        } elseif ($action === 'attended') {
            $appointment->status = 'Attended';
        } elseif ($action === 'delete') {
            $appointment->delete();
            return redirect()->route('appointments.index');
        }

        $appointment->save();
        return redirect()->route('appointments.index');
    }
 
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'phone' => 'required|string|max:11|regex:/^[0-9]+$/',
            'doctor' => 'required|string|max:255',
            'date' => ['required', 'date', function ($attribute, $value, $fail) {
                if (strtotime($value) < strtotime(date('Y-m-d'))) {
                    $fail('The ' . $attribute . ' must not be below the current date.');
                }
            }],
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


        //     if ($appointment) {
        //         return response()->json(['status' => 'success', 'message' => 'Appointment booked successfully']);
        //     } else {
        //         return response()->json(['status' => 'error', 'message' => 'Failed to book appointment']);
        //     }
        // }
    }

    public function graph()
    {
        $today = Carbon::today()->toDateString();
        $monthly = Carbon::now()->format('Y-m');

        // Count today's appointments and remaining slots
        $appointmentsToday = Appointment::whereDate('date', $today)->count();
        $remainingSlotsToday = max(0, 10 - $appointmentsToday); // Adjust max slots as needed

        // Count monthly appointments and remaining slots
        $monthlyAppointments = Appointment::where('date', 'like', "$monthly%")->count();
        $remainingSlotsMonthly = max(0, 100 - $monthlyAppointments); // Adjust max slots as needed

        // Get appointments over time
        $appointmentsOverTime = Appointment::selectRaw("strftime('%m', date) as month, COUNT(*) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $item->month = date("F", mktime(0, 0, 0, $item->month, 1));
                return $item;
            });

        return view('admin.graph', compact(
            'appointmentsToday',
            'remainingSlotsToday',
            'monthlyAppointments',
            'remainingSlotsMonthly',
            'appointmentsOverTime'
        ));
    }
}
