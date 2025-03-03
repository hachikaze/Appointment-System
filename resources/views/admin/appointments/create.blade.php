<x-sidebar-layout>
<x-slot:heading>
Manage Available Appointments
</x-slot:heading>
<!--  Header Section -->
<div class="mb-8 rounded-lg shadow-md overflow-hidden">
    <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center">
                <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Manage Available Appointments</h1>
                    <p class="text-teal-100">Create and manage appointment slots for patients to book</p>
                </div>
            </div>
            <div class="mt-4 sm:mt-0">
                <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Slots Management
                </span>
            </div>
        </div>
    </div>
    <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
        <div class="flex items-center text-sm text-teal-700">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>Create appointment slots based on staff availability and service duration</span>
        </div>
    </div>
</div>

<!-- Status Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-5 gap-5 mb-6">
    <!-- Today's Available Slots -->
    <div class="bg-gradient-to-br from-teal-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-teal-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-teal-700 text-xs sm:text-sm font-medium uppercase tracking-wider">Today's Available Slots</p>
                <p class="text-xl sm:text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">
                    @php
                    $todayDate = now()->format('Y-m-d');
                    $todayAvailableSlots = $availableAppointments
                    ->where('date', $todayDate)
                    ->sum(function($appointment) use ($slotCounts, $todayDate) {
                        $taken = $slotCounts[$todayDate][$appointment->time_slot] ?? 0;
                        return $appointment->max_slots - $taken;
                    });
                    @endphp
                    {{ $todayAvailableSlots }}
                </p>
            </div>
            <div class="bg-teal-100 p-1.5 sm:p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
        </div>
        <div class="mt-2 pt-2 border-t border-teal-100">
            <p class="text-xs text-teal-600">Remaining slots available for today's appointments</p>
        </div>
    </div>
    <!-- Today's Booked Slots -->
    <div class="bg-gradient-to-br from-teal-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-teal-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-teal-700 text-xs sm:text-sm font-medium uppercase tracking-wider">Today's Booked Slots</p>
                <p class="text-xl sm:text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">
                    @php
                    $todayDate = now()->format('Y-m-d');
                    $todayBookedSlots = 0;
                    foreach($availableAppointments as $appointment) {
                        if($appointment->date == $todayDate) {
                            $todayBookedSlots += $slotCounts[$todayDate][$appointment->time_slot] ?? 0;
                        }
                    }
                    @endphp
                    {{ $todayBookedSlots }}
                </p>
            </div>
            <div class="bg-teal-100 p-1.5 sm:p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        </div>
        <div class="mt-2 pt-2 border-t border-teal-100">
            <p class="text-xs text-teal-600">Total appointments booked for today</p>
        </div>
    </div>
    <!-- Today's Utilization Rate -->
    <div class="bg-gradient-to-br from-teal-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-teal-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-teal-700 text-xs sm:text-sm font-medium uppercase tracking-wider">Today's Utilization</p>
                <p class="text-xl sm:text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">
                    @php
                    $todayDate = now()->format('Y-m-d');
                    $todayTotalSlots = $availableAppointments
                    ->where('date', $todayDate)
                    ->sum('max_slots');
                    $todayUtilization = $todayTotalSlots > 0
                    ? round(($todayBookedSlots / $todayTotalSlots) * 100)
                    : 0;
                    @endphp
                    {{ $todayUtilization }}%
                </p>
            </div>
            <div class="bg-teal-100 p-1.5 sm:p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
        </div>
        <div class="mt-2 pt-2 border-t border-teal-100">
            <div class="w-full bg-teal-100 rounded-full h-2.5">
                <div class="h-2.5 rounded-full
                {{ $todayUtilization >= 90 ? 'bg-teal-800' : ($todayUtilization >= 70 ? 'bg-teal-600' : 'bg-teal-500') }}"
                style="width: {{ $todayUtilization }}%">
                </div>
            </div>
            <p class="text-xs text-teal-600 mt-1">Percentage of today's slots that are booked</p>
        </div>
    </div>
    <!-- This Week's Slots -->
    <div class="bg-gradient-to-br from-teal-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-teal-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-teal-700 text-xs sm:text-sm font-medium uppercase tracking-wider">This Week's Slots</p>
                <p class="text-xl sm:text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">
                    @php
                    $startOfWeek = now()->startOfWeek()->format('Y-m-d');
                    $endOfWeek = now()->endOfWeek()->format('Y-m-d');
                    $weeklySlots = $availableAppointments
                    ->where('date', '>=', $startOfWeek)
                    ->where('date', '<=', $endOfWeek)
                    ->sum('max_slots');
                    $weeklyBooked = 0;
                    foreach($availableAppointments as $appointment) {
                        if($appointment->date >= $startOfWeek && $appointment->date <= $endOfWeek) {
                            $weeklyBooked += $slotCounts[$appointment->date][$appointment->time_slot] ?? 0;
                        }
                    }
                    $weeklyAvailable = $weeklySlots - $weeklyBooked;
                    @endphp
                    {{ $weeklyAvailable }} / {{ $weeklySlots }}
                </p>
            </div>
            <div class="bg-teal-100 p-1.5 sm:p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
        <div class="mt-2 pt-2 border-t border-teal-100">
            <div class="w-full bg-teal-100 rounded-full h-2.5">
                @php
                $weeklyUtilization = $weeklySlots > 0 ? ($weeklyBooked / $weeklySlots) * 100 : 0;
                @endphp
                <div class="h-2.5 rounded-full bg-teal-500" style="width: {{ $weeklyUtilization }}%"></div>
            </div>
            <p class="text-xs text-teal-600 mt-1">Available slots for the current week</p>
        </div>
    </div>
    <!-- Total Active Slots -->
    <div class="bg-gradient-to-br from-teal-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-teal-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-teal-700 text-xs sm:text-sm font-medium uppercase tracking-wider">Total Active Slots</p>
                <p class="text-xl sm:text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">
                @php
                    $totalActiveSlots = $availableAppointments
                    ->where('date', '>=', now()->format('Y-m-d'))
                    ->count();
                    $totalTimeSlots = $availableAppointments
                    ->where('date', '>=', now()->format('Y-m-d'))
                    ->sum('max_slots');
                    @endphp
                    {{ $totalActiveSlots }}
                </p>
            </div>
            <div class="bg-teal-100 p-1.5 sm:p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
        <div class="mt-2 pt-2 border-t border-teal-100">
            <p class="text-xs text-teal-600">Total active appointment time slots ({{ $totalTimeSlots }} total capacity)</p>
        </div>
    </div>
</div>

@if (session('success'))
<div class="bg-teal-500 text-white p-4 rounded-lg mb-6 flex items-center shadow-md">
    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    {{ session('success') }}
</div>
@endif

