<x-sidebar-layout>
    <!-- Header Section -->
    <div class="mb-6 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-2 sm:p-3 rounded-lg mr-3 sm:mr-4">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-1">User Registration Analytics</h1>
                        <p class="text-teal-100 text-sm sm:text-base">Track patient registrations and analyze trends</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg text-xs sm:text-sm font-medium bg-white text-teal-700 shadow-sm">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        User Management
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-4 sm:px-6 py-2 sm:py-3 border-t border-teal-200">
            <div class="flex items-center text-xs sm:text-sm text-teal-700">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ $title }} - Analyze patient registration data and identify trends</span>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="bg-gradient-to-r from-teal-50 to-white rounded-xl shadow-md p-4 sm:p-5 mb-6 border border-teal-100 hover:shadow-lg transition duration-300">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 items-end">
            <!-- Period Filter -->
            <div class="lg:col-span-5">
                <form action="{{ route('admin.graphs.users') }}" method="GET" class="flex flex-col">
                    <label for="period" class="flex items-center text-xs sm:text-sm font-medium text-teal-700 mb-1.5">
                        <svg class="w-4 h-4 mr-1.5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Time Period
                    </label>
                    <div class="relative">
                        <select name="period" id="period" onchange="this.form.submit()" class="w-full p-2.5 sm:p-3 text-xs sm:text-sm border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none shadow-sm">
                            <option value="week" {{ $period == 'week' ? 'selected' : '' }}>This Week</option>
                            <option value="month" {{ $period == 'month' ? 'selected' : '' }}>This Month</option>
                            <option value="last3months" {{ $period == 'last3months' ? 'selected' : '' }}>Last 3 Months</option>
                            <option value="last6months" {{ $period == 'last6months' ? 'selected' : '' }}>Last 6 Months</option>
                            <option value="year" {{ $period == 'year' ? 'selected' : '' }}>This Year</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </form>
            </div>
        
            
            <!-- Reset Button -->
            <div class="lg:col-span-2 flex justify-start sm:justify-end">
                <a href="{{ route('admin.graphs.users') }}" class="bg-white text-teal-700 border border-teal-200 px-4 py-2.5 sm:px-5 sm:py-3 rounded-lg hover:bg-teal-50 transition shadow-sm font-medium text-xs sm:text-sm inline-flex items-center justify-center w-full">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset Filters
                </a>
            </div>
        </div>
    </div>

<!-- Patient Summary Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6">
    <!-- Total Patients Card -->
    <div class="bg-gradient-to-br from-teal-50 to-white rounded-xl shadow-sm border border-teal-100 p-4 sm:p-5 hover:shadow-md transition duration-300">
        <div class="flex items-center">
            <div class="bg-teal-100 p-3 rounded-lg mr-4">
                <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-sm text-teal-600 font-medium mb-1">Total Patients</h3>
                <p class="text-2xl sm:text-3xl font-bold text-teal-800">{{ $totalRegistrations }}</p>
                <p class="text-xs text-teal-500 mt-1">For selected period</p>
            </div>
        </div>
    </div>
    
    <!-- Male Patients Card -->
    <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl shadow-sm border border-blue-100 p-4 sm:p-5 hover:shadow-md transition duration-300">
        <div class="flex items-center">
            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-sm text-blue-600 font-medium mb-1">Male Patients</h3>
                <p class="text-2xl sm:text-3xl font-bold text-blue-800">
                    {{ $registrationsByGender->firstWhere('gender', 'Male')->count ?? 0 }}
                </p>
                <p class="text-xs text-blue-500 mt-1">
                    {{ $registrationsByGender->firstWhere('gender', 'Male') ? round(($registrationsByGender->firstWhere('gender', 'Male')->count / max(1, $totalRegistrations)) * 100) : 0 }}% of total
                </p>
            </div>
        </div>
    </div>
    
    <!-- Female Patients Card -->
    <div class="bg-gradient-to-br from-pink-50 to-white rounded-xl shadow-sm border border-pink-100 p-4 sm:p-5 hover:shadow-md transition duration-300">
        <div class="flex items-center">
            <div class="bg-pink-100 p-3 rounded-lg mr-4">
                <svg class="w-7 h-7 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-sm text-pink-600 font-medium mb-1">Female Patients</h3>
                <p class="text-2xl sm:text-3xl font-bold text-pink-800">
                    {{ $registrationsByGender->firstWhere('gender', 'Female')->count ?? 0 }}
                </p>
                <p class="text-xs text-pink-500 mt-1">
                    {{ $registrationsByGender->firstWhere('gender', 'Female') ? round(($registrationsByGender->firstWhere('gender', 'Female')->count / max(1, $totalRegistrations)) * 100) : 0 }}% of total
                </p>
            </div>
        </div>
    </div>
