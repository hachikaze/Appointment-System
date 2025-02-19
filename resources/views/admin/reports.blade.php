<x-sidebar-layout>
    <x-slot:heading>
        Reports
    </x-slot:heading>

    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <!-- Main Content -->
        <div class="ml-64 p-6 w-full max-w-4xl">
            <h1 class="text-center text-2xl font-bold mb-6">Appointment Reports</h1>
            <div class="flex flex-wrap gap-6 justify-center">
                <div class="w-full md:w-1/2 bg-white p-4 shadow-md rounded-lg">
                    <canvas id="pieChartToday"></canvas>
                    <div class="text-center font-semibold mt-2">Today's Appointments</div>
                </div>
                <div class="w-full md:w-1/2 bg-white p-4 shadow-md rounded-lg">
                    <canvas id="pieChartMonthly"></canvas>
                    <div class="text-center font-semibold mt-2">Monthly Appointments</div>
                </div>
                <div class="w-full bg-white p-4 shadow-md rounded-lg">
                    <canvas id="lineChartTotal"></canvas>
                    <div class="text-center font-semibold mt-2">Total Appointments Over Time</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch("s")
                .then(response => response.json())
                .then(data => loadCharts(data.today, data.monthly, data.total))
                .catch(error => console.error("Error fetching data:", error));

            function loadCharts(todayData, monthlyData, totalData) {
                new Chart(document.getElementById('pieChartToday').getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: ['Appointments', 'Remaining Slots'],
                        datasets: [{
                            data: [todayData, 100 - todayData],
                            backgroundColor: ['#36a2eb', '#ff6384']
                        }]
                    }
                });

                new Chart(document.getElementById('pieChartMonthly').getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: ['Appointments', 'Remaining Slots'],
                        datasets: [{
                            data: [monthlyData, 500 - monthlyData],
                            backgroundColor: ['#4bc0c0', '#ffcd56']
                        }]
                    }
                });

                new Chart(document.getElementById('lineChartTotal').getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: totalData.months,
                        datasets: [{
                            label: 'Appointments',
                            data: totalData.counts,
                            borderColor: '#ff6384',
                            backgroundColor: '#ff6384',
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: { title: { display: true, text: 'Months' } },
                            y: { title: { display: true, text: 'Number of Appointments' } }
                        }
                    }
                });
            }
        });

        function toggleDropdown(id) {
            document.getElementById(id).classList.toggle('hidden');
        }
    </script>

</x-sidebar-layout>