<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Appointment;
use App\Models\AvailableAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AdminAppointmentController extends Controller
{
    // Display admin dashboard
    public function index()
    {
        return view('admin.dashboard');
    }

    // Display and manage available appointment slots
    public function create(Request $request)
    {
        $query = AvailableAppointment::query();
        
        if ($request->has('filter_date') && $request->filter_date) {
            $query->where('date', $request->filter_date);
        }
        
        $availableAppointments = $query->orderBy('date')
            ->orderBy('time_slot')
            ->get();
        
        $currentDate = now()->format('Y-m-d');
        $currentHour = (int)now()->format('H');
        $currentMinute = (int)now()->format('i');
        
        foreach ($availableAppointments as $appointment) {
            $isPastDate = $appointment->date < $currentDate;
            
            $isPastTime = false;
            if ($appointment->date == $currentDate) {
                $timeSlotParts = explode(' - ', $appointment->time_slot);
                if (count($timeSlotParts) == 2) {
                    $startTime = trim($timeSlotParts[0]);
                    $startHour = (int)explode(':', $startTime)[0];
                    
                    $isPastTime = ($currentHour > $startHour) ||
                        ($currentHour == $startHour && $currentMinute >= 30);
                }
            }
            
            $activeAppointments = Appointment::where('date', $appointment->date)
                ->where('time', $appointment->time_slot)
                ->whereIn('status', ['Approved', 'Pending'])
                ->count();
            
            $takenSlots = Appointment::where('date', $appointment->date)
                ->where('time', $appointment->time_slot)
                ->whereIn('status', ['Approved', 'Attended'])
                ->count();
                
            $appointment->available_slots = $appointment->max_slots - $takenSlots;
            $appointment->has_active_bookings = ($activeAppointments > 0);
            $appointment->is_past_date = $isPastDate;
            $appointment->is_past_time = $isPastTime;
            $appointment->is_completed = $isPastDate || $isPastTime;
        }
        
        return view('admin.appointments.create', compact('availableAppointments'));
    }

    // Store a new available appointment slot
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time_slot' => 'required|string',
            'max_slots' => 'required|integer|min:1'
        ]);
        
        $existingSlot = AvailableAppointment::where('date', $request->date)
            ->where('time_slot', $request->time_slot)
            ->first();
        
        if ($existingSlot) {
            return redirect()->route('admin.appointments.create')
                ->with('error', 'An appointment slot already exists for this date and time.')
                ->withInput();
        }
        
        AvailableAppointment::create([
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'max_slots' => $request->max_slots,
        ]);
        
        return redirect()->route('admin.appointments.create')
            ->with('success', 'Available appointment added successfully.');
    }

    // Show edit form for an appointment slot
    public function edit($id)
    {
        $editAppointment = AvailableAppointment::findOrFail($id);
        
        $availableAppointments = AvailableAppointment::orderBy('date')
            ->orderBy('time_slot')
            ->get();
        
        return view('admin.appointments.create', compact('editAppointment', 'availableAppointments'));
    }

    // Update an existing appointment slot
    public function update(Request $request, $id)
    {
        $appointment = AvailableAppointment::findOrFail($id);
        
        $request->validate([
            'date' => 'required|date',
            'time_slot' => 'required|string',
            'max_slots' => 'required|integer|min:1'
        ]);
        
        $existingSlot = AvailableAppointment::where('date', $request->date)
            ->where('time_slot', $request->time_slot)
            ->where('id', '!=', $id)
            ->first();
        
        if ($existingSlot) {
            return redirect()->route('admin.appointments.create')
                ->with('error', 'Another appointment slot already exists for this date and time.');
        }
        
        $approvedCount = Appointment::where('date', $request->date)
            ->where('time', $request->time_slot)
            ->where('status', 'Approved')
            ->count();
        
        if ($approvedCount > $request->max_slots) {
            return redirect()->route('admin.appointments.create')
                ->with('error', "Cannot reduce max slots to {$request->max_slots}. There are already {$approvedCount} approved appointments.");
        }
        
        $appointment->update([
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'max_slots' => $request->max_slots,
        ]);
        
        return redirect()->route('admin.appointments.create')
            ->with('success', 'Appointment slot updated successfully.');
    }

    // Delete an appointment slot
    public function delete($id)
    {
        $appointment = AvailableAppointment::findOrFail($id);
        
        $currentDate = now()->format('Y-m-d');
        $currentHour = (int)now()->format('H');
        $currentMinute = (int)now()->format('i');
        
        $isPastDate = $appointment->date < $currentDate;
        
        $isPastTime = false;
        if ($appointment->date == $currentDate) {
            $timeSlotParts = explode(' - ', $appointment->time_slot);
            if (count($timeSlotParts) == 2) {
                $startTime = trim($timeSlotParts[0]);
                $startHour = (int)explode(':', $startTime)[0];
                
                $isPastTime = ($currentHour > $startHour) ||
                    ($currentHour == $startHour && $currentMinute >= 30);
            }
        }
        
        $isCompleted = $isPastDate || $isPastTime;
        
        $activeBookings = Appointment::where('date', $appointment->date)
            ->where('time', $appointment->time_slot)
            ->whereIn('status', ['Approved', 'Pending', 'Attended'])
            ->count();
        
        if (($isCompleted && $activeBookings == 0) || (!$isCompleted && $activeBookings == 0)) {
            $appointment->delete();
            return redirect()->route('admin.appointments.create')
                ->with('success', 'Appointment slot deleted successfully.');
        } else {
            return redirect()->route('admin.appointments.create')
                ->with('error', 'Cannot delete this appointment slot as it has active or completed bookings.');
        }
    }

    // Get available slots for a specific date (AJAX)
    public function getAvailableSlots(Request $request)
    {
        $date = $request->input('date');
        if (!$date) {
            return response()->json(['error' => 'Date is required'], 400);
        }
        
        $slots = AvailableAppointment::where('date', $date)
            ->orderBy('time_slot')
            ->get();
        
        return response()->json($slots);
    }

    // Manage users page
    public function users()
    {
        $users = User::where('user_type', '!=', 'patient')->get();
        return view('admin.users', compact('users'));
    }

    // Display reports page
    public function reports()
    {
        return view('admin.reports');
    }

    // Show approved appointments
    public function approvedAppointments()
    {
        $approvedAppointments = Appointment::where('status', 'Approved')->get();
        return view('admin.approved_appointments', compact('approvedAppointments'));
    }

    // Display appointment calendar
    public function calendar()
    {
        $appointments = Appointment::all();
        
        $appointmentsJson = $appointments->map(function($appointment) {
            $date = Carbon::parse($appointment->date);
            return [
                'id' => $appointment->id,
                'patient' => $appointment->patient_name,
                'date' => $appointment->date,
                'time' => $appointment->time,
                'status' => $appointment->status,
                'service' => $appointment->appointments,
                'notes' => $appointment->notes ?? 'No additional notes',
                'email' => $appointment->email,
                'phone' => $appointment->phone,
                'day' => $date->day,
                'month' => $date->month - 1,
                'year' => $date->year
            ];
        });
        
        return view('admin.calendar', [
            'appointments' => $appointments,
            'appointmentsJson' => $appointmentsJson->toJson()
        ]);
    }

    // Get appointments for a specific month (AJAX)
    public function getCalendarAppointments(Request $request)
    {
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);
        
        $appointments = Appointment::whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();
        
        $formattedAppointments = $appointments->map(function($appointment) {
            $date = Carbon::parse($appointment->date);
            return [
                'id' => $appointment->id,
                'patient' => $appointment->patient_name,
                'date' => $appointment->date,
                'time' => $appointment->time,
                'status' => $appointment->status,
                'service' => $appointment->appointments,
                'notes' => $appointment->notes ?? 'No additional notes',
                'email' => $appointment->email,
                'phone' => $appointment->phone,
                'day' => $date->day,
                'month' => $date->month - 1,
                'year' => $date->year
            ];
        });
        
        return response()->json($formattedAppointments);
    }

    // Edit user form
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    // Update user information
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middleinitial' => 'nullable|string|max:1',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'user_type' => 'required|string',
        ]);
        
        $fullName = trim("{$request->firstname} {$request->middleinitial} {$request->lastname}");
        
        $user->update([
            'name' => $fullName,
            'email' => $request->email,
            'gender' => $request->gender,
            'user_type' => $request->user_type
        ]);
        
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8',
            ]);
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }
        
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    // Delete a user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }
        
        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

    // Display admin profile
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    // Update admin profile
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middleinitial' => 'nullable|string|max:1',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);
        
        $fullName = trim("{$request->firstname} {$request->middleinitial} {$request->lastname}");
        
        $user->update([
            'name' => $fullName,
            'email' => $request->email,
        ]);
        
        if ($request->filled('current_password') && $request->filled('new_password')) {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|string|min:8|confirmed',
            ]);
            
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
            
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
        }
        
        return back()->with('success', 'Profile updated successfully.');
    }
}