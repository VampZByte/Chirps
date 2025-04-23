<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Rent List
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto mt-6 p-6 bg-white shadow-md rounded-md">
        <h3 class="text-lg font-bold mb-4">Current Rentals</h3>

        <table class="min-w-full table-auto text-left border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">Car</th>
                    <th class="px-4 py-2 border">Customers</th>
                    <th class="px-4 py-2 border">Days</th>
                    <th class="px-4 py-2 border">Date Rented</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rents as $rent)
                    <tr>
                        <td class="px-4 py-2 border">{{ $rent->car->brand }} {{ $rent->car->model }}</td>
                        <td class="px-4 py-2 border">{{ $rent->customers->customer_fname }}</td>
                        <td class="px-4 py-2 border">{{ $rent->days }}</td>
                        <td class="px-4 py-2 border">{{ $rent->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No rentals found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $rents->links() }}
        </div>
    </div>
</x-app-layout>
