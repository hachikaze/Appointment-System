<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class PatientController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function appointment()
    {
        // Retrieve all appointments
        $appointments = Appointment::all();

        // Pass appointments using an associative array
        return view('patient.calendar', ['appointments' => $appointments]);
    }
}
