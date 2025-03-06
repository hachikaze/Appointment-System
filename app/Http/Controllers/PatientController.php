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
use Illuminate\Support\Facades\File;


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
            ->whereIn('status',['Attended'])
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
        $userEmail = auth()->user()->email; 
    
        $appointments = AvailableAppointment::where('date', $date)->get()->map(function ($slot) use ($userEmail) {
            $pendingCount = Appointment::where('date', $slot->date)
                ->where('time', $slot->time_slot)
                ->where('status', 'Pending')
                ->count();
    
            $appointmentExists = Appointment::where('date', $slot->date)
                ->where('time', $slot->time_slot)
                ->where('status', 'Pending')
                ->where('email', $userEmail) 
                ->exists();
    
            $slot->remaining_slots = max(($slot->max_slots ?? 0) - $pendingCount, 0);
            $slot->appointment_exists = $appointmentExists; 
    
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

        $allData = AvailableAppointment::all();

        //GET THE SERVICES
        // $filePath = public_path('jsonlist/appointments.json');
        // if (File::exists($filePath)) {
        //     $services = json_decode(File::get($filePath), true)['services'] ?? [];
        // } else {
        //     $services = []; 
        // }

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

        $services = [
            "Braces" => [
                "Metal Braces",
                "Free Consultation",
                "Free Monthly Oral Prophylaxis/Cleaning",
                "Free Photo Analysis",
                "Free Intraoral Photos",
                "Free Diagnostic Cast",
                "Free 1 set Ortho Wax",
                "Free Interdental Brush",
                "Referral Deductions"
            ],
            "Teeth Whitening" => ["Teeth Whitening"],
            "General Procedures" => [
                "Oral Prophylaxis",
                "Fluoride Treatment",
                "Tooth Filling/Pasta",
                "Anterior Tooth Filling/Pasta sa unahan",
                "Tooth Extraction",
                "Odontectomy/Wisdom Tooth Removal"
            ],
            "Dentures" => [
                "Complete Denture" => ["Ordinary", "Ivocap", "Thermosens"],
                "Partial Denture" => [
                    "Ordinary Denture US Plastic" => [
                        "1-2 units",
                        "3-4 units",
                        "5 and above",
                        "CD per arch"
                    ],
                    "IVOSTAR" => [
                        "1-2 units",
                        "3-4 units",
                        "5 and above",
                        "CD per arch"
                    ],
                    "FLEXITE" => [
                        "1-2 Units unilateral",
                        "2-3 Units bilateral",
                        "4-10 Units bilateral",
                        "10-12 Units bilateral"
                    ]
                ]
            ],
            "Fixed Bridge and Crowns" => [
                "Porcelain with Metal",
                "Porcelain with Tilite",
                "Emax",
                "Zirconia",
                "Temporary Plastic Crown"
            ],
            "Maryland Bridge" => ["Plastic", "Porcelain with Metal"],
            "Veneers" => ["Ceramage", "Emax"],
            "Retainers" => [
                "Retainers",
                "Promo for braces patient",
                "If outside patient"
            ],
            "X-ray" => ["Periapical X-ray"],
            "Root Canal Treatment" => [
                "Anterior Only",
                "Preop Periapical X-ray",
                "Restoration Buildup"
            ]
        ];


        return view('patient.calendar', compact('appointments', 'services','allData', 'remainingSlotsByDate', 'availableappointments', 'selectedDate', 'availableslots'));
    }


    public function history()
    {
        $userEmail = Auth::user()->email;
        $appointments = Appointment::where('email', $userEmail)
            ->select('id', 'patient_name', 'phone', 'date', 'time', 'status', 'appointments')
            ->get();
        $isEmpty = $appointments->isEmpty();



        $availableAppointments = AvailableAppointment::all()->map(function ($slot) {
            $pendingCount = Appointment::where('date', $slot->date)
                ->where('time_slot', $slot->time_slot)
                ->where('status', 'pending')
                ->count();
        
            $remainingSlots = max($slot->max_slots - $pendingCount, 0);         
            return [
                'id' => $slot->id,
                'date' => $slot->date,
                'time_slot' => $slot->time_slot,
                'remaining_slots' => $remainingSlots, 
            ];
        })->toArray();


        return view('patient.history', ['availableAppointments' => $availableAppointments, 'appointments' => $appointments, 'isEmpty' => $isEmpty]);
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

    public function cancelAppointment($id) {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Cancelled';
        $appointment->save();
        return redirect()->back();
    }

    public function updateAppointment(Request $request, $id)
    {
        $request->validate([
            'reschedule_appointment' => 'required|exists:appointments,id',
        ]);

        $newAppointmentId = $request->input('reschedule_appointments');
        $oldAppointment = Appointment::findOrFail($id);
        $newAppointment = AvailableAppointment::findOrFail($newAppointmentId);
        $oldAppointment->date = $newAppointment->date;
        $oldAppointment->time = $newAppointment->time_slot;
        $oldAppointment->status = 'Pending';
        $oldAppointment->save(); 

        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'action' => 'Rescheduled an Appointment',
            'model' => 'User',
            'changes' => null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);

        return redirect()->back();
    }
}
