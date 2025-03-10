<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRecords;
use App\Models\User;

class AdminPatientRecordsController extends Controller
{
    /**
     * Display a listing of patient records.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function records(Request $request)
    {
        $search = $request->query('search', '');
        $perPage = $request->query('perPage', 10);

        // Fetch patients from the users table where user_type is 'patient'
        $patients = User::select('id', 'firstname', 'middleinitial', 'lastname', 'user_type', 'email')
            ->where('user_type', 'patient')
            ->when($search, function ($query, $search) {
                // Use SQLite string concatenation operator (||)
                return $query->whereRaw("firstname || ' ' || middleinitial || ' ' || lastname like ?", ["%{$search}%"]);
            })
            ->orderBy('firstname', 'asc')
            ->paginate($perPage);

        // Build an array of full names in the same format stored in the appointments table
        $patientNames = $patients->map(function ($patient) {
            return trim($patient->firstname . ' ' . $patient->middleinitial . ' ' . $patient->lastname);
        })->toArray();

        // Fetch all appointments for these patients (using the constructed full names)
        $allRecords = PatientRecords::whereIn('patient_name', $patientNames)
            ->where('status', 'Attended')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('patient_name');

        return view('admin.patient_records', [
            'distinctPatients' => $patients,  
            'allRecords'       => $allRecords,  
        ]);
    }

    /**
     * Update the specified patient record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  Patient record ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'email'        => 'required|email|max:255|unique:appointments,email,'.$id,
            'phone'        => 'required|string|max:20',
            'date'         => 'required|date',
            'time'         => 'required',
            'doctor'       => 'required|string|max:255',
            'appointments' => 'required|string|max:255',
            'status'       => 'required|string|in:Pending,Approved,Attended,Unattended,Cancelled',
        ]);

        $patient = PatientRecords::findOrFail($id);

        $patient->update($validated);

        return redirect()->route('admin.patient_records')
                         ->with('success', 'Patient record updated successfully.');
    }

    /**
     * Remove the specified patient record.
     *
     * @param  int  $id  Patient record ID
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function destroy($id)
    {
        $patient = PatientRecords::findOrFail($id);
        $patient->delete();

        return redirect()->route('admin.patient_records')
            ->with('success', 'Patient record deleted successfully.');
    }
}
