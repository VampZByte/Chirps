<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>

    <div class="w-full max-w-6xl mx-auto overflow-x-auto mt-4 bg-white shadow rounded-md p-6">
    <h2 class="text-2xl font-bold mb-6">Cars</h2>
        <div class="mb-4 text-right">
            <a href="{{ route('cars.create') }}" class="inline-block bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                + Add New Car
            </a>
        </div>

        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 font-semibold text-gray-900 text-lg">
                <tr>
                        <th class="px-4 py-3">Brand</th>
                    <th class="px-4 py-3">Model</th>
                    <th class="px-4 py-3">Year</th>
                    <th class="px-4 py-3">Fee</th>
                    <th class="px-4 py-3">Available</th>
                    <th class="px-4 py-3">Condition</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-base">
                @forelse ($cars as $car)
                    <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $car->brand }}</td>
                        <td class="px-4 py-3">{{ $car->model }}</td>
                        <td class="px-4 py-3">{{ $car->year }}</td>
                        <td class="px-4 py-3">₱{{ number_format($car->rental_price, 2) }}</td>
                        <td class="px-4 py-3">{{ $car->availability_status }}</td>
                        <td class="px-4 py-3">{{ $car->car_condition }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('cars.edit', $car->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center px-4 py-6 text-gray-500">No cars found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $cars->links() }}
        </div>
    </div>
</x-app-layout>
