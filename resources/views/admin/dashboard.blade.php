<x-sidebar-layout>
    <!-- Header Section -->
    <div class="mb-8 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Appointment Dashboard</h1>
                        <p class="text-teal-100">Overview of appointment statistics and management</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Dashboard
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
            <div class="flex items-center text-sm text-teal-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Monitor appointment statistics, trends, and manage your scheduling system</span>
            </div>
        </div>
    </div>
    
    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">
        <!-- Administrators -->
        <div class="bg-gradient-to-br from-indigo-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-indigo-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Administrators</p>
                    <p class="text-xl sm:text-2xl font-bold text-indigo-700 mt-1 group-hover:text-indigo-800 transition-colors">
                        {{ \App\Models\User::where('user_type', 'admin')->count() }}
                    </p>
                </div>
                <div class="bg-indigo-100 p-1.5 sm:p-2 rounded-full text-indigo-600 group-hover:bg-indigo-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <p class="text-xs text-gray-500">Total system administrators with full access</p>
            </div>
        </div>
        
        <!-- Registered Patients -->
        <div class="bg-gradient-to-br from-emerald-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-emerald-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Registered Patients</p>
                    <p class="text-xl sm:text-2xl font-bold text-emerald-700 mt-1 group-hover:text-emerald-800 transition-colors">
                        {{ \App\Models\User::where('user_type', 'patient')->count() }}
                    </p>
                </div>
                <div class="bg-emerald-100 p-1.5 sm:p-2 rounded-full text-emerald-600 group-hover:bg-emerald-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <p class="text-xs text-gray-500">Total registered patients in the system</p>
            </div>
        </div>
        
        <!-- Today's Appointments -->
        <div class="bg-gradient-to-br from-teal-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Today's Appointments</p>
                    <p class="text-xl sm:text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">
                        {{ \App\Models\Appointment::whereDate('date', today())->count() }}
                    </p>
                </div>
                <div class="bg-teal-100 p-1.5 sm:p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <p class="text-xs text-gray-500">Scheduled appointments for today</p>
            </div>
        </div>
        
        <!-- Monthly Total -->
        <div class="bg-gradient-to-br from-blue-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-blue-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Monthly Total</p>
                    <p class="text-xl sm:text-2xl font-bold text-blue-700 mt-1 group-hover:text-blue-800 transition-colors">
                        {{ \App\Models\Appointment::whereMonth('date', now()->month)
                        ->whereYear('date', now()->year)
                        ->count() }}
                    </p>
                </div>
                <div class="bg-blue-100 p-1.5 sm:p-2 rounded-full text-blue-600 group-hover:bg-blue-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <div class="flex justify-between items-center">
                    <p class="text-xs text-gray-500">Total appointments this month</p>
                    @php
                        $thisMonth = \App\Models\Appointment::whereMonth('date', now()->month)
                        ->whereYear('date', now()->year)
                        ->count();
                        
                        $lastMonth = \App\Models\Appointment::whereMonth('date', now()->subMonth()->month)
                        ->whereYear('date', now()->subMonth()->year)
                        ->count();
                        
                        $percentChange = $lastMonth > 0
                        ? round((($thisMonth - $lastMonth) / $lastMonth) * 100)
                        : 0;
                    @endphp
                    <span class="text-xs {{ $percentChange >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $percentChange >= 0 ? '+' : '' }}{{ $percentChange }}%
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Monthly Appointments Overview Graph -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 border-b border-teal-800">
            <h2 class="text-lg font-semibold text-white">Appointments Overview</h2>
        </div>
        <div class="p-6">
            <!--  Time Period Filters  -->
            <div class="flex flex-wrap justify-between items-center mb-6">
                <div class="flex flex-wrap gap-2 mb-3 sm:mb-0">
                    <select id="appointmentTimePeriod" class="text-sm border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                        <option value="thisWeek">This Week</option>
                        <option value="thisMonth">This Month</option>
                        <option value="last3Months">Last 3 Months</option>
                        <option value="last6Months">Last 6 Months</option>
                        <option value="thisYear">This Year</option>
                    </select>
                </div>
                <select id="chartType" class="text-sm border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    <option value="line">Line Chart</option>
                    <option value="bar">Bar Chart</option>
                    <option value="stacked">Stacked Bar</option>
                </select>
            </div>
            
            <!-- Larger Chart Container -->
            <div class="h-96 md:h-[400px] lg:h-[450px]">
                <canvas id="appointmentsChart"></canvas>
            </div>
            
            <div class="mt-4 pt-4 border-t border-gray-100 text-sm text-gray-500">
                <p>The chart shows appointment statistics by time period, broken down by status.</p>
            </div>
        </div>
    </div>
    
    <!-- Appointment Status Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">
        <!-- Total Appointments -->
        <div class="bg-gradient-to-br from-blue-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-blue-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Total Appointments</p>
                    <p class="text-xl sm:text-2xl font-bold text-blue-700 mt-1 group-hover:text-blue-800 transition-colors">
                    <p class="text-xl sm:text-2xl font-bold text-blue-700 mt-1 group-hover:text-blue-800 transition-colors">
                        {{ \App\Models\Appointment::whereMonth('date', now()->month)
                        ->whereYear('date', now()->year)
                        ->count() }}
                    </p>
                </div>
                <div class="bg-blue-100 p-1.5 sm:p-2 rounded-full text-blue-600 group-hover:bg-blue-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <p class="text-xs text-gray-500">Total appointments this month</p>
            </div>
        </div>
        
        <!-- Pending Appointments -->
        <div class="bg-gradient-to-br from-amber-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-amber-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Pending</p>
                    <p class="text-xl sm:text-2xl font-bold text-amber-700 mt-1 group-hover:text-amber-800 transition-colors">
                        {{ \App\Models\Appointment::whereMonth('date', now()->month)
                        ->whereYear('date', now()->year)
                        ->where('status', 'Pending')
                        ->count() }}
                    </p>
                </div>
                <div class="bg-amber-100 p-1.5 sm:p-2 rounded-full text-amber-600 group-hover:bg-amber-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <p class="text-xs text-gray-500">Appointments awaiting confirmation</p>
            </div>
        </div>
        
        <!-- Approved Appointments -->
        <div class="bg-gradient-to-br from-emerald-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-emerald-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Approved</p>
                    <p class="text-xl sm:text-2xl font-bold text-emerald-700 mt-1 group-hover:text-emerald-800 transition-colors">
                        {{ \App\Models\Appointment::whereMonth('date', now()->month)
                        ->whereYear('date', now()->year)
                        ->where('status', 'Approved')
                        ->count() }}
                    </p>
                </div>
                <div class="bg-emerald-100 p-1.5 sm:p-2 rounded-full text-emerald-600 group-hover:bg-emerald-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <p class="text-xs text-gray-500">Confirmed appointments ready for service</p>
            </div>
        </div>
        
        <!-- Attended Appointments -->
        <div class="bg-gradient-to-br from-purple-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-purple-500 transition-all hover:shadow-md group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Attended</p>
                    <p class="text-xl sm:text-2xl font-bold text-purple-700 mt-1 group-hover:text-purple-800 transition-colors">
                        {{ \App\Models\Appointment::whereMonth('date', now()->month)
                        ->whereYear('date', now()->year)
                        ->where('status', 'Attended')
                        ->count() }}
                    </p>
                </div>
                <div class="bg-purple-100 p-1.5 sm:p-2 rounded-full text-purple-600 group-hover:bg-purple-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 pt-2 border-t border-gray-100">
                <p class="text-xs text-gray-500">Completed appointments with service provided</p>
            </div>
        </div>
    </div>
    
    <!-- Patient Registrations Graph -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-4 border-b border-emerald-800">
            <h2 class="text-lg font-semibold text-white">Patient Registration Trends</h2>
        </div>
        <div class="p-6">
            <!-- Time Period Filters as Dropdown -->
            <div class="flex flex-wrap justify-between items-center mb-6">
                <div class="flex flex-wrap gap-2 mb-3 sm:mb-0">
                    <select id="patientTimePeriod" class="text-sm border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="thisWeek">This Week</option>
                        <option value="thisMonth">This Month</option>
                        <option value="last3Months">Last 3 Months</option>
                        <option value="last6Months">Last 6 Months</option>
                        <option value="thisYear">This Year</option>
                    </select>
                </div>
                <select id="patientChartType" class="text-sm border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option value="area">Area Chart</option>
                    <option value="line">Line Chart</option>
                    <option value="bar">Bar Chart</option>
                </select>
            </div>
            
            <!-- Chart Container -->
            <div class="h-96 md:h-[400px] lg:h-[450px]">
                <canvas id="patientRegistrationChart"></canvas>
            </div>
            
            <div class="mt-4 pt-4 border-t border-gray-100 text-sm text-gray-500">
                <p>The chart shows the number of new patient registrations over time.</p>
            </div>
        </div>
    </div>

        <!-- Inventory Management Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Inventory Management</h2>
                <p class="text-sm text-gray-600 mt-1">Overview of your inventory status and stock levels</p>
            </div>
            <div class="bg-teal-100 text-teal-800 px-3 py-1 rounded-full text-sm font-medium">
                Last updated: {{ now()->format('M d, Y h:i A') }}
            </div>
        </div>

        <!-- First Row of Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Total Items Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 border-l-4 border-l-teal-500 hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Total Items</h3>
                        <div class="p-3 bg-teal-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <p class="text-4xl font-bold text-teal-600">
                            {{ \App\Models\Inventory::count() }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">Total inventory items</p>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Total Units:</span> 
                                {{ \App\Models\Inventory::sum('quantity') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Categories Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 border-l-4 border-l-purple-500 hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Categories</h3>
                        <div class="p-3 bg-purple-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <p class="text-4xl font-bold text-purple-600">
                            {{ \App\Models\Inventory::distinct('category')->count('category') }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">Distinct categories</p>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Most Items:</span> 
                                @php
                                    $topCategory = \App\Models\Inventory::select('category', \DB::raw('count(*) as total'))
                                        ->groupBy('category')
                                        ->orderBy('total', 'desc')
                                        ->first();
                                @endphp
                                {{ $topCategory ? $topCategory->category : 'None' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Well Stocked Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 border-l-4 border-l-green-500 hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Well Stocked</h3>
                        <div class="p-3 bg-green-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <p class="text-4xl font-bold text-green-600">
                            {{ \App\Models\Inventory::whereRaw('quantity > minimum_stock_level')->count() }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">Items with adequate stock</p>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Percentage:</span> 
                                @php
                                    $totalItems = \App\Models\Inventory::count();
                                    $wellStocked = \App\Models\Inventory::whereRaw('quantity > minimum_stock_level')->count();
                                    $percentage = $totalItems > 0 ? round(($wellStocked / $totalItems) * 100) : 0;
                                @endphp
                                {{ $percentage }}% of inventory
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row Header (Centered) -->
        <div class="flex items-center justify-center mb-6 mt-8">
            <div class="w-1/3 h-px bg-gray-300"></div>
            <h3 class="mx-4 text-lg font-semibold text-gray-700">Items Requiring Attention</h3>
            <div class="w-1/3 h-px bg-gray-300"></div>
        </div>

        <!-- Second Row of Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Low Stock Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 border-l-4 border-l-amber-500 hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Low Stock</h3>
                        <div class="p-3 bg-amber-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <p class="text-4xl font-bold text-amber-600">
                            {{ \App\Models\Inventory::whereRaw('quantity > 0 AND quantity <= minimum_stock_level')->count() }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">Items below minimum stock level</p>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Avg. Shortage:</span> 
                                @php
                                    $lowStockItems = \App\Models\Inventory::whereRaw('quantity > 0 AND quantity <= minimum_stock_level')->get();
                                    $avgShortage = 0;
                                    if(count($lowStockItems) > 0) {
                                        $totalShortage = 0;
                                        foreach($lowStockItems as $item) {
                                            $totalShortage += ($item->minimum_stock_level - $item->quantity);
                                        }
                                        $avgShortage = round($totalShortage / count($lowStockItems));
                                    }
                                @endphp
                                {{ $avgShortage }} units
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Out of Stock Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 border-l-4 border-l-red-500 hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Out of Stock</h3>
                        <div class="p-3 bg-red-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <p class="text-4xl font-bold text-red-600">
                            {{ \App\Models\Inventory::where('quantity', '<=', 0)->count() }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">Items completely out of stock</p>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Critical:</span> 
                                @php
                                    $criticalItems = \App\Models\Inventory::where('quantity', '<=', 0)
                                        ->where('status', 'Active')
                                        ->count();
                                @endphp
                                {{ $criticalItems }} active items
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Expiring Items Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 border-l-4 border-l-blue-500 hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-700">Expiring Soon</h3>
                        <div class="p-3 bg-blue-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="mb-2">
                        <p class="text-4xl font-bold text-blue-600">
                            @php
                                $expiringCount = \App\Models\Inventory::whereNotNull('expiry_date')
                                    ->whereDate('expiry_date', '>', now())
                                    ->whereDate('expiry_date', '<=', now()->addDays(30))
                                    ->count();
                            @endphp
                            {{ $expiringCount }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">Items expiring within 30 days</p>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Already Expired:</span> 
                                {{ \App\Models\Inventory::whereNotNull('expiry_date')->whereDate('expiry_date', '<', now())->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities Section (Enhanced Teal Theme) -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-teal-100 mb-8">
            <!-- Header with improved gradient and icon -->
            <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white">Recent Inventory Activities (Quick View) </h3>
                </div>
                <span class="text-xs bg-teal-700 bg-opacity-50 text-teal-50 px-3 py-1 rounded-full">
                    Last 5 activities
                </span>
            </div>
            
            <!-- Activity list with improved styling -->
            <div class="p-0">
                <div class="overflow-hidden">
                    <ul class="divide-y divide-teal-50">
                        @php
                            // Modified query to include all activities, not just those with valid items
                            $recentActivities = \App\Models\Activity::where(function($query) {
                                $query->whereNotNull('item_id')
                                    ->orWhere('type', 'delete');
                            })
                            ->with(['user', 'item'])
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();
                        @endphp
                        
                        @forelse($recentActivities as $activity)
                            <li class="hover:bg-teal-50 transition-colors duration-150">
                                <div class="p-4 flex items-start">
                                    <!-- Activity Icon with improved styling -->
                                    <div class="mr-4 flex-shrink-0">
                                        @switch($activity->type)
                                            @case('add')
                                                <div class="p-2.5 bg-green-100 rounded-full border border-green-200 shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                </div>
                                                @break
                                            @case('update')
                                                <div class="p-2.5 bg-blue-100 rounded-full border border-blue-200 shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </div>
                                                @break
                                            @case('delete')
                                                <div class="p-2.5 bg-red-100 rounded-full border border-red-200 shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>
                                                @break
                                            @case('restock')
                                                <div class="p-2.5 bg-teal-100 rounded-full border border-teal-200 shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                                    </svg>
                                                </div>
                                                @break
                                            @case('use')
                                                <div class="p-2.5 bg-purple-100 rounded-full border border-purple-200 shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                    </svg>
                                                </div>
                                                @break
                                            @default
                                                <div class="p-2.5 bg-gray-100 rounded-full border border-gray-200 shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                        @endswitch
                                    </div>
                                    
                                    <!-- Activity Content with improved styling -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex justify-between items-start">
                                            <p class="text-sm font-medium text-gray-900">
                                                <span class="capitalize px-2 py-0.5 rounded-md bg-teal-100 text-teal-800 text-xs mr-1">{{ $activity->type }}</span>
                                                
                                                <!-- Modified to handle delete activities differently -->
                                                @if($activity->type == 'delete')
                                                    <!-- For delete activities, extract item name from description -->
                                                    @php
                                                        // Try to extract item name from description
                                                        $itemName = 'Unknown Item';
                                                        if (preg_match('/Deleted item: (.+)/', $activity->description, $matches)) {
                                                            $itemName = $matches[1];
                                                        }
                                                    @endphp
                                                    {{ $itemName }}
                                                @else
                                                    {{ $activity->item ? $activity->item->item_name : 'Unknown Item' }}
                                                @endif
                                            </p>
                                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                                {{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}
                                            </span>
                                        </div>
                                        
                                        <!-- Modified to handle delete activities differently -->
                                        @if($activity->type == 'delete')
                                            <p class="text-sm text-gray-600 mt-1.5 leading-relaxed">
                                                Item was removed from inventory
                                            </p>
                                        @else
                                            <p class="text-sm text-gray-600 mt-1.5 leading-relaxed">
                                                {!! $activity->description !!}
                                            </p>
                                        @endif
                                        
                                        <div class="mt-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-teal-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <p class="text-xs text-teal-600 font-medium">
                                                {{ $activity->user ? $activity->user->name : 'System' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="py-8 text-center">
                                <div class="inline-flex items-center px-4 py-2 bg-teal-50 border border-teal-100 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-teal-600">No recent activities found</span>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    <!-- Enhanced JavaScript for Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // ===== APPOINTMENTS CHART =====
        
        // Get the canvas element
        const appointmentsCtx = document.getElementById('appointmentsChart').getContext('2d');
        
        // Prepare data directly in the view
        @php
        // Function to get appointment data for a specific time period
        function getAppointmentData($startDate, $endDate) {
            $data = [];
            $currentDate = \Carbon\Carbon::parse($startDate);
            $endDateObj = \Carbon\Carbon::parse($endDate);
            
            // Determine if we should group by day, week, or month based on date range
            $diffInDays = $currentDate->diffInDays($endDateObj);
            
            if ($diffInDays <= 31) {
                // For short ranges, group by day
                while ($currentDate <= $endDateObj) {
                    $label = $currentDate->format('M d');
                    
                    $pendingCount = \App\Models\Appointment::whereDate('date', $currentDate->format('Y-m-d'))
                        ->where('status', 'Pending')
                        ->count();
                        
                    $approvedCount = \App\Models\Appointment::whereDate('date', $currentDate->format('Y-m-d'))
                        ->where('status', 'Approved')
                        ->count();
                        
                    $attendedCount = \App\Models\Appointment::whereDate('date', $currentDate->format('Y-m-d'))
                        ->where('status', 'Attended')
                        ->count();
                    
                    $data['labels'][] = $label;
                    $data['pending'][] = $pendingCount;
                    $data['approved'][] = $approvedCount;
                    $data['attended'][] = $attendedCount;
                    
                    $currentDate->addDay();
                }
            } else if ($diffInDays <= 180) {
                // For medium ranges, group by week
                while ($currentDate <= $endDateObj) {
                    $weekStart = clone $currentDate;
                    $weekEnd = clone $currentDate;
                    $weekEnd->addDays(6);
                    
                    if ($weekEnd > $endDateObj) {
                        $weekEnd = clone $endDateObj;
                    }
                    
                    $label = $weekStart->format('M d') . ' - ' . $weekEnd->format('M d');
                    
                    $pendingCount = \App\Models\Appointment::whereBetween('date', [
                            $weekStart->format('Y-m-d'), 
                            $weekEnd->format('Y-m-d')
                        ])
                        ->where('status', 'Pending')
                        ->count();
                        
                    $approvedCount = \App\Models\Appointment::whereBetween('date', [
                            $weekStart->format('Y-m-d'), 
                            $weekEnd->format('Y-m-d')
                        ])
                        ->where('status', 'Approved')
                        ->count();
                        
                    $attendedCount = \App\Models\Appointment::whereBetween('date', [
                            $weekStart->format('Y-m-d'), 
                            $weekEnd->format('Y-m-d')
                        ])
                        ->where('status', 'Attended')
                        ->count();
                    
                    $data['labels'][] = $label;
                    $data['pending'][] = $pendingCount;
                    $data['approved'][] = $approvedCount;
                    $data['attended'][] = $attendedCount;
                    
                    $currentDate->addDays(7);
                }
            } else {
                // For long ranges, group by month
                while ($currentDate <= $endDateObj) {
                    $label = $currentDate->format('M Y');
                    
                    $pendingCount = \App\Models\Appointment::whereYear('date', $currentDate->year)
                        ->whereMonth('date', $currentDate->month)
                        ->where('status', 'Pending')
                        ->count();
                        
                    $approvedCount = \App\Models\Appointment::whereYear('date', $currentDate->year)
                        ->whereMonth('date', $currentDate->month)
                        ->where('status', 'Approved')
                        ->count();
                        
                    $attendedCount = \App\Models\Appointment::whereYear('date', $currentDate->year)
                        ->whereMonth('date', $currentDate->month)
                        ->where('status', 'Attended')
                        ->count();
                    
                    $data['labels'][] = $label;
                    $data['pending'][] = $pendingCount;
                    $data['approved'][] = $approvedCount;
                    $data['attended'][] = $attendedCount;
                    
                    $currentDate->addMonth();
                }
            }
            
            return $data;
        }
        
        // Function to get patient registration data for a specific time period
        function getPatientRegistrationData($startDate, $endDate) {
            $data = [];
            $currentDate = \Carbon\Carbon::parse($startDate);
            $endDateObj = \Carbon\Carbon::parse($endDate);
            
            // Determine if we should group by day, week, or month based on date range
            $diffInDays = $currentDate->diffInDays($endDateObj);
            
            if ($diffInDays <= 31) {
                // For short ranges, group by day
                while ($currentDate <= $endDateObj) {
                    $label = $currentDate->format('M d');
                    
                    $registrationCount = \App\Models\User::where('user_type', 'patient')
                        ->whereDate('created_at', $currentDate->format('Y-m-d'))
                        ->count();
                    
                        $data['labels'][] = $label;
                    $data['registrations'][] = $registrationCount;
                    
                    $currentDate->addDay();
                }
            } else if ($diffInDays <= 180) {
                // For medium ranges, group by week
                while ($currentDate <= $endDateObj) {
                    $weekStart = clone $currentDate;
                    $weekEnd = clone $currentDate;
                    $weekEnd->addDays(6);
                    
                    if ($weekEnd > $endDateObj) {
                        $weekEnd = clone $endDateObj;
                    }
                    
                    $label = $weekStart->format('M d') . ' - ' . $weekEnd->format('M d');
                    
                    $registrationCount = \App\Models\User::where('user_type', 'patient')
                        ->whereBetween('created_at', [
                            $weekStart->format('Y-m-d') . ' 00:00:00', 
                            $weekEnd->format('Y-m-d') . ' 23:59:59'
                        ])
                        ->count();
                    
                    $data['labels'][] = $label;
                    $data['registrations'][] = $registrationCount;
                    
                    $currentDate->addDays(7);
                }
            } else {
                // For long ranges, group by month
                while ($currentDate <= $endDateObj) {
                    $label = $currentDate->format('M Y');
                    
                    $registrationCount = \App\Models\User::where('user_type', 'patient')
                        ->whereYear('created_at', $currentDate->year)
                        ->whereMonth('created_at', $currentDate->month)
                        ->count();
                    
                    $data['labels'][] = $label;
                    $data['registrations'][] = $registrationCount;
                    
                    $currentDate->addMonth();
                }
            }
            
            return $data;
        }
        
        // Get data for different time periods - Appointments
        $thisWeekData = getAppointmentData(now()->startOfWeek(), now()->endOfWeek());
        $thisMonthData = getAppointmentData(now()->startOfMonth(), now()->endOfMonth());
        $last3MonthsData = getAppointmentData(now()->subMonths(3)->startOfDay(), now());
        $last6MonthsData = getAppointmentData(now()->subMonths(6)->startOfDay(), now());
        $thisYearData = getAppointmentData(now()->startOfYear(), now()->endOfYear());
        
        // Get data for different time periods - Patient Registrations
        $patientThisWeekData = getPatientRegistrationData(now()->startOfWeek(), now()->endOfWeek());
        $patientThisMonthData = getPatientRegistrationData(now()->startOfMonth(), now()->endOfMonth());
        $patient3MonthsData = getPatientRegistrationData(now()->subMonths(3)->startOfDay(), now());
        $patient6MonthsData = getPatientRegistrationData(now()->subMonths(6)->startOfDay(), now());
        $patientYearData = getPatientRegistrationData(now()->startOfYear(), now()->endOfYear());
        
        // Default to this week's data
        $currentAppointmentData = $thisWeekData;
        $currentPatientData = $patientThisWeekData;
        @endphp
        
        // ===== APPOINTMENTS CHART CONFIGURATION =====
        let appointmentsChart = new Chart(appointmentsCtx, {
            type: 'line', // Default to line chart
            data: {
                labels: @json($currentAppointmentData['labels'] ?? []),
                datasets: [
                    {
                        label: 'Pending',
                        backgroundColor: 'rgba(251, 191, 36, 0.2)',
                        borderColor: 'rgb(251, 191, 36)',
                        borderWidth: 2,
                        tension: 0.3,
                        pointBackgroundColor: 'rgb(251, 191, 36)',
                        data: @json($currentAppointmentData['pending'] ?? [])
                    },
                    {
                        label: 'Approved',
                        backgroundColor: 'rgba(16, 185, 129, 0.2)',
                        borderColor: 'rgb(16, 185, 129)',
                        borderWidth: 2,
                        tension: 0.3,
                        pointBackgroundColor: 'rgb(16, 185, 129)',
                        data: @json($currentAppointmentData['approved'] ?? [])
                    },
                    {
                        label: 'Attended',
                        backgroundColor: 'rgba(139, 92, 246, 0.2)',
                        borderColor: 'rgb(139, 92, 246)',
                        borderWidth: 2,
                        tension: 0.3,
                        pointBackgroundColor: 'rgb(139, 92, 246)',
                        data: @json($currentAppointmentData['attended'] ?? [])
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    x: {
                        stacked: false,
                        grid: {
                            display: false
                        },
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
        
        // ===== PATIENT REGISTRATION CHART =====
        const patientCtx = document.getElementById('patientRegistrationChart').getContext('2d');
        
        let patientRegistrationChart = new Chart(patientCtx, {
            type: 'line', // Will be changed to area chart in the initialization
            data: {
                labels: @json($currentPatientData['labels'] ?? []),
                datasets: [
                    {
                        label: 'New Patients',
                        backgroundColor: 'rgba(16, 185, 129, 0.3)', // Area fill color
                        borderColor: 'rgb(16, 185, 129)',
                        borderWidth: 2,
                        tension: 0.4,
                        pointBackgroundColor: 'rgb(16, 185, 129)',
                        fill: true, // Enable fill for area chart
                        data: @json($currentPatientData['registrations'] ?? [])
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
        
        // Set patient chart to area chart by default (line chart with fill)
        patientRegistrationChart.data.datasets[0].fill = true;
        patientRegistrationChart.update();
        
        // ===== APPOINTMENTS CHART FUNCTIONS =====
        
        // Function to update appointments chart with new data
        function updateAppointmentsChart(labels, pendingData, approvedData, attendedData) {
            appointmentsChart.data.labels = labels;
            appointmentsChart.data.datasets[0].data = pendingData;
            appointmentsChart.data.datasets[1].data = approvedData;
            appointmentsChart.data.datasets[2].data = attendedData;
            appointmentsChart.update();
        }
        
        // Event listener for appointment time period dropdown
        document.getElementById('appointmentTimePeriod').addEventListener('change', function() {
            const period = this.value;
            
            if (period === 'thisWeek') {
                updateAppointmentsChart(
                    @json($thisWeekData['labels'] ?? []),
                    @json($thisWeekData['pending'] ?? []),
                    @json($thisWeekData['approved'] ?? []),
                    @json($thisWeekData['attended'] ?? [])
                );
            } 
            else if (period === 'thisMonth') {
                updateAppointmentsChart(
                    @json($thisMonthData['labels'] ?? []),
                    @json($thisMonthData['pending'] ?? []),
                    @json($thisMonthData['approved'] ?? []),
                    @json($thisMonthData['attended'] ?? [])
                );
            }
            else if (period === 'last3Months') {
                updateAppointmentsChart(
                    @json($last3MonthsData['labels'] ?? []),
                    @json($last3MonthsData['pending'] ?? []),
                    @json($last3MonthsData['approved'] ?? []),
                    @json($last3MonthsData['attended'] ?? [])
                );
            }
            else if (period === 'last6Months') {
                updateAppointmentsChart(
                    @json($last6MonthsData['labels'] ?? []),
                    @json($last6MonthsData['pending'] ?? []),
                    @json($last6MonthsData['approved'] ?? []),
                    @json($last6MonthsData['attended'] ?? [])
                );
            }
            else if (period === 'thisYear') {
                updateAppointmentsChart(
                    @json($thisYearData['labels'] ?? []),
                    @json($thisYearData['pending'] ?? []),
                    @json($thisYearData['approved'] ?? []),
                    @json($thisYearData['attended'] ?? [])
                );
            }
        });
        
        // Event listener for appointments chart type change
        document.getElementById('chartType').addEventListener('change', function() {
            const chartType = this.value;
            
            // Update chart type
            if (chartType === 'line') {
                appointmentsChart.config.type = 'line';
                
                // Update dataset styling for line chart
                appointmentsChart.data.datasets.forEach((dataset, index) => {
                    const colors = [
                        { bg: 'rgba(251, 191, 36, 0.2)', border: 'rgb(251, 191, 36)' },
                        { bg: 'rgba(16, 185, 129, 0.2)', border: 'rgb(16, 185, 129)' },
                        { bg: 'rgba(139, 92, 246, 0.2)', border: 'rgb(139, 92, 246)' }
                    ];
                    
                    dataset.backgroundColor = colors[index].bg;
                    dataset.borderColor = colors[index].border;
                    dataset.borderWidth = 2;
                    dataset.tension = 0.3;
                    dataset.pointBackgroundColor = colors[index].border;
                    dataset.fill = false;
                });
                
                // Update scales for line chart
                appointmentsChart.options.scales.y.stacked = false;
                appointmentsChart.options.scales.x.stacked = false;
            } 
            else if (chartType === 'bar') {
                appointmentsChart.config.type = 'bar';
                
                // Update dataset styling for bar chart
                appointmentsChart.data.datasets.forEach((dataset, index) => {
                    const colors = [
                        { bg: 'rgba(251, 191, 36, 0.7)', border: 'rgb(251, 191, 36)' },
                        { bg: 'rgba(16, 185, 129, 0.7)', border: 'rgb(16, 185, 129)' },
                        { bg: 'rgba(139, 92, 246, 0.7)', border: 'rgb(139, 92, 246)' }
                    ];
                    
                    dataset.backgroundColor = colors[index].bg;
                    dataset.borderColor = colors[index].border;
                    dataset.borderWidth = 1;
                    dataset.tension = 0;
                    dataset.fill = false;
                });
                
                // Update scales for bar chart
                appointmentsChart.options.scales.y.stacked = false;
                appointmentsChart.options.scales.x.stacked = false;
            }
            else if (chartType === 'stacked') {
                appointmentsChart.config.type = 'bar';
                
                // Update dataset styling for stacked bar chart
                appointmentsChart.data.datasets.forEach((dataset, index) => {
                    const colors = [
                        { bg: 'rgba(251, 191, 36, 0.7)', border: 'rgb(251, 191, 36)' },
                        { bg: 'rgba(16, 185, 129, 0.7)', border: 'rgb(16, 185, 129)' },
                        { bg: 'rgba(139, 92, 246, 0.7)', border: 'rgb(139, 92, 246)' }
                    ];
                    
                    dataset.backgroundColor = colors[index].bg;
                    dataset.borderColor = colors[index].border;
                    dataset.borderWidth = 1;
                    dataset.tension = 0;
                    dataset.fill = true;
                });
                
                // Update scales for stacked bar chart
                appointmentsChart.options.scales.y.stacked = true;
                appointmentsChart.options.scales.x.stacked = true;
            }
            
            appointmentsChart.update();
        });
        
        // ===== PATIENT REGISTRATION CHART FUNCTIONS =====
        
        // Function to update patient chart with new data
        function updatePatientChart(labels, registrationData) {
            patientRegistrationChart.data.labels = labels;
            patientRegistrationChart.data.datasets[0].data = registrationData;
            patientRegistrationChart.update();
        }
        
        // Event listener for patient time period dropdown
        document.getElementById('patientTimePeriod').addEventListener('change', function() {
            const period = this.value;
            
            if (period === 'thisWeek') {
                updatePatientChart(
                    @json($patientThisWeekData['labels'] ?? []),
                    @json($patientThisWeekData['registrations'] ?? [])
                );
            }
            else if (period === 'thisMonth') {
                updatePatientChart(
                    @json($patientThisMonthData['labels'] ?? []),
                    @json($patientThisMonthData['registrations'] ?? [])
                );
            }
            else if (period === 'last3Months') {
                updatePatientChart(
                    @json($patient3MonthsData['labels'] ?? []),
                    @json($patient3MonthsData['registrations'] ?? [])
                );
            }
            else if (period === 'last6Months') {
                updatePatientChart(
                    @json($patient6MonthsData['labels'] ?? []),
                    @json($patient6MonthsData['registrations'] ?? [])
                );
            }
            else if (period === 'thisYear') {
                updatePatientChart(
                    @json($patientYearData['labels'] ?? []),
                    @json($patientYearData['registrations'] ?? [])
                );
            }
        });
        
        // Event listener for patient chart type change
        document.getElementById('patientChartType').addEventListener('change', function() {
            const chartType = this.value;
            
            if (chartType === 'line') {
                patientRegistrationChart.config.type = 'line';
                
                // Update dataset styling for line chart
                patientRegistrationChart.data.datasets[0].backgroundColor = 'rgba(16, 185, 129, 0.2)';
                patientRegistrationChart.data.datasets[0].borderColor = 'rgb(16, 185, 129)';
                patientRegistrationChart.data.datasets[0].borderWidth = 2;
                patientRegistrationChart.data.datasets[0].tension = 0.4;
                patientRegistrationChart.data.datasets[0].pointBackgroundColor = 'rgb(16, 185, 129)';
                patientRegistrationChart.data.datasets[0].fill = false;
            } 
            else if (chartType === 'bar') {
                patientRegistrationChart.config.type = 'bar';
                
                // Update dataset styling for bar chart
                patientRegistrationChart.data.datasets[0].backgroundColor = 'rgba(16, 185, 129, 0.7)';
                patientRegistrationChart.data.datasets[0].borderColor = 'rgb(16, 185, 129)';
                patientRegistrationChart.data.datasets[0].borderWidth = 1;
                patientRegistrationChart.data.datasets[0].tension = 0;
                patientRegistrationChart.data.datasets[0].fill = false;
            }
            else if (chartType === 'area') {
                patientRegistrationChart.config.type = 'line';
                
                // Update dataset styling for area chart
                patientRegistrationChart.data.datasets[0].backgroundColor = 'rgba(16, 185, 129, 0.3)';
                patientRegistrationChart.data.datasets[0].borderColor = 'rgb(16, 185, 129)';
                patientRegistrationChart.data.datasets[0].borderWidth = 2;
                patientRegistrationChart.data.datasets[0].tension = 0.4;
                patientRegistrationChart.data.datasets[0].pointBackgroundColor = 'rgb(16, 185, 129)';
                patientRegistrationChart.data.datasets[0].fill = true;
            }
            
            patientRegistrationChart.update();
        });
        
        // Initialize with area chart for patient registrations
        document.getElementById('patientChartType').value = 'area';
        const areaChartEvent = new Event('change');
        document.getElementById('patientChartType').dispatchEvent(areaChartEvent);
    });
    </script>
</x-sidebar-layout>
                    