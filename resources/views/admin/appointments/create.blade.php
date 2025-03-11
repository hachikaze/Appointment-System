<x-sidebar-layout>
<!-- Header Section -->
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
          <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Appointment Management</h1>
          <p class="text-teal-100">Create and manage available appointment slots</p>
        </div>
      </div>
      <div class="mt-4 sm:mt-0 flex space-x-3">
        <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-teal-600 bg-opacity-20 text-white shadow-sm">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          Appointment Scheduler
        </span>
      </div>
    </div>
  </div>
  <div class="bg-teal-50 px-6 py-3 border-t border-teal-900">
    <div class="flex items-center text-sm text-teal-700">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <span>Create available time slots for patient appointments. Manage existing slots from this dashboard.</span>
    </div>
  </div>
</div>

<!-- Alert Messages -->
@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-md shadow-sm animate-fadeIn" role="alert">
  <div class="flex">
    <div class="flex-shrink-0">
      <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </div>
    <div class="ml-3">
      <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
    </div>
  </div>
</div>
@endif

@if(session('error'))
<div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-md shadow-sm animate-fadeIn" role="alert">
  <div class="flex">
    <div class="flex-shrink-0">
      <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
      </svg>
    </div>
    <div class="ml-3">
      <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
    </div>
  </div>
</div>
@endif

<!-- Stats Cards -->
<div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-6">
  <!-- Available Slots Card -->
  <div class="bg-gradient-to-br from-teal-50 to-white p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
    <div class="flex justify-between items-start">
      <div>
        <p class="text-gray-600 text-sm font-medium uppercase tracking-wider">Available Slots</p>
        <p class="text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">
          {{ isset($availableAppointments) ? $availableAppointments->sum('available_slots') : 0 }}
        </p>
      </div>
      <div class="bg-teal-100 p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
      </div>
    </div>
    <div class="mt-3 pt-3 border-t border-gray-100">
      <p class="text-xs text-gray-500 flex items-center">
        <svg class="h-4 w-4 mr-1 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
        </svg>
        Total available appointment slots
      </p>
    </div>
  </div>
  
  <!-- Total Time Slots Card -->
  <div class="bg-gradient-to-br from-teal-50 to-white p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
    <div class="flex justify-between items-start">
      <div>
        <p class="text-gray-600 text-sm font-medium uppercase tracking-wider">Total Time Slots</p>
        <p class="text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">
          {{ isset($availableAppointments) ? $availableAppointments->count() : 0 }}
        </p>
      </div>
      <div class="bg-teal-100 p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
    </div>
    <div class="mt-3 pt-3 border-t border-gray-100">
      <p class="text-xs text-gray-500 flex items-center">
        <svg class="h-4 w-4 mr-1 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Total configured time slots
      </p>
    </div>
  </div>
  
  <!-- Fully Booked Card -->
  <div class="bg-gradient-to-br from-teal-50 to-white p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
    <div class="flex justify-between items-start">
      <div>
        <p class="text-gray-600 text-sm font-medium uppercase tracking-wider">Fully Booked</p>
        <p class="text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">
          {{ isset($availableAppointments) ? $availableAppointments->filter(function($item) { return $item->available_slots <= 0; })->count() : 0 }}
        </p>
      </div>
      <div class="bg-teal-100 p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
    </div>
    <div class="mt-3 pt-3 border-t border-gray-100">
      <p class="text-xs text-gray-500 flex items-center">
        <svg class="h-4 w-4 mr-1 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        Time slots with no availability
      </p>
    </div>
  </div>
</div>

