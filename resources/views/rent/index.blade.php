<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Rent a Car
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto mt-6 p-6 bg-white shadow-md rounded-md">
        <div class="mb-4 text-right">
            <a href="{{ route('rent.create') }}" class="inline-block bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                + Add rent
            </a>
            <a href="{{ route('rent.list') }}" class="inline-block bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                Rent List
            </a>
        </div>

        <h3 class="text-lg font-bold mb-3">Available Cars</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 rounded">
            <ul class="list-disc list-inside text-sm text-red-700">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif

            @foreach ($cars as $car)
                <div class="border p-4 rounded-md shadow bg-gray-50">
                    <h4 class="text-lg font-semibold">{{ $car->brand }} - {{ $car->model }} ({{ $car->year }})</h4>
                    <h2 class="text-lg font-semibold"> Color {{$car->color}}</h2>
                    <p class="text-gray-600">₱{{ number_format($car->rental_price, 2) }} per day</p>
                    <p class="text-sm text-green-600 mt-1">Status: {{ $car->availability_status }}</p>
                    <p class="text-sm text-gray-500">Condition: {{ $car->car_condition }}</p>

                    @if (strtolower($car->availability_status) === 'available')

                        <form method="POST" action="{{ route('rent.store') }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                            <input type="hidden" name="car_brand" value="{{ $car->brand }}">
                            <input type="hidden" name="car_model" value="{{ $car->model }}">

                            <div class="mb-4">
                                <label for="customer_id" class="block font-semibold mb-1">Customer</label>
                                <select id="customer_id" name="customer_id" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                            <option value="">Select customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->customer_fname }} {{ $customer->customer_lname }}</option>
                                @endforeach
                            </select> 

                            <div class="mb-2">
                                <label for="rent_date" class="block font-bold">Rent Date</label>
                                <input type="date" name="rent_date" class="border p-2 rounded " required>
                            </div>

                            <div class="mb-2">
                                <label for="return_date" class="block font-bold">Return Date</label>
                                <input type="date" name="return_date" class="border p-2 rounded " required>
                            </div>

                            <x-primary-button>Add to Rent List</x-primary-button>
                        </form>
                    @else
                        <p class="mt-4 text-red-600 font-semibold">Not Available</p>
                    @endif
                </div>
            @endforeach
            <div class="mt-6">
    {{ $cars->links() }}
</div>
        </div>
    </div>
</x-app-layout>