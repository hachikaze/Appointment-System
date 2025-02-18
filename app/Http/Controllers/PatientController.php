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
        $userEmail = Auth::user()->email;
        $appointments = Appointment::where('email', $userEmail)
            ->select('id', 'patient_name', 'phone', 'date', 'time', 'status')->get();
        return view('patient.calendar')->with('appointments', $appointments);
    }


    public function destroy($id)
    {
        $appointment = Appointment::findorFail($id);
        $appointment->delete();
        return redirect()->back();
    }
}
