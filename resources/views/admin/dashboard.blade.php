<x-sidebar-layout>
    <x-slot:heading>
        Dashboard
    </x-slot:heading>

    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Administrator Section -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Administrator</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-blue-500 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Administrators</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">👤</div>
                    </div>
                    <div class="bg-green-500 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Registered Patients</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">🧑🏻</div>
                    </div>
                </div>
            </div>

            <!-- Appointment Reports Section -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Appointment Reports</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-blue-600 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Today's Appointment</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">📅</div>
                    </div>
                    <div class="bg-green-600 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Monthly Appointment</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">📅</div>
                    </div>
                    <div class="bg-red-600 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Total Appointments</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">📅</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
            <!-- Approved Appointments -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Approved Appointment Reports</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-blue-400 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Today's Appointment</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">📅</div>
                    </div>
                    <div class="bg-green-400 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Monthly Appointment</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">📅</div>
                    </div>
                    <div class="bg-red-400 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Total Appointments</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">📅</div>
                    </div>
                </div>
            </div>

            <!-- Unattended Appointments -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Unattended Appointment Reports</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-yellow-400 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Pending</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">⏳</div>
                    </div>
                    <div class="bg-green-400 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Approved</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">✔️</div>
                    </div>
                    <div class="bg-red-400 text-white rounded-lg p-4 flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold">Unattended</h5>
                            <h6 class="text-3xl font-bold">7</h6>
                        </div>
                        <div class="text-4xl">❌</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory Management -->
        <div class="bg-white p-6 rounded-xl shadow-lg mt-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Inventory Management</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-600 text-white rounded-lg p-4 flex justify-between items-center">
                    <div>
                        <h5 class="text-lg font-semibold">Supplies</h5>
                        <h6 class="text-3xl font-bold">25</h6>
                    </div>
                    <div class="text-4xl">📦</div>
                </div>
            </div>
        </div>
    </div>
</x-sidebar-layout>
