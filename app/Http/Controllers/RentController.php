<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Cars;
use Illuminate\Http\Request;
use App\Models\Customer;


class RentController extends Controller
{
    public function index()
    {
        $cars = Cars::paginate(2); // Fetch cars
        $customers = Customer::select('id', 'customer_fname', 'customer_lname')->get(); // Fetch customers
    
        return view('rent.index', compact('cars', 'customers'));
    }

    public function create()
    {
        return view('rent.create');
    }

    public function store(Request $request)
    {
            $request->validate([
                'car_id' => 'required|exists:cars,id', // ✅ Changed 'Car_ID' to 'id'
                'rent_date' => 'required|date',
                'return_date' => 'required|date|after_or_equal:rent_date',
            ]);

        $car = Cars::where('id', $request->car_id)->first(); 
        $rent_date = $request->rent_date;
        $return_date = $request->return_date;

        // Calculate values
        $totalPrice = $car->rental_price * \Carbon\Carbon::parse($rent_date)->diffInDays(\Carbon\Carbon::parse($return_date)); 

        Rent::create([
            'Customer_ID' => $request->customer_id,
            'Car_ID' => $car->id,                
            'Rent_Date' => $rent_date,
            'Return_Date' => $return_date,
            'Total_Price' => $totalPrice,
            'Status' => 'Ongoing',
        ]);

        $car->availability_status = 'Not Available';
        $car->save();
    
        return redirect()->back()->with('success', 'Car added to rent list.');

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

        $return_date = $rent->Rent_Date->addDays($request->days);
        $totalPrice = $car->Rental_Price * $request->days;

        $rent->update([
            'Car_ID' => $car->id, // ✅ Use correct car ID
            'Return_Date' => $return_date,
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
