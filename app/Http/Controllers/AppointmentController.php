<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Ensure the model is imported

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'doctor' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'appointments' => 'required|string',
        ]);

        // Insert into database
        $appointment = Appointment::create($validated);

        if ($appointment) {
            return response()->json(['status' => 'success', 'message' => 'Appointment booked successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to book appointment']);
        }
    }
}