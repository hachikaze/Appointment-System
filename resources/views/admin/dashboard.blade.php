<x-sidebar-layout>

    <div class="p-6 bg-gray-50 min-h-screen">
        <!-- Welcome Section -->
        <div class="mb-8 ">
            <h1 class="text-3xl font-bold text-gray-800">Welcome back, Admin! 👋</h1>
            <p class="text-gray-600 mt-2">Here's what's happening in your dental clinic today.</p>
        </div>

        <!-- Quick Stats Overview -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
            <div
                class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-white/80 text-sm">Administrators</p>
                        <h3 class="text-3xl font-bold mt-2">7</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-xl">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 text-white/80 text-sm">
                    Active team members
                </div>
            </div>

            <!-- Patient Stats -->
            <div
                class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-white/80 text-sm">Registered Patients</p>
                        <h3 class="text-3xl font-bold mt-2">7</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-xl">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 text-white/80 text-sm">
                    Total registered patients
                </div>
            </div>

            <!-- Today's Appointments -->
            <div
                class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl p-6 text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-white/80 text-sm">Today's Appointments</p>
                        <h3 class="text-3xl font-bold mt-2">7</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-xl">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M8 2a1 1 0 011 1v1h2V3a1 1 0 112 0v1h1a2 2 0 012 2v1h-9V6a2 2 0 012-2h1V3a1 1 0 011-1zm9 6v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8h14z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 text-white/80 text-sm">
                    Scheduled for today
                </div>
            </div>

            <!-- Monthly Stats -->
            <div
                class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-white/80 text-sm">Monthly Total</p>
                        <h3 class="text-3xl font-bold mt-2">7</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-xl">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                            <path fill-rule="evenodd"
                                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 text-white/80 text-sm">
                    This month's appointments
                </div>
            </div>
        </div>

        <!-- Appointment Status Section -->
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-8">

            <!-- Monthly Overview with Graph -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Monthly Overview</h2>
                    <div class="flex space-x-2">
                        <select id="monthSelect"
                            class="bg-purple-50 text-purple-600 px-3 py-1 rounded-full text-sm font-medium border-none focus:ring-2 focus:ring-purple-200">
                            <option value="current">This Month</option>
                            <option value="last">Last Month</option>
                            <option value="last3">Last 3 Months</option>
                        </select>
                    </div>
                </div>

                <!-- Graph Container -->
                <div class="h-64 mb-6">
                    <canvas id="monthlyOverviewChart"></canvas>
                </div>

                <!-- Stats Summary -->
                <div class="grid grid-cols-3 gap-4 mt-4">
                    <div class="bg-blue-50 rounded-xl p-4">
                        <div class="flex items-center justify-between mb-2">
                            <div class="bg-blue-100 p-2 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">7</h3>
                        <p class="text-sm text-gray-600 mt-1">Total</p>
                    </div>

                    <div class="bg-indigo-50 rounded-xl p-4">
                        <div class="flex items-center justify-between mb-2">
                            <div class="bg-indigo-100 p-2 rounded-lg">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">7</h3>
                        <p class="text-sm text-gray-600 mt-1">Completed</p>
                    </div>

                    <div class="bg-cyan-50 rounded-xl p-4">
                        <div class="flex items-center justify-between mb-2">
                            <div class="bg-cyan-100 p-2 rounded-lg">
                                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">7</h3>
                        <p class="text-sm text-gray-600 mt-1">Pending</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Inventory Management</h2>
                <button
                    class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors duration-200">
                    Manage Inventory
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-slate-50 rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-slate-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-slate-600">Total Items</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">25</h3>
                    <p class="text-sm text-gray-600 mt-2">Available supplies</p>
                </div>

                <div class="bg-rose-50 rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-rose-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-rose-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-rose-600">Low Stock</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">5</h3>
                    <p class="text-sm text-gray-600 mt-2">Items need restock</p>
                </div>

                <div class="bg-emerald-50 rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-emerald-100 p-3 rounded-lg">
                            <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-emerald-600">Well Stocked</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">20</h3>
                    <p class="text-sm text-gray-600 mt-2">Items in good supply</p>
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="mt-8 bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Recent Activities</h2>
                <div class="flex space-x-2">
                    <button
                        class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors duration-200">
                        Today
                    </button>
                    <button
                        class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-sm font-medium hover:bg-blue-100 transition-colors duration-200">
                        View All
                    </button>
                </div>
            </div>
            <div class="space-y-4">
                <!-- Activity Item -->
                <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-800">New appointment scheduled</p>
                        <p class="text-xs text-gray-500">10 minutes ago</p>
                    </div>
                    <div class="ml-auto">
                        <span class="bg-blue-50 text-blue-600 px-2 py-1 rounded-full text-xs font-medium">
                            Appointment
                        </span>
                    </div>
                </div>

                <!-- Activity Item -->
                <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-800">Inventory restocked</p>
                        <p class="text-xs text-gray-500">30 minutes ago</p>
                    </div>
                    <div class="ml-auto">
                        <span class="bg-green-50 text-green-600 px-2 py-1 rounded-full text-xs font-medium">
                            Inventory
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Monthly Overview Chart
                const ctx = document.getElementById('monthlyOverviewChart').getContext('2d');
                const monthlyChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                        datasets: [{
                                label: 'Total Appointments',
                                data: [12, 19, 15, 17],
                                borderColor: 'rgb(59, 130, 246)',
                                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                                tension: 0.4,
                                fill: true
                            },
                            {
                                label: 'Completed',
                                data: [8, 15, 12, 14],
                                borderColor: 'rgb(99, 102, 241)',
                                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                                tension: 0.4,
                                fill: true
                            },
                            {
                                label: 'Pending',
                                data: [4, 4, 3, 3],
                                borderColor: 'rgb(6, 182, 212)',
                                backgroundColor: 'rgba(6, 182, 212, 0.1)',
                                tension: 0.4,
                                fill: true
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    usePointStyle: true,
                                    padding: 20,
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                                titleColor: '#1f2937',
                                bodyColor: '#1f2937',
                                borderColor: '#e5e7eb',
                                borderWidth: 1,
                                padding: 12,
                                boxPadding: 4
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    drawBorder: false,
                                    color: '#e5e7eb'
                                },
                                ticks: {
                                    stepSize: 5,
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    font: {
                                        size: 12
                                    }
                                }
                            }
                        }
                    }
                });

                // Handle month selection change
                document.getElementById('monthSelect').addEventListener('change', function(e) {
                    // Example data updates based on selection
                    let newData;
                    switch (e.target.value) {
                        case 'last':
                            newData = {
                                total: [10, 15, 13, 16],
                                completed: [7, 12, 10, 13],
                                pending: [3, 3, 3, 3]
                            };
                            break;
                        case 'last3':
                            newData = {
                                total: [14, 18, 16, 20],
                                completed: [10, 14, 12, 15],
                                pending: [4, 4, 4, 5]
                            };
                            break;
                        default:
                            newData = {
                                total: [12, 19, 15, 17],
                                completed: [8, 15, 12, 14],
                                pending: [4, 4, 3, 3]
                            };
                    }

                    // Update chart data
                    monthlyChart.data.datasets[0].data = newData.total;
                    monthlyChart.data.datasets[1].data = newData.completed;
                    monthlyChart.data.datasets[2].data = newData.pending;
                    monthlyChart.update();
                });
            });
        </script>
    @endpush
</x-sidebar-layout>
