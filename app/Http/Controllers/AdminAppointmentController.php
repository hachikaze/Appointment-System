<?php

namespace App\Http\Controllers;

use App\Models\AvailableAppointment;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
    public function index()
    {
        $availableAppointments = AvailableAppointment::all();
        return view('admin.appointments.index', compact('availableAppointments'));
    }

    public function create()
    {
        return view('admin.appointments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time_slot' => 'required',
            'max_slots' => 'required|integer|min:1'
        ]);

        AvailableAppointment::create($request->all());

        return redirect()->route('admin.appointments.index')->with('success', 'Available appointment added successfully.');
    }
}
