<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuditTrail;
use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function profile()
    {

        $authUser = Auth::user();

        return view('profile.editprofile', compact('authUser'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'firstname' => 'required|string|max:255',
            'middleinitial' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'gender' => 'required|in:male,female,other',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public'); // Save to storage/app/public/profile_images
            $user->image_path = $imagePath;
        }


        $user->update([
            'firstname' => $request->firstname,
            'middleinitial' => $request->middleinitial,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'gender' => $request->gender,
            'image_path' => $user->image_path, // Update image if uploaded

        ]);
        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function create(Request $request)
    {
        $user = null;

        // Redirect authenticated users to the dashboard
        if (Auth::check()) {
            $user = Auth::user(); // Use Auth::user() to get the authenticated user

            switch ($user->user_type) {
                case 'admin':
                case 'staff':
                    return redirect()->route('admin.dashboard');
                case 'patient':
                    return redirect()->route('patient.dashboard');
                default:
                    return redirect()->route('home');
            }
        }

        return view('login', compact('user'));
    }

    public function store(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Attempt to authenticate the user
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or password.'
            ]);
        }

        // Regenerate session to prevent session fixation
        $request->session()->regenerate();

        AuditTrail::create([
            'user_id' => $request->user()->id,
            'action' => 'Logged In',
            'model' => 'User',
            'changes' => null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);

        // Handle email verification
        if (!Auth::user()->hasVerifiedEmail()) {
            return view('auth.verify-email');
        }

        // Role-based redirection
        switch (Auth::user()->user_type) {
            case 'admin':
                return redirect()->route('admin.dashboard')->withHeaders([
                    'Cache-Control' => 'no-cache, no-store, must-revalidate',
                    'Pragma' => 'no-cache',
                    'Expires' => '0'
                ]);
            case 'patient':
                return redirect()->route('patient.dashboard')->withHeaders([
                    'Cache-Control' => 'no-cache, no-store, must-revalidate',
                    'Pragma' => 'no-cache',
                    'Expires' => '0'
                ]);
            default:
                return redirect()->route('home')->withHeaders([
                    'Cache-Control' => 'no-cache, no-store, must-revalidate',
                    'Pragma' => 'no-cache',
                    'Expires' => '0'
                ]);
        }
    }

    public function destroy(Request $request)
    {
        // Log audit trail
        AuditTrail::create([
            'user_id' => $request->user()->id,
            'action' => 'Logged Out',
            'model' => 'User',
            'changes' => null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);

        // Log out user
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
