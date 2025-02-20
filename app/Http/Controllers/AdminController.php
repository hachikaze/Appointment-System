<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index() 
    {
        return view('admin.dashboard');
    }

    // Add new staff or admin user
    public function store(Request $request) {
        Log::info('Request Data:', $request->all()); // Debugging
    
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middleinitial' => 'nullable|string|max:1',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'user_type' => 'required|string',
        ]);
    
        // Concatenate full name
        $fullName = trim("{$request->firstname} {$request->middleinitial} {$request->lastname}");
    
        // Create user
        $user = User::create([
            'name' => $fullName,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type
        ]);
    
        Log::info('User Created:', ['id' => $user->id, 'email' => $user->email]); // Debugging
    
        return redirect()->route('admin.users')->with('success', 'Registration successful. Please verify your email.');
    
        return back()->with('error', 'Failed to create user.');
    }

    public function users() 
    {
        return view('admin.users');
    }

    public function reports() 
    {
        return view('admin.reports');
    }

    public function approvedAppointments() 
    {
        return view('admin.approved_appointments');
    }
}