<!-- Calendar View -->
<div class="mb-6 bg-white rounded-lg shadow-md border border-teal-100 overflow-hidden">
  <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
      <h2 class="text-xl font-semibold text-white flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        Calendar View
      </h2>
      <button id="openAddModalBtn" class="mt-3 sm:mt-0 inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm hover:bg-teal-50 transition-colors transform hover:scale-105 duration-200">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Add Slot
      </button>
    </div>
  </div>
  
  <!-- Calendar Legend -->
  <div class="p-4 bg-teal-50 border-b border-teal-100">
    <div class="flex flex-wrap gap-3 justify-center">
      <div class="flex items-center">
        <div class="w-4 h-4 bg-teal-500 rounded-sm mr-2"></div>
        <span class="text-xs text-gray-700">Today</span>
      </div>
      <div class="flex items-center">
        <div class="w-4 h-4 bg-teal-400 rounded-sm mr-2"></div>
        <span class="text-xs text-gray-700">Available Slots</span>
      </div>
      <div class="flex items-center">
        <div class="w-4 h-4 bg-yellow-200 rounded-sm mr-2"></div>
        <span class="text-xs text-gray-700">Limited Slots</span>
        </div>
      <div class="flex items-center">
        <div class="w-4 h-4 bg-red-200 rounded-sm mr-2"></div>
        <span class="text-xs text-gray-700">Fully Booked</span>
      </div>
      <div class="flex items-center">
        <div class="w-4 h-4 bg-gray-200 rounded-sm mr-2"></div>
        <span class="text-xs text-gray-700">Past Date</span>
      </div>
      <div class="flex items-center">
        <div class="w-4 h-4 bg-teal-100 border border-teal-200 rounded-sm mr-2"></div>
        <span class="text-xs text-gray-700">No Slots</span>
      </div>
    </div>
  </div>
  
  <!-- Calendar Navigation and Grid -->
  <div class="p-4">
    <div class="bg-white rounded-lg border border-teal-200 shadow-sm overflow-hidden">
      <!-- Calendar Header with Navigation -->
      <div class="flex justify-between items-center bg-teal-600 text-white p-3">
        <button id="prevMonth" class="p-1 rounded-full hover:bg-teal-500 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>
        <h3 id="currentMonthDisplay" class="text-lg font-medium">{{ \Carbon\Carbon::now('Asia/Manila')->format('F Y') }}</h3>
        <button id="nextMonth" class="p-1 rounded-full hover:bg-teal-500 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>
      </div>
      
      <!-- Calendar Days of Week Header -->
      <div class="hidden md:grid grid-cols-7 gap-1 p-2 bg-teal-50">
        <div class="text-center text-xs font-medium text-teal-700">Sun</div>
        <div class="text-center text-xs font-medium text-teal-700">Mon</div>
        <div class="text-center text-xs font-medium text-teal-700">Tue</div>
        <div class="text-center text-xs font-medium text-teal-700">Wed</div>
        <div class="text-center text-xs font-medium text-teal-700">Thu</div>
        <div class="text-center text-xs font-medium text-teal-700">Fri</div>
        <div class="text-center text-xs font-medium text-teal-700">Sat</div>
      </div>
      
      <!-- Calendar Grid for Desktop -->
      <div id="calendarGrid" class="hidden md:grid grid-cols-7 gap-1 p-2">
        <!-- Calendar days will be dynamically inserted here -->
      </div>
      
      <!-- Calendar List for Mobile/Tablet -->
      <div id="calendarList" class="md:hidden">
        <!-- Calendar days will be dynamically inserted here as a list -->
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
  <!-- Available Appointments Table -->
  <div class="lg:col-span-1">
    <div class="bg-white rounded-lg shadow-md border border-teal-100 overflow-hidden">
      <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
          <h2 class="text-xl font-semibold text-white flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            Available Appointment Slots
          </h2>
          <div class="mt-3 sm:mt-0 flex items-center">
            <div class="relative inline-block text-left mr-3">
              <select id="timePeriodFilter" class="bg-white border border-teal-200 text-teal-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-40 p-2.5 appearance-none">
                <option value="today" selected>This Day</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
                <option value="all">All Time</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Date Filter -->
      <div class="p-4 bg-teal-50 border-b border-teal-100">
        <form method="GET" action="{{ route('admin.appointments.create') }}" class="flex flex-wrap gap-2">
          <div class="relative flex-grow max-w-xs">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
            </div>
            <input type="date" name="filter_date" id="filterDate" class="pl-10 p-2.5 border border-teal-200 rounded-lg focus:ring-teal-500 focus:border-teal-500 w-full"
              value="{{ request('filter_date', '') }}">
          </div>
          <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-medium rounded-lg text-sm px-4 py-2.5 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
            </svg>
            Filter
          </button>
          <a href="{{ route('admin.appointments.create') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg text-sm px-4 py-2.5 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            Reset
          </a>
        </form>
      </div>
      
      <!-- Table Content -->
      <div id="appointmentTableContent">
        @if(isset($availableAppointments) && count($availableAppointments) > 0)
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-teal-100">
            <thead class="bg-teal-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider">Date</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider">Time Slot</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider">Max Slots</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider">Available</th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-teal-700 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-teal-50" id="appointmentTableBody">
              @foreach($availableAppointments as $appointment)
              <tr class="{{ $appointment->is_completed ? 'bg-gray-50' : 'hover:bg-teal-50' }} transition-colors appointment-row" 
                  data-date="{{ \Carbon\Carbon::parse($appointment->date)->format('Y-m-d') }}">
                <!-- Date column -->
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 bg-teal-100 text-teal-700 rounded-full flex items-center justify-center">
                      <span class="font-bold">{{ \Carbon\Carbon::parse($appointment->date)->format('d') }}</span>
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-teal-900">
                        {{ \Carbon\Carbon::parse($appointment->date)->format('M d, Y') }}
                      </div>
                      <div class="text-xs text-teal-500">
                        {{ \Carbon\Carbon::parse($appointment->date)->format('l') }}
                        @if($appointment->is_past_date)
                        <span class="ml-1 text-red-500">(Past)</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </td>
                <!-- Time slot column -->
                <td class="px-6 py-4 whitespace-nowrap">
                  <!-- <div class="text-sm text-teal-900">
                    @php
                    $timeSlot = $appointment->time_slot;
                    $times = explode(' - ', $timeSlot);
                    if (count($times) == 2) {
                      $times = explode(' - ', $timeSlot);
                      $startTime = explode(':', $times[0])[0];
                      $endTime = explode(':', $times[1])[0];
                      $startHour = (int)$startTime;
                      $endHour = (int)$endTime;
                      $startFormat = $startHour < 12 ? 'AM' : 'PM';
                      $endFormat = $endHour < 12 ? 'AM' : 'PM';
                      $startHour12 = $startHour > 12 ? $startHour - 12 : ($startHour == 0 ? 12 : $startHour);
                      $endHour12 = $endHour > 12 ? $endHour - 12 : ($endHour == 0 ? 12 : $endHour);
                      $timeSlot12h = sprintf('%d:00 %s - %d:00 %s', $startHour12, $startFormat, $endHour12, $endFormat);
                      echo $timeSlot12h;
                    } else {
                      echo $timeSlot;
                    }
                    @endphp
                  </div> -->

                  <div class="text-sm text-teal-900">
                    @php
                      $timeSlot = $appointment->time_slot;
                      $times = explode(' - ', $timeSlot);
                      if (count($times) == 2) {
                        // Check if the start time already contains "AM" or "PM"
                        if (stripos($times[0], 'AM') !== false || stripos($times[0], 'PM') !== false) {
                          // The stored times are in 12-hour format already.
                          $startParts = explode(':', $times[0]);
                          $startHour = (int) trim($startParts[0]);
                          $startMinuteFormat = trim($startParts[1]); // e.g. "00 PM"
                          $startFormat = strtoupper(trim(substr($startMinuteFormat, 2))); // extract "PM"
                          
                          $endParts = explode(':', $times[1]);
                          $endHour = (int) trim($endParts[0]);
                          $endMinuteFormat = trim($endParts[1]); // e.g. "00 PM"
                          $endFormat = strtoupper(trim(substr($endMinuteFormat, 2))); // extract "PM"
                          
                          // In 12-hour format, keep the hour as is.
                          $startHour12 = $startHour;
                          $endHour12 = $endHour;
                        } else {
                          // Otherwise assume the times are in 24-hour (military) format and convert.
                          $startTime = explode(':', trim($times[0]))[0];
                          $endTime = explode(':', trim($times[1]))[0];
                          $startHour = (int)$startTime;
                          $endHour = (int)$endTime;
                          $startFormat = $startHour < 12 ? 'AM' : 'PM';
                          $endFormat = $endHour < 12 ? 'AM' : 'PM';
                          $startHour12 = $startHour > 12 ? $startHour - 12 : ($startHour == 0 ? 12 : $startHour);
                          $endHour12 = $endHour > 12 ? $endHour - 12 : ($endHour == 0 ? 12 : $endHour);
                        }
                        $timeSlot12h = sprintf('%d:00 %s - %d:00 %s', $startHour12, $startFormat, $endHour12, $endFormat);
                        echo $timeSlot12h;
                      } else {
                        echo $timeSlot;
                      }
                    @endphp
                  </div>

                  <div class="text-xs text-teal-500">
                    @if($appointment->is_past_time && !$appointment->is_past_date)
                    <span class="text-red-500">(Past)</span>
                    @endif
                  </div>
                </td>
                <!-- Max slots column -->
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-teal-900 font-medium">{{ $appointment->max_slots }}</div>
                  <div class="text-xs text-teal-500">Maximum capacity</div>
                </td>
                <!-- Available slots column -->
                <td class="px-6 py-4 whitespace-nowrap">
                  @if($appointment->is_completed)
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                    Completed
                  </span>
                  @elseif($appointment->available_slots <= 0)
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Fully Booked
                  </span>
                  @else
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-100 text-teal-800">
                    {{ $appointment->available_slots }} Available
                  </span>
                  @endif
                  <div class="mt-1 w-full bg-gray-200 rounded-full h-1.5">
                    <div class="h-1.5 rounded-full {{ $appointment->available_slots <= 0 ? 'bg-red-200' : ($appointment->available_slots < $appointment->max_slots / 2 ? 'bg-yellow-200' : 'bg-teal-400') }}"
                      style="width: {{ (($appointment->max_slots - $appointment->available_slots) / $appointment->max_slots) * 100 }}%"></div>
                  </div>
                </td>
                <!-- Actions column -->
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <div class="flex items-center justify-end space-x-2">
                    @if($appointment->is_completed)
                    <!-- Completed status -->
                    <span class="text-gray-500 text-xs">Completed</span>
                    @if(!$appointment->has_active_bookings)
                    <!-- Delete button for completed slots with no bookings -->
                    <form method="POST" action="{{ route('admin.appointments.delete', $appointment->id) }}"
                      onsubmit="return confirm('Are you sure you want to delete this completed slot?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 p-1.5 rounded-md border border-red-200 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                      </button>
                    </form>
                    @endif
                    @else
                    <!-- Actions for future slots -->
                    @if($appointment->has_active_bookings)
                    <!-- Disabled edit button with tooltip -->
                    <span class="relative group">
                      <button type="button" class="text-gray-400 cursor-not-allowed bg-gray-50 p-1.5 rounded-md border border-gray-200" disabled>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                      </button>
                      <span class="absolute bottom-full right-0 mb-2 w-48 px-2 py-1 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-normal z-10">
                        Cannot edit: Has active or completed bookings
                      </span>
                    </span>
                    @else
                    <!-- Active edit button -->
                    <button type="button" class="text-teal-600 hover:text-teal-900 bg-teal-50 p-1.5 rounded-md border border-teal-200 transition-colors"
                      onclick="openEditModal({{ $appointment->id }}, '{{ $appointment->date }}', '{{ $appointment->time_slot }}', {{ $appointment->max_slots }})">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                      </svg>
                    </button>
                    @endif
                    @if($appointment->has_active_bookings)
                    <!-- Disabled delete button with tooltip -->
                    <span class="relative group">
                      <button type="button" class="text-gray-400 cursor-not-allowed bg-gray-50 p-1.5 rounded-md border border-gray-200" disabled>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                      </button>
                      <span class="absolute bottom-full right-0 mb-2 w-48 px-2 py-1 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-normal z-10">
                        Cannot delete: Has active or completed bookings
                      </span>
                    </span>
                    @else
                    <!-- Active delete button -->
                    <form method="POST" action="{{ route('admin.appointments.delete', $appointment->id) }}"
                      onsubmit="return confirm('Are you sure you want to delete this slot?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 p-1.5 rounded-md border border-red-200 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                      </button>
                    </form>
                    @endif
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @else
        <div class="p-8 text-center">
          <svg class="mx-auto h-12 w-12 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <h3 class="mt-2 text-sm font-medium text-teal-900">No appointment slots found</h3>
          <p class="mt-1 text-sm text-teal-600">Get started by creating a new appointment slot.</p>
        </div>
        @endif
      </div>
      
      <!-- No Results Template (Hidden by default) -->
      <div id="noResultsTemplate" class="hidden p-8 text-center">
        <svg class="mx-auto h-12 w-12 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-teal-900">No appointments found for this date</h3>
        <p class="mt-1 text-sm text-teal-600">Try selecting a different date or create a new appointment slot.</p>
      </div>
    </div>
  </div>
