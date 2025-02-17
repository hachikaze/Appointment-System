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
            'phone' => 'required|string|max:20',
            'doctor' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'appointments' => 'required|string',
        ]);


        $validated['patient_name'] = Auth::user()->name;
        $validated['email'] = Auth::user()->email;
        // Insert into database
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