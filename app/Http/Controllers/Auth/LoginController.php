<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuditTrail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function profile()
    {
        return view('profile.editprofile');
    }

    public function create(Request $request)
    {
        // Redirect authenticated users to the dashboard
        if (Auth::check()) {
            $user = Auth::user(); // Use Auth::user() to get the authenticated user

            switch ($user->user_type) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'patient':
                    return redirect()->route('patient.dashboard');
                default:
                    return redirect()->route('home');
            }
        }

        return view('login');
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
