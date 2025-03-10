<x-sidebar-layout>
    <!-- Header Section for Appointments -->
    <div class="mb-8 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Manage Appointments</h1>
                        <p class="text-teal-100">View and manage clinic appointments</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Appointment Management
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
            <div class="flex items-center text-sm text-teal-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Schedule, view, and manage all clinic appointments from this dashboard.</span>
            </div>
        </div>
    </div>
    <!-- Status Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-5 mb-6">
        <!-- Total Appointments -->
        <div class="bg-gradient-to-br from-blue-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-blue-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Total Appointments</p>
                    <p class="text-xl sm:text-2xl font-bold text-blue-700 mt-1 group-hover:text-blue-800 transition-colors">{{ $stats['total'] ?? $appointments->total() }}</p>
                </div>
                <div class="bg-blue-100 p-1.5 sm:p-2 rounded-full text-blue-600 group-hover:bg-blue-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <a href="{{ route('appointments.index') }}" class="text-xs text-blue-600 hover:text-blue-800 flex items-center justify-between">
                    View all appointments
                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Pending Appointments -->
        <div class="bg-gradient-to-br from-amber-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-amber-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Pending</p>
                    <p class="text-xl sm:text-2xl font-bold text-amber-700 mt-1 group-hover:text-amber-800 transition-colors">{{ $stats['pending'] ?? 0 }}</p>
                </div>
                <div class="bg-amber-100 p-1.5 sm:p-2 rounded-full text-amber-600 group-hover:bg-amber-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <a href="{{ route('appointments.index', ['filter' => 'Pending']) }}" class="text-xs text-amber-600 hover:text-amber-800 flex items-center justify-between">
                    View pending appointments
                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Approved Appointments -->
        <div class="bg-gradient-to-br from-emerald-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-emerald-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Approved</p>
                    <p class="text-xl sm:text-2xl font-bold text-emerald-700 mt-1 group-hover:text-emerald-800 transition-colors">{{ $stats['approved'] ?? 0 }}</p>
                </div>
                <div class="bg-emerald-100 p-1.5 sm:p-2 rounded-full text-emerald-600 group-hover:bg-emerald-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <a href="{{ route('appointments.index', ['filter' => 'Approved']) }}" class="text-xs text-emerald-600 hover:text-emerald-800 flex items-center justify-between">
                    View approved appointments
                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Attended Appointments -->
        <div class="bg-gradient-to-br from-indigo-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-indigo-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Attended</p>
                    <p class="text-xl sm:text-2xl font-bold text-indigo-700 mt-1 group-hover:text-indigo-800 transition-colors">{{ $stats['attended'] ?? 0 }}</p>
                </div>
                <div class="bg-indigo-100 p-1.5 sm:p-2 rounded-full text-indigo-600 group-hover:bg-indigo-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <a href="{{ route('appointments.index', ['filter' => 'Attended']) }}" class="text-xs text-indigo-600 hover:text-indigo-800 flex items-center justify-between">
                    View attended appointments
                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Unattended Appointments -->
        <div class="bg-gradient-to-br from-rose-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-rose-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Unattended</p>
                    <p class="text-xl sm:text-2xl font-bold text-rose-700 mt-1 group-hover:text-rose-800 transition-colors">{{ $stats['unattended'] ?? 0 }}</p>
                </div>
                <div class="bg-rose-100 p-1.5 sm:p-2 rounded-full text-rose-600 group-hover:bg-rose-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <a href="{{ route('appointments.index', ['filter' => 'Unattended']) }}" class="text-xs text-rose-600 hover:text-rose-800 flex items-center justify-between">
                    View unattended appointments
                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Filters  -->
    <div class="bg-gradient-to-r from-teal-50 to-white rounded-xl shadow-sm p-5 mb-6 border border-teal-100">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <!-- Search by name -->
            <div class="flex-1 min-w-[200px]">
                <label for="search" class="block text-sm font-medium text-teal-700 mb-1">Search Patient</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="search"
                        name="search"
                        placeholder="Search by name"
                        value="{{ request('search') }}"
                        class="pl-10 w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white"
                    />
                </div>
            </div>
            
            <!-- Status filter -->
            <div class="flex-1 min-w-[200px]">
                <label for="filter" class="block text-sm font-medium text-teal-700 mb-1">Status</label>
                <div class="relative">
                    <select
                        id="filter"
                        name="filter"
                        class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none"
                    >
                        <option value="">All Status</option>
                        <option value="Pending" {{ request('filter') === 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ request('filter') === 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Attended" {{ request('filter') === 'Attended' ? 'selected' : '' }}>Attended</option>
                        <option value="Unattended"{{ request('filter') === 'Unattended'? 'selected' : '' }}>Unattended</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Per page -->
            <div class="flex-1 min-w-[200px]">
                <label for="perPage" class="block text-sm font-medium text-teal-700 mb-1">Show entries</label>
                <div class="relative">
                    <select
                        id="perPage"
                        name="perPage"
                        class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none"
                    >
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10 entries</option>
                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25 entries</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50 entries</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100 entries</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div>
                <button
                    type="submit"
                    class="bg-teal-600 text-white px-5 py-2.5 rounded-lg hover:bg-teal-700 transition shadow-sm font-medium flex items-center gap-2"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Apply Filters
                </button>
            </div>
            
            <!-- Reset Filters -->
            <div>
                <a
                    href="{{ route('appointments.index') }}"
                    class="bg-white text-teal-700 border border-teal-200 px-5 py-2.5 rounded-lg hover:bg-teal-50 transition shadow-sm font-medium inline-block"
                >
                    Reset
                </a>
            </div>
        </form>
    </div>
    <!-- Appointments Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-teal-100">
        @if(count($appointments) > 0)
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gradient-to-r from-teal-50 to-teal-100 text-left">
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">ID</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Patient Name</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Email</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Phone</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Date</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Time</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Doctor</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Reason</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Status</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-teal-100">
                    @foreach ($appointments as $appointment)
                    <tr class="hover:bg-teal-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-50">#{{ $appointment->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap border-r border-teal-50">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 bg-teal-100 rounded-full flex items-center justify-center">
                                    <span class="text-teal-600 font-medium text-sm">{{ strtoupper(substr($appointment->patient_name, 0, 2)) }}</span>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-teal-900">{{ $appointment->patient_name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $appointment->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $appointment->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-teal-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $appointment->date }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-teal-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $appointment->time }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-teal-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Dr. {{ $appointment->doctor }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">
                            <span class="inline-block max-w-xs truncate" title="{{ $appointment->appointments }}">
                                {{ $appointment->appointments }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border-r border-teal-50">
                            @php
                            $statusStyles = [
                                'Pending' => [
                                    'bg' => 'bg-amber-100',
                                    'text' => 'text-amber-800',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                ],
                                'Approved' => [
                                    'bg' => 'bg-emerald-100',
                                    'text' => 'text-emerald-800',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                ],
                                'Attended' => [
                                    'bg' => 'bg-teal-100',
                                    'text' => 'text-teal-800',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                ],
                                'Unattended' => [
                                    'bg' => 'bg-rose-100',
                                    'text' => 'text-rose-800',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                ],
                                'Cancelled' => [
                                    'bg' => 'bg-gray-100',
                                    'text' => 'text-gray-800',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />'
                                ]
                            ];
                            $style = $statusStyles[$appointment->status] ?? [
                                'bg' => 'bg-gray-100',
                                'text' => 'text-gray-800',
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'
                            ];
                            @endphp
                            <span class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full {{ $style['bg'] }} {{ $style['text'] }} border border-{{ explode('-', $style['bg'])[1] }}-200">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    {!! $style['icon'] !!}
                                </svg>
                                {{ $appointment->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($appointment->status === 'Pending')
                                <!-- When Pending, show Approve and Cancel -->
                                <div class="flex gap-2">
                                    <!-- Approve button -->
                                    <button
                                        onclick="openModal('{{ $appointment->id }}', 'approve')"
                                        class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-3 py-1.5 rounded-md text-xs hover:from-teal-600 hover:to-teal-700 transition shadow-sm flex items-center gap-1 border border-teal-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Approve
                                    </button>
                                    <!-- Cancel button -->
                                    <button
                                        onclick="openModal('{{ $appointment->id }}', 'cancel')"
                                        class="bg-gradient-to-r from-rose-500 to-rose-600 text-white px-3 py-1.5 rounded-md text-xs hover:from-rose-600 hover:to-rose-700 transition shadow-sm flex items-center gap-1 border border-rose-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Cancel
                                    </button>
                                </div>
                            @elseif($appointment->status === 'Approved')
                                <!-- When Approved, show Attended and Cancel -->
                                <div class="flex gap-2">
                                    <!-- Attended button -->
                                    <button
                                        onclick="openModal('{{ $appointment->id }}', 'attended')"
                                        class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-1.5 rounded-md text-xs hover:from-blue-600 hover:to-blue-700 transition shadow-sm flex items-center gap-1 border border-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Attended
                                    </button>
                                    <!-- Cancel button -->
                                    <button
                                        onclick="openModal('{{ $appointment->id }}', 'cancel')"
                                        class="bg-gradient-to-r from-rose-500 to-rose-600 text-white px-3 py-1.5 rounded-md text-xs hover:from-rose-600 hover:to-rose-700 transition shadow-sm flex items-center gap-1 border border-rose-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Cancel
                                    </button>
                                </div>
                            @elseif($appointment->status === 'Attended')
                                <!-- When Attended, show Completed message -->
                                <span class="text-sm font-medium text-gray-600">Completed</span>
                            @elseif($appointment->status === 'Unattended')
                                <!-- When Unattended, show Reschedule button -->
                                <button
                                    onclick="openModal('{{ $appointment->id }}', 'reschedule')"
                                    class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-3 py-1.5 rounded-md text-xs hover:from-yellow-600 hover:to-yellow-700 transition shadow-sm flex items-center gap-1 border border-yellow-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <!-- Example icon for reschedule -->
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6M20 20v-6h-6" />
                                    </svg>
                                    Reschedule
                                </button>
                            @elseif($appointment->status === 'Cancelled')
                                <!-- When Cancelled, display red text only -->
                                <span class="text-xs font-medium text-red-600 flex items-center gap-1">
                                    Cancelled
                                </span>
                            @else
                                <!-- Fallback for any other status -->
                                <span class="text-sm font-medium text-gray-600">{{ $appointment->status }}</span>
                            @endif
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination and Page Size Info -->
        <div class="px-6 py-4 bg-teal-50 border-t border-teal-200 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="text-sm text-teal-700">
                Showing
                <span class="font-medium">{{ $appointments->firstItem() ?? 0 }}</span>
                to
                <span class="font-medium">{{ $appointments->lastItem() ?? 0 }}</span>
                of
                <span class="font-medium">{{ $appointments->total() }}</span>
                results
            </div>
            <div>
                {{ $appointments->appends(request()->except('page'))->links() }}
            </div>
        </div>
        @else
        <!-- No Results Found -->
        <div class="flex flex-col items-center justify-center py-16 px-4 text-center">
            <div class="bg-teal-100 rounded-full p-6 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-medium text-teal-900 mb-2">No appointments found</h3>
            <p class="text-teal-600 max-w-md mb-6">
                @if(request('search') || request('filter'))
                No appointments match your search criteria. Try adjusting your filters or search terms.
                @else
                There are no appointments in the system yet.
                @endif
            </p>
            <div class="flex flex-wrap gap-3 justify-center">
                @if(request('search') || request('filter') || request('perPage'))
                <a href="{{ route('appointments.index') }}" class="bg-teal-600 text-white px-5 py-2 rounded-lg hover:bg-teal-700 transition shadow-sm font-medium border border-teal-700">
                    Clear Filters
                </a>
                @endif
                <a href="#" class="bg-teal-100 text-teal-700 px-5 py-2 rounded-lg hover:bg-teal-200 transition shadow-sm font-medium border border-teal-200">
                    Create Appointment
                </a>
            </div>
        </div>
        @endif
    </div>

    <!--  MODALS: Approve / Attended / Cancel -->
    <div
        id="messageModal"
        class="hidden fixed inset-0 z-50 bg-gray-900 bg-opacity-70 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden relative animate-modalFadeIn">
            <!-- Modal Header  -->
            <div id="modalHeader" class="px-6 py-4 bg-green-500 text-white relative">
                <div class="absolute top-3 right-3">
                    <!-- <button
                        onclick="closeModal()"
                        class="text-white bg-white bg-opacity-20 rounded-full p-1 hover:bg-opacity-30 transition focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button> -->
                </div>
                <div class="flex items-center gap-3">
                    <div id="modalIconContainer" class="bg-white bg-opacity-20 rounded-full p-2">
                        <svg id="modalSvg" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h2 id="modalTitle" class="text-xl font-bold">Approve Appointment</h2>
                </div>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6">
                <p id="modalDescription" class="text-gray-600 mb-5">Update the status of this appointment and add an optional message.</p>
                
                <!-- Appointment Info Card -->
                <div id="appointmentInfo" class="bg-gray-50 rounded-lg p-4 mb-5 border border-gray-200">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 bg-blue-100 rounded-full h-10 w-10 flex items-center justify-center">
                            <span id="patientInitials" class="text-blue-600 font-medium text-sm">AP</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900" id="patientName">Loading...</p>
                            <p class="text-xs text-gray-500 mt-1" id="appointmentDate">Loading...</p>
                            <div class="flex items-center mt-2">
                                <span id="currentStatus" class="px-2 py-1 text-xs rounded-full bg-amber-100 text-amber-800 font-medium">
                                    Pending
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <form
                    id="messageForm"
                    method="POST"
                    action="{{ route('appointments.updateStatus') }}"
                    enctype="multipart/form-data"
                    class="flex flex-col space-y-4">

                    <!-- Form for Modal Actions -->
                    @csrf
                    <input type="hidden" id="appointmentId" name="id" />
                    <input type="hidden" id="actionType" name="action" />

                    <!-- Calendar Section for Reschedule (hidden by default) -->
                    <div id="calendarSection" class="mb-4 hidden">
                        <label for="reschedule-date" class="block text-md font-medium text-gray-900">Select New Date</label>
                        <input type="date" id="reschedule-date" name="date" class="mt-1 block w-full border-gray-300 rounded-md" required onchange="handleDateSelection()" min="{{ date('Y-m-d') }}">
                        
                        <!-- Hidden Input for Selected Time -->
                        <input type="hidden" name="time" id="reschedule-time">
                        
                        <!-- Time Slots Container -->
                        <div id="time-slots" class="flex flex-wrap gap-2 mt-4">
                            <!-- Time slots will be dynamically populated here -->
                        </div>
                    </div>

                    <!-- Message Input -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message (Optional)</label>
                        <textarea id="message" name="message" rows="4" placeholder="Enter any additional remarks or instructions for the patient..." class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm resize-none"></textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-3 pt-2">
                        <button
                            type="button"
                            onclick="closeModal()"
                            class="bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition shadow-sm font-medium">
                            Cancel
                        </button>
                        <button
                            type="submit"
                            id="confirmButton"
                            class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition shadow-sm font-medium flex items-center gap-2">
                            <svg id="confirmButtonIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span id="confirmButtonText">Approve</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Scripts -->
    @push('scripts')
    <script>
        // Store appointment data for modal use
        const appointmentData = {
            @foreach ($appointments as $appointment)
            "{{ $appointment->id }}": {
                name: "{{ $appointment->patient_name }}",
                date: "{{ $appointment->date }}",
                time: "{{ $appointment->time }}",
                status: "{{ $appointment->status }}",
                initials: "{{ strtoupper(substr($appointment->patient_name, 0, 2)) }}"
            },
            @endforeach
        };

        function openModal(id, action) {
            document.getElementById('appointmentId').value = id;
            document.getElementById('actionType').value = action;
            
            // Get appointment data
            const appointment = appointmentData[id] || { 
                name: "Unknown Patient", 
                date: "Unknown Date", 
                time: "Unknown Time",
                status: "Unknown",
                initials: "UN"
            };
            
            // Update appointment info in modal
            document.getElementById('patientName').textContent = appointment.name;
            document.getElementById('appointmentDate').textContent = `${appointment.date} at ${appointment.time}`;
            document.getElementById('patientInitials').textContent = appointment.initials;
            
            // Update current status badge
            const currentStatus = document.getElementById('currentStatus');
            switch(appointment.status) {
                case 'Pending':
                    currentStatus.className = 'px-2 py-1 text-xs rounded-full bg-amber-100 text-amber-800 font-medium';
                    currentStatus.textContent = 'Pending';
                    break;
                case 'Approved':
                    currentStatus.className = 'px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800 font-medium';
                    currentStatus.textContent = 'Approved';
                    break;
                case 'Attended':
                    currentStatus.className = 'px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800 font-medium';
                    currentStatus.textContent = 'Attended';
                    break;
                case 'Unattended':
                    currentStatus.className = 'px-2 py-1 text-xs rounded-full bg-rose-100 text-rose-800 font-medium';
                    currentStatus.textContent = 'Unattended';
                    break;
                default:
                    currentStatus.className = 'px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800 font-medium';
                    currentStatus.textContent = appointment.status;
            }
            
            // Get references to modal elements
            const modalTitle = document.getElementById('modalTitle');
            const modalDescription = document.getElementById('modalDescription');
            const confirmButton = document.getElementById('confirmButton');
            const confirmButtonText = document.getElementById('confirmButtonText');
            const confirmButtonIcon = document.getElementById('confirmButtonIcon');
            const modalHeader = document.getElementById('modalHeader');
            const modalIconContainer = document.getElementById('modalIconContainer');
            const modalSvg = document.getElementById('modalSvg');

            // Get the calendar section and date input
            const calendarSection = document.getElementById('calendarSection');
            const rescheduleDateInput = document.getElementById('reschedule-date');

            // Adjust the date input based on action type
            if (action === 'reschedule') {
                calendarSection.classList.remove('hidden');
                rescheduleDateInput.disabled = false;
                rescheduleDateInput.setAttribute('required', 'required');
            } else {
                calendarSection.classList.add('hidden');
                rescheduleDateInput.disabled = true;
                rescheduleDateInput.removeAttribute('required');
            }
            
            switch(action) {
                case 'approve':
                    modalTitle.textContent = 'Approve Appointment';
                    modalDescription.textContent = 'This will mark the appointment as approved and notify the patient.';
                    confirmButton.className = 'bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition shadow-sm font-medium flex items-center gap-2';
                    confirmButtonText.textContent = 'Approve';
                    confirmButtonIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />';
                    modalHeader.className = 'px-6 py-4 bg-green-500 text-white relative';
                    modalIconContainer.className = 'bg-white bg-opacity-20 rounded-full p-2';
                    modalSvg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />';
                    
                    // Hide the calendar if not reschedule
                    calendarSection.classList.add('hidden');
                    break;
                    
                case 'attended':
                    modalTitle.textContent = 'Mark as Attended';
                    modalDescription.textContent = 'This will mark the appointment as attended by the patient.';
                    confirmButton.className = 'bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow-sm font-medium flex items-center gap-2';
                    confirmButtonText.textContent = 'Mark Attended';
                    confirmButtonIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />';
                    modalHeader.className = 'px-6 py-4 bg-blue-500 text-white relative';
                    modalIconContainer.className = 'bg-white bg-opacity-20 rounded-full p-2';
                    modalSvg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />';
                    
                    // Hide the calendar if not reschedule
                    calendarSection.classList.add('hidden');
                    break;
                    
                case 'cancel':
                    modalTitle.textContent = 'Cancel Appointment';
                    modalDescription.textContent = 'This will mark the appointment as unattended and notify the patient.';
                    confirmButton.className = 'bg-rose-600 text-white px-5 py-2 rounded-lg hover:bg-rose-700 transition shadow-sm font-medium flex items-center gap-2';
                    confirmButtonText.textContent = 'Cancel Appointment';
                    confirmButtonIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
                    modalHeader.className = 'px-6 py-4 bg-rose-500 text-white relative';
                    modalIconContainer.className = 'bg-white bg-opacity-20 rounded-full p-2';
                    modalSvg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
                    
                    // Hide the calendar if not reschedule
                    calendarSection.classList.add('hidden');
                    break;

                case 'reschedule':
                    modalTitle.textContent = 'Reschedule Appointment';
                    modalDescription.textContent = 'This appointment is unattended. Please select a new date/time.';
                    confirmButton.className = 'bg-yellow-600 text-white px-5 py-2 rounded-lg hover:bg-yellow-700 transition shadow-sm font-medium flex items-center gap-2';
                    confirmButtonText.textContent = 'Reschedule';
                    confirmButtonIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6M20 20v-6h-6" />';
                    modalHeader.className = 'px-6 py-4 bg-yellow-500 text-white relative';
                    modalIconContainer.className = 'bg-white bg-opacity-20 rounded-full p-2';
                    modalSvg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6M20 20v-6h-6" />';
                    
                    // Show the calendar for reschedule
                    calendarSection.classList.remove('hidden');
                    break;
                    
                default:
                    modalTitle.textContent = 'Update Appointment';
                    modalDescription.textContent = 'Update the status of this appointment.';
                    confirmButton.className = 'bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow-sm font-medium flex items-center gap-2';
                    confirmButtonText.textContent = 'Update';
                    confirmButtonIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />';
                    modalHeader.className = 'px-6 py-4 bg-blue-500 text-white relative';
                    modalIconContainer.className = 'bg-white bg-opacity-20 rounded-full p-2';
                    modalSvg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />';
                    
                    // Hide the calendar if not reschedule
                    calendarSection.classList.add('hidden');
            }
            
            // Clear any previous message
            document.getElementById('message').value = '';
            
            // Show the modal
            document.getElementById('messageModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        
        function closeModal() {
            // fade-out animation
            const modalContent = document.querySelector('#messageModal > div');
            modalContent.classList.add('animate-modalFadeOut');
            
            // Wait for animation to complete before hiding
            setTimeout(() => {
                document.getElementById('messageModal').classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
                modalContent.classList.remove('animate-modalFadeOut');
            }, 200);
        }
        
        // Close modal when clicking outside
        document.getElementById('messageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('messageModal').classList.contains('hidden')) {
                closeModal();
            }
        });

        // Example function to fetch and display time slots in the calendar section
        function handleDateSelection() {
                const dateInput = document.getElementById('reschedule-date');
                const timeSlotsContainer = document.getElementById('time-slots');
                if (dateInput.value) {
                    fetch(`{{ route('admin.appointments.slots') }}?date=${dateInput.value}`)
                        .then(response => response.json())
                        .then(data => {
                            timeSlotsContainer.innerHTML = '';
                            if (data.length > 0) {
                                data.forEach(slot => {
                                    if (slot.remaining_slots > 0) {
                                        const btn = document.createElement('button');
                                        btn.type = 'button';
                                        btn.className = 'appointment-button px-4 py-2 text-md shadow-lg font-medium text-gray-900 bg-gray-100 border border-gray-800 rounded-lg hover:bg-teal-600 hover:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none';
                                        btn.dataset.time = slot.time_slot;
                                        btn.textContent = `${slot.time_slot} (${slot.remaining_slots} slots left)`;
                                        btn.onclick = () => selectRescheduleTime(btn);
                                        timeSlotsContainer.appendChild(btn);
                                    }
                                });
                            } else {
                                const noSlots = document.createElement('div');
                                noSlots.className = 'flex items-center space-x-2';
                                noSlots.innerHTML = `
                                    <i class="fa-solid fa-xmark text-red-500 text-2xl"></i>
                                    <p class="text-lg font-bold text-teal-600">No available time slots for ${dateInput.value}</p>
                                `;
                                timeSlotsContainer.appendChild(noSlots);
                            }
                        })
                        .catch(error => console.error('Error fetching time slots:', error));
                } else {
                    timeSlotsContainer.innerHTML = '';
                }
            }
            
            function selectRescheduleTime(button) {
                const selectedTime = button.getAttribute('data-time');
                document.getElementById('reschedule-time').value = selectedTime;
                document.querySelectorAll('#time-slots .appointment-button').forEach(btn => {
                    btn.classList.remove('bg-teal-600', 'text-white');
                    btn.classList.add('bg-gray-100', 'text-gray-900');
                });
                button.classList.remove('bg-gray-100', 'text-gray-900');
                button.classList.add('bg-teal-600', 'text-white');
            }
    </script>
    
    <style>
        .animate-modalFadeIn {
            animation: modalFadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .animate-modalFadeOut {
            animation: modalFadeOut 0.2s ease-in-out forwards;
        }
        
        @keyframes modalFadeIn {
            from { 
                opacity: 0; 
                transform: scale(0.95) translateY(10px); 
            }
            to { 
                opacity: 1; 
                transform: scale(1) translateY(0); 
            }
        }
        
        @keyframes modalFadeOut {
            from { 
                opacity: 1; 
                transform: scale(1); 
            }
            to { 
                opacity: 0; 
                transform: scale(0.95); 
            }
        }
        
        textarea {
            min-height: 100px;
        }
        
        button, a {
            transition: all 0.2s ease;
        }
    </style>
    @endpush
</x-sidebar-layout>
                        