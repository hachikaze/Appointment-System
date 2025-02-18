<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class PatientController extends Controller
{
    public function index()
    {
<<<<<<< HEAD:app/Http/Controllers/PatientController.php
        return view('dashboard');
    }

    public function appointment()
    {
        // Retrieve all appointments
        $appointments = Appointment::all();
=======
        $userEmail = Auth::user()->email;
        $appointments = Appointment::where('email', $userEmail)
            ->select('id', 'patient_name', 'phone', 'date', 'time', 'status')->get();
        return view('patient.calendar')->with('appointments', $appointments);
    }
>>>>>>> 8a5bef2fbbbcc2249f8c4832f0c8e56244dde82d:app/Http/Controllers/PatientCalendarController.php


    public function destroy($id)
    {
        $appointment = Appointment::findorFail($id);
        $appointment->delete();
        return redirect()->back();
    }
}
