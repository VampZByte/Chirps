<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Update Cars
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Update Car</h2>
        <form method="POST" action="{{ route('cars.update', $car) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
            <label for="brand" class="block font-semibold mb-1">Brand</label>
            <select id="brand" name="brand" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                <option value="">Select brand</option>
                <option value="Toyota" {{ $car->brand === 'Toyota' ? 'selected' : '' }}>Toyota</option>
                <option value="Honda" {{ $car->brand === 'Honda' ? 'selected' : '' }}>Honda</option>
                <option value="Ford" {{ $car->brand === 'Ford' ? 'selected' : '' }}>Ford</option>
                <option value="BMW" {{ $car->brand === 'BMW' ? 'selected' : '' }}>BMW</option>
                <option value="Nissan" {{ $car->brand === 'Nissan' ? 'selected' : '' }}>Nissan</option>
            </select>
            </div>

            <div class="mb-4">
            <label for="model" class="block font-semibold mb-1">Model</label>
            <select id="model" name="model" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                <option value="">Select a model</option>
            </select>

            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const brandSelect = document.getElementById("brand");
                    const modelSelect = document.getElementById("model");

                    const modelsByBrand = {
                        Toyota: ["Corolla", "Vios"],
                        Honda: ["Civic", "Accord"],
                        Ford: ["Mustang", "Ranger"],
                        BMW: ["X3", "3 Series"],
                        Nissan: ["Navara", "Almera"],
                    };

                    const selectedBrand = "{{ $car->brand }}";
                    const selectedModel = "{{ $car->model }}";

                    function updateModels(brand) {
                        modelSelect.innerHTML = '<option value="">Select a model</option>';
                        if (modelsByBrand[brand]) {
                            modelsByBrand[brand].forEach(model => {
                                const option = document.createElement("option");
                                option.value = model;
                                option.textContent = model;
                                if (model === selectedModel) option.selected = true;
                                modelSelect.appendChild(option);
                            });
                        }
                    }

                    if (selectedBrand) {
                        updateModels(selectedBrand);
                    }

                    brandSelect.addEventListener("change", function () {
                        updateModels(this.value);
                    });
                });
            </script>

            <div class="mb-4">
            <label for="color" class="block font-semibold mb-1">Color</label>
            <select id="color" name="color" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                <option value="">Select Color</option>
                <option value="Red" {{ $car->color === 'Red' ? 'selected' : '' }}>Red</option>
                <option value="Blue" {{ $car->color === 'Blue' ? 'selected' : '' }}>Blue</option>
                <option value="Black" {{ $car->color === 'Black' ? 'selected' : '' }}>Black</option>
                <option value="White" {{ $car->color === 'White' ? 'selected' : '' }}>White</option>
                <option value="Grey" {{ $car->color === 'Grey' ? 'selected' : '' }}>Grey</option>
            </select>
            </div>

            <div class="mb-4">
                <label for="year" class="block font-semibold mb-1">Year</label>
                <input type="number" id="year" name="year" class="w-full border border-gray-300 px-3 py-2 rounded" value="{{ $car->year }}" required>
            </div>

            <div class="mb-4">
            <label for="rental_price" class="block font-semibold mb-1">Rental Price</label>
            <input type="number" id="rental_price" name="rental_price" step="0.01" class="w-full border border-gray-300 px-3 py-2 rounded" value="{{ $car->rental_price }}" required>
            </div>

            <div class="mb-4">
            <label for="availability_status" class="block font-semibold mb-1">Availability Status</label>
            <select id="availability_status" name="availability_status" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                <option value="Available" {{ $car->availability_status === 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Unavailable" {{ $car->availability_status === 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                <option value="Maintenance" {{ $car->availability_status === 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
             </div>

             <div class="mb-4">
                <label for="car_condition" class="block font-semibold mb-1">Car Condition</label>
                <select id="car_condition" name="car_condition" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                    <option value="Excellent" {{ $car->car_condition === 'Excellent' ? 'selected' : '' }}>Excellent</option>
                    <option value="Good" {{ $car->car_condition === 'Good' ? 'selected' : '' }}>Good</option>
                    <option value="Fair" {{ $car->car_condition === 'Fair' ? 'selected' : '' }}>Fair</option>
                    <option value="Damaged" {{ $car->car_condition === 'Damaged' ? 'selected' : '' }}>Damaged</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-bold px-4 py-2 rounded">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>