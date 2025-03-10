<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index()
    {
        // Get counts for each user type
        $adminCount = User::where('user_type', 'admin')->count();
        $staffCount = User::where('user_type', 'staff')->count();
        $patientCount = User::where('user_type', 'patient')->count();

        // Get all users with pagination
        $users = User::paginate(10);
        
        return view('admin.users', compact('users', 'adminCount', 'staffCount', 'patientCount'));
    }
    
    /**
     * Store a newly created user
     */
    public function store(Request $request)
    {
        // Log the incoming request data for debugging
        Log::info('User creation request:', $request->all());

        try {
            $validated = $request->validate([
                'firstname' => 'required|string|max:255',
                'middleinitial' => 'nullable|string|max:1',
                'lastname' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'user_type' => ['required', 'string', Rule::in(['admin', 'staff', 'patient'])],
            ]);

            // Log validation success
            Log::info('Validation passed');

            // Concatenate full name
            $fullName = trim("{$request->firstname} {$request->middleinitial} {$request->lastname}");

            // In your store method
            $user = User::create([
                'name' => trim("{$request->firstname} {$request->middleinitial} {$request->lastname}"),
                'firstname' => $request->firstname,
                'middleinitial' => $request->middleinitial,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'gender' => $request->gender,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type
            ]);

            // Log user creation success
            Log::info('User created successfully:', ['id' => $user->id, 'email' => $user->email]);

            return redirect()->route('admin.users')->with('success', 'User created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Validation failed:', $e->errors());
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Log any other exceptions
            Log::error('User creation failed:', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to create user: ' . $e->getMessage())->withInput();
        }
    }
    
    /**
     * Get user data for editing
     */
    public function getUser(User $user)
    {
        try {
            Log::info('Fetching user data for editing', ['user_id' => $user->id]);
            
            // Split the name into parts - improved parsing logic
            $nameParts = explode(' ', trim($user->name));
            
            // Extract name components
            $firstname = $nameParts[0] ?? '';
            
            // Handle middle initial - it should be just one character
            $middleinitial = '';
            if (count($nameParts) > 2) {
                $middleinitial = $nameParts[1] ?? '';
                // If it's longer than 1 character, just take the first character
                if (strlen($middleinitial) > 1) {
                    $middleinitial = substr($middleinitial, 0, 1);
                }
            }
            
            // Last name is the last part
            $lastname = '';
            if (count($nameParts) > 1) {
                $lastname = count($nameParts) > 2 ? $nameParts[2] : $nameParts[1];
            }

            $userData = [
                'id' => $user->id,
                'firstname' => $firstname,
                'middleinitial' => $middleinitial,
                'lastname' => $lastname,
                'email' => $user->email,
                'gender' => $user->gender,
                'user_type' => $user->user_type,
            ];
            
            Log::info('User data retrieved successfully', [
                'user_id' => $user->id,
                'parsed_data' => $userData
            ]);
            
            return response()->json($userData);
        } catch (\Exception $e) {
            Log::error('Error retrieving user data', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json(['error' => 'Failed to retrieve user data: ' . $e->getMessage()], 500);
        }
    }
    
    /**
     * Update the specified user
     */
    public function update(Request $request, User $user)
    {
        Log::info('User update request:', [
            'user_id' => $user->id,
            'request_data' => $request->except(['password', 'password_confirmation'])
        ]);

        try {
            $validated = $request->validate([
                'firstname' => 'required|string|max:255',
                'middleinitial' => 'nullable|string|max:1',
                'lastname' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'user_type' => ['required', 'string', Rule::in(['admin', 'staff', 'patient'])],
            ]);

            // Only update password if provided
            if ($request->filled('password')) {
                $request->validate([
                    'password' => 'string|min:8',
                ]);
                $user->password = Hash::make($request->password);
            }
            
            // Concatenate full name - ensure proper spacing
            $middleInitial = $request->middleinitial ? " {$request->middleinitial} " : " ";
            $fullName = $request->firstname . $middleInitial . $request->lastname;
            $fullName = preg_replace('/\s+/', ' ', trim($fullName)); // Remove extra spaces
            
            // Update user fields
            $user->name = $fullName;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->user_type = $request->user_type;
            
            // Save changes
            $user->save();
            
            Log::info('User updated successfully', [
                'user_id' => $user->id,
                'updated_name' => $fullName
            ]);
            
            return redirect()->route('admin.users')->with('success', 'User updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed during user update:', $e->errors());
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('User update failed:', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Failed to update user: ' . $e->getMessage())->withInput();
        }
    }
    
    /**
     * Remove the specified user
     */
    public function destroy(User $user)
    {
        try {
            Log::info('Attempting to delete user', ['user_id' => $user->id]);

            $user->delete();

            Log::info('User deleted successfully', ['user_id' => $user->id]);

            return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            Log::error('User deletion failed:', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }
}
