<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function create(Request $request)
    {
        // Redirect authenticated users to the dashboard
        if (Auth::check()) {
            switch ($request->user()->user_type) {
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

        // Role-based redirection
        switch ($request->user()->user_type) {
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

    public function destroy()
    {
        Auth::logout();

        // Prevent back button after logout
        return redirect()->route('login')->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate', 
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
