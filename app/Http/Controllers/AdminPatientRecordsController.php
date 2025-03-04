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

        $patients = PatientRecords::when($search, function ($query, $search) {
                // Note: use 'patient_name' as per your model.
                return $query->where('patient_name', 'like', "%{$search}%");
            })
            ->when($filter, function ($query, $filter) {
                return $query->where('status', $filter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return view('admin.patient_records', compact('patients', 'search', 'filter'));
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