</div>

 <!-- Registration Trends Section -->
<div class="bg-white rounded-xl shadow-md overflow-hidden border border-teal-100 mb-6 sm:mb-8 transition hover:shadow-lg duration-300">
    <div class="px-4 sm:px-6 py-3 sm:py-4 bg-gradient-to-r from-teal-50 to-white border-b border-teal-100">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-teal-800 flex items-center">
                    <div class="bg-teal-100 p-1.5 rounded-lg mr-3 flex-shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    Registration Trends
                </h2>
                <div class="flex items-center mt-1.5 ml-11">
                    <svg class="w-3.5 h-3.5 text-teal-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <p class="text-xs sm:text-sm text-teal-600">Track patient registration patterns over time</p>
                </div>
            </div>
            
            <!-- Export Buttons with Improved Design -->
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('admin.graphs.users.pdf', ['period' => $period]) }}"
                   class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition shadow-sm text-xs sm:text-sm font-medium flex items-center">
                    <div class="bg-white bg-opacity-20 p-1 rounded mr-2 flex-shrink-0">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    Export PDF
                </a>
                <button onclick="exportToExcel()"
                        class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white px-3 py-2 rounded-lg hover:from-emerald-600 hover:to-emerald-700 transition shadow-sm text-xs sm:text-sm font-medium flex items-center">
                    <div class="bg-white bg-opacity-20 p-1 rounded mr-2 flex-shrink-0">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    Export Excel
                </a>
            </div>
        </div>
        </div>

        
<!-- Registration Graph -->
<div class="p-3 sm:p-6">
    <!-- Increased height from h-64/h-80 to h-80/h-96/h-[28rem] for different screen sizes -->
    <div class="h-80 sm:h-96 md:h-[28rem] rounded-lg overflow-hidden shadow-inner bg-gradient-to-b from-teal-50/30 to-white p-2 sm:p-4">
        <canvas id="registrationTrendsChart"></canvas>
    </div>
    
    <!-- Optional: Add chart legend explanation below -->
    <div class="mt-4 flex items-center justify-center text-xs text-teal-600">
        <div class="flex items-center mr-4">
            <div class="w-3 h-3 rounded-full bg-teal-500 mr-1.5"></div>
            <span>Registration Count</span>
        </div>
        <div class="flex items-center">
            <svg class="w-4 h-4 text-teal-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
            </svg>
            <span>Trend Line</span>
        </div>
    </div>
</div>
        
