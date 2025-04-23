<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($customers as $customer)
                <div class="p-6 flex space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M9 12h.01M13 12h.01M17 12h.01M21 12h.01M3 12h.01" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800 font-bold">{{ $customer->customer_fname }} {{ $customer->customer_lname }}</span>
                                <small class="ml-2 text-sm text-gray-600">Age: {{ $customer->age }}</small>
                            </div>
                        </div>
                        <p class="mt-2 text-gray-700"><strong>Phone:</strong> {{ $customer->phone }}</p>
                        <p class="mt-1 text-gray-700"><strong>Address:</strong> {{ $customer->address }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
