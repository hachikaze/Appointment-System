<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRecords;

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
        $filter = $request->query('filter', '');
        $perPage = $request->query('perPage', 10);

        // 1) Fetch a paginator of unique patient names
        $distinctPatients = PatientRecords::select('patient_name')
        ->when($search, function ($query, $search) {
            return $query->where('patient_name', 'like', "%{$search}%");
        })
        ->groupBy('patient_name')
        ->orderBy('patient_name', 'asc')  // or whichever column makes sense
        ->paginate($perPage);

        // 2) Fetch all the rows (appointments) for *only* those distinct patients
        $allRecords = PatientRecords::whereIn('patient_name', $distinctPatients->pluck('patient_name'))
        ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy('patient_name');

        // Then pass these two variables into your view:
        return view('admin.patient_records', [
        'distinctPatients' => $distinctPatients,  // This is your paginator of unique names
        'allRecords'       => $allRecords,        // This is a grouped collection of appointments
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
            // 'status'       => 'required|string|in:Pending,Approved,Attended,Unattended,Cancelled',
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