</div>

<!-- Add Appointment Modal -->
<div id="addAppointmentModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
  <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 transform transition-all animate-modal-fade-in">
    <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 rounded-t-lg">
      <div class="flex justify-between items-center">
        <h3 class="text-xl font-semibold text-white flex items-center">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          Add Available Appointment
        </h3>
        <button type="button" class="text-white hover:text-teal-100" onclick="closeAddModal()">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </div>
    <form method="POST" action="{{ route('admin.appointments.store') }}" class="p-6">
      @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2">Date</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
          </div>
          <input type="date" name="date" id="addDate" class="w-full pl-10 p-2.5 border border-teal-200 rounded-lg focus:ring-teal-500 focus:border-teal-500"
            value="{{ \Carbon\Carbon::now('Asia/Manila')->format('Y-m-d') }}"
            min="{{ \Carbon\Carbon::now('Asia/Manila')->format('Y-m-d') }}">
        </div>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2">Time Slot</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <select name="time_slot" id="addTimeSlot" class="w-full pl-10 p-2.5 border border-teal-200 rounded-lg focus:ring-teal-500 focus:border-teal-500 appearance-none" required>
            <option value="">Select a time slot</option>
            @foreach (range(8, 17) as $hour)
              @php
                $startHour = $hour;
                $endHour = $hour + 1;
                $startFormat = $startHour < 12 ? 'AM' : 'PM';
                $endFormat = $endHour < 12 ? 'AM' : 'PM';
                $startHour12 = $startHour > 12 ? $startHour - 12 : ($startHour == 0 ? 12 : $startHour);
                $endHour12 = $endHour > 12 ? $endHour - 12 : ($endHour == 0 ? 12 : $endHour);
                $timeSlot24h = sprintf('%02d:00 - %02d:00', $startHour, $endHour);
                $timeSlot12h = sprintf('%d:00 %s - %d:00 %s', $startHour12, $startFormat, $endHour12, $endFormat);
              @endphp
              <option value="{{ $timeSlot12h }}">{{ $timeSlot12h }}</option>
            @endforeach
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </div>
        </div>
        <p class="text-xs text-teal-600 mt-1 flex items-center">
          <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          Time slots already selected for this date will be disabled
        </p>
      </div>
      <div class="mb-5">
        <label class="block text-gray-700 text-sm font-medium mb-2">Max Slots</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
          </div>
          <select name="max_slots" class="w-full pl-10 p-2.5 border border-teal-200 rounded-lg focus:ring-teal-500 focus:border-teal-500 appearance-none" required>
            <option value="1">1 Patient</option>
            <option value="2" selected>2 Patients</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-end space-x-4 pt-4 border-t border-teal-100">
        <button type="button" class="text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-teal-200 rounded-lg border border-teal-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 flex items-center" onclick="closeAddModal()">
          <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
          Cancel
        </button>
        <button type="submit" class="text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center transform hover:scale-105 transition-transform duration-200">
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          Add Appointment Slot
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
  <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 transform transition-all animate-modal-fade-in">
    <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 rounded-t-lg">
      <div class="flex justify-between items-center">
        <h3 class="text-xl font-semibold text-white flex items-center">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
          </svg>
          Edit Appointment Slot
        </h3>
        <button type="button" class="text-white hover:text-teal-100" onclick="closeEditModal()">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </div>
    <form id="editForm" method="POST" action="" class="p-6">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2">Date</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
          </div>
          <input type="date" name="date" id="editDate" class="w-full pl-10 p-2.5 border border-teal-200 rounded-lg focus:ring-teal-500 focus:border-teal-500"
            min="{{ \Carbon\Carbon::now('Asia/Manila')->format('Y-m-d') }}">
        </div>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2">Time Slot</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <select name="time_slot" id="editTimeSlot" class="w-full pl-10 p-2.5 border border-teal-200 rounded-lg focus:ring-teal-500 focus:border-teal-500 appearance-none" required>
            <option value="">Select a time slot</option>
            @foreach (range(8, 17) as $hour)
              @php
                $startHour = $hour;
                $endHour = $hour + 1;
                $startFormat = $startHour < 12 ? 'AM' : 'PM';
                $endFormat = $endHour < 12 ? 'AM' : 'PM';
                $startHour12 = $startHour > 12 ? $startHour - 12 : ($startHour == 0 ? 12 : $startHour);
                $endHour12 = $endHour > 12 ? $endHour - 12 : ($endHour == 0 ? 12 : $endHour);
                $timeSlot24h = sprintf('%02d:00 - %02d:00', $startHour, $endHour);
                $timeSlot12h = sprintf('%d:00 %s - %d:00 %s', $startHour12, $startFormat, $endHour12, $endFormat);
              @endphp
              <option value="{{ $timeSlot12h }}">{{ $timeSlot12h }}</option>
            @endforeach
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </div>
        </div>
      </div>
      <div class="mb-5">
        <label class="block text-gray-700 text-sm font-medium mb-2">Max Slots</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
          </div>
          <select name="max_slots" id="editMaxSlots" class="w-full pl-10 p-2.5 border border-teal-200 rounded-lg focus:ring-teal-500 focus:border-teal-500 appearance-none" required>
            <option value="1">1 Patient</option>
            <option value="2">2 Patients</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-end space-x-4 pt-4 border-t border-teal-100">
        <button type="button" class="text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-teal-200 rounded-lg border border-teal-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 flex items-center" onclick="closeEditModal()">
          <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
          Cancel
        </button>
        <button type="submit" class="text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center transform hover:scale-105 transition-transform duration-200">
          <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          Update Slot
        </button>
      </div>
    </form>
  </div>
