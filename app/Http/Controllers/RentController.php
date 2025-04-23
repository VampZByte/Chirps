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
            'car_id' => 'required|exists:cars,id', // ✅ Changed 'Car_ID' to 'id'
            'days' => 'required|integer|min:1',
        ]);

        $car = Cars::where('id', $request->car_id)->first(); // ✅ Changed 'Car_ID' to 'id'

        // Calculate values
        $rentDate = now();
        $returnDate = now()->addDays((int) $request->days); // Cast to int
        $totalPrice = $car->Rental_Price * (int) $request->days; // Also cast to int        

        Rent::create([
            'Customer_ID' => auth()->id(),           // Assumes user is logged in
            'Car_ID' => $car->id,                    // ✅ Changed 'id' key to match your Rent table field
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
            'car_id' => 'required|exists:cars,id', // ✅ Changed 'id' to 'car_id' for consistency
            'days' => 'required|integer|min:1',
        ]);

        $car = Cars::where('id', $request->car_id)->first(); // ✅ Use the correct column

        $returnDate = $rent->Rent_Date->addDays($request->days);
        $totalPrice = $car->Rental_Price * $request->days;

        $rent->update([
            'Car_ID' => $car->id, // ✅ Use correct car ID
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
