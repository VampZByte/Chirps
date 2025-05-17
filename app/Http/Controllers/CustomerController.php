<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(): View
{
    $customers = Customer::where('is_archived', false)
                ->latest()
                ->paginate(5);

    return view('customers.index', compact('customers'));
}

    

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_fname' => 'required|string|max:255',
            'customer_lname' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'phone' => 'required|string|max:20',
            'license_id' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'valid_id' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'address' => 'required|string|max:500',
        ]);

        if ($request->hasFile('license_id')) {
            $license = $request->file('license_id')->store('images', 'public');
            $validated['license_id'] = $license;
        }

        if ($request->hasFile('valid_id')) {
            $valid = $request->file('valid_id')->store('images', 'public');
            $validated['valid_id'] = $valid;
        }

        Customer::create($validated);

        return redirect()->route('customers.create')->with('success', 'Customer added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): View
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validated = $request->validate([
            'customer_fname' => 'required|string|max:255',
            'customer_lname' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'phone' => 'required|string|max:20',
            'license_id' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'valid_id' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'address' => 'required|string|max:500',
        ]);

        if ($request->hasFile('license_id')) {
            if ($customer->license_id) {
                Storage::disk('public')->delete($customer->license_id);
            }

            $license = $request->file('license_id')->store('images', 'public');
            $validated['license_id'] = $license;
        }

        if ($request->hasFile('valid_id')) {
            if ($customer->valid_id) {
                Storage::disk('public')->delete($customer->valid_id);
            }

            $valid = $request->file('valid_id')->store('images', 'public');
            $validated['valid_id'] = $valid;
        }
        $customer->update($validated);
        return redirect()->route('customers.create')->with('success', 'Customer updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
    public function customerForm(): View
    {
        $customers = Customer::select('id', 'customer_fname')->get(); // Add customer_lname if needed
        return view('your-form-view', compact('customers'));
    }

    public function showDashboard()
    {
        $totalCustomers = DB::table('customers')->count();
        $totalRents = DB::table('rent')->count();
        $totalCars = DB::table('cars')->count();

        return view('dashboard', compact('totalCustomers', 'totalRents', 'totalCars'));
    }

    public function archive($id)
    {
        $customers = Customer::findOrFail($id);
        $customers->is_archived = true;
        $customers->save();

        return redirect()->back()->with('success', 'Customer archived successfully.');
    }

    public function archivedList()
    {
        $customers = Customer::where('is_archived', true)->paginate(5);
        return view('customers.archived', compact('customers'));
    }

}
