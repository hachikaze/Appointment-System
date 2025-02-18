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
        return view('dashboard');
    }

    public function calendar()
    {
        $userEmail = Auth::user()->email;
        $appointments = Appointment::where('email', $userEmail)
            ->select('id', 'patient_name', 'phone', 'date', 'time', 'status')->get();
        return view('patient.calendar')->with('appointments', $appointments);
    }

    public function notifications()
    {
        return view('patient.notifications');
    }

    public function history()
    {
        return view('patient.history');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findorFail($id);
        $appointment->delete();
        return redirect()->back();
    }
}
