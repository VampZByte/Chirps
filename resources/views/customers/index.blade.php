<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

<!-- Display Customers -->
<div class="w-full max-w-4xl mx-auto overflow-x-auto mt-1 bg-white shadow rounded-md p-4">
<h2 class="text-2xl font-bold mb-6">Customers</h2>
        <div class="mb-4 text-right">
            <a href="{{ route('customers.create') }}" class="inline-block bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                + Add Customer
            </a>
        </div>
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-100 font-semibold text-gray-900 text-2xl">
            <tr>
                <th class="px-4 py-3">First Name</th>
                <th class="px-4 py-3">Last Name</th>
                <th class="px-4 py-3">Age</th>
                <th class="px-4 py-3">Contact Number</th>
                <th class="px-4 py-3">License</th>
                <th class="px-4 py-3">Valid</th>
                <th class="px-4 py-3">Address</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-base">
            @foreach ($customers as $customer)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $customer->customer_fname }}</td>
                    <td class="px-4 py-3">{{ $customer->customer_lname }}</td>
                    <td class="px-4 py-3">{{ $customer->age }}</td>
                    <td class="px-4 py-3">********{{ substr($customer->phone, -2) }}</td>
                    <td>
                        @if ($customer->license_id)
                        <img src="{{ asset('storage/' . $customer->license_id) }}" alt="License ID" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                        @else
                            No image
                        @endif
                    </td>
                    <td>
                        @if ($customer->valid_id)
                        <img src="{{ asset('storage/' . $customer->valid_id) }}" alt="Valid ID" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                        @else
                            No image
                        @endif
                    </td>
                    <td class="px-4 py-3">{{ $customer->address }}</td>
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
</x-app-layout>
