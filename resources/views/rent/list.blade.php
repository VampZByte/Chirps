    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                Rent List
            </h2>
        </x-slot>

        <div class="max-w-5xl mx-auto mt-6 p-6 bg-white shadow-md rounded-md">
            <h3 class="text-lg font-bold mb-4">Current Rentals</h3>

            <table class="w-full table-auto text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-5 py-2 border">Car</th>
                        <th class="px-5 py-2 border">Customers</th>
                        <th class="px-5 py-2 border">Rent Date</th>
                        <th class="px-5 py-2 border">Return Date</th>
                        <th class="px-5 py-2 border">Status</th>
                        <th class="px-5 py-2 border">Actions</th>   
                    </tr>
                </thead>
                <tbody>
                @foreach ($rents as $rent)
                <tr>
                <td class="px-3 py-3 border">{{ $rent->car->brand}} [{{ $rent->car->model}}]</td>
                <td class="px-3 py-3 border">{{ $rent->customer->customer_fname }} {{ $rent->customer->customer_lname }}</td>
                <td class="px-3 py-3 border">{{ \Carbon\Carbon::parse($rent->Rent_Date)->format('d/m/Y') }}</td>
                <td class="px-3 py-3 border">{{ \Carbon\Carbon::parse($rent->Return_Date)->format('d/m/Y') }}</td>
                <td class="px-3 py-3 border">{{ $rent->car->availability_status }}</td>
                <td class="px-3 py-3 border">
                <button onclick="toggleReturnOptions({{ $rent->car->id }})"
                class="bg-blue-600 text-black px-5 py-1 rounded hover:bg-blue-700">Return</button>
                <div id="return-options-{{ $rent->car->id }}" class="mt-1 hidden">
                        <form action="{{ route('cars.returnAction', [$rent->car->id, 'Available']) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="bg-green-600 text-black px-1 py-1 rounded hover:bg-green-700 border">Return Car</button>
                        </form>
                        <form action="{{ route('cars.returnAction', [$rent->car->id, 'Damaged']) }}" method="POST" class="inline-block ml-2">
                        @csrf
                         <button type="submit" class="bg-red-600 text-black px-1 py-1 rounded hover:bg-red-700 border">Damaged</button>
                        </form>
                </div>
            <div>
                <form action="{{ route('rent.destroy', $rent) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this rent record?')"
                class="bg-gray-600 text-red px-3 py-1 rounded hover:bg-gray-700">Delete</button>
                </form>
            </div>
            </td>
            </tr>
            @endforeach
            <script>
                function toggleReturnOptions(carId) {
                    const div = document.getElementById('return-options-' + carId);
                div.classList.toggle('hidden');
            }
            </script>
            </tbody>
        </table>
        <div class="mt-4">
            {{ $rents->links() }}
        </div>
    </div>
</x-app-layout>
