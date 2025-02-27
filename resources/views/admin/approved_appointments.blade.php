<x-sidebar-layout>
    <x-slot:heading>
        Approved Appointments
    </x-slot:heading>

    <div class="flex justify-items-center items-center">
        <div class="flex flex-wrap justify-center gap-6">
            <!-- Today's Approved Appointments -->
            <div class="w-full md:w-1/2 bg-white p-6 shadow-md rounded-lg">
                <canvas id="pieChartToday"></canvas>
                <div class="text-center font-semibold mt-2">Today's Approved Appointments</div>
            </div>

            <!-- Monthly Approved Appointments -->
            <div class="w-full md:w-1/2 bg-white p-6 shadow-md rounded-lg">
                <canvas id="pieChartMonthly"></canvas>
                <div class="text-center font-semibold mt-2">Monthly Approved Appointments</div>
            </div>

            <!-- Total Approved Appointments Over Time -->
            <div class="w-full bg-white p-6 shadow-md rounded-lg">
                <canvas id="lineChartTotal"></canvas>
                <div class="text-center font-semibold mt-2">Total Approved Appointments Over Time</div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "",
                method: "GET",
                dataType: "json",
                success: function(response) {
                    loadCharts(response.today, response.monthly, response.total);
                },
                error: function() {
                    alert("Error fetching data from the database.");
                }
            });

            function loadCharts(todayData, monthlyData, totalData) {
                new Chart(document.getElementById("pieChartToday"), {
                    type: "pie",
                    data: {
                        labels: ["Approved", "Remaining Slots"],
                        datasets: [{
                            data: [todayData.approved, 100 - todayData.approved],
                            backgroundColor: ["#4bc0c0", "#ffcd56"]
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: "bottom"
                            }
                        }
                    }
                });

                new Chart(document.getElementById("pieChartMonthly"), {
                    type: "pie",
                    data: {
                        labels: ["Approved", "Remaining Slots"],
                        datasets: [{
                            data: [monthlyData.approved, 500 - monthlyData.approved],
                            backgroundColor: ["#36a2eb", "#ff6384"]
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: "bottom"
                            }
                        }
                    }
                });

                new Chart(document.getElementById("lineChartTotal"), {
                    type: "line",
                    data: {
                        labels: totalData.months,
                        datasets: [{
                            label: "Approved",
                            data: totalData.approvedCounts,
                            borderColor: "#4bc0c0",
                            backgroundColor: "#4bc0c0",
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: "top"
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: "Months"
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: "Number of Approved Appointments"
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>

</x-sidebar-layout>