<!-- Gender Distribution Chart -->
<div class="border-t border-teal-100 p-3 sm:p-6">
    <div class="flex items-center mb-5">
        <div class="bg-teal-100 p-1.5 rounded-lg mr-3">
            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
            </svg>
        </div>
        <h3 class="text-sm sm:text-base font-medium text-teal-700">Gender Distribution</h3>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <!-- Chart Container -->
        <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-teal-50 p-3 sm:p-5">
            <div class="h-56 rounded-lg overflow-hidden bg-gradient-to-b from-teal-50/30 to-white">
                <canvas id="genderDistributionChart"></canvas>
            </div>
        </div>
        
        <!-- Gender Breakdown Stats -->
        <div class="bg-gradient-to-br from-teal-50 to-white rounded-lg p-4 sm:p-5 border border-teal-100 shadow-sm">
            <h4 class="text-sm font-medium text-teal-700 mb-4 flex items-center">
                <svg class="w-3.5 h-3.5 mr-2 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                Gender Breakdown
            </h4>
            
            <div class="space-y-4">
                @foreach($registrationsByGender as $gender)
                <div class="bg-white bg-opacity-60 rounded-lg p-3 border border-teal-50">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full {{ $gender->gender == 'Male' ? 'bg-blue-500' : 'bg-pink-500' }} mr-2"></div>
                            <span class="text-sm font-medium {{ $gender->gender == 'Male' ? 'text-blue-700' : 'text-pink-700' }}">
                                {{ $gender->gender }}
                            </span>
                        </div>
                        <span class="text-sm font-medium {{ $gender->gender == 'Male' ? 'text-blue-700' : 'text-pink-700' }}">
                            {{ $gender->count }} ({{ round(($gender->count / max(1, $totalRegistrations)) * 100) }}%)
                        </span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden shadow-inner">
                        <div class="h-2.5 rounded-full {{ $gender->gender == 'Male' ? 'bg-gradient-to-r from-blue-400 to-blue-500' : 'bg-gradient-to-r from-pink-400 to-pink-500' }}" 
                             style="width: {{ round(($gender->count / max(1, $totalRegistrations)) * 100) }}%">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Total Summary -->
            <div class="mt-4 pt-3 border-t border-teal-100">
                <div class="flex justify-between items-center">
                    <span class="text-xs font-medium text-teal-700">Total Patients:</span>
                    <span class="text-xs font-medium text-teal-700">{{ $totalRegistrations }}</span>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