</div>

<style>
select option:disabled {
  color: #999;
  background-color: #f3f4f6;
}

@keyframes modalFadeIn {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
}
.animate-modal-fade-in {
  animation: modalFadeIn 0.2s ease-out forwards;
}
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
.animate-fadeIn {
  animation: fadeIn 0.3s ease-out forwards;
}
.calendar-day {
  transition: all 0.2s ease-in-out;
  height: 100px; /* Increased height */
}
.calendar-day:hover {
  transform: scale(1.05);
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  z-index: 10;
}
</style>

<script>
// Initialize appointment data from server
const existingAppointments = [
@foreach($availableAppointments as $appointment)
{
    id: {{ $appointment->id }},
    date: "{{ $appointment->date }}",
    timeSlot: "{{ $appointment->time_slot }}",
    isCompleted: {{ $appointment->is_completed ? 'true' : 'false' }},
    maxSlots: {{ $appointment->max_slots }},
    availableSlots: {{ $appointment->available_slots }}
},
@endforeach
];

// Track calendar state
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let selectedDate = null;

// Generate calendar UI for current month
function generateCalendar() {
    const calendarGrid = document.getElementById('calendarGrid');
    const calendarList = document.getElementById('calendarList');
    const monthDisplay = document.getElementById('currentMonthDisplay');
    
    // Clear previous calendar views
    calendarGrid.innerHTML = '';
    calendarList.innerHTML = '';
    
    // Update month/year display
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    monthDisplay.textContent = `${monthNames[currentMonth]} ${currentYear}`;
    
    // Calculate calendar parameters
    const firstDay = new Date(currentYear, currentMonth, 1).getDay();
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    
    // Get today's date for highlighting
    const today = new Date();
    const todayDate = today.getDate();
    const todayMonth = today.getMonth();
    const todayYear = today.getFullYear();
    
    // Add empty cells for days before first day of month
    for (let i = 0; i < firstDay; i++) {
        const emptyCell = document.createElement('div');
        emptyCell.className = 'h-24 border border-teal-200 bg-teal-50 opacity-50';
        calendarGrid.appendChild(emptyCell);
    }
    
    // Create cells for each day of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(currentYear, currentMonth, day);
        const dateString = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const isPast = date < new Date(todayYear, todayMonth, todayDate);
        
        // Count appointments for this day
        const dayAppointments = existingAppointments.filter(a => a.date.substring(0, 10) === dateString);
        const totalSlots = dayAppointments.reduce((sum, a) => sum + a.maxSlots, 0);
        const availableSlots = dayAppointments.reduce((sum, a) => sum + a.availableSlots, 0);
        const hasAppointments = dayAppointments.length > 0;
        
        // Determine cell styling based on date status
        let bgColor = 'bg-teal-100';
        let textColor = 'text-teal-800';
        let borderColor = 'border-teal-400';
        
        if (day === todayDate && currentMonth === todayMonth && currentYear === todayYear) {
            bgColor = 'bg-teal-500';
            textColor = 'text-white';
            borderColor = 'border-teal-400';
        } else if (isPast) {
            bgColor = 'bg-gray-100';
            textColor = 'text-teal-800';
        } else if (hasAppointments) {
            if (availableSlots === 0) {
                bgColor = 'bg-red-200';
                textColor = 'text-red-800';
                borderColor = 'border-red-300';
            } else if (availableSlots < totalSlots / 2) {
                bgColor = 'bg-yellow-200';
                textColor = 'text-yellow-800';
                borderColor = 'border-yellow-300';
            } else {
                bgColor = 'bg-teal-400';
                textColor = 'text-teal-900';
            }
        }
        
        // Create desktop calendar cell
        const dayCell = document.createElement('div');
        dayCell.className = `calendar-day h-24 ${bgColor} ${borderColor} border-2 rounded-lg flex flex-col justify-between p-2 cursor-pointer ${hasAppointments ? 'hover:shadow-md' : ''}`;
        dayCell.setAttribute('data-date', dateString);
        
        const dayHeader = document.createElement('div');
        dayHeader.className = 'flex justify-between items-start';
        
        const dayNumber = document.createElement('div');
        dayNumber.className = `text-right font-medium ${textColor} text-lg`;
        dayNumber.textContent = day;
        
        // Add "Today" label if applicable
        if (day === todayDate && currentMonth === todayMonth && currentYear === todayYear) {
            const todayLabel = document.createElement('span');
            todayLabel.className = 'text-xs font-bold bg-white bg-opacity-70 text-teal-700 px-1.5 py-0.5 rounded-full';
            todayLabel.textContent = 'Today';
            dayHeader.appendChild(todayLabel);
        }
        
        dayHeader.appendChild(dayNumber);
        dayCell.appendChild(dayHeader);
        
        // Add "Selected" label if this date is selected
        if (dateString === selectedDate) {
            const selectedLabel = document.createElement('div');
            selectedLabel.className = 'text-xs font-bold bg-teal-800 text-white px-2 py-1 rounded-full self-center mt-1';
            selectedLabel.textContent = 'Selected';
            dayCell.appendChild(selectedLabel);
        }
        
        // Add slot availability info
        const slotInfo = document.createElement('div');
        if (hasAppointments) {
            slotInfo.className = 'text-xs font-medium text-teal-800 bg-white bg-opacity-70 rounded px-1.5 py-1 mt-auto';
            slotInfo.textContent = `${availableSlots}/${totalSlots} slots available`;
        }
        dayCell.appendChild(slotInfo);
        calendarGrid.appendChild(dayCell);
        
        // Create mobile calendar row
        const dayRow = document.createElement('div');
        dayRow.className = `calendar-day flex items-center justify-between p-3 ${bgColor} ${borderColor} border-b ${hasAppointments ? 'hover:bg-teal-50' : ''} cursor-pointer`;
        dayRow.setAttribute('data-date', dateString);
        
        const dayInfo = document.createElement('div');
        dayInfo.className = 'flex items-center';
        
        const dayCircle = document.createElement('div');
        dayCircle.className = `w-10 h-10 rounded-full flex items-center justify-center mr-3 ${day === todayDate && currentMonth === todayMonth && currentYear === todayYear ? 'bg-teal-600 text-white' : 'bg-teal-100 text-teal-800'}`;
        dayCircle.textContent = day;
        
        const dayText = document.createElement('div');
        dayText.className = `${textColor}`;
        const dayName = new Date(currentYear, currentMonth, day).toLocaleDateString('en-US', { weekday: 'short' });
        dayText.textContent = `${dayName}, ${monthNames[currentMonth].substring(0, 3)} ${day}`;
        
        // Add "Today" label for mobile view
        if (day === todayDate && currentMonth === todayMonth && currentYear === todayYear) {
            const todayMobileLabel = document.createElement('span');
            todayMobileLabel.className = 'ml-2 text-xs font-bold bg-teal-600 text-white px-1.5 py-0.5 rounded-full';
            todayMobileLabel.textContent = 'Today';
            dayText.appendChild(todayMobileLabel);
        }
        
        // Add "Selected" label for mobile view
        if (dateString === selectedDate) {
            const selectedMobileLabel = document.createElement('span');
            selectedMobileLabel.className = 'ml-2 text-xs font-bold bg-teal-800 text-white px-2 py-0.5 rounded-full';
            selectedMobileLabel.textContent = 'Selected';
            dayText.appendChild(selectedMobileLabel);
        }
        
        dayInfo.appendChild(dayCircle);
        dayInfo.appendChild(dayText);
        
        // Add slot availability badge
        const slotBadge = document.createElement('div');
        if (hasAppointments) {
            slotBadge.className = 'text-xs font-medium bg-teal-100 text-teal-800 rounded-full px-2 py-1';
            slotBadge.textContent = `${availableSlots}/${totalSlots} slots`;
        } else {
            slotBadge.className = 'text-xs font-medium bg-teal-50 text-teal-600 rounded-full px-2 py-1';
            slotBadge.textContent = 'No slots';
        }
        
        dayRow.appendChild(dayInfo);
        dayRow.appendChild(slotBadge);
        calendarList.appendChild(dayRow);
        
        // Add click event to filter table by date
        dayCell.addEventListener('click', () => {
            selectedDate = dateString;
            filterTableByDate(dateString);
            generateCalendar(); // Regenerate to show selected state
        });
        
        dayRow.addEventListener('click', () => {
            selectedDate = dateString;
            filterTableByDate(dateString);
            generateCalendar(); // Regenerate to show selected state
        });
    }
}

