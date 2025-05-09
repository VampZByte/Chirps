<x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                Rent List
            </h2>
        </x-slot>

        <div class="max-w-5xl mx-auto mt-6 p-6 bg-white shadow-md rounded-md">
            <h3 class="text-lg font-bold mb-4">Payment</h3>

            <table class="w-full table-auto text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-5 py-2 border">Customers</th>
                        <th class="px-5 py-2 border">License Plate</th>
                        <th class="px-5 py-2 border">Car</th>
                        <th class="px-5 py-2 border">Amount Paid</th>
                        <th class="px-5 py-2 border">Payment Date</th>
                        <th class="px-5 py-2 border">Payment Method</th>
                        <th class="px-5 py-2 border">Actions</th>   
                    </tr>
                </thead>
                <tbody>
                @foreach ($rents as $rent)
                <tr>
                <td class="px-3 py-3 border">{{ $rent->customer->customer_fname }} {{ $rent->customer->customer_lname }}</td>
                <td class="px-4 py-3 border">ABCD-{{ $rent->car->id }}</td>
                <td class="px-3 py-3 border">{{ $rent->car->brand}} [{{ $rent->car->model}}]</td>
                <td class="px-3 py-3 border">₱{{ number_format($rent->payment->Amount_Paid ?? 0, 2) }}</td>
                <td class="px-3 py-3 border">{{ $rent->payment->Payment_Date ?? 'N/A' }}</td>
                <td class="px-3 py-3 border">{{ $rent->payment->Payment_Method ?? 'N/A' }}</td>
                <td>
                <div>
                <a href="{{ route('payments.create', ['rent_id' => $rent->Rent_ID]) }}" 
                class="inline-block bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700">
                Create Payment
                </a>
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
            </tbody>
        </table>

        <div class="mt-4">
            {{ $rents->links() }}
        </div>
    </div>
</x-app-layout>
