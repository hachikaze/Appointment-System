<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Receipt;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    // public function show(Appointment $appointment)
    // {
    //     $receipt = Receipt::whereHas('payment', function ($query) use ($appointment) {
    //         $query->where('appointment_id', $appointment->id);
    //     })->firstOrFail();

    //     return view('payment.dental-receipt');
    // }

    public function show($id)
    {
        $receipt = Receipt::with('appointment')->findOrFail($id);
        $date = Carbon::today()->format('F j, Y');
        $patientName = $receipt->appointment->patient_name ?? 'Unknown Patient';
        $patientPhone = $receipt->appointment->phone;
        $serviceDesc = $receipt->appointment->appointments;
        return view('payment.dental-receipt', compact('receipt', 'date', 'patientName', 'patientPhone', 'serviceDesc'));
    }

    // public function download($id)
    // {
    //     $receipt = Receipt::findOrFail($id);
    //     $pdf = PDF::loadView('receipt.show', compact('receipt'));

    //     return $pdf->download('receipt-' . $receipt->receipt_number . '.pdf');
    // }
}
