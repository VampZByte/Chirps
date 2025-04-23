<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

<!-- Display Customers -->
<div class="w-full max-w-4xl mx-auto overflow-x-auto mt-1 bg-white shadow rounded-md p-4">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-100 font-semibold text-gray-900 text-2xl">
            <tr>
                <th class="px-4 py-3">First Name</th>
                <th class="px-4 py-3">Last Name</th>
                <th class="px-4 py-3">Address</th>
                <th class="px-4 py-3">Contact Number</th>
                <th class="px-4 py-3">Age</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-base">
            @foreach ($customers as $customer)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $customer->customer_fname }}</td>
                    <td class="px-4 py-3">{{ $customer->customer_lname }}</td>
                    <td class="px-4 py-3">{{ $customer->address }}</td>
                    <td class="px-4 py-3">********{{ substr($customer->phone, -2) }}</td>
                    <td class="px-4 py-3">{{ $customer->age }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2">
                            <a href="{{ route('customers.edit', $customer->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </div>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $customers->links() }}
    </div>
</div>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('customers.store') }}">
            @csrf
            <input type="text" name="customer_fname" placeholder="First Name" 
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                value="{{ old('customer_fname') }}" required>
            <x-input-error :messages="$errors->get('customer_fname')" class="mt-2" />

            <input type="text" name="customer_lname" placeholder="Last Name" 
                class="block w-full border-gray-300 mt-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                value="{{ old('customer_lname') }}" required>
            <x-input-error :messages="$errors->get('customer_lname')" class="mt-2" />

            <input type="number" name="age" placeholder="Age" 
                class="block w-full border-gray-300 mt-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                value="{{ old('age') }}" required>
            <x-input-error :messages="$errors->get('age')" class="mt-2" />

            <input type="text" name="phone" placeholder="Phone Number" 
                class="block w-full border-gray-300 mt-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                value="{{ old('phone') }}" required>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />

            <textarea name="address" placeholder="Address"
                class="block w-full border-gray-300 mt-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('address') }}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />

            <x-primary-button class="mt-4">{{ __('Save Customer') }}</x-primary-button>
        </form>

    </div>
</x-app-layout>