<!-- Enhanced Calendar View Section with Professional Teal Theme -->
<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 border-b border-teal-800">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
            <h2 class="text-xl font-semibold text-white flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Appointment Calendar
            </h2>
            <div class="mt-2 sm:mt-0 flex items-center gap-2">
                <button id="prevMonth" class="bg-teal-500 text-white p-2 rounded-lg hover:bg-teal-600 transition-colors shadow-sm">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <span id="currentMonthYear" class="text-white font-medium px-3 py-1 bg-teal-800 bg-opacity-30 rounded-lg min-w-[140px] text-center"></span>
                <button id="nextMonth" class="bg-teal-500 text-white p-2 rounded-lg hover:bg-teal-600 transition-colors shadow-sm">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button id="todayBtn" class="bg-white text-teal-700 px-3 py-1 rounded-lg hover:bg-teal-50 transition-colors shadow-sm ml-2 text-sm font-medium">
                    Today
                </button>
            </div>
        </div>
    </div>
    
    <div class="p-4 bg-teal-50">
        <!-- Calendar Legend with Enhanced Teal Theme -->
        <div class="flex flex-wrap gap-3 mb-4 justify-center sm:justify-end">
            <div class="flex items-center">
                <div class="w-4 h-4 bg-teal-500 rounded-sm mr-1"></div>
                <span class="text-xs text-teal-800">Available</span>
            </div>
            <div class="flex items-center">
                <div class="w-4 h-4 bg-teal-300 rounded-sm mr-1"></div>
                <span class="text-xs text-teal-800">Partially Available</span>
            </div>
            <div class="flex items-center">
                <div class="w-4 h-4 bg-teal-600 rounded-sm mr-1"></div>
                <span class="text-xs text-teal-800">Limited Slots</span>
            </div>
            <div class="flex items-center">
                <div class="w-4 h-4 bg-teal-800 rounded-sm mr-1"></div>
                <span class="text-xs text-teal-800">Fully Booked</span>
            </div>
            <div class="flex items-center">
                <div class="w-4 h-4 bg-teal-100 rounded-sm mr-1"></div>
                <span class="text-xs text-teal-800">No Slots</span>
            </div>
        </div>
        
        <!-- Enhanced Calendar Grid with Professional Teal Theme -->
        <div class="overflow-x-auto">
            <!-- Calendar for larger screens (grid) -->
            <div class="min-w-full bg-white rounded-lg shadow-sm border border-teal-200 lg:block hidden">
                <div class="grid grid-cols-7 gap-1 bg-teal-600 text-white">
                    <div class="text-center font-medium text-sm py-2">Sun</div>
                    <div class="text-center font-medium text-sm py-2">Mon</div>
                    <div class="text-center font-medium text-sm py-2">Tue</div>
                    <div class="text-center font-medium text-sm py-2">Wed</div>
                    <div class="text-center font-medium text-sm py-2">Thu</div>
                    <div class="text-center font-medium text-sm py-2">Fri</div>
                    <div class="text-center font-medium text-sm py-2">Sat</div>
                </div>
                <div id="calendarGrid" class="grid grid-cols-7 gap-1 p-1 bg-teal-100"></div>
            </div>
            
            <!-- Calendar for smaller screens (vertical list) -->
            <div class="lg:hidden block">
                <div id="calendarVertical" class="flex flex-col gap-2 bg-teal-100 p-2 rounded-lg border border-teal-200"></div>
            </div>
        </div>
    </div>
</div>

