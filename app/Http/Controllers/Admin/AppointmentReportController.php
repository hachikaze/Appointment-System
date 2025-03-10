<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class AppointmentReportController extends Controller
{
    // Displays appointments that were in a specific status during a time period
    public function statusDuringPeriod(Request $request)
    {
        $status = $request->status ?? 'Pending';
        $startDate = $request->start_date ?? Carbon::now()->subDays(7)->format('Y-m-d');
        $endDate = $request->end_date ?? Carbon::now()->format('Y-m-d');
        
        if ($status == 'Pending') {
            $appointments = Appointment::get();
        } else {
            $appointments = Appointment::where('status', $status)
                ->orWhereHas('statusHistory', function($query) use ($status) {
                    $query->where('to_status', $status);
                })
                ->get();
        }
        
        $statuses = ['Pending', 'Approved', 'Attended', 'Unattended', 'Cancelled'];
        
        return view('admin.reports.status_during_period', [
            'appointments' => $appointments,
            'status' => $status,
            'statuses' => $statuses,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }

    // Exports appointment status report to PDF
    public function exportPdf(Request $request)
    {
        $status = $request->status ?? 'Pending';
        $startDate = $request->start_date ?? Carbon::now()->subDays(7)->format('Y-m-d');
        $endDate = $request->end_date ?? Carbon::now()->format('Y-m-d');
        
        if ($status == 'Pending') {
            $appointments = Appointment::get();
        } else {
            $appointments = Appointment::where('status', $status)
                ->orWhereHas('statusHistory', function($query) use ($status) {
                    $query->where('to_status', $status);
                })
                ->get();
        }
        
        $pdf = PDF::loadView('pdf.status_during_period', [
            'appointments' => $appointments,
            'status' => $status,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
        
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('appointment_status_report_' . $status . '_' . date('Y-m-d') . '.pdf');
    }
}