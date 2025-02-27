<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middleinitial' => 'nullable|string|max:1',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'nullable|string',
        ]);

        // Concatenate the name
        $fullName = trim("{$request->firstname} {$request->middleinitial} {$request->lastname}");

        User::create([
            'name' => $fullName,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type ?? 'patient', // Default to 'patient' if not provided
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please verify your email.');
    }
}
