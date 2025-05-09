<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Payment
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Edit Payment</h2>

        <form method="POST" action="{{ route('payments.update', $payment->id) }}">
            @csrf
            @method('PUT')

            {{-- Display customer info --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Customer</label>
                <p>{{ $customer->customer_fname }} {{ $customer->customer_lname }}</p>
            </div>

            {{-- Display plate number --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Plate Number</label>
                <p>{{ $car->plate_number }}</p>
            </div>

            {{-- Display car name --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Car</label>
                <p>{{ $car->brand }} [{{ $car->model }}]</p>
            </div>

            {{-- Amount Paid --}}
            <div class="mb-4">
                <label for="amount" class="block font-semibold mb-1">Amount Paid</label>
                <input type="number" id="amount" name="amount_paid" class="w-full border border-gray-300 px-3 py-2 rounded" value="{{ $payment->amount_paid }}" required>
            </div>

            {{-- Payment Date --}}
            <div class="mb-4">
                <label for="payment_date" class="block font-semibold mb-1">Payment Date</label>
                <input type="date" id="payment_date" name="payment_date" class="w-full border border-gray-300 px-3 py-2 rounded" value="{{ $payment->payment_date }}" required>
            </div>

            {{-- Payment Method --}}
            <div class="mb-4">
                <label for="payment_method" class="block font-semibold mb-1">Payment Method</label>
                <select id="payment_method" name="payment_method" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                    <option value="">Select Method</option>
                    <option value="Cash" {{ $payment->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                    <option value="GCash" {{ $payment->payment_method == 'GCash' ? 'selected' : '' }}>GCash</option>
                </select>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">
                    Update Payment
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
