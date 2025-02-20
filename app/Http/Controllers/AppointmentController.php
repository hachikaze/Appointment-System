<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Ensure the model is imported
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

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'doctor' => 'required|string',
            'appointments' => 'required|string'
        ]);

        $availableSlot = AvailableAppointment::where('date', $request->date)
            ->where('time_slot', $request->time)
            ->first();

        if (!$availableSlot || $availableSlot->remainingSlots() <= 0) {
            return back()->withErrors(['error' => 'No available slots for the selected time.']);
        }

        Appointment::create($request->all());

        return redirect()->route('appointments.create')->with('success', 'Appointment booked successfully.');
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
