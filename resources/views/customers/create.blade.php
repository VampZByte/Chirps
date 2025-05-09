<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Add New Customer
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <input type="text" name="customer_fname" placeholder="First Name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('customer_fname') }}" required>
                <x-input-error :messages="$errors->get('customer_fname')" class="mt-2" />
            </div>

            <div class="mb-4">
                <input type="text" name="customer_lname" placeholder="Last Name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('customer_lname') }}" required>
                <x-input-error :messages="$errors->get('customer_lname')" class="mt-2" />
            </div>

            <div class="mb-4">
                <input type="number" name="age" placeholder="Age"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('age') }}" required>
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            <div class="mb-4">
                <input type="text" name="phone" placeholder="Phone Number"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('phone') }}" required>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="mb-4 bg-white p-4 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">Upload License ID</label>
                <input type="file" name="license_id"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
                <x-input-error :messages="$errors->get('license_id')" class="mt-2" />
            </div>

            <div class="mb-4 bg-white p-4 rounded-md shadow-sm">
                <label class="block text-sm font-medium text-gray-700">Upload Valid ID</label>
                <input type="file" name="valid_id"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
                <x-input-error :messages="$errors->get('valid_id')" class="mt-2" />
            </div>

            <div class="mb-4">
                <textarea name="address" placeholder="Address"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    required>{{ old('address') }}</textarea>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mt-6">
            <x-primary-button>
                {{ __('Save Customer') }}
            </x-primary-button>
        </div>
        </form>
    </div>
</x-app-layout>
