<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Receipt;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $receipts = Receipt::all();

        return view('payment.index', compact('receipts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receipt_file' => 'required|file|mimes:pdf,jpg,jpeg,png',
        ]);

        $receiptNumber = 'RCPT-' . strtoupper(uniqid());
        $filePath = $request->file('receipt_file')->store('receipts');

        $receipt = new Receipt();
        $receipt->receipt_number = $receiptNumber;
        $receipt->file_path = $filePath;
        $receipt->save();

        return redirect()->route('receipt.show', ['id' => $receipt->id])
                        ->with('success', 'Receipt created successfully');
    }

    public function show($id)
    {
        $receipt = Receipt::findOrFail($id);

        $date = Carbon::today()->format('F j, Y');

        return view('payment.dental-receipt', compact('receipt', 'date'));
    }

}
