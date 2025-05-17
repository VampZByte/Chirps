<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CarController extends Controller
{
    /**
     * Display a listing of the cars.
     */
    public function index()
    {
        $cars = Cars::where('is_archived', false)
                    ->paginate(10);

        return view('cars.index', compact('cars'));
    }


    /**
     * Show the form for creating a new car.
     */
    public function create(): View
    {
        return view('cars.create');
    }

    /**
     * Store a newly created car in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:50',
            'rental_price' => 'required|numeric|min:0',
            'availability_status' => 'required|string|max:50',
            'car_condition' => 'required|string|max:255',
        ]);

        Cars::create($validated);

        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }


    public function show(Cars $car): View
    {
        return view('cars.show', compact('car'));
    }


    public function edit(Cars $car): View
    {
        return view('cars.edit', compact('car'));
    }


    public function update(Request $request, Cars $car): RedirectResponse
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:50',
            'rental_price' => 'required|numeric|min:0',
            'availability_status' => 'required|string|max:50',
            'car_condition' => 'required|string|max:255',
        ]);

        $car->update($validated);
        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    public function destroy(Cars $car): RedirectResponse
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }

    public function returnAction($id, $status)
    {
        $car = Cars::findOrFail($id);
        if (in_array($status, ['Available', 'Damaged'])) {
            $car->availability_status = $status;
            $car->save();
            return redirect()->back()->with('success', "Car marked as $status.");
        }
        return redirect()->back()->with('error', 'Invalid status.');
    }

    public function archive($id)
    {
        $cars = Cars::findOrFail($id);
        $cars->is_archived = true;
        $cars->save();

        return redirect()->back()->with('success', 'Car archived successfully.');
    }

    public function archivedList()
    {
        $cars = Cars::where('is_archived', true)->paginate(10);
        return view('cars.archived', compact('cars'));
    }


}
