<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PatientRecords;
use PDF;

class PatientRecordsExportController extends Controller
{
    /**
     * Export a patient's records to PDF using the patient name.
     *
     * @param  string  $patientName
     * @return \Illuminate\Http\Response
     */
    public function exportPdf($patientName)
    {
        // URL-decode the patient name in case it was encoded
        $patientName = urldecode($patientName);

        // Retrieve records based on the patient name and only include appointments with the "Attended" status
        $records = PatientRecords::where('patient_name', $patientName)
                    ->where('status', 'Attended')
                    ->orderBy('created_at', 'desc')
                    ->get();

        // Optionally, get additional patient details from the users table
        $patient = User::whereRaw("firstname || ' ' || middleinitial || ' ' || lastname = ?", [$patientName])->first();

        $data = [
            'patient' => $patient,
            'records' => $records,
        ];

        $pdf = PDF::loadView('exports.patient_records_pdf', $data);

        return $pdf->download("patient_" . Str::slug($patientName, '_') . "_records.pdf");
    }


}