// Calendar navigation handlers
document.getElementById('prevMonth').addEventListener('click', () => {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    generateCalendar();
});

document.getElementById('nextMonth').addEventListener('click', () => {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    generateCalendar();
});

// Update available time slots in add appointment form
function updateTimeSlots() {
    const dateInput = document.getElementById('addDate');
    const timeSelect = document.getElementById('addTimeSlot');
    const selectedDate = dateInput.value;
    
    // Reset all options
    for (let i = 0; i < timeSelect.options.length; i++) {
        timeSelect.options[i].disabled = false;
    }
    
    // Disable already booked time slots
    for (const appointment of existingAppointments) {
        if (appointment.date.substring(0, 10) === selectedDate) {
            for (let i = 0; i < timeSelect.options.length; i++) {
                if (timeSelect.options[i].value === appointment.timeSlot) {
                    timeSelect.options[i].disabled = true;
                }
            }
        }
    }
    
    // Disable past time slots for today
    if (selectedDate === "{{ \Carbon\Carbon::now('Asia/Manila')->format('Y-m-d') }}") {
        const currentHour = {{ (int)\Carbon\Carbon::now('Asia/Manila')->format('H') }};
        const currentMinute = {{ (int)\Carbon\Carbon::now('Asia/Manila')->format('i') }};
        
        for (let i = 0; i < timeSelect.options.length; i++) {
            if (timeSelect.options[i].value !== "") {
                const timeSlot = timeSelect.options[i].value;
                const startTime = timeSlot.split(' - ')[0];
                const startHour = parseInt(startTime.split(':')[0]);
                
                if (startHour < currentHour || (startHour === currentHour && currentMinute >= 30)) {
                    timeSelect.options[i].disabled = true;
                }
            }
        }
    }
}

