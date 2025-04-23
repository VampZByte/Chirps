<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Customer
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-md rounded">
                <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="customer_fname" value="{{ $customer->customer_fname }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" name="customer_lname" value="{{ $customer->customer_lname }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" value="{{ $customer->address }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" value="{{ $customer->phone }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Age</label>
                        <input type="number" name="age" value="{{ $customer->age }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                
                    <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-300 text-Black p-2 rounded">
                    Update
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
