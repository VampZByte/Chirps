<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>
    <a href="{{ route('cars.archived') }}"
    class="bg-gray-500 text-white px-3 py-2 rounded hover:bg-gray-600">
    View Archived Cars
    </a>
    <div class="w-full max-w-6xl mx-auto overflow-x-auto mt-4 bg-white shadow rounded-md p-6">
    <h2 class="text-2xl font-bold">Cars</h2>
    
        <div class="mb-4 text-right">
            <a href="{{ route('cars.create') }}" class="inline-block bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                + Add New Car
            </a>
        </div>

        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 font-semibold text-gray-900 text-lg">
                <tr>
                    <th class="px-4 py-3 border">Brand</th>
                    <th class="px-4 py-3 border">Model</th>
                    <th class="px-4 py-3 border">Plate Number</th>
                    <th class="px-4 py-3 border">Color</th>
                    <th class="px-4 py-3 border">Year</th>
                    <th class="px-4 py-3 border">Fee</th>
                    <th class="px-4 py-3 border">Available</th>
                    <th class="px-4 py-3 border">Condition</th>
                    <th class="px-4 py-3 border">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-base">
                @forelse ($cars as $car)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $car->brand }}</td>
                        <td class="px-4 py-3 border">{{ $car->model }}</td>
                        <td class="px-4 py-3 border">ABCD-{{ $car->id }}</td>
                        <th class="px-4 py-3 border">{{ $car->color }}</th>
                        <td class="px-4 py-3 border">{{ $car->year }}</td>
                        <td class="px-4 py-3 border">₱{{ number_format($car->rental_price, 2) }}</td>
                        <td class="px-4 py-3 border">{{ $car->availability_status }}</td>
                        <td class="px-4 py-3 border">{{ $car->car_condition }}</td>
                        <td class="px-4 py-3 border">
                            <div class="flex gap-2">
                                <a href="{{ route('cars.edit', $car->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('cars.archive', $car) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('PUT')
                                <button type="submit" onclick="return confirm('Are you sure you want to archive this car record?')"
                                class="bg-gray-600 text-red px-3 py-1 rounded hover:bg-gray-700">Archive</button>
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
