<?php

namespace App\Http\Controllers;

use App\Models\AuditTrail;
use App\Models\AvailableAppointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class PatientController extends Controller
{


    public function index()
    {
        $auditTrails = AuditTrail::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $availableAppointments = AvailableAppointment::whereDate('date', Carbon::today())
            ->orderBy('date', 'desc')
            ->get();
        return view('dashboard', compact('auditTrails', 'availableAppointments'));
    }

    // public function calendar(Request $request)
    // {
    //     $userEmail = Auth::user()->email;
    //     $selectedDate = $request->input('hiddenselectedDate'); // Expected: "February 28, 2025"

    //     if ($selectedDate) {
    //         $selectedDate = date('Y-m-d', strtotime($selectedDate));
    //     }
    //     dd($selectedDate);
    //     $availableappointments = AvailableAppointment::all();
    //     $appointments = Appointment::where('email', $userEmail)
    //         ->select('id', 'patient_name', 'phone', 'date', 'time', 'status')
    //         ->get();

    //     if ($selectedDate) {
    //         $availableappointments = $availableappointments->filter(function ($appointment) use ($selectedDate) {
    //             return $appointment->date === $selectedDate;
    //         });
    //     }

    //     $availableTimeSlots = $availableappointments->pluck('time_slot')->toArray();

    //     \Log::info('Selected Date: ' . $selectedDate);
    //     \Log::info('Database Dates: ' . AvailableAppointment::pluck('date'));

    //     return view('patient.calendar')
    //         ->with('appointments', $appointments)
    //         ->with('availableappointments', $availableTimeSlots)
    //         ->with('selectedDate', $selectedDate);
    // }

    public function calendar(Request $request)
    {
        $userEmail = Auth::user()->email;
        $selectedDate = $request->input('hiddenselectedDate'); // Get date from form submission

        \Log::info('Received Selected Date: ' . ($selectedDate ?? 'None'));

        if (!empty($selectedDate)) {
            $selectedDate = date('Y-m-d', strtotime($selectedDate)); // Convert to "YYYY-MM-DD"
        } else {
            $selectedDate = null;
        }

        $appointments = Appointment::where('email', $userEmail)
            ->select('id', 'patient_name', 'phone', 'date', 'time', 'status')
            ->get();

        $availableappointments = $selectedDate
            ? AvailableAppointment::where('date', $selectedDate)
                ->select('time_slot', 'max_slots')
                ->get()
                ->map(function ($appointment) use ($selectedDate) {
                    // Count how many appointments are booked for this time slot
                    $bookedSlots = Appointment::where('date', $selectedDate)
                        ->where('time', $appointment->time_slot)
                        ->count();

                    // Deduct booked slots from max slots
                    $appointment->remaining_slots = max(0, $appointment->max_slots - $bookedSlots);
                    return $appointment;
                })
            : collect();

        $availableslots = $availableappointments->sum('remaining_slots');
        return view('patient.calendar', compact('appointments', 'availableappointments', 'selectedDate', 'availableslots'));
    }



    public function notifications()
    {
        return view('patient.notifications');
    }

    public function history()
    {

        $userEmail = Auth::user()->email;
        $appointments = Appointment::where('email', $userEmail)
            ->select('id', 'patient_name', 'phone', 'date', 'time', 'status')->get();
        return view('patient.history')->with('appointments', $appointments);

    }

    public function destroy($id)
    {
        $appointment = Appointment::findorFail($id);
        $appointment->delete();

        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'action' => 'Delete Appointment',
            'model' => 'User',
            'changes' => null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);

        return redirect()->back();
    }
}