<!-- Appointments Table Card with Enhanced Filters -->
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 border-b border-teal-800">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
            <h2 class="text-xl font-semibold text-white">Current Available Appointments</h2>
            <div class="mt-2 sm:mt-0 flex flex-wrap items-center gap-3">
                <input type="text" id="appointmentSearch" placeholder="Search appointments..."
                    class="w-full sm:w-64 p-2 pl-3 text-sm border border-teal-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-teal-50">
                <button
                    type="button"
                    onclick="openAddModal()"
                    class="w-full sm:w-auto bg-white text-teal-700 px-4 py-2 rounded-lg hover:bg-teal-50 transition-colors shadow-sm flex items-center justify-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Slot
                </button>
            </div>
        </div>
    </div>
    <!-- Enhanced Filter Bar with Teal Theme -->
    <div class="bg-teal-50 px-6 py-3 border-b border-teal-200 flex flex-wrap gap-3 items-center justify-between">
        <div class="flex flex-wrap gap-2">
            <button id="todayFilterBtn" onclick="filterByPeriod('today')" class="px-3 py-1.5 text-sm bg-teal-100 border border-teal-300 rounded-md hover:bg-teal-200 text-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-1 transition-colors duration-150 shadow-sm">
                Today
            </button>
            <button id="weekFilterBtn" onclick="filterByPeriod('week')" class="px-3 py-1.5 text-sm bg-white border border-teal-300 rounded-md hover:bg-teal-100 text-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-1 transition-colors duration-150 shadow-sm">
                This Week
            </button>
            <button id="monthFilterBtn" onclick="filterByPeriod('month')" class="px-3 py-1.5 text-sm bg-white border border-teal-300 rounded-md hover:bg-teal-100 text-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-1 transition-colors duration-150 shadow-sm">
                This Month
            </button>
            <button id="allFilterBtn" onclick="resetFilter()" class="px-3 py-1.5 text-sm bg-white border border-teal-300 rounded-md hover:bg-teal-100 text-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-1 transition-colors duration-150 shadow-sm">
                All
            </button>
        </div>
        <!-- Date Filter -->
        <div class="flex items-center gap-2">
            <label for="dateFilter" class="text-sm text-teal-700">Filter by date:</label>
            <input type="date" id="dateFilter" onchange="filterBySpecificDate(this.value)"
                class="text-sm border border-teal-300 rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white text-teal-700">
            <button onclick="clearDateFilter()" class="text-teal-600 hover:text-teal-800 p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="flex items-center gap-2">
            <label for="perPage" class="text-sm text-teal-700">Show:</label>
            <select id="perPage" onchange="changePerPage(this.value)" class="text-sm border border-teal-300 rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white text-teal-700">
                <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                <option value="all" {{ request('perPage') == 'all' ? 'selected' : '' }}>All</option>
            </select>
        </div>
    </div>
    <div class="p-6">
        @if($availableAppointments->count() > 0)
        <div class="overflow-x-auto rounded-lg border border-teal-200">
            <table id="appointmentsTable" class="min-w-full divide-y divide-teal-200">
                <thead>
                    <tr class="bg-teal-100">
                    <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider cursor-pointer border-r border-teal-200" onclick="sortTable(0)">
                            Date
                            <span class="sort-icon ml-1">↕</span>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider cursor-pointer border-r border-teal-200" onclick="sortTable(1)">
                            Time Slot
                            <span class="sort-icon ml-1">↕</span>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider cursor-pointer border-r border-teal-200" onclick="sortTable(2)">
                            Max Slots
                            <span class="sort-icon ml-1">↕</span>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider cursor-pointer border-r border-teal-200" onclick="sortTable(3)">
                            Slots Taken
                            <span class="sort-icon ml-1">↕</span>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider cursor-pointer border-r border-teal-200" onclick="sortTable(4)">
                            Created At
                            <span class="sort-icon ml-1">↕</span>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-teal-100">
                    @foreach($availableAppointments as $appointment)
                    <tr class="hover:bg-teal-50 transition-colors duration-150" data-date="{{ $appointment->date }}" data-time="{{ $appointment->time_slot }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-800 border-r border-teal-100">
                            {{ \Carbon\Carbon::parse($appointment->date)->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-800 border-r border-teal-100">
                            {{ $appointment->time_slot }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-800 border-r border-teal-100">
                            {{ $appointment->max_slots }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm border-r border-teal-100">
                            @php
                            $slotsTaken = $slotCounts[$appointment->date][$appointment->time_slot] ?? 0;
                            $availablePercentage = ($appointment->max_slots > 0) ? ($slotsTaken / $appointment->max_slots) * 100 : 0;
                            if ($availablePercentage >= 90) {
                                $textClass = 'text-teal-800 font-medium';
                                $bgClass = 'bg-teal-800';
                            } elseif ($availablePercentage >= 70) {
                                $textClass = 'text-teal-700 font-medium';
                                $bgClass = 'bg-teal-600';
                            } elseif ($availablePercentage > 0) {
                                $textClass = 'text-teal-700';
                                $bgClass = 'bg-teal-500';
                            } else {
                                $textClass = 'text-teal-600';
                                $bgClass = 'bg-teal-300';
                            }
                            @endphp
                            <div class="flex items-center">
                                <span class="{{ $textClass }}">{{ $slotsTaken }} / {{ $appointment->max_slots }}</span>
                                <div class="ml-2 w-16 bg-teal-100 rounded-full h-2.5">
                                    <div class="h-2.5 rounded-full {{ $bgClass }}"
                                        style="width: {{ min($availablePercentage, 100) }}%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-800 border-r border-teal-100">
                            {{ $appointment->created_at->format('M d, Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2 flex">
                            <button type="button"
                                onclick="openEditModal({{ $appointment->id }}, '{{ $appointment->date }}', '{{ $appointment->time_slot }}', {{ $appointment->max_slots }})"
                                class="text-teal-600 hover:text-teal-900 bg-teal-100 hover:bg-teal-200 px-3 py-1 rounded-md transition-colors duration-150 border border-teal-300 shadow-sm">
                                Edit
                            </button>
                            <button type="button"
                                onclick="openDeleteModal({{ $appointment->id }})"
                                class="text-teal-800 hover:text-teal-900 bg-teal-50 hover:bg-teal-100 px-3 py-1 rounded-md transition-colors duration-150 border border-teal-200 shadow-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Enhanced Pagination with Teal Theme -->
        <div class="mt-6 flex flex-col sm:flex-row justify-between items-center">
            <div class="text-sm text-teal-700 mb-4 sm:mb-0">
                @if(method_exists($availableAppointments, 'firstItem'))
                Showing
                <span class="font-medium">{{ $availableAppointments->firstItem() ?? 0 }}</span>
                to
                <span class="font-medium">{{ $availableAppointments->lastItem() ?? 0 }}</span>
                of
                <span class="font-medium">{{ $availableAppointments->total() ?? count($availableAppointments) }}</span>
                results
                @else
                Showing all {{ count($availableAppointments) }} results
                @endif
            </div>
            @if(method_exists($availableAppointments, 'links'))
            <div class="pagination-container">
                {{ $availableAppointments->links() }}
            </div>
            @endif
        </div>
        @else
        <div class="text-center py-8 bg-teal-50 rounded-lg border border-teal-200">
            <svg class="mx-auto h-12 w-12 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-teal-800">No appointments available</h3>
            <p class="mt-1 text-sm text-teal-600">Get started by creating a new appointment slot.</p>
            <div class="mt-6">
                <button
                    type="button"
                    onclick="openAddModal()"
                    class="inline-flex items-center px-4 py-2 border border-teal-700 shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
                >
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Appointment Slot
                </button>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Add New Appointment Modal -->
<div id="addModal" class="fixed inset-0 bg-teal-900 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 border-b border-teal-800 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-white">Add New Appointment Slot</h3>
            <button onclick="closeAddModal()" class="text-white hover:text-teal-100 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.appointments.store') }}" class="p-6">
            @csrf
            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-teal-700 mb-2" for="date">Date</label>
                    <input type="date" id="date" name="date"
                        class="w-full p-3 border border-teal-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                        value="{{ now()->format('Y-m-d') }}"
                        min="{{ now()->format('Y-m-d') }}"
                        onchange="updateAvailableTimeSlots()">
                </div>
                <div>
                    <label class="block text-sm font-medium text-teal-700 mb-2" for="time_slot">Time Slot</label>
                    <select id="time_slot" name="time_slot"
                        class="w-full p-3 border border-teal-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                        required>
                        <option value="">Select a time slot</option>
                        @foreach (range(8, 17) as $hour)
                        <option value="{{ sprintf('%02d:00 - %02d:00', $hour, $hour + 1) }}">
                            {{ sprintf('%02d:00 - %02d:00', $hour, $hour + 1) }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-teal-700 mb-2" for="max_slots">Max Slots</label>
                    <input type="number" id="max_slots" name="max_slots"
                        class="w-full p-3 border border-teal-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                        min="1" value="1">
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeAddModal()"
                    class="px-4 py-2 bg-teal-100 text-teal-700 rounded-md hover:bg-teal-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-150">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-150">
                    Add Appointment Slot
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-teal-900 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 border-b border-teal-800 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-white">Edit Appointment Slot</h3>
            <button onclick="closeEditModal()" class="text-white hover:text-teal-100 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="editForm" method="POST" action="" class="p-6">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-teal-700 mb-2" for="edit_date">Date</label>
                    <input type="date" id="edit_date" name="date"
                        class="w-full p-3 border border-teal-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                        onchange="updateEditTimeSlots()">
                </div>
                <div>
                    <label class="block text-sm font-medium text-teal-700 mb-2" for="edit_time_slot">Time Slot</label>
                    <select id="edit_time_slot" name="time_slot"
                        class="w-full p-3 border border-teal-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                        required>
                        <option value="">Select a time slot</option>
                        @foreach (range(8, 17) as $hour)
                        <option value="{{ sprintf('%02d:00 - %02d:00', $hour, $hour + 1) }}">
                            {{ sprintf('%02d:00 - %02d:00', $hour, $hour + 1) }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-teal-700 mb-2" for="edit_max_slots">Max Slots</label>
                    <input type="number" id="edit_max_slots" name="max_slots"
                        class="w-full p-3 border border-teal-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                        min="1">
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeEditModal()"
                    class="px-4 py-2 bg-teal-100 text-teal-700 rounded-md hover:bg-teal-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-150">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-150">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-teal-900 bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden">
        <div class="bg-gradient-to-r from-teal-700 to-teal-800 px-6 py-4 border-b border-teal-900 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-white">Delete Appointment Slot</h3>
            <button onclick="closeDeleteModal()" class="text-white hover:text-teal-100 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0 bg-teal-100 rounded-full p-2 mr-3">
                    <svg class="h-6 w-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-teal-900">Delete Confirmation</h3>
                    <p class="text-sm text-teal-600 mt-1">Are you sure you want to delete this appointment slot? This action cannot be undone.</p>
                </div>
            </div>
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-teal-100 text-teal-700 rounded-md hover:bg-teal-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-150">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-150">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
@php
$appointmentsJson = $availableAppointments->map(function($appointment) use ($slotCounts) {
    $slotsTaken = $slotCounts[$appointment->date][$appointment->time_slot] ?? 0;
    return [
        'id' => $appointment->id,
        'date' => $appointment->date,
        'time_slot' => $appointment->time_slot,
        'max_slots' => $appointment->max_slots,
        'slots_taken' => $slotsTaken,
        'created_at' => $appointment->created_at->format('Y-m-d H:i:s')
    ];
})->toJson();
@endphp

// Store all appointment data for client-side validation
const existingAppointments = {!! $appointmentsJson !!};
// Current appointment ID being edited (to exclude from validation)
let currentEditId = null;

// Calendar variables
let currentDate = new Date();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();
let selectedDate = null;

// Function to update available time slots based on selected date
function updateAvailableTimeSlots() {
    const selectedDate = document.getElementById('date').value;
    const timeSlotSelect = document.getElementById('time_slot');
    const options = timeSlotSelect.options;
    
    // Reset all options
    for (let i = 0; i < options.length; i++) {
        options[i].disabled = false;
        options[i].classList.remove('text-teal-300', 'bg-teal-50');
    }
    
    // Disable time slots that are already taken for the selected date
    existingAppointments.forEach(appointment => {
        if (appointment.date === selectedDate) {
            for (let i = 0; i < options.length; i++) {
                if (options[i].value === appointment.time_slot) {
                    options[i].disabled = true;
                    options[i].classList.add('text-teal-300', 'bg-teal-50');
                }
            }
        }
    });
    
    // If the currently selected option is now disabled, reset the selection
    if (timeSlotSelect.selectedIndex > 0 && options[timeSlotSelect.selectedIndex].disabled) {
        timeSlotSelect.selectedIndex = 0;
    }
}

// Function to update available time slots in the edit modal
function updateEditTimeSlots() {
    const selectedDate = document.getElementById('edit_date').value;
    const timeSlotSelect = document.getElementById('edit_time_slot');
    const options = timeSlotSelect.options;
    const originalTimeSlot = document.getElementById('edit_time_slot').getAttribute('data-original');
    
    // Reset all options
    for (let i = 0; i < options.length; i++) {
        options[i].disabled = false;
        options[i].classList.remove('text-teal-300', 'bg-teal-50');
    }
    
    // Disable time slots that are already taken for the selected date (except the current one being edited)
    existingAppointments.forEach(appointment => {
        if (appointment.date === selectedDate && appointment.id !== currentEditId) {
            for (let i = 0; i < options.length; i++) {
                if (options[i].value === appointment.time_slot) {
                    options[i].disabled = true;
                    options[i].classList.add('text-teal-300', 'bg-teal-50');
                }
            }
        }
    });
    
    // If the currently selected option is now disabled, reset the selection
    if (timeSlotSelect.selectedIndex > 0 && options[timeSlotSelect.selectedIndex].disabled) {
        // If we have the original time slot and it's for this date, select it
        if (originalTimeSlot && selectedDate === document.getElementById('edit_date').getAttribute('data-original-date')) {
            for (let i = 0; i < options.length; i++) {
                if (options[i].value === originalTimeSlot) {
                    timeSlotSelect.selectedIndex = i;
                    break;
                }
            }
        } else {
            timeSlotSelect.selectedIndex = 0;
        }
    }
}

// Helper function to format date as YYYY-MM-DD
function formatDate(year, month, day) {
    return `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
}

// Function to filter appointments by specific date from date picker
function filterBySpecificDate(date) {
    const rows = document.querySelectorAll('#appointmentsTable tbody tr');
    let hasVisibleRows = false;
    
    // Update selected date in calendar
    selectedDate = date;
    renderCalendar();
    
    rows.forEach(row => {
        if (row.getAttribute('data-date') === date) {
            row.style.display = '';
            hasVisibleRows = true;
        } else {
            row.style.display = 'none';
        }
    });
    
    // Format the date for display
    const displayDate = new Date(date).toLocaleDateString();
    
    // Show "no results" message if needed
    const noResults = document.getElementById('noFilterResults');
    if (!hasVisibleRows) {
        if (!noResults) {
            const table = document.getElementById('appointmentsTable');
            const message = document.createElement('div');
            message.id = 'noFilterResults';
            message.className = 'text-center py-4 text-teal-600';
            message.innerHTML = `No appointments found for ${displayDate}. <a href="#" class="text-teal-500 hover:underline" onclick="resetFilter(event)">Show all</a>`;
            table.parentNode.insertBefore(message, table.nextSibling);
        } else {
            // Update the existing message with the new date
            noResults.innerHTML = `No appointments found for ${displayDate}. <a href="#" class="text-teal-500 hover:underline" onclick="resetFilter(event)">Show all</a>`;
        }
    } else if (noResults) {
        noResults.remove();
    }
    
    // Reset filter button styling
    updateFilterButtonStyles('none');
}

// Function to clear date filter
function clearDateFilter() {
    document.getElementById('dateFilter').value = '';
    selectedDate = null;
    renderCalendar();
    resetFilter();
}

// Function to filter by time period (today, week, month)
function filterByPeriod(period) {
    const rows = document.querySelectorAll('#appointmentsTable tbody tr');
    let hasVisibleRows = false;
    
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    const startOfWeek = new Date(today);
    startOfWeek.setDate(today.getDate() - today.getDay()); // Start of week (Sunday)
    const startOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
    
    rows.forEach(row => {
        const rowDate = new Date(row.getAttribute('data-date'));
        rowDate.setHours(0, 0, 0, 0);
        let showRow = false;
        
        if (period === 'today') {
            showRow = rowDate.getTime() === today.getTime();
        } else if (period === 'week') {
            const endOfWeek = new Date(startOfWeek);
            endOfWeek.setDate(startOfWeek.getDate() + 6);
            showRow = rowDate >= startOfWeek && rowDate <= endOfWeek;
        } else if (period === 'month') {
            const endOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
            showRow = rowDate >= startOfMonth && rowDate <= endOfMonth;
        }
        
        if (showRow) {
            row.style.display = '';
            hasVisibleRows = true;
        } else {
            row.style.display = 'none';
        }
    });
    
    // Show "no results" message if needed
    const noResults = document.getElementById('noFilterResults');
    if (!hasVisibleRows) {
        if (!noResults) {
            const table = document.getElementById('appointmentsTable');
            const message = document.createElement('div');
            message.id = 'noFilterResults';
            message.className = 'text-center py-4 text-teal-600';
            message.innerHTML = `No appointments found for this time period. <a href="#" class="text-teal-500 hover:underline" onclick="resetFilter(event)">Show all</a>`;
            table.parentNode.insertBefore(message, table.nextSibling);
        }
    } else if (noResults) {
        noResults.remove();
    }
    
    // Clear date filter input
    document.getElementById('dateFilter').value = '';
    
    // Update active filter button styling
    updateFilterButtonStyles(period);
    
    // If filtering by today, set selected date to today
    if (period === 'today') {
        selectedDate = formatDate(today.getFullYear(), today.getMonth(), today.getDate());
    } else {
        selectedDate = null;
    }
    renderCalendar();
}

// Function to update filter button styles
function updateFilterButtonStyles(activeFilter) {
    // Reset all buttons
    document.getElementById('todayFilterBtn').classList.remove('bg-teal-100');
    document.getElementById('weekFilterBtn').classList.remove('bg-teal-100');
    document.getElementById('monthFilterBtn').classList.remove('bg-teal-100');
    document.getElementById('allFilterBtn').classList.remove('bg-teal-100');
    document.getElementById('todayFilterBtn').classList.add('bg-white');
    document.getElementById('weekFilterBtn').classList.add('bg-white');
    document.getElementById('monthFilterBtn').classList.add('bg-white');
    document.getElementById('allFilterBtn').classList.add('bg-white');
    
    // Highlight active button
    if (activeFilter === 'today') {
        document.getElementById('todayFilterBtn').classList.remove('bg-white');
        document.getElementById('todayFilterBtn').classList.add('bg-teal-100');
    } else if (activeFilter === 'week') {
        document.getElementById('weekFilterBtn').classList.remove('bg-white');
        document.getElementById('weekFilterBtn').classList.add('bg-teal-100');
    } else if (activeFilter === 'month') {
        document.getElementById('monthFilterBtn').classList.remove('bg-white');
        document.getElementById('monthFilterBtn').classList.add('bg-teal-100');
    } else if (activeFilter === 'all') {
        document.getElementById('allFilterBtn').classList.remove('bg-white');
        document.getElementById('allFilterBtn').classList.add('bg-teal-100');
    }
}

// Function to reset filter and show all appointments
function resetFilter(event) {
    if (event) event.preventDefault();
    
    // Sort appointments by date (newest first)
    sortTable(0, 'desc', true);
    
    // Show all rows
    const rows = document.querySelectorAll('#appointmentsTable tbody tr');
    rows.forEach(row => {
        row.style.display = '';
    });
    
    // Remove any "no results" message
    const noResults = document.getElementById('noFilterResults');
    if (noResults) noResults.remove();
    
    // Update filter button styling
    updateFilterButtonStyles('all');
    
    // Clear date filter input
    document.getElementById('dateFilter').value = '';
    
    // Clear selected date
    selectedDate = null;
    renderCalendar();
}

// Function to search appointments
function searchAppointments() {
    const searchInput = document.getElementById('appointmentSearch');
    const filter = searchInput.value.toLowerCase();
    const rows = document.querySelectorAll('#appointmentsTable tbody tr');
    let hasVisibleRows = false;
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(filter)) {
            row.style.display = '';
            hasVisibleRows = true;
        } else {
            row.style.display = 'none';
        }
    });
    
    // Show "no results" message if needed
    const noResults = document.getElementById('noFilterResults');
    if (!hasVisibleRows) {
        if (!noResults) {
            const table = document.getElementById('appointmentsTable');
            const message = document.createElement('div');
            message.id = 'noFilterResults';
            message.className = 'text-center py-4 text-teal-600';
            message.innerHTML = `No appointments found matching "${filter}". <a href="#" class="text-teal-500 hover:underline" onclick="resetFilter(event)">Show all</a>`;
            table.parentNode.insertBefore(message, table.nextSibling);
        } else {
            noResults.innerHTML = `No appointments found matching "${filter}". <a href="#" class="text-teal-500 hover:underline" onclick="resetFilter(event)">Show all</a>`;
        }
    } else if (noResults) {
        noResults.remove();
    }
    
    // Reset filter button styling
    updateFilterButtonStyles('none');
}

// Function to change items per page
function changePerPage(value) {
    // Get current URL and parameters
    const url = new URL(window.location.href);
    
    // Set the perPage parameter
    if (value === 'all') {
        url.searchParams.delete('perPage');
    } else {
        url.searchParams.set('perPage', value);
    }
    
    // Reset to page 1 when changing items per page
    url.searchParams.delete('page');
    
    // Navigate to the new URL
    window.location.href = url.toString();
}

// Function to sort table
function sortTable(columnIndex, direction = null, skipToggle = false) {
    const table = document.getElementById('appointmentsTable');
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    
    // Get current sort direction
    const th = table.querySelectorAll('th')[columnIndex];
    let currentDirection = direction;
    if (!skipToggle) {
        currentDirection = th.getAttribute('data-sort') === 'asc' ? 'desc' : 'asc';
    }
    
    // Update sort direction attribute and icons
    table.querySelectorAll('th').forEach(header => {
        header.removeAttribute('data-sort');
        const icon = header.querySelector('.sort-icon');
        if (icon) icon.textContent = '↕';
    });
    th.setAttribute('data-sort', currentDirection);
    const sortIcon = th.querySelector('.sort-icon');
    if (sortIcon) {
        sortIcon.textContent = currentDirection === 'asc' ? '↑' : '↓';
    }
    
    // Sort rows
    rows.sort((a, b) => {
        let aValue, bValue;
        if (columnIndex === 3) {
            // Slots Taken sorting - extract the first number from "X / Y"
            aValue = parseInt(a.querySelectorAll('td')[columnIndex].textContent.trim().split('/')[0]);
            bValue = parseInt(b.querySelectorAll('td')[columnIndex].textContent.trim().split('/')[0]);
        } else {
            aValue = a.querySelectorAll('td')[columnIndex].textContent.trim();
            bValue = b.querySelectorAll('td')[columnIndex].textContent.trim();
        }
        
        if (columnIndex === 0) {
            // Date sorting
            const aDate = new Date(aValue);
            const bDate = new Date(bValue);
            return currentDirection === 'asc' ? aDate - bDate : bDate - aDate;
        } else if (columnIndex === 2 || columnIndex === 3) {
            // Number sorting
            return currentDirection === 'asc' ?
                parseInt(aValue) - parseInt(bValue) :
                parseInt(bValue) - parseInt(aValue);
        } else if (columnIndex === 4) {
            // Created At sorting (datetime)
            const aDate = new Date(aValue);
            const bDate = new Date(bValue);
            return currentDirection === 'asc' ? aDate - bDate : bDate - aDate;
        } else {
            // Text sorting
            return currentDirection === 'asc' ?
                aValue.localeCompare(bValue) :
                bValue.localeCompare(aValue);
        }
    });
    
    // Reorder rows
    rows.forEach(row => {
        tbody.appendChild(row);
    });
}

// Enhanced Calendar Functions with Teal Theme
function renderCalendar() {
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    document.getElementById('currentMonthYear').textContent = `${monthNames[currentMonth]} ${currentYear}`;
    
    // Render grid calendar for larger screens
    renderGridCalendar();
    
    // Render vertical calendar for smaller screens
    renderVerticalCalendar();
}

// Function to render grid calendar for larger screens
function renderGridCalendar() {
    const calendarGrid = document.getElementById('calendarGrid');
    calendarGrid.innerHTML = '';
    
    // Get first day of month and last day of month
    const firstDay = new Date(currentYear, currentMonth, 1).getDay();
    const lastDate = new Date(currentYear, currentMonth + 1, 0).getDate();
    
    // Previous month's days to fill the first row
    const prevMonthLastDate = new Date(currentYear, currentMonth, 0).getDate();
    for (let i = 0; i < firstDay; i++) {
        const day = prevMonthLastDate - firstDay + i + 1;
        const prevMonth = currentMonth === 0 ? 11 : currentMonth - 1;
        const prevYear = currentMonth === 0 ? currentYear - 1 : currentYear;
        const dateStr = formatDate(prevYear, prevMonth, day);
        
        const cell = document.createElement('div');
        cell.className = 'p-1 sm:p-2 border border-teal-200 bg-teal-50 text-teal-400 min-h-[70px] sm:min-h-[90px]';
        cell.innerHTML = `
            <div class="text-xs sm:text-sm">${day}</div>
        `;
        calendarGrid.appendChild(cell);
    }
    
    // Current month's days with enhanced teal theme
    const today = new Date();
    for (let i = 1; i <= lastDate; i++) {
        const dateStr = formatDate(currentYear, currentMonth, i);
        const isToday = i === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear();
        const isSelected = dateStr === selectedDate;
        
        // Get appointment data for this date
        const appointmentsForDate = existingAppointments.filter(a => a.date === dateStr);
        let totalSlots = 0;
        let totalTaken = 0;
        
        appointmentsForDate.forEach(appointment => {
            totalSlots += appointment.max_slots;
            totalTaken += appointment.slots_taken;
        });
        
        // Determine cell color based on availability
        let cellClass = 'bg-teal-100'; // Default: no slots
        let statusText = 'No slots';
        let textClass = 'text-teal-700';
        
        if (totalSlots > 0) {
            const utilization = (totalTaken / totalSlots) * 100;
            if (utilization >= 100) {
                cellClass = 'bg-teal-800';
                textClass = 'text-white';
                statusText = 'Fully booked';
            } else if (utilization >= 70) {
                cellClass = 'bg-teal-600';
                textClass = 'text-white';
                statusText = 'Limited slots';
            } else if (utilization > 0) {
                cellClass = 'bg-teal-300';
                textClass = 'text-teal-800';
                statusText = 'Partially booked';
            } else {
                cellClass = 'bg-teal-500';
                textClass = 'text-white';
                statusText = 'Available';
            }
        }
        
        // Create cell with appropriate styling
        const cell = document.createElement('div');
        
        // Apply border styling based on if it's today, selected, or regular day
        let borderClass = 'border border-teal-200';
        if (isToday && isSelected) {
            borderClass = 'border-2 border-teal-600 ring-2 ring-teal-300';
        } else if (isToday) {
            borderClass = 'border-2 border-teal-600';
        } else if (isSelected) {
            borderClass = 'border-2 border-teal-500 ring-1 ring-teal-300';
        }
        
        cell.className = `p-1 sm:p-2 ${borderClass} ${cellClass} min-h-[70px] sm:min-h-[90px] cursor-pointer hover:opacity-90 transition-opacity`;
        cell.setAttribute('data-date', dateStr);
        
        // Add appointment info to the cell with taken slot details
        let appointmentInfo = '';
        let takenSlotInfo = '';
        
        if (totalSlots > 0) {
            appointmentInfo = `
                <div class="text-xs mt-1 ${textClass}">
                    <span class="font-medium">${totalSlots - totalTaken}</span>/${totalSlots} slots
                </div>
            `;
            
            if (totalTaken > 0) {
                takenSlotInfo = `
                    <div class="text-xs mt-1 ${textClass} font-medium">
                        ${totalTaken} slot${totalTaken > 1 ? 's' : ''} taken
                    </div>
                `;
            }
        }
        
        // Add "TODAY" label for today's date
        const todayLabel = isToday ? `<div class="text-xs px-1.5 py-0.5 rounded bg-white bg-opacity-30 ${textClass} font-bold">TODAY</div>` : '';
        
        // Add "SELECTED" label if this date is selected and not today
        const selectedLabel = isSelected && !isToday ? `<div class="text-xs px-1.5 py-0.5 rounded bg-white bg-opacity-50 ${textClass} font-bold mt-1">SELECTED</div>` : '';
        
        cell.innerHTML = `
            <div class="flex justify-between items-start">
                <div class="text-xs sm:text-sm font-medium ${textClass}">${i}</div>
                ${todayLabel}
                ${totalSlots > 0 ? `<div class="text-xs px-1.5 py-0.5 rounded bg-white bg-opacity-30 ${textClass} font-medium">${appointmentsForDate.length}</div>` : ''}
            </div>
            ${appointmentInfo}
            ${takenSlotInfo}
            <div class="text-xs mt-1 ${textClass} font-medium">${statusText}</div>
            ${selectedLabel}
        `;
        
        // Add click event to filter table by this date
        cell.addEventListener('click', function() {
            // Set the date filter input value
            document.getElementById('dateFilter').value = dateStr;
            
            // Update the global selectedDate variable
            selectedDate = dateStr;
            
            // Filter the table by this date
            filterBySpecificDate(dateStr);
        });
        
        calendarGrid.appendChild(cell);
    }
    
    // Next month's days to fill the last row
    const lastDay = new Date(currentYear, currentMonth, lastDate).getDay();
    if (lastDay < 6) {
        for (let i = 0; i < 6 - lastDay; i++) {
            const day = i + 1;
            const nextMonth = currentMonth === 11 ? 0 : currentMonth + 1;
            const nextYear = currentMonth === 11 ? currentYear + 1 : currentYear;
            const dateStr = formatDate(nextYear, nextMonth, day);
            
            const cell = document.createElement('div');
            cell.className = 'p-1 sm:p-2 border border-teal-200 bg-teal-50 text-teal-400 min-h-[70px] sm:min-h-[90px]';
            cell.innerHTML = `
                <div class="text-xs sm:text-sm">${day}</div>
            `;
            calendarGrid.appendChild(cell);
        }
    }
}

// Function to render vertical calendar for smaller screens
function renderVerticalCalendar() {
    const calendarVertical = document.getElementById('calendarVertical');
    calendarVertical.innerHTML = '';
    
    // Get current month days
    const lastDate = new Date(currentYear, currentMonth + 1, 0).getDate();
    const today = new Date();
    
    // Create week headers
    const weekHeader = document.createElement('div');
    weekHeader.className = 'grid grid-cols-7 bg-teal-600 text-white rounded-t-md overflow-hidden';
    weekHeader.innerHTML = `
        <div class="text-center text-xs py-1 font-medium">S</div>
        <div class="text-center text-xs py-1 font-medium">M</div>
        <div class="text-center text-xs py-1 font-medium">T</div>
        <div class="text-center text-xs py-1 font-medium">W</div>
        <div class="text-center text-xs py-1 font-medium">T</div>
        <div class="text-center text-xs py-1 font-medium">F</div>
        <div class="text-center text-xs py-1 font-medium">S</div>
    `;
    calendarVertical.appendChild(weekHeader);
    
    // Create days for the current month in vertical layout
    for (let i = 1; i <= lastDate; i++) {
        const dateStr = formatDate(currentYear, currentMonth, i);
        const isToday = i === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear();
        const isSelected = dateStr === selectedDate;
        
        // Get appointment data for this date
        const appointmentsForDate = existingAppointments.filter(a => a.date === dateStr);
        let totalSlots = 0;
        let totalTaken = 0;
        
        appointmentsForDate.forEach(appointment => {
            totalSlots += appointment.max_slots;
            totalTaken += appointment.slots_taken;
        });
        
        // Determine cell color based on availability
        let cellClass = 'bg-teal-100'; // Default: no slots
        let statusText = 'No slots';
        let textClass = 'text-teal-700';
        let progressBarClass = '';
        
        if (totalSlots > 0) {
            const utilization = (totalTaken / totalSlots) * 100;
            if (utilization >= 100) {
                cellClass = 'bg-teal-800';
                textClass = 'text-white';
                statusText = 'Fully booked';
                progressBarClass = 'bg-white';
            } else if (utilization >= 70) {
                cellClass = 'bg-teal-600';
                textClass = 'text-white';
                statusText = 'Limited slots';
                progressBarClass = 'bg-white';
            } else if (utilization > 0) {
                cellClass = 'bg-teal-300';
                textClass = 'text-teal-800';
                statusText = 'Partially booked';
                progressBarClass = 'bg-teal-600';
            } else {
                cellClass = 'bg-teal-500';
                textClass = 'text-white';
                statusText = 'Available';
                progressBarClass = 'bg-white';
            }
        }
        
        // Apply border styling based on if it's today, selected, or regular day
        let borderClass = 'border border-teal-200';
        if (isToday && isSelected) {
            borderClass = 'border-2 border-teal-600 ring-2 ring-teal-300';
        } else if (isToday) {
            borderClass = 'border-2 border-teal-600';
        } else if (isSelected) {
            borderClass = 'border-2 border-teal-500 ring-1 ring-teal-300';
        }
        
        // Create the day of week indicator
        const dayOfWeek = new Date(currentYear, currentMonth, i).getDay();
        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        
        // Create vertical day item
        const dayItem = document.createElement('div');
        dayItem.className = `${borderClass} ${cellClass} rounded-md mb-2 overflow-hidden cursor-pointer hover:opacity-90 transition-opacity`;
        dayItem.setAttribute('data-date', dateStr);
        
        // Add "TODAY" label for today's date
        const todayLabel = isToday ? `<span class="ml-2 text-xs px-1.5 py-0.5 rounded bg-white bg-opacity-30 ${textClass} font-bold">TODAY</span>` : '';
        
        // Add "SELECTED" label if this date is selected and not today
        const selectedLabel = isSelected && !isToday ? `<span class="ml-2 text-xs px-1.5 py-0.5 rounded bg-white bg-opacity-50 ${textClass} font-bold">SELECTED</span>` : '';
        
        // Calculate utilization percentage for progress bar
        const utilizationPercentage = totalSlots > 0 ? (totalTaken / totalSlots) * 100 : 0;
        
        dayItem.innerHTML = `
            <div class="flex items-center justify-between p-2 border-b border-teal-200 bg-teal-700 bg-opacity-10">
                <div class="flex items-center">
                    <span class="font-bold ${textClass}">${i}</span>
                    ${todayLabel}
                    ${selectedLabel}
                </div>
                <span class="text-xs ${textClass}">${dayNames[dayOfWeek]}</span>
            </div>
            <div class="p-2">
                <div class="flex justify-between items-center mb-1">
                    <span class="text-xs font-medium ${textClass}">${statusText}</span>
                    ${totalSlots > 0 ? `<span class="text-xs ${textClass}">${totalSlots - totalTaken}/${totalSlots} slots</span>` : ''}
                </div>
                ${totalSlots > 0 ? `
                <div class="w-full bg-teal-200 bg-opacity-30 rounded-full h-1.5 mb-1">
                    <div class="h-1.5 rounded-full ${progressBarClass}" style="width: ${utilizationPercentage}%"></div>
                </div>
                ` : ''}
                ${appointmentsForDate.length > 0 ? `
                <div class="text-xs ${textClass} mt-1">
                    ${appointmentsForDate.length} time slot${appointmentsForDate.length > 1 ? 's' : ''}
                </div>
                ` : ''}
            </div>
        `;
        
        // Add click event to filter table by this date
        dayItem.addEventListener('click', function() {
            // Set the date filter input value
            document.getElementById('dateFilter').value = dateStr;
            
            // Update the global selectedDate variable
            selectedDate = dateStr;
            
            // Filter the table by this date
            filterBySpecificDate(dateStr);
        });
        
        calendarVertical.appendChild(dayItem);
    }
}

// Calendar navigation functions
function prevMonth() {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    renderCalendar();
}

function nextMonth() {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    renderCalendar();
}

function goToToday() {
    const today = new Date();
    currentMonth = today.getMonth();
    currentYear = today.getFullYear();
    
    // Set selected date to today
    selectedDate = formatDate(currentYear, currentMonth, today.getDate());
    renderCalendar();
    
    // Also filter the table to show today's appointments
    filterByPeriod('today');
}

// Add Modal Functions
function openAddModal() {
    // Reset form values
    document.getElementById('date').value = "{{ now()->format('Y-m-d') }}";
    document.getElementById('time_slot').selectedIndex = 0;
    document.getElementById('max_slots').value = 1;
    
    // Update available time slots
    updateAvailableTimeSlots();
    
    // Show modal
    document.getElementById('addModal').classList.remove('hidden');
    document.getElementById('addModal').classList.add('flex');
    
    // Prevent background scrolling
    document.body.style.overflow = 'hidden';
}

function closeAddModal() {
    // Hide modal
    document.getElementById('addModal').classList.add('hidden');
    document.getElementById('addModal').classList.remove('flex');
    
    // Re-enable background scrolling
    document.body.style.overflow = 'auto';
}

// Edit Modal Functions
function openEditModal(id, date, timeSlot, maxSlots) {
    // Set current edit ID
    currentEditId = id;
    
    // Set form action
    document.getElementById('editForm').action = `/admin/appointments/${id}`;
    
    // Set form values
    document.getElementById('edit_date').value = date;
    document.getElementById('edit_date').setAttribute('data-original-date', date);
    const timeSlotSelect = document.getElementById('edit_time_slot');
    timeSlotSelect.setAttribute('data-original', timeSlot);
    
    // Find and select the matching time slot option
    for (let i = 0; i < timeSlotSelect.options.length; i++) {
        if (timeSlotSelect.options[i].value === timeSlot) {
            timeSlotSelect.selectedIndex = i;
            break;
        }
    }
    document.getElementById('edit_max_slots').value = maxSlots;
    
    // Update available time slots
    updateEditTimeSlots();
    
    // Show modal
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
    
    // Prevent background scrolling
    document.body.style.overflow = 'hidden';
}

function closeEditModal() {
    // Hide modal
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
    
    // Reset current edit ID
    currentEditId = null;
    
    // Re-enable background scrolling
    document.body.style.overflow = 'auto';
}

// Delete Modal Functions with validation for slots taken
function openDeleteModal(id) {
    // Check if this appointment has any slots taken
    const appointment = existingAppointments.find(a => a.id === id);
    
    if (appointment && appointment.slots_taken > 0) {
        // Show error message instead of opening delete modal
        const errorMessage = document.createElement('div');
        errorMessage.className = 'fixed inset-0 flex items-center justify-center z-50';
        errorMessage.innerHTML = `
            <div class="fixed inset-0 bg-black opacity-50"></div>
            <div class="bg-white rounded-lg p-6 max-w-md mx-auto relative z-10">
                <div class="text-red-600 text-xl font-bold mb-4">Cannot Delete Appointment</div>
                <p class="mb-4">This appointment has ${appointment.slots_taken} slot(s) already booked. You cannot delete appointments with active bookings.</p>
                <div class="flex justify-end">
                    <button onclick="this.parentNode.parentNode.parentNode.remove()" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Close</button>
                </div>
            </div>
        `;
        document.body.appendChild(errorMessage);
        return;
    }
    
    // If no slots taken, proceed with normal delete flow
    document.getElementById('deleteForm').action = `/admin/appointments/${id}`;
    
    // Show modal
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');
    
    // Prevent background scrolling
    document.body.style.overflow = 'hidden';
}

function closeDeleteModal() {
    // Hide modal
    document.getElementById('deleteModal').classList.add('hidden');
    document.getElementById('deleteModal').classList.remove('flex');
    
    // Re-enable background scrolling
    document.body.style.overflow = 'auto';
}

// Function to update delete buttons based on booking status
function updateDeleteButtons() {
    const deleteButtons = document.querySelectorAll('[data-delete-id]');
    
    deleteButtons.forEach(button => {
        const appointmentId = parseInt(button.getAttribute('data-delete-id'));
        const appointment = existingAppointments.find(a => a.id === appointmentId);
        
        if (appointment && appointment.slots_taken > 0) {
            button.classList.add('opacity-50', 'cursor-not-allowed');
            button.setAttribute('title', 'Cannot delete: This appointment has active bookings');
            
            // Replace onclick with a warning message
            button.setAttribute('onclick', 'showDeleteWarning(event)');
        }
    });
}

// Function to show a warning when clicking disabled delete buttons
function showDeleteWarning(event) {
    event.preventDefault();
    event.stopPropagation();
    
    const button = event.currentTarget;
    const appointmentId = parseInt(button.getAttribute('data-delete-id'));
    const appointment = existingAppointments.find(a => a.id === appointmentId);
    
    alert(`Cannot delete: This appointment has ${appointment.slots_taken} active booking(s).`);
}

// Initialize the page
document.addEventListener('DOMContentLoaded', function() {
    // Set up search functionality
    const searchInput = document.getElementById('appointmentSearch');
    searchInput.addEventListener('input', searchAppointments);
    
    // Set up calendar navigation
    document.getElementById('prevMonth').addEventListener('click', prevMonth);
    document.getElementById('nextMonth').addEventListener('click', nextMonth);
    document.getElementById('todayBtn').addEventListener('click', goToToday);
    
    // Render the enhanced teal-themed calendar
    renderCalendar();
    
    // Sort table by date (newest first) by default
    sortTable(0, 'desc', true);
    
    // Set up filter button styling and filter to today by default
    updateFilterButtonStyles('today');
    filterByPeriod('today');
    
    // Check URL parameters for date filter
    const urlParams = new URLSearchParams(window.location.search);
    const dateParam = urlParams.get('date');
    if (dateParam) {
        document.getElementById('dateFilter').value = dateParam;
        filterBySpecificDate(dateParam);
    }
    
    // Update delete buttons based on booking status
    updateDeleteButtons();
});
</script>
<style>
.pagination-container nav {
    @apply flex justify-center mt-4;
}

.pagination-container nav div:first-child,
.pagination-container nav div:last-child {
    @apply hidden;
}

.pagination-container nav span,
.pagination-container nav a {
    @apply px-3 py-1 mx-1 text-sm rounded-md border;
}

.pagination-container nav span.text-gray-500 {
    @apply text-teal-300 border-teal-200 bg-teal-50;
}

.pagination-container nav span:not(.text-gray-500) {
    @apply bg-teal-600 text-white border-teal-600 font-medium;
}

.pagination-container nav a {
    @apply text-teal-600 border-teal-200 bg-white hover:bg-teal-50 transition-colors;
}

#calendarGrid > div:hover,
#calendarVertical > div:not(:first-child):hover {
    @apply shadow-md;
    transform: translateY(-1px);
    transition: all 0.2s ease;
}

#calendarGrid > div.border-teal-600,
#calendarVertical > div.border-teal-600 {
    animation: pulse-border 2s infinite;
}

@keyframes pulse-border {
    0% {
        box-shadow: 0 0 0 0 rgba(13, 148, 136, 0.4);
    }
    70% {
        box-shadow: 0 0 0 6px rgba(13, 148, 136, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(13, 148, 136, 0);
    }
}

@media (max-width: 640px) {
    #appointmentsTable th, #appointmentsTable td {
        @apply px-2 py-2 text-xs;
    }
    
    #appointmentsTable th:nth-child(5),
    #appointmentsTable td:nth-child(5) {
        @apply hidden;
    }
}
</style>
</x-sidebar-layout>