<!-- Recent Registrations Section -->
<div class="bg-white rounded-xl shadow-md overflow-hidden border border-teal-100 mb-6 sm:mb-8 transition hover:shadow-lg duration-300">
    <div class="px-4 sm:px-6 py-3 sm:py-4 bg-gradient-to-r from-teal-50 to-white border-b border-teal-100">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-teal-800 flex items-center">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    Recent Registrations
                </h2>
                <p class="text-xs sm:text-sm text-teal-600 ml-7">Latest patient accounts created in the system</p>
            </div>
            
            <!-- Search Filter -->
            <div class="w-full sm:w-64 md:w-72">
                <label for="search" class="flex items-center text-xs sm:text-sm font-medium text-teal-700 mb-1.5">
                    <svg class="w-4 h-4 mr-1.5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Search Users
                </label>
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Search by name, email or ID..." class="w-full p-2.5 sm:p-3 pl-10 text-xs sm:text-sm border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white shadow-sm">
                </div>
            </div>
        </div>
    </div>
        
        
        <!-- Recent Registrations Table -->
        @if($latestUsers->count() > 0)
        <div class="overflow-x-auto">
            <table id="userTable" class="w-full table-auto">
                <thead class="bg-teal-50">
                    <tr>
                        <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">ID</th>
                        <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Name</th>
                        <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Email</th>
                        <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Gender</th>
                        <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap">Registration Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-teal-50">
                    @foreach($latestUsers as $user)
                    <tr class="hover:bg-teal-50/50 transition user-row">
                        <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-900 font-medium border-r border-teal-50">{{ $user->id }}</td>
                        <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-700 border-r border-teal-50">{{ $user->firstname }} {{ $user->middleinitial }} {{ $user->lastname }}</td>
                        <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600 border-r border-teal-50">{{ $user->email }}</td>
                        <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600 border-r border-teal-50">
                            <span class="px-2 py-1 text-xs rounded-full {{ $user->gender == 'Male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                {{ $user->gender }}
                            </span>
                        </td>
                        <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600">{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y h:i A') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="p-6 sm:p-8 text-center text-teal-500 bg-teal-50/50">
            <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-teal-300 mb-3 sm:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <p class="text-base sm:text-lg font-medium">No user registrations found for this period.</p>
            <p class="text-xs sm:text-sm text-teal-500 mt-1">Try selecting a different date range or time period.</p>
        </div>
        @endif
    </div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Registration Trends Chart
    const registrationData = {!! json_encode($registrationsByDay) !!};
    const dates = registrationData.map(item => item.date);
    const counts = registrationData.map(item => item.count);
    
    const ctx = document.getElementById('registrationTrendsChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Registrations',
                data: counts,
                backgroundColor: 'rgba(20, 184, 166, 0.2)',
                borderColor: 'rgba(20, 184, 166, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(20, 184, 166, 1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 1,
                pointRadius: 4,
                pointHoverRadius: 6,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 8,
                        font: {
                            size: 11
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleFont: {
                        size: 13,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 12
                    },
                    padding: 10,
                    cornerRadius: 6,
                    displayColors: true,
                    boxWidth: 8,
                    boxHeight: 8,
                    boxPadding: 4,
                    usePointStyle: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(226, 232, 240, 0.6)'
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    },
                    title: {
                        display: true,
                        text: 'Number of Registrations',
                        font: {
                            size: 11,
                            weight: 'bold'
                        },
                        color: '#0F766E'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        autoSkip: true,
                        maxRotation: 45,
                        minRotation: 45,
                        font: {
                            size: 10
                        },
                        callback: function(value, index, values) {
                            // Format date labels based on period
                            const period = '{{ $period }}';
                            const date = dates[index];
                            
                            if (period === 'year') {
                                // For year view, show month names
                                const [year, month] = date.split('-');
                                const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                return monthNames[parseInt(month) - 1];
                            } else if (period === 'last3months' || period === 'last6months') {
                                // For multi-month views, show abbreviated date
                                const dateObj = new Date(date);
                                return dateObj.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                            } else {
                                // For week/month view, show day
                                const dateObj = new Date(date);
                                return dateObj.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                            }
                        }
                    }
                }
            }
        }
    });
    
    // Gender Distribution Chart
    const genderData = {!! json_encode($registrationsByGender) !!};
    const genders = genderData.map(item => item.gender);
    const genderCounts = genderData.map(item => item.count);
    
    const genderCtx = document.getElementById('genderDistributionChart').getContext('2d');
    new Chart(genderCtx, {
        type: 'doughnut',
        data: {
            labels: genders,
            datasets: [{
                data: genderCounts,
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',  // blue for Male
                    'rgba(236, 72, 153, 0.8)',  // pink for Female
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(236, 72, 153, 1)',
                ],
                borderWidth: 1,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 8,
                        font: {
                            size: 11
                        },
                        padding: 15
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.9)',
                    titleFont: {
                        size: 13,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 12
                    },
                    padding: 10,
                    cornerRadius: 6,
                    displayColors: true,
                    boxWidth: 8,
                    boxHeight: 8,
                    boxPadding: 4,
                    usePointStyle: true,
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                            const percentage = Math.round((value / total) * 100);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
    
    // Table Search Functionality
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('.user-row');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if(text.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    
    // Excel Export Function
    window.exportToExcel = function() {
        const table = document.getElementById('userTable');
        if (!table) {
            alert('No data available to export');
            return;
        }
        
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.table_to_sheet(table);
        XLSX.utils.book_append_sheet(wb, ws, 'User Registrations');
        
        // Generate filename based on current filter
        const period = '{{ $period }}';
        const fromDate = '{{ $fromDate }}';
        const toDate = '{{ $toDate }}';
        
        let filename = 'user_registrations_';
        if (fromDate && toDate) {
            filename += period + '_' + fromDate + '_to_' + toDate + '.xlsx';
        } else {
            filename += period + '.xlsx';
        }
        
        XLSX.writeFile(wb, filename);
    };
});
</script>
@endpush
</x-sidebar-layout>