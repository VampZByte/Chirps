<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Car Rental') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white-100 bg-cyan-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <!-- <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header> -->
            @endisset

            <!-- Page Content -->
            <main class="flex h-full-screen">
                <!-- Sidebar -->
                <x-sidebar :links="[
                    ['url' => route('dashboard'), 'label' => 'Dashboard'],
                    ['url' => route('customers.create'), 'label' => 'Customer'],
                    ['url' => route('cars.index'), 'label' => 'Vehicles'],
                    ['url' => route('rent.index'), 'label' => 'Rent'],
                    ['url' => route('payments.index'), 'label' => 'Payments']
                ]" />

                <!-- Content -->
                <div class="flex-1 p-4">
                    {{ $slot }}
                </div>
            </main>

        </div>


            <script>
                function updateTimeAndDate() {
        const now = new Date();

        // Time
        const timeString = now.toLocaleTimeString();
        document.getElementById('current-time').textContent = timeString;

        // Date
        const dateString = now.toLocaleDateString(undefined, {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        document.getElementById('current-date').textContent = dateString;
    }

    setInterval(updateTimeAndDate, 1000);
    updateTimeAndDate(); // Initial run



    </script>


    </body>
</html>
