<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="row mt-5">
        <!-- Orasan sa mga kupal -->
        <div class="col-md-6 text-center mb-4">
            <div class="p-4 border rounded shadow-sm bg-white">
                <h1 style="font-size: 40px">Current Time:</h1>
                <h3 id="current-time" class="text-light" style="font-size: 30px"></h3>
            </div>
        </div>

        <!-- Calendar - Para sa mga walay calendaryo sa ilang balay -->
        <div class="col-md-6 text-center mb-4">
            <div class="p-4 border rounded shadow-sm bg-white">
                <h1 style="font-size: 30px">Today's Date:</h1>
                <h3 id="current-date" class="text-light" style="font-size: 30px"></h3>
            </div>
        </div>
    </div>

    <div style="text-align: center; margin-top: 1px;">
        <div class="p-4 border rounded shadow-sm bg-white">
        <h1 style="font-size: 30px;">Rent</h1>
        <p style="font-size: 20px;">{{ $totalRents }}</p>
        </div>
    </div>

    <div style="text-align: center; margin-top: 1px;">
        <div class="p-4 border rounded shadow-sm bg-white">
        <h1 style="font-size: 30px;">Customer</h1>
        <p style="font-size: 20px;">{{ $totalCustomers }}</p>
        </div>
    </div>

    <div style="text-align: center; margin-top: 1px;">
        <div class="p-4 border rounded shadow-sm bg-white">
        <h1 style="font-size: 30px;">Vehicles</h1>
        <p style="font-size: 20px;">{{ $totalCars }}</p>
        </div>
    </div>

</x-app-layout>