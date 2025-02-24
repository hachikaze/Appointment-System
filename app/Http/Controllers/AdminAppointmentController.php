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
            'time_slot' => 'required|string',
            'max_slots' => 'required|integer|min:1'
        ]);

        AvailableAppointment::create([
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'max_slots' => $request->max_slots,
        ]);

        return redirect()->route('admin.appointments.create')
                        ->with('success', 'Available appointment added successfully.');
    }
}
