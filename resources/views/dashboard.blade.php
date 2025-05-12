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
                <h1 style="font-size: 60px">Current Time:</h1>
                <h3 id="current-time" class="text-light" style="font-size: 30px"></h3>
            </div>
        </div>

        <!-- Calendar - Para sa mga walay calendaryo sa ilang balay -->
        <div class="col-md-6 text-center mb-4">
            <div class="p-4 border rounded shadow-sm bg-white">
                <h1 style="font-size: 60px">Today’s Date:</h1>
                <h3 id="current-date" class="text-light" style="font-size: 30px"></h3>
            </div>
        </div>

        <div class="container mt-3" style="background-color: rgba(255, 255, 255, 0.664); padding: 5px">
            <h1 style="font-size: 23px;">Average Ratings per Car</h1>
            <canvas id="ratingChart" width="400" height="100"></canvas>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('ratingChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($averageRatings->pluck('Car_ID')) !!},
                datasets: [{
                    label: 'Average Rating',
                    data: {!! json_encode($averageRatings->pluck('avg_rating')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5
                    }
                }
            }
        });

    </script>


</x-app-layout>
