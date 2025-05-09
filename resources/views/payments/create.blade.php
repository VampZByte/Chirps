<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Create Payment
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Create Payment</h2>

        <form method="POST" action="{{ route('payments.store') }}">
            @csrf

            <input type="hidden" name="rent_id" value="{{ $rent->Rent_ID }}">

            <div class="mb-4">
                <label class="block font-semibold mb-1">Customer</label>
                <p>{{ $customer->customer_fname }} {{ $customer->customer_lname }}</p>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Plate Number</label>
                <p>ABCD-{{ $car->id }}</p>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Car</label>
                <p>{{ $car->brand }} [{{ $car->model }}]</p>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Current Balance</label>
                <p>₱{{ number_format($rent->Total_Price, 2) }}</p>
            </div>
            
            <div class="mb-4">
                <label for="amount" class="block font-semibold mb-1">Amount Paid</label>
                <input type="number" id="amount" name="amount_paid" class="w-full border border-gray-300 px-3 py-2 rounded" value="{{ old('amount_paid') }}" required>
                @error('amount_paid')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="payment_date" class="block font-semibold mb-1">Payment Date</label>
                <input type="date" id="payment_date" name="payment_date" class="w-full border border-gray-300 px-3 py-2 rounded" 
                       value="{{ old('payment_date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
            </div>

            <div class="mb-4">
                <label for="payment_method" class="block font-semibold mb-1">Payment Method</label>
                <select id="payment_method" name="payment_method" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                    <option value="">Select Method</option>
                    <option value="Cash">Cash</option>
                    <option value="GCash">GCash</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-black font-bold px-4 py-2 rounded">
                    Submit Payment
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
