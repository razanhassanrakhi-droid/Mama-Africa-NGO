<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendDonationController extends Controller
{
    public function index()
    {
        $paymentMethods = \App\Models\PaymentMethod::where('is_active', true)->get();
        $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
        return view('donate.index', compact('paymentMethods', 'settings'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'transaction_reference' => 'required|string|max:255',
            'message' => 'nullable|string',
            'frequency' => 'required|in:one-time,monthly',
        ]);

        $donation = \App\Models\Donation::create([
            'donor_name' => $validated['donor_name'],
            'donor_email' => $validated['donor_email'],
            'amount' => $validated['amount'],
            'payment_method_id' => $validated['payment_method_id'],
            'transaction_reference' => $validated['transaction_reference'],
            'message' => $validated['message'],
            'frequency' => $validated['frequency'],
            'status' => 'pending', // default
        ]);

        return redirect()->route('donate.success');
    }

    public function success()
    {
        return view('donate.success');
    }
}
