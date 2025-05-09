<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Rent a Car
        </h2>
    </x-slot>
    
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Add New Rent</h2>
        <form method="POST" action="{{ route('rents.store') }}">
            @csrf

            <div class="mb-4">
                <label for="customer_id" class="block font-semibold mb-1">Customer</label>
                <select id="customer_id" name="customer_id" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                    <option value="">Select Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="car_id" class="block font-semibold mb-1">Car</label>
                <select id="car_id" name="car_id" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                    <option value="">Select Car</option>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="rent_date" class="block font-semibold mb-1">Rent Date</label>
                <input type="date" id="rent_date" name="rent_date" class="w-full border border-gray-300 px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="return_date" class="block font-semibold mb-1">Return Date</label>
                <input type="date" id="return_date" name="return_date" class="w-full border border-gray-300 px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="total_price" class="block font-semibold mb-1">Total Price</label>
                <input type="number" step="0.01" id="total_price" name="total_price" class="w-full border border-gray-300 px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="status" class="block font-semibold mb-1">Status</label>
                <select id="status" name="status" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                    <option value="">Select Status</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">
                    Rent Now
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
