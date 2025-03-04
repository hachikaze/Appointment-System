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
            ->whereRaw("time LIKE '% - %'") // Ensure time format is correct
            ->orderByRaw("time ASC") // Sort by time string 
            ->first();


        // Extract the start time
        $timeRange = $upcomingappointment->time ?? ''; // Ensure it's at least an empty string
        $times = explode(' - ', $timeRange);

        $start_time = $times[0] ?? null;
        $end_time = $times[1] ?? null;

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
            'upcomingappointment',
            'start_time',
            'end_time'
        ));
    }


    public function fetchAppointments($date)
    {
        $appointments = AvailableAppointment::where('date', $date)->get()->map(function ($slot) {
            // Count the number of pending appointments for this date and time slot
            $pendingCount = Appointment::where('date', $slot->date)
                ->where('time', $slot->time_slot)  // Ensure `time_slot` is the correct column name
                ->where('status', 'Pending')
                ->count();

            // Calculate remaining slots (prevent negative values)
            $slot->remaining_slots = max(($slot->max_slots ?? 0) - $pendingCount, 0);
            return $slot;
        });

        return response()->json($appointments);
    }




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

        //GET DATA FROM THE SELECTED DATA
        $availableappointments = $selectedDate
            ? AvailableAppointment::where('date', $selectedDate)
                ->select('date', 'time_slot', 'max_slots')
                ->get()
                ->map(function ($appointment) use ($selectedDate) {
                    $bookedSlots = Appointment::where('date', $selectedDate)
                        ->where('time', $appointment->time_slot)
                        ->where('status', 'Pending')
                        ->count();
                    $appointment->remaining_slots = max(0, $appointment->max_slots - $bookedSlots);
                    return $appointment;
                })
            : collect();

        //GET THE AVAILABLE APPOINTMENTS
        $allData = AvailableAppointment::all();


        //DISPLAY 
        $fetchedData = AvailableAppointment::all()->toArray();
        $remainingSlotsByDate = [];
        foreach ($fetchedData as $appointment) {
            $date = $appointment['date'];
            $timeSlot = $appointment['time_slot'];
            $maxSlots = $appointment['max_slots'];
            $bookedSlots = Appointment::where('date', $date)
                ->where('time', $timeSlot)
                ->where('status', 'Pending')
                ->count();
            $remainingSlots = max(0, $maxSlots - $bookedSlots);

            if (!isset($remainingSlotsByDate[$date])) {
                $remainingSlotsByDate[$date] = 0;
            }
            $remainingSlotsByDate[$date] += $remainingSlots;
        }
        $availableslots = $availableappointments->sum('remaining_slots');

        return view('patient.calendar', compact('appointments', 'allData', 'remainingSlotsByDate', 'availableappointments', 'selectedDate', 'availableslots'));
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
