<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Rent;
use App\Models\Customer;
use Illuminate\Http\Request;

class PaymentController extends Controller
{


    public function index()
    {
        $rents = Rent::with('payment', 'customer')->paginate(5);
        return view('payments.index', compact('rents'));
    }


    public function create(Request $request)
    {
        $rents = Rent::findOrFail($request->rent_id);
        $customer = $rent->customer;
        $car = $rent->car;

        return view('payments.create', compact('rent', 'customer', 'car'));
    }

    public function store(Request $request)
{
    $request->validate([
        'rent_id' => 'required|exists:rent,Rent_ID',
        'amount_paid' => 'required|numeric|min:0',
        'payment_date' => 'required|date',
        'payment_method' => 'required|string'
    ]);

    $rent = Rent::where('Rent_ID', $request->rent_id)->firstOrFail();

    if ($request->amount_paid != $rent->Total_Price) {
        return back()->withErrors([
            'amount_paid' => 'Amount paid must be exactly equal to the total rent price (₱' . number_format($rent->Total_Price, 2) . ').'
        ])->withInput();
    }

    Payment::create([
        'Customer_ID' => $rent->Customer_ID, 
        'Rent_ID' => $rent->Rent_ID,
        'Amount_Paid' => $request->amount_paid,
        'Payment_Date' => $request->payment_date,
        'Payment_Method' => $request->payment_method,
    ]);

    return redirect()->route('payments.index')->with('success', 'Payment recorded successfully.');
}

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $rent = $payment->rent;
        $customer = $rent->customer;
        $car = $rent->car;

        return view('payments.edit', compact('payment', 'customer', 'car'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'amount_paid' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string'
        ]);

        $payment->update([
            'amount_paid' => $request->amount_paid,
            'payment_date' => $request->payment_date,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }

        public function archive($id)
    {
        $payments = Payment::findOrFail($id);
        $payments->is_archived = true;
        $payments->save();


        return redirect()->back()->with('success', 'Payment archived and car marked as available.');
    }

    public function archivedList()
    {
        $payments = Payment::where('is_archived', true)->with(['cars', 'rents','customer'])->paginate(10);
        return view('payments.archived', compact('payments'));
    }

        public function paymentList()
    {
        $rents = Rent::with(['payment', 'customer'])
                    ->where('is_archived', false)
                    ->paginate(5);
                    
        return view('payments.index', compact('rents'));
    }
}

 