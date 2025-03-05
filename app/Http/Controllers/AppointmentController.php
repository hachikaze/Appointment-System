<?php

namespace App\Http\Controllers;

use App\Models\AuditTrail;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Message;
use App\Models\AvailableAppointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function create()
    {
        $availableAppointments = AvailableAppointment::all();
        return view('appointments.create', compact('availableAppointments'));
    }

    public function markAsRead($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment) {
            $appointment->updated_at = now();
            $appointment->save();
            return back()->with('success', 'Appointment marked as read.');
        }
        return back()->with('error', 'Appointment not found.');
    }


    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'phone' => 'required|digits:11',
            'date' => 'required|date',
            'time' => 'required|string',
            'appointments' => 'required|array|min:3',
            'appointments.*' => 'string', 
        ]);



        $selectedDate = $request->date;
        $time = $request->input('time', '00:00');

        if ($selectedDate < date('Y-m-d')) {
            return back()->withErrors(['error' => 'You cannot book an appointment for a past date.']);
        }

        $startOfMonth = date('Y-m-01', strtotime($selectedDate));
        $endOfMonth = date('Y-m-t', strtotime($selectedDate));

        $existingAppointment = Appointment::where('email', $user->email)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->whereIn('status', ['Approved'])
            ->exists();

        if ($existingAppointment) {
            return back()->withErrors(['error' => 'You can only book one appointment per month.']);
        }

        if (!AvailableAppointment::where('date', $request->date)->where('time_slot', $time)->exists()) {
            return back()->withErrors(['error' => 'No available slots for the selected time.']);
        }

       $appointment = Appointment::create([
            'patient_name' => $user->firstname . " " . $user->middleinitial . " " . $user->lastname,
            'email' => $user->email,
            'doctor' => 'Ana Fatima Barroso',
            'status' => 'Pending',
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $time,
            'appointments' => implode(', ', $request->input('appointments', [])),
            'updated_at' => null,
        ]);


        if ($appointment) {
            Message::create([
                'appointment_id' => $appointment->id, 
                'message' => '',
                'user_id' => $request->user()->id,
            ]);
        } else {
            return back()->withErrors(['error' => 'Failed to create appointment.']);
        }


        AuditTrail::create([
            'user_id' => $request->user()->id,
            'action' => 'Create Appointment',
            'model' => 'User',
            'changes' => null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);

        return back()->with('success', 'Appointment successfully booked.');
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