// Update available time slots in edit appointment form
function updateEditTimeSlots() {
    const dateInput = document.getElementById('editDate');
    const timeSelect = document.getElementById('editTimeSlot');
    const selectedDate = dateInput.value;
    const currentId = document.getElementById('editForm').action.split('/').pop();
    
    // Reset all options
    for (let i = 0; i < timeSelect.options.length; i++) {
        timeSelect.options[i].disabled = false;
    }
    
    // Disable already booked time slots (except current appointment)
    for (const appointment of existingAppointments) {
        if (appointment.date.substring(0, 10) === selectedDate && appointment.id != currentId) {
            for (let i = 0; i < timeSelect.options.length; i++) {
                if (timeSelect.options[i].value === appointment.timeSlot) {
                    timeSelect.options[i].disabled = true;
                }
            }
        }
    }
    
    // Disable past time slots for today
    if (selectedDate === "{{ \Carbon\Carbon::now('Asia/Manila')->format('Y-m-d') }}") {
        const currentHour = {{ (int)\Carbon\Carbon::now('Asia/Manila')->format('H') }};
        const currentMinute = {{ (int)\Carbon\Carbon::now('Asia/Manila')->format('i') }};
        
        for (let i = 0; i < timeSelect.options.length; i++) {
            if (timeSelect.options[i].value !== "") {
                const timeSlot = timeSelect.options[i].value;
                const startTime = timeSlot.split(' - ')[0];
                const startHour = parseInt(startTime.split(':')[0]);
                
                if (startHour < currentHour || (startHour === currentHour && currentMinute >= 30)) {
                    timeSelect.options[i].disabled = true;
                }
            }
        }
    }
}

