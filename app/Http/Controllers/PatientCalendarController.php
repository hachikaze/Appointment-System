<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class PatientCalendarController extends Controller
{
    public function index()
    {
        // Retrieve all appointments
        $appointments = Appointment::all();

        // Pass appointments using an associative array
        return view('patient.calendar', ['appointments' => $appointments]);
    }
}
