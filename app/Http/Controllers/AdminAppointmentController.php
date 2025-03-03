<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Appointment;
use App\Models\AvailableAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminAppointmentController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        return view('admin.appointments.create');
    }

    /**
     * Display the form to create available appointments and list existing ones
     */
    public function create()
    {
        // Get all available appointments
        $availableAppointments = AvailableAppointment::orderBy('date', 'asc')
            ->orderBy('time_slot', 'asc')
            ->get();
        
        // Get counts of booked appointments for each date/time slot
        $bookedAppointments = Appointment::select('date', 'time', DB::raw('count(*) as count'))
            ->groupBy('date', 'time')
            ->get();
        
        // Create a structured array to easily access the counts
        $slotCounts = [];
        foreach ($bookedAppointments as $appointment) {
            if (!isset($slotCounts[$appointment->date])) {
                $slotCounts[$appointment->date] = [];
            }
            $slotCounts[$appointment->date][$appointment->time] = $appointment->count;
        }
        
        return view('admin.appointments.create', compact('availableAppointments', 'slotCounts'));
    }

    /**
     * Store a newly created available appointment
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time_slot' => 'required|string',
            'max_slots' => 'required|integer|min:1'
        ]);

        AvailableAppointment::create([
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'max_slots' => $request->max_slots,
        ]);

        return redirect()->route('admin.appointments.create')
            ->with('success', 'Available appointment added successfully.');
    }

    /**
     * Update an existing available appointment
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'time_slot' => 'required|string',
            'max_slots' => 'required|integer|min:1'
        ]);

        $appointment = AvailableAppointment::findOrFail($id);
        $appointment->update([
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'max_slots' => $request->max_slots,
        ]);

        return redirect()->route('admin.appointments.create')
            ->with('success', 'Appointment slot updated successfully.');
    }

    /**
     * Delete an available appointment slot
     */
    public function delete($id)
    {
        $appointment = AvailableAppointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointments.create')
            ->with('success', 'Appointment slot deleted successfully.');
    }

    /**
     * Display users management page
     */
    public function users()
    {
        // fetch users to display in the view
        $users = User::where('user_type', '!=', 'patient')->get();
        return view('admin.users', compact('users'));
    }

    /**
     * Display reports page
     */
    public function reports()
    {
        return view('admin.reports');
    }

    /**
     * Display approved appointments
     */
    public function approvedAppointments()
    {
        $approvedAppointments = Appointment::where('status', 'Approved')->get();
        return view('admin.approved_appointments', compact('approvedAppointments'));
    }

    /**
     * Display appointment calendar with enhanced functionality
     */
    public function calendar()
    {
        // Get all appointments for the calendar
        $appointments = Appointment::all();
        
        // Format appointments for the calendar JavaScript
        $appointmentsJson = $appointments->map(function($appointment) {
            // Parse the date to get components
            $date = Carbon::parse($appointment->date);
            return [
                'id' => $appointment->id,
                'patient' => $appointment->patient_name,
                'date' => $appointment->date,
                'time' => $appointment->time,
                'status' => $appointment->status,
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

    /**
     * Get appointments for a specific month (AJAX endpoint)
     */
    public function getCalendarAppointments(Request $request)
    {
        // Get month and year from request, default to current month/year
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        // Query appointments for the specified month/year
        $appointments = Appointment::whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();

        // Format appointments for the calendar
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

    /**
     * Get available appointment slots (for patient booking)
     */
    public function getAvailableSlots(Request $request)
    {
        $date = $request->input('date');
        
        // Get available appointment slots
        $availableSlots = AvailableAppointment::where('date', $date)
            ->orderBy('time_slot', 'asc')
            ->get();
        
        // Get counts of booked appointments for the requested date
        $bookedAppointments = Appointment::select('time', DB::raw('count(*) as count'))
            ->where('date', $date)
            ->groupBy('time')
            ->get();
        
        // Create a lookup array for booked counts
        $bookedCounts = [];
        foreach ($bookedAppointments as $appointment) {
            $bookedCounts[$appointment->time] = $appointment->count;
        }
        
        // Add the booked count to each available slot
        $availableSlots = $availableSlots->map(function($slot) use ($bookedCounts) {
            $slot->slots_taken = $bookedCounts[$slot->time_slot] ?? 0;
            $slot->slots_available = $slot->max_slots - $slot->slots_taken;
            return $slot;
        });
        
        return response()->json($availableSlots);
    }

    /**
     * Edit user information
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    /**
     * Update user information
     */
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

        // Concatenate full name
        $fullName = trim("{$request->firstname} {$request->middleinitial} {$request->lastname}");

        $user->update([
            'name' => $fullName,
            'email' => $request->email,
            'gender' => $request->gender,
            'user_type' => $request->user_type
        ]);

        // Update password if provided
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

    /**
     * Delete a user
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting yourself
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

    /**
     * Display admin profile
     */
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    /**
     * Update admin profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middleinitial' => 'nullable|string|max:1',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        // Concatenate full name
        $fullName = trim("{$request->firstname} {$request->middleinitial} {$request->lastname}");

        $user->update([
            'name' => $fullName,
            'email' => $request->email,
        ]);

        // Update password if provided
        if ($request->filled('current_password') && $request->filled('new_password')) {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|string|min:8|confirmed',
            ]);

            // Verify current password
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