// Filter appointments by time period (today, week, month, all)
function filterAppointmentsByTimePeriod(period) {
    const rows = document.querySelectorAll('.appointment-row');
    const today = "{{ \Carbon\Carbon::now('Asia/Manila')->format('Y-m-d') }}";
    const startOfWeek = "{{ \Carbon\Carbon::now('Asia/Manila')->startOfWeek()->format('Y-m-d') }}";
    const endOfWeek = "{{ \Carbon\Carbon::now('Asia/Manila')->endOfWeek()->format('Y-m-d') }}";
    const startOfMonth = "{{ \Carbon\Carbon::now('Asia/Manila')->startOfMonth()->format('Y-m-d') }}";
    const endOfMonth = "{{ \Carbon\Carbon::now('Asia/Manila')->endOfMonth()->format('Y-m-d') }}";
    
    let visibleCount = 0;
    
    rows.forEach(row => {
        const rowDate = row.getAttribute('data-date');
        let isVisible = false;
        
        if (period === 'today') {
            isVisible = rowDate === today;
        } else if (period === 'week') {
            isVisible = rowDate >= startOfWeek && rowDate <= endOfWeek;
        } else if (period === 'month') {
            isVisible = rowDate >= startOfMonth && rowDate <= endOfMonth;
        } else {
            // 'all' - show everything
            isVisible = true;
        }
        
        row.classList.toggle('hidden', !isVisible);
        if (isVisible) {
            visibleCount++;
        }
    });
    
    // Toggle empty state message
    const tableContent = document.getElementById('appointmentTableContent');
    const noResultsTemplate = document.getElementById('noResultsTemplate');
    
    if (visibleCount === 0) {
        tableContent.classList.add('hidden');
        noResultsTemplate.classList.remove('hidden');
    } else {
        tableContent.classList.remove('hidden');
        noResultsTemplate.classList.add('hidden');
    }
}

