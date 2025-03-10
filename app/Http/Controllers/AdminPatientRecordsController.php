<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRecords;
use Illuminate\Support\Facades\DB;

class AdminPatientRecordsController extends Controller
{
    /**
     * Display a listing of patient records (grouped by email).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function records(Request $request)
    {
        $search = $request->query('search', '');
        $perPage = $request->query('perPage', 10);
        
        // Build the base query
        $query = PatientRecords::query();
        
        // Apply search filter if provided
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('patient_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        
        // Get unique patients (grouped by email)
        $uniquePatients = $query->select(
                'email',
                DB::raw('MAX(id) as id'),
                'patient_name',
                'phone',
                DB::raw('MAX(date) as last_appointment_date'),
                DB::raw('COUNT(*) as appointment_count')
            )
            ->groupBy('email', 'patient_name', 'phone')
            ->orderBy('last_appointment_date', 'desc')
            ->paginate($perPage);
        
        return view('admin.patient_records', compact('uniquePatients', 'search'));
    }
    
    /**
     * Display patient history with all appointments.
     *
     * @param  string  $email
     * @return \Illuminate\View\View
     */
    public function patientHistory($email)
    {
        // Get the patient details from first appointment
        $patient = PatientRecords::where('email', $email)->first();
        
        if (!$patient) {
            return redirect()->route('admin.patient_records')
                ->with('error', 'Patient not found');
        }
        
        // Get all appointments for this patient
        $appointments = PatientRecords::where('email', $email)
                        ->orderBy('date', 'desc')
                        ->orderBy('time', 'desc')
                        ->get();
        
        return view('admin.patient-history', compact('patient', 'appointments'));
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
    
    /**
     * Delete all records for a patient with the given email.
     *
     * @param  string  $email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyAllByEmail($email)
    {
        $deleted = PatientRecords::where('email', $email)->delete();
        
        return redirect()->route('admin.patient_records')
            ->with('success', "All records for patient with email {$email} deleted successfully.");
    }
    
    /**
     * View a specific appointment record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewAppointment($id)
    {
        $appointment = PatientRecords::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $appointment
        ]);
    }
}