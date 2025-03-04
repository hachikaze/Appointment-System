<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Receipt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get the user's appointment IDs
        $appointmentIDs = Appointment::where('user_id', $user->id)->pluck('id');

        if ($appointmentIDs->isEmpty()) {
            return back()->with('error', 'No appointments found.');
        }

        // Get payments associated with the appointment IDs
        $payments = Payment::whereIn('appointment_id', $appointmentIDs)->get();

        // Get receipts linked to the payments
        $paymentIDs = $payments->pluck('id'); // Extract payment IDs
        $receipts = Receipt::whereIn('payment_id', $paymentIDs)->get();

        return view('payment.index', compact('payments', 'receipts'));
    }

    // INPUT THE GCASH PAYMENT OF PATIENT
    public function store(Request $request)
    {
        try {
            $request->validate([
                'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $receiptPath = $request->file('receipt')->store('payments', 'public');

            $user = Auth::user();

            // Get the user's appointment ID
            $appointmentId = Appointment::where('user_id', $user->id)->value('id');

            if (!$appointmentId) {
                return back()->with('error', 'No appointment found for this user.');
            }

            // Store in the payments table
            Payment::create([
                'file_path' => $receiptPath,
                'email' => Auth::user()->email,
                'status' => 'Pending', // Optional for admin review
                'appointment_id' => $appointmentId,
            ]);

            return back()->with('success', 'Payment uploaded successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while uploading your payment: ' . $e->getMessage());
        }
    }

    // FOR ADMIN
    public function viewPayments ()
    {
        $payments = Payment::all();

        return view('admin.receipts.view-payments', compact('payments'));
    }
}