// Filter appointment table by selected calendar date
function filterTableByDate(date) {
    const rows = document.querySelectorAll('.appointment-row');
    const filterDate = document.getElementById('filterDate');
    let visibleCount = 0;
    
    // Update the filter date input
    filterDate.value = date;
    
    // Show/hide rows based on date
    rows.forEach(row => {
        const rowDate = row.getAttribute('data-date');
        const isVisible = rowDate === date;
        row.classList.toggle('hidden', !isVisible);
        if (isVisible) {
            visibleCount++;
        }
    });
    
    // Toggle empty state message
    const tableContent = document.getElementById('appointmentTableContent');
    const noResultsTemplate = document.getElementById('noResultsTemplate');
    
    if (visibleCount === 0) {
        tableContent.classList.add('hidden');
        noResultsTemplate.classList.remove('hidden');
    } else {
        tableContent.classList.remove('hidden');
        noResultsTemplate.classList.add('hidden');
    }
    
    // Scroll to the table
    document.querySelector('.overflow-x-auto').scrollIntoView({ behavior: 'smooth' });
}

// Initialize page on load
document.addEventListener('DOMContentLoaded', function() {
    // Generate calendar
    generateCalendar();
    
    // Set up date change handler for add form
    const addDateInput = document.getElementById('addDate');
    addDateInput.addEventListener('change', updateTimeSlots);
    
    // Initialize time slots
    updateTimeSlots();
    
    // Set up time period filter
    const timePeriodFilter = document.getElementById('timePeriodFilter');
    timePeriodFilter.addEventListener('change', function() {
        filterAppointmentsByTimePeriod(this.value);
    });
    
    // Set default filter to "today"
    filterAppointmentsByTimePeriod('today');
    
    // Set up add modal button
    document.getElementById('openAddModalBtn').addEventListener('click', openAddModal);
    
    // Set up date change handler for edit form
    const editDateInput = document.getElementById('editDate');
    editDateInput.addEventListener('change', updateEditTimeSlots);
});

// Modal management functions
function openAddModal() {
    document.getElementById('addAppointmentModal').classList.remove('hidden');
    document.getElementById('addAppointmentModal').classList.add('flex');
    document.body.classList.add('overflow-hidden');
    
    // Update time slots when opening the modal
    updateTimeSlots();
}

function closeAddModal() {
    document.getElementById('addAppointmentModal').classList.add('hidden');
    document.getElementById('addAppointmentModal').classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}

function openEditModal(id, date, timeSlot, maxSlots) {
    const modal = document.getElementById('editModal');
    const form = document.getElementById('editForm');
    
    // Set form action
    form.action = "{{ route('admin.appointments.update', '') }}/" + id;
    
    // Set form values
    document.getElementById('editDate').value = date.substring(0, 10);
    document.getElementById('editTimeSlot').value = timeSlot;
    document.getElementById('editMaxSlots').value = maxSlots;
    
    // Update time slots
    updateEditTimeSlots();
    
    // Show modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}
</script>
</x-sidebar-layout>