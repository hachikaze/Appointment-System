<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Ensure the model is imported
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

 
    public function store(Request $request)
    {

        // Validate the request
        $validated = $request->validate([
            'phone' => 'required|string|max:11|regex:/^[0-9]+$/',
            'doctor' => 'required|string|max:255',
            'date' => ['required', 'date', function ($attribute, $value, $fail) {
                if (strtotime($value) < strtotime(date('Y-m-d'))) {
                    $fail('The ' . $attribute . ' must not be below the current date.');
                }
            }],
            'time' => 'required',
            'appointments' => 'required|string',
        ]);

        $validated['patient_name'] = Auth::user()->name;
        $email = Auth::user()->email;
        $validated['email'] = $email;

        $existingApplication = Appointment::where('email', $email)->first();
        if ($existingApplication) {
            return redirect()->back()->withErrors(['email' => 'You already have an existing appointment. Please cancel it before creating a new one.']);
        }

        $appointment = Appointment::create($validated);

        return redirect()->route(route: 'calendar')->with('success', 'Appointment booked successfully!');


        //     if ($appointment) {
        //         return response()->json(['status' => 'success', 'message' => 'Appointment booked successfully']);
        //     } else {
        //         return response()->json(['status' => 'error', 'message' => 'Failed to book appointment']);
        //     }
        // }
    }
}
