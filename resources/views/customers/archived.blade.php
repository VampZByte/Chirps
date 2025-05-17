<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

<!-- Display Customers -->
<div class="w-full max-w-4xl mx-auto overflow-x-auto mt-1 bg-white shadow rounded-md p-4">
<h2 class="text-2xl font-bold mb-6">Archived Customers</h2>
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-100 font-semibold text-gray-900 text-2xl">
            <tr>
                <th class="px-4 py-3 border">First Name</th>
                <th class="px-4 py-3 border">Last Name</th>
                <th class="px-4 py-3 border">Age</th>
                <th class="px-4 py-3 border">Contact Number</th>
                <th class="px-4 py-3 border">License</th>
                <th class="px-4 py-3 border">Valid</th>
                <th class="px-4 py-3 border">Address</th>
                <th class="px-4 py-3 border">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-base">
            @foreach ($customers as $customer)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 border">{{ $customer->customer_fname }}</td>
                    <td class="px-4 py-3 border">{{ $customer->customer_lname }}</td>
                    <td class="px-4 py-3 border">{{ $customer->age }}</td>
                    <td class="px-4 py-3 border">********{{ substr($customer->phone, -2) }}</td>
                    <td >
    @if ($customer->license_id)
        <div style="display: flex; flex-direction: column; align-items: center;">
            <button onclick="toggleImage(this)">Show</button>
            <img src="{{ asset('storage/' . $customer->license_id) }}"
                 alt="License ID"
                 style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; display: none;">
        </div>
    @else
        No image
    @endif
</td>

<td>
    @if ($customer->valid_id)
        <div style="display: flex; flex-direction: column; align-items: center;">
            <button onclick="toggleImage(this)">Show</button>
            <img src="{{ asset('storage/' . $customer->valid_id) }}"
                 alt="Valid ID"
                 style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; display: none;">
        </div>
    @else
        No image
    @endif
</td>

<script>
    function toggleImage(button) {
        const img = button.nextElementSibling;
        if (img.style.display === 'none') {
            img.style.display = 'inline';
            button.textContent = 'Hide';
        } else {
            img.style.display = 'none';
            button.textContent = 'Show';
        }
    }
</script>
                    <td class="px-4 py-3 border">{{ $customer->address }}</td>
                    <td class="px-4 py-3 border">
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
<div class="mb-4 text-left">
    <a href="{{ route('customers.index') }}" class="inline-block bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
        Back
    </a>
</div>
</x-app-layout>
