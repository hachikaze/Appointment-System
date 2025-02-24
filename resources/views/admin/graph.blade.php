<x-sidebar-layout>

    <x-slot:heading>
        Graph
    </x-slot:heading>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Appointment Reports</h1>

        <div class="grid grid-cols-2 gap-6">
            <!-- Today's Appointments Pie Chart -->
            <div class="bg-white p-4 rounded-lg shadow">
                <canvas id="todayChart"></canvas>
            </div>

            <!-- Monthly Appointments Pie Chart -->
            <div class="bg-white p-4 rounded-lg shadow">
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>

        <!-- Line Chart -->
        <div class="mt-6 bg-white p-4 rounded-lg shadow">
            <h2 class="text-xl font-bold text-center mb-4">Total Appointments Over Time</h2>
            <canvas id="appointmentsOverTimeChart"></canvas>
        </div>
    </div>

    <script>
        // Today's Appointments Pie Chart
        const todayCtx = document.getElementById('todayChart').getContext('2d');
        new Chart(todayCtx, {
            type: 'pie',
            data: {
                labels: ['Appointments', 'Remaining Slots'],
                datasets: [{
                    data: [{{ $appointmentsToday }}, {{ $remainingSlotsToday }}],
                    backgroundColor: ['#ff6384', '#ffcd56']
                }]
            }
        });

        // Monthly Appointments Pie Chart
        const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'pie',
            data: {
                labels: ['Appointments', 'Remaining Slots'],
                datasets: [{
                    data: [{{ $monthlyAppointments }}, {{ $remainingSlotsMonthly }}],
                    backgroundColor: ['#36a2eb', '#ffce56']
                }]
            }
        });

        // Total Appointments Over Time Line Chart
        const appointmentsOverTimeCtx = document.getElementById('appointmentsOverTimeChart').getContext('2d');
        new Chart(appointmentsOverTimeCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($appointmentsOverTime->pluck('month')) !!},
                datasets: [{
                    label: 'Appointments',
                    data: {!! json_encode($appointmentsOverTime->pluck('total')) !!},
                    borderColor: '#ff6384',
                    fill: false
                }]
            }
        });
    </script>

</x-sidebar-layout>