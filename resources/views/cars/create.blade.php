<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Add Cars
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Add New Car</h2>
        <form method="POST" action="{{ route('cars.store') }}">
            @csrf

            <div class="mb-4">
            <label for="brand" class="block font-semibold mb-1">Brand</label>
            <select id="brand" name="brand" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                <option value="">Select brand</option>
                <option value="Toyota">Toyota</option>
                <option value="Honda">Honda</option>
                <option value="Ford">Ford</option>
                <option value="BMW">BMW</option>
                <option value="Nissan">Nissan</option>
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

                brandSelect.addEventListener("change", function () {
                const selectedBrand = this.value;

                modelSelect.innerHTML = '<option value="">Select a model</option>';

                if (modelsByBrand[selectedBrand]) {
                    modelsByBrand[selectedBrand].forEach(function (model) {
                    const option = document.createElement("option");
                    option.value = model;
                    option.textContent = model;
                    modelSelect.appendChild(option);
                    });
                }
                });
            });
            </script>
            
            <div class="mb-4">
            <label for="color" class="block font-semibold mb-1">Color</label>
            <select id="color" name="color" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                <option value="">Select Color</option>
                <option value="Red">Red</option>
                <option value="Blue">Blue</option>
                <option value="Black">Black</option>
                <option value="White">White</option>
                <option value="Grey">Grey</option>
            </select>
            </div>

            <div class="mb-4">
                <label for="year" class="block font-semibold mb-1">Year</label>
                <input type="number" id="year" name="year" class="w-full border border-gray-300 px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
            <label for="rental_price" class="block font-semibold mb-1">Rental Price</label>
            <input type="number" id="rental_price" name="rental_price" step="0.01" class="w-full border border-gray-300 px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
            <label for="availability_status" class="block font-semibold mb-1">Availability Status</label>
            <select id="availability_status" name="availability_status" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                <option value="">Select status</option>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
                <option value="Damaged">Damaged</option>
                <option value="Maintenance">Maintenance</option>
            </select>
             </div>


             <div class="mb-4">
                <label for="car_condition" class="block font-semibold mb-1">Car Condition</label>
                <select id="car_condition" name="car_condition" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                    <option value="">Select condition</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Good">Good</option>
                    <option value="Fair">Fair</option>
                    <option value="Damaged">Damaged</option>
                </select>
            </div>



            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-bold px-4 py-2 rounded">
                    Add Car
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
