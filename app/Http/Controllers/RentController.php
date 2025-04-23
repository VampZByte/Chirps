<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Cars;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $cars = Cars::paginate(2); // Fetch cars
        return view('rent.index', compact('cars'));
    }

    public function create()
    {
        return view('rent.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,Car_ID',
            'days' => 'required|integer|min:1',
        ]);

        $car = Cars::where('Car_ID', $request->car_id)->first();

        // Calculate values
        $rentDate = now();
        $returnDate = now()->addDays($request->days);
        $totalPrice = $car->Rental_Price * $request->days;

        Rent::create([
            'Customer_ID' => auth()->id(),               // Assumes user is logged in
            'Car_ID' => $car->Car_ID,
            'Rent_Date' => $rentDate,
            'Return_Date' => $returnDate,
            'Total_Price' => $totalPrice,
            'Status' => 'Ongoing',
        ]);

        return redirect()->route('rent.list')->with('success', 'Car added to rent list.');
    }

    public function show(Rent $rent)
    {
        return view('rent.show', compact('rent'));
    }

    public function edit(Rent $rent)
    {
        return view('rent.edit', compact('rent'));
    }

    public function update(Request $request, Rent $rent)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,Car_ID',
            'days' => 'required|integer|min:1',
        ]);

        $car = Cars::where('Car_ID', $request->car_id)->first();
        $returnDate = $rent->Rent_Date->addDays($request->days);
        $totalPrice = $car->Rental_Price * $request->days;

        $rent->update([
            'Car_ID' => $car->Car_ID,
            'Return_Date' => $returnDate,
            'Total_Price' => $totalPrice,
        ]);

        return redirect()->route('rent.index')->with('success', 'Rent updated successfully.');
    }

    public function destroy(Rent $rent)
    {
        $rent->delete();
        return redirect()->route('rent.index')->with('success', 'Rent deleted successfully.');
    }

    public function rentList()
    {
        $rents = Rent::with('car', 'user')->paginate(10);
        return view('rent.list', compact('rents'));
    }
}
