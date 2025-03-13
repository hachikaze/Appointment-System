<?php

namespace App\Http\Controllers;

use App\Models\AuditTrail;
use App\Models\Message;
use App\Models\AvailableAppointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\get;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\File;
use App\Models\Review;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $userEmail = Auth::user()->email;
        $user = Auth::user();
        $query = AuditTrail::with('user')->orderBy('created_at', 'desc');

        $monthlyAppointments = DB::table('appointments')
            ->selectRaw("strftime('%m', date) as month, COUNT(*) as count")
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                return [Carbon::create()->month(intval($item->month))->format('M') => $item->count];
            });

        $monthlyCategories = $monthlyAppointments->keys();
        $monthlyData = $monthlyAppointments->values();


        $dailyAppointments = Appointment::where('email', auth()->user()->email)
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');

        $availableDates = AvailableAppointment::count();
        $currentAppointments = AvailableAppointment::whereDate('date', (Carbon::today()))->count();
        $cancelledAppointments = Appointment::where('status', 'Cancelled')
            ->where('user_id', $user->id)
            ->count();

        $auditTrails = AuditTrail::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->limit(15)
            ->get();

        $search = $request->input('search');
        $allauditTrails = AuditTrail::where('user_id', Auth::id())
            ->with('user')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('action', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($q) use ($search) {
                            $q->where('firstname', 'like', "%{$search}%")
                                ->orWhere('lastname', 'like', "%{$search}%");
                        });
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->appends(['search' => $search]);

        if ($request->has('auditModal')) {
            session(['audit_modal_open' => true]);
        }


        $today = Carbon::now()->timezone('Asia/Singapore')->toDateString();
        $availableAppointments = AvailableAppointment::whereDate('date', $today)
            ->orderBy('date', 'desc')
            ->get();


        $appointmentCategories = Appointment::where('email', Auth::user()->email)
            ->whereIn('status', ['Attended'])
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

            ->whereRaw("time LIKE '% - %'")
            ->orderByRaw("time ASC")
            ->first();

        $timeRange = $upcomingappointment->time ?? '';
        $times = explode(' - ', $timeRange);

        $start_time = $times[0] ?? null;
        $end_time = $times[1] ?? null;

        return view('dashboard', compact(
            'search',
            'allauditTrails',
            'auditTrails',
            'user',
            'dailyAppointments',
            'monthlyCategories',
            'monthlyData',
            'availableAppointments',
            'availableDates',
            'appointmentCategories',
            'currentAppointments',
            'totalAppointments',
            'attendanceRate',
            'cancelledAppointments',
            'attendedCount',
            'totalEligible',
            'upcomingappointment',
            'start_time',
            'end_time'
        ));
    }

    public function bookappointment($id)
    {
        $user = Auth::user();
        $appointment = AvailableAppointment::find($id);

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
        return view('patient.bookappointment', compact('appointment', 'user', 'services'));
    }

    public function fetchAppointments($date)
    {
        $userEmail = auth()->user()->email;
        $now = Carbon::now();
        $date = '2025-03-12';

        $appointments = AvailableAppointment::where(function ($query) use ($date, $now) {
            $query->whereDate('date', '>=', $now->toDateString())
                ->orWhere(function ($q) use ($now) {
                    $q->whereDate('date', $now->toDateString())
                        ->whereTime('time_slot', '>', $now->toTimeString());
                });
        })
            ->where('date', $date)
            ->get()
            ->map(function ($slot) use ($userEmail) {
                $bookedCount = Appointment::where('date', $slot->date)
                    ->where('time', $slot->time_slot)
                    ->whereIn('status', ['Pending', 'Approved', 'Attended'])
                    ->count();

                $appointmentExists = Appointment::where('date', $slot->date)
                    ->where('time', $slot->time_slot)
                    ->whereIn('status', ['Pending', 'Approved', 'Attended', 'Unattended'])
                    ->where('email', $userEmail)
                    ->exists();

                $slot->remaining_slots = max(($slot->max_slots ?? 0) - $bookedCount, 0);
                $slot->appointment_exists = $appointmentExists;

                return $slot;
            });

        return response()->json($appointments);
    }


    public function calendar(Request $request)
    {
        $userEmail = Auth::user()->email;
        $timezone = 'Asia/Singapore';
        $now = Carbon::now()->format('H:i:s');

        $selectedDate = $request->input('hiddenselectedDate');
        Log::info('Received Selected Date: ' . ($selectedDate ?? 'None'));
        if (!empty($selectedDate)) {
            $selectedDate = date('Y-m-d', strtotime($selectedDate));
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


        $now = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');
        $allData = AvailableAppointment::all()->filter(function ($slot) use ($now) {
            [$start, $end] = explode(' - ', $slot->time_slot);
            $date = Carbon::parse($slot->date)->format('Y-m-d'); // Ensure correct format

            try {
                $endDateTime = Carbon::createFromFormat('Y-m-d g:i A', "$date " . trim($end), 'Asia/Manila')
                    ->format('Y-m-d H:i:s');
            } catch (\Exception $e) {
                dump("Error in conversion:", $slot->time_slot, $date, $end, $e->getMessage());
                return false;
            }
            return $endDateTime > $now;
        });



        $remainingSlotsByDate = [];  //FOR SLOTS AVAILABILITY
        foreach ($allData as $appointment) {
            $date = $appointment['date'];
            $timeSlot = $appointment['time_slot'];
            $maxSlots = $appointment['max_slots'];
            $bookedSlots = Appointment::where('date', $date)
                ->where('time', $timeSlot)
                ->whereIn('status', ['Pending', 'Approved', 'Attended'])
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

    public function pricing()
    {
        return view('patient.pricing');
    }


    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|string',
            'rating_input' => 'required|integer|min:1|max:5',
        ]);

        $appointment = Appointment::findOrFail($id);
        $response = Http::post(env('HUGGINGFACE_API_URL'), [
            'text' => $request->review
        ]);


        $sentimentData = $response->json();
        // Create review
        $values = Review::create([
            'user_id'           => Auth::id(),
            'appointment_id'    => $appointment->id,
            'fullname'          => $appointment->patient_name,
            'service'           => $appointment->appointments,
            'review'            => $request->review,
            'rating'            => $request->rating_input,
            'sentiment'         => $sentimentData['sentiment'] ?? 'neutral',
            'probability'       => $sentimentData['confidence_score'] ?? 0.0,
        ]);


        return back()->with('success', 'Review submitted successfully!');
    }


    public function history(Request $request)
    {
        $userEmail = Auth::user()->email;
        $filterDate = $request->input('date');
        $filterStatus = $request->input('status');
        $now = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');

        $appointments = Appointment::where('email', $userEmail)
            ->when($filterDate, function ($query, $filterDate) {
                return $query->whereDate('date', $filterDate);
            })
            ->when($filterStatus, function ($query, $filterStatus) {
                return $query->where('status', $filterStatus);
            })
            ->select('id', 'patient_name', 'phone', 'date', 'time', 'status', 'appointments')
            ->get();

        $isEmpty = $appointments->isEmpty();


        $availableAppointments = AvailableAppointment::whereDate('date', '>=', Carbon::today()->toDateString()) // Include today
            ->get()
            ->filter(function ($slot) use ($now) {
                [$start, $end] = explode(' - ', $slot->time_slot);
                $date = Carbon::parse($slot->date)->format('Y-m-d');

                try {
                    $endDateTime = Carbon::createFromFormat('Y-m-d g:i A', "$date " . trim($end), 'Asia/Manila')
                        ->format('Y-m-d H:i:s');
                } catch (\Exception $e) {
                    dump("Error in conversion:", $slot->time_slot, $date, $end, $e->getMessage());
                    return false;
                }

                return $endDateTime > $now;
            })
            ->map(function ($slot) {
                $pendingCount = Appointment::whereDate('date', $slot->date)
                    ->where('time', $slot->time_slot)
                    ->whereIn('status', ['Pending', 'Approved', 'Attended'])
                    ->count();

                $remainingSlots = max($slot->max_slots - $pendingCount, 0); // Ensure no negative values
    
                return [
                    'id' => $slot->id,
                    'date' => $slot->date,
                    'time_slot' => $slot->time_slot,
                    'remaining_slots' => $remainingSlots,
                ];
            })
            ->toArray();
        return view('patient.history', compact('availableAppointments', 'appointments', 'isEmpty', 'filterDate', 'filterStatus'));
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

    public function cancelAppointment($id)
    {
        //FOR CANCELLING APPOINTMENTS
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Cancelled';
        $appointment->save();
        return redirect()->back()->with('error', value: 'Appointment has been cancelled successfully!');
    }


    public function updateAppointment(Request $request, $id)
    {
        $request->validate([
            'reschedule_appointments.*' => 'exists:appointments,id',
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

        return redirect()->back()->with('success', 'Appointment has been updated successfully!');
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
                    ->whereIn('status', ['pending', 'approved'])
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
            'selectedDate' => 'required|date',
            'time'         => 'required|string',
        ]);

        // Find the appointment to reschedule
        $appointment = Appointment::findOrFail($id);

        // Parse the new date and time
        $newDate = Carbon::parse($request->input('selectedDate'))->format('Y-m-d');
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
