<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminPatientRecordsController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('user_type', '!=', 'admin')
            ->where('user_type', '!=', 'staff');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('firstname', 'like', "%{$search}%")
                  ->orWhere('lastname', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->has('gender') && !empty($request->gender)) {
            $query->where('gender', $request->gender);
        }

        $patientIds = $query->pluck('id');

        if ($request->has('status') && !empty($request->status)) {
            $status = $request->status;
            if ($status === 'No Appointments') {
                $emailsWithAppointments = Appointment::distinct()->pluck('email')->toArray();
                $query->whereNotIn('email', $emailsWithAppointments);
            } else {
                $emailsWithStatus = Appointment::where('status', $status)
                    ->distinct()
                    ->pluck('email')
                    ->toArray();
                $query->whereIn('email', $emailsWithStatus);
            }
        }

        $perPage = ($request->has('perPage') && $request->perPage !== 'all')
            ? (int)$request->perPage
            : 10;

        if ($request->perPage === 'all') {
            $patients = $query->get();
            $patients = new \Illuminate\Pagination\LengthAwarePaginator(
                $patients,
                $patients->count(),
                $patients->count(),
                1
            );
        } else {
            $patients = $query->paginate($perPage)->withQueryString();
        }

        return view('admin.patient_records', compact('patients'));
    }

    public function show($id)
    {
        $patient = User::findOrFail($id);
        
        $appointments = Appointment::where('email', $patient->email)
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->get();

        return view('admin.patient_record_detail', compact('patient', 'appointments'));
    }
}