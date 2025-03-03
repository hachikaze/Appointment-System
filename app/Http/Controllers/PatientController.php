<?php

namespace App\Http\Controllers;

use App\Models\AuditTrail;
use App\Models\Message;
use App\Models\AvailableAppointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Log;
use function Pest\Laravel\get;

class PatientController extends Controller
{
    public function index()
    {
        $userEmail = Auth::user()->email;
        $user = Auth::user();
        $now = Carbon::now('Asia/Singapore');

        $monthlyAppointments = Appointment::where('email', auth()->user()->email)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');


        $dailyAppointments = Appointment::where('email', auth()->user()->email)
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');

        $availableDates = AvailableAppointment::count();
        $currentAppointments = AvailableAppointment::whereDate('date', (Carbon::today()))->count();
        $canceledAppointments = Appointment::where('status', 'Canceled')->count();

        $auditTrails = AuditTrail::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        $today = Carbon::now()->timezone('Asia/Singapore')->toDateString();
        $availableAppointments = AvailableAppointment::whereDate('date', $today)
            ->orderBy('date', 'desc')
            ->get();


        $appointmentCategories = Appointment::where('email', Auth::user()->email)
            ->get()
            ->groupBy('appointments')
            ->map(function ($group) {
                return $group->count();
            });

        // ATTENDANCE RATE CALCULATION
        $approvedCount = Appointment::where('email', $userEmail)
            ->where('status', 'Approved')
            ->count();

        $attendedCount = Appointment::where('email', $userEmail)
            ->where('status', 'Attended')
            ->count();

        $totalEligible = $approvedCount + $attendedCount;
        $attendanceRate = $totalEligible > 0 ? ($attendedCount / $totalEligible) * 100 : 0;

        $totalAppointments = Appointment::where('email', auth()->user()->email)->count();


        $upcomingappointment = Appointment::where('status', 'Approved')
            ->where('email', Auth::user()->email) // Filter by the logged-in user
            ->whereDate('date', '>=', now()) // Use Laravel's helper for current timestamp
            ->orderBy('date', 'asc')
            ->first();



        return view('dashboard', compact(
            'auditTrails',
            'user',
            'dailyAppointments',
            'monthlyAppointments',
            'availableAppointments',
            'availableDates',
            'appointmentCategories',
            'currentAppointments',
            'totalAppointments',
            'attendanceRate',
            'canceledAppointments',
            'attendedCount',
            'totalEligible',
            'upcomingappointment'
        ));
    }

    // public function getUpcomingAppointment()
    // {
    //     $now = Carbon::now('Asia/Singapore');

    //     return view('patient.dashboard', compact('upcomingappointment'));
    // }


    public function calendar(Request $request)
    {
        $userEmail = Auth::user()->email;
        $selectedDate = $request->input('hiddenselectedDate'); // Get date from form submission
        Log::info('Received Selected Date: ' . ($selectedDate ?? 'None'));
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
                        ->where('status', 'Pending')
                        ->count();
                    // Deduct booked slots from max slots
                    $appointment->remaining_slots = max(0, $appointment->max_slots - $bookedSlots);
                    return $appointment;
                })
            : collect();


        $availableslots = $availableappointments->sum('remaining_slots');
        return view('patient.calendar', compact('appointments', 'availableappointments', 'selectedDate', 'availableslots'));
    }

    // public function messages()
    // {

    //     return view('patient.messages');
    // }




    public function history()
    {
        $userEmail = Auth::user()->email;
        $appointments = Appointment::where('email', $userEmail)
            ->select('id', 'patient_name', 'phone', 'date', 'time', 'status', 'appointments')
            ->get();
        $isEmpty = $appointments->isEmpty();

        return view('patient.history', ['appointments' => $appointments, 'isEmpty' => $isEmpty]);
    }

    //For Displaying the Modal Details 
    public function viewHistory($appointmentId)
    {
        $userId = Auth::id();
        $userEmail = Auth::user()->email;

        $appointment = Appointment::where('id', $appointmentId)
            ->where('email', $userEmail)
            ->select('id', 'patient_name', 'phone', 'date', 'time', 'status', 'appointments')
            ->firstOrFail();


        $userMessage = Message::where('user_id', $userId)
            ->where('appointment_id', $appointmentId)
            ->select('message')
            ->firstOrFail();

        return response()->json([
            'appointment' => $appointment,
            'message' => $userMessage ? $userMessage->message : 'No message available.',
        ]);
    }


    public function cancel($id)
    {
        $appointment = Appointment::findorFail($id);
        $appointment->status = 'Cancelled';
        $appointment->save();

        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'action' => 'Cancelled Appointment',
            'model' => 'User',
            'changes' => null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);

        return redirect()->back();
    }
}
