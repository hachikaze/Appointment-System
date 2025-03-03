<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Receipt;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $receipts = Receipt::all();

        return view('payment.view-receipts', compact('receipts'));
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        $receipt = Receipt::with('appointment')->findOrFail($id);
        $date = Carbon::today()->format('F j, Y');
        $patientName = $receipt->appointment->patient_name ?? 'Unknown Patient';
        $patientPhone = $receipt->appointment->phone;
        $serviceDesc = $receipt->appointment->appointments;

        return view('payment.dental-receipt', compact('receipt', 'date', 'patientName', 'patientPhone', 'serviceDesc'));
    }

}
