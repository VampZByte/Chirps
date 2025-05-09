<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Customer
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <form method="POST" action="{{ route('customers.update', $customer->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <input type="text" name="customer_fname" placeholder="First Name"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('customer_fname', $customer->customer_fname) }}" required>
            <x-input-error :messages="$errors->get('customer_fname')" class="mt-2" />
        </div>

        <div class="mb-4">
            <input type="text" name="customer_lname" placeholder="Last Name"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('customer_lname', $customer->customer_lname) }}" required>
            <x-input-error :messages="$errors->get('customer_lname')" class="mt-2" />
        </div>

        <div class="mb-4">
            <input type="number" name="age" placeholder="Age"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('age', $customer->age) }}" required>
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <div class="mb-4">
            <input type="text" name="phone" placeholder="Phone Number"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('phone', $customer->phone) }}" required>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="mb-4 bg-white p-4 rounded-md shadow-sm">
            <label class="block text-sm font-medium text-gray-700">Upload License ID</label>
            @if ($customer->license_id)
                <img src="{{ asset('storage/' . $customer->license_id) }}" alt="License ID" class="w-32 h-32 object-cover rounded shadow-md mb-2">
            @endif
            <input type="file" name="license_id"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
            <x-input-error :messages="$errors->get('license_id')" class="mt-2" />
        </div>

        <div class="mb-4 bg-white p-4 rounded-md shadow-sm">
            <label class="block text-sm font-medium text-gray-700">Upload Valid ID</label>
            @if ($customer->valid_id)
                <img src="{{ asset('storage/' . $customer->valid_id) }}" alt="Valid ID">
            @endif
            <input type="file" name="valid_id"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
            <x-input-error :messages="$errors->get('valid_id')" class="mt-2" />
        </div>

        <div class="mb-4">
            <textarea name="address" placeholder="Address"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                required>{{ old('address', $customer->address) }}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button>
                {{ __('Update Customer') }}
            </x-primary-button>
        </div>
    </form>
</div>

</x-app-layout>
