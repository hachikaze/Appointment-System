<x-sidebar-layout>
    <!-- Header Section -->
    <div class="mb-6 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-2 sm:p-3 rounded-lg mr-3 sm:mr-4">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-1">Inventory Analytics</h1>
                        <p class="text-teal-100 text-sm sm:text-base">Track usage, monitor stock levels, and analyze trends</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg text-xs sm:text-sm font-medium bg-white text-teal-700 shadow-sm">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Inventory Management
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-4 sm:px-6 py-2 sm:py-3 border-t border-teal-200">
            <div class="flex items-center text-xs sm:text-sm text-teal-700">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ $title }} - Analyze inventory data and identify trends</span>
            </div>
        </div>
    </div>

<!-- Filters Section -->
<div class="bg-gradient-to-r from-teal-50 to-white rounded-xl shadow-sm p-3 sm:p-4 md:p-5 mb-6 border border-teal-100">
    <!-- Section Title - Only visible on smaller screens -->
    <div class="block md:hidden mb-3">
        <h3 class="text-sm font-semibold text-teal-700 flex items-center">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            Filter Options
        </h3>
    </div>

    <!-- Mobile and Medium Screen Layout (Stacked) -->
    <div class="block lg:hidden">
        <!-- Period Filter -->
        <div class="mb-3">
            <form action="{{ route('admin.graphs.inventory') }}" method="GET" class="flex flex-col">
                @if($fromDate && $toDate)
                    <input type="hidden" name="from_date" value="{{ $fromDate }}">
                    <input type="hidden" name="to_date" value="{{ $toDate }}">
                @endif
                <label for="period-mobile" class="block text-xs font-medium text-teal-700 mb-1.5">Time Period</label>
                <div class="relative">
                    <select 
                        name="period" 
                        id="period-mobile" 
                        onchange="this.form.submit()" 
                        class="w-full h-10 px-3 text-xs border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none transition-colors"
                    >
                        <option value="today" {{ $period == 'today' ? 'selected' : '' }}>Today</option>
                        <option value="week" {{ $period == 'week' ? 'selected' : '' }}>This Week</option>
                        <option value="month" {{ $period == 'month' ? 'selected' : '' }}>This Month</option>
                        <option value="year" {{ $period == 'year' ? 'selected' : '' }}>This Year</option>
                        <option value="overall" {{ $period == 'overall' ? 'selected' : '' }}>Overall</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Date Range Filter with Apply Button at Top -->
        <div class="mb-3">
            <form action="{{ route('admin.graphs.inventory') }}" method="GET">
                <label class="block text-xs font-medium text-teal-700 mb-1.5">Custom Date Range</label>
                
                <!-- Apply Button at Top for Mobile/Medium -->
                <div class="mb-2">
                    <button 
                        type="submit" 
                        class="w-full h-10 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors shadow-sm font-medium text-xs flex items-center justify-center"
                    >
                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Apply Filters
                    </button>
                </div>
                
                <!-- Date Inputs -->
                <div class="grid grid-cols-2 gap-2">
                    <!-- From Date -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input 
                            type="date" 
                            name="from_date" 
                            value="{{ $fromDate }}" 
                            class="pl-8 w-full h-10 text-xs border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white transition-colors"
                            aria-label="From date"
                            placeholder="From"
                        >
                    </div>
                    
                    <!-- To Date -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input 
                            type="date" 
                            name="to_date" 
                            value="{{ $toDate }}" 
                            class="pl-8 w-full h-10 text-xs border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white transition-colors"
                            aria-label="To date"
                            placeholder="To"
                        >
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Reset Button at Bottom for Mobile/Medium -->
        <div>
            <a 
                href="{{ route('admin.graphs.inventory') }}" 
                class="h-10 bg-white text-teal-700 border border-teal-200 rounded-lg hover:bg-teal-50 transition-colors shadow-sm font-medium text-xs flex items-center justify-center w-full"
            >
                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Reset All Filters
            </a>
        </div>
    </div>

    <!-- Desktop Layout (Side by Side) -->
    <div class="hidden lg:grid lg:grid-cols-12 lg:gap-3 lg:items-end">
        <!-- Period Filter -->
        <div class="lg:col-span-3">
            <form action="{{ route('admin.graphs.inventory') }}" method="GET" class="flex flex-col">
                @if($fromDate && $toDate)
                    <input type="hidden" name="from_date" value="{{ $fromDate }}">
                    <input type="hidden" name="to_date" value="{{ $toDate }}">
                @endif
                <label for="period-desktop" class="block text-xs font-medium text-teal-700 mb-1.5">Time Period</label>
                <div class="relative">
                    <select 
                        name="period" 
                        id="period-desktop" 
                        onchange="this.form.submit()" 
                        class="w-full h-10 px-3 text-xs border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none transition-colors"
                    >
                        <option value="today" {{ $period == 'today' ? 'selected' : '' }}>Today</option>
                        <option value="week" {{ $period == 'week' ? 'selected' : '' }}>This Week</option>
                        <option value="month" {{ $period == 'month' ? 'selected' : '' }}>This Month</option>
                        <option value="year" {{ $period == 'year' ? 'selected' : '' }}>This Year</option>
                        <option value="overall" {{ $period == 'overall' ? 'selected' : '' }}>Overall</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Date Range Filter -->
        <div class="lg:col-span-7">
            <form action="{{ route('admin.graphs.inventory') }}" method="GET" class="flex flex-col">
                <label class="block text-xs font-medium text-teal-700 mb-1.5">Custom Date Range</label>
                <div class="flex gap-2">
                    <!-- From Date -->
                    <div class="relative flex-1 min-w-[120px]">
                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input 
                            type="date" 
                            name="from_date" 
                            value="{{ $fromDate }}" 
                            class="pl-8 w-full h-10 text-xs border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white transition-colors"
                            aria-label="From date"
                        >
                    </div>
                    
                    <!-- Divider -->
                    <div class="flex items-center justify-center">
                        <span class="text-xs text-teal-700 px-1">to</span>
                    </div>
                    
                    <!-- To Date -->
                    <div class="relative flex-1 min-w-[120px]">
                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input 
                            type="date" 
                            name="to_date" 
                            value="{{ $toDate }}" 
                            class="pl-8 w-full h-10 text-xs border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white transition-colors"
                            aria-label="To date"
                        >
                    </div>
                    
                    <!-- Apply Button -->
                    <button 
                        type="submit" 
                        class="w-[80px] h-10 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors shadow-sm font-medium text-xs flex items-center justify-center"
                    >
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Apply
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Reset Button -->
        <div class="lg:col-span-2">
            <a 
                href="{{ route('admin.graphs.inventory') }}" 
                class="h-10 bg-white text-teal-700 border border-teal-200 rounded-lg hover:bg-teal-50 transition-colors shadow-sm font-medium text-xs flex items-center justify-center w-full"
            >
                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Reset
            </a>
        </div>
    </div>
    
    <!-- Active Filters Display - Shows when filters are applied -->
    @if($period != 'overall' || ($fromDate && $toDate))
        <div class="mt-3 pt-2 border-t border-teal-100 flex flex-wrap gap-2 items-center">
            <span class="text-xs text-teal-700">Active filters:</span>
            
            @if($period != 'overall' && !($fromDate && $toDate))
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-teal-100 text-teal-800">
                    {{ ucfirst($period) }}
                    <button type="button" onclick="window.location='{{ route('admin.graphs.inventory') }}'" class="ml-1 text-teal-600 hover:text-teal-800">
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </span>
            @endif
            
            @if($fromDate && $toDate)
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-teal-100 text-teal-800">
                    {{ \Carbon\Carbon::parse($fromDate)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($toDate)->format('M d, Y') }}
                    <button type="button" onclick="window.location='{{ route('admin.graphs.inventory', ['period' => $period]) }}'" class="ml-1 text-teal-600 hover:text-teal-800">
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </span>
            @endif
        </div>
    @endif
</div>

<!-- Usage Analytics Section -->
<div class="bg-white rounded-xl shadow-md overflow-hidden border border-teal-100 mb-6 sm:mb-8 transition-all hover:shadow-lg duration-300">
    <div class="px-4 sm:px-6 py-4 bg-gradient-to-r from-teal-50 to-white border-b border-teal-100 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0 bg-gradient-to-br from-teal-400 to-teal-600 p-2 rounded-lg shadow-sm">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-teal-800 flex items-center">
                    Usage Analytics
                    <span class="ml-2 px-2 py-0.5 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">{{ $period == 'overall' ? 'All Time' : ucfirst($period) }}</span>
                </h2>
                <p class="text-xs sm:text-sm text-teal-600">Track which items are being used most frequently</p>
            </div>
        </div>
    </div>
        
        <!-- Usage Graph -->
        <div class="p-3 sm:p-6">
            <div class="h-64 sm:h-80 rounded-lg overflow-hidden shadow-inner bg-gradient-to-b from-teal-50/30 to-white p-2 sm:p-4">
                <canvas id="inventoryUsageChart"></canvas>
            </div>
        </div>
        
        <!-- Usage Table -->
        <div class="border-t border-teal-100">
            <div class="px-4 sm:px-6 py-3 bg-gradient-to-r from-teal-50 to-white flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0">
                <h3 class="text-sm sm:text-md font-medium text-teal-700">Detailed Usage Data</h3>
                
                <!-- Export Buttons -->
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.graphs.inventory.pdf', ['period' => $period, 'from_date' => $fromDate, 'to_date' => $toDate]) }}" 
                       class="bg-red-600 text-white px-2.5 py-1.5 sm:px-3 sm:py-1.5 rounded-lg hover:bg-red-700 transition shadow-sm text-xs sm:text-sm font-medium flex items-center">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        PDF
                    </a>
                    <button onclick="exportToExcel()" 
                            class="bg-emerald-600 text-white px-2.5 py-1.5 sm:px-3 sm:py-1.5 rounded-lg hover:bg-emerald-700 transition shadow-sm text-xs sm:text-sm font-medium flex items-center">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Excel
                    </button>
                </div>
            </div>
            
            @if($allItems->count())
            <div class="overflow-x-auto">
                <div class="overflow-y-auto" style="max-height: 350px;">
                    <table id="inventoryTable" class="w-full table-auto">
                        <thead class="bg-teal-50 sticky top-0 z-10">
                            <tr>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Rank</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Item Name</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Category</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Unit</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap">Total Used</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-teal-50">
                            @foreach($allItems as $index => $item)
                            <tr class="hover:bg-teal-50/50 transition">
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-900 font-medium border-r border-teal-50">{{ $index + 1 }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-700 border-r border-teal-50">{{ $item->item_name }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600 border-r border-teal-50">{{ $item->category }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600 border-r border-teal-50">{{ $item->unit }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm font-medium text-teal-900">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $item->total_used }}</span>
                                        <div class="w-16 sm:w-24 bg-gray-200 rounded-full h-1.5 sm:h-2.5">
                                            <div class="bg-teal-600 h-1.5 sm:h-2.5 rounded-full" style="width: {{ min(100, ($item->total_used / max(1, $allItems->first()->total_used)) * 100) }}%"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="p-6 sm:p-8 text-center text-teal-500 bg-teal-50/50">
                <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-teal-300 mb-3 sm:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="text-base sm:text-lg font-medium">No usage data available for this time period.</p>
                <p class="text-xs sm:text-sm text-teal-500 mt-1">Try selecting a different date range or time period.</p>
            </div>
            @endif
        </div>
    </div>

<!-- Current Inventory Section -->
<div class="bg-white rounded-xl shadow-md overflow-hidden border border-teal-100 mb-6 sm:mb-8 transition-all hover:shadow-lg duration-300">
    <div class="px-4 sm:px-6 py-4 bg-gradient-to-r from-teal-50 to-white border-b border-teal-100 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0 bg-gradient-to-br from-teal-500 to-cyan-600 p-2 rounded-lg shadow-sm">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <div>
                <div class="flex items-center">
                    <h2 class="text-lg sm:text-xl font-semibold text-teal-800">Current Inventory</h2>
                    <div class="ml-2 flex items-center">
                        <span class="px-1.5 py-0.5 text-xs font-medium bg-teal-100 text-teal-800 rounded-full flex items-center">
                            <span class="w-1.5 h-1.5 bg-teal-500 rounded-full mr-1"></span>
                            {{ count($inventoryQuantityData) }} Items
                        </span>
                    </div>
                </div>
                <p class="text-xs sm:text-sm text-teal-600">Monitor stock levels and identify items that need replenishment</p>
            </div>
        </div>
        
        <div class="hidden sm:flex items-center space-x-2">
            <div class="flex items-center mr-2">
                <span class="w-2 h-2 rounded-full bg-red-500 mr-1"></span>
                <span class="text-xs text-gray-600">Low Stock</span>
            </div>
            <div class="flex items-center">
                <span class="w-2 h-2 rounded-full bg-teal-500 mr-1"></span>
                <span class="text-xs text-gray-600">Sufficient</span>
            </div>
        </div>
    </div>
        
        <!-- Quantity Graph -->
        <div class="p-3 sm:p-6">
            <div class="h-64 sm:h-80 rounded-lg overflow-hidden shadow-inner bg-gradient-to-b from-teal-50/30 to-white p-2 sm:p-4">
                <canvas id="inventoryQuantityChart"></canvas>
            </div>
        </div>
        
        <!-- Quantity Table -->
        <div class="border-t border-teal-100">
            <div class="px-4 sm:px-6 py-3 bg-gradient-to-r from-teal-50 to-white flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0">
                <h3 class="text-sm sm:text-md font-medium text-teal-700">Current Stock Levels</h3>
                
                <!-- Export Buttons -->
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.graphs.inventory.quantity.pdf') }}" 
                       class="bg-red-600 text-white px-2.5 py-1.5 sm:px-3 sm:py-1.5 rounded-lg hover:bg-red-700 transition shadow-sm text-xs sm:text-sm font-medium flex items-center">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        PDF
                    </a>
                    <button onclick="exportQuantityToExcel()" 
                            class="bg-emerald-600 text-white px-2.5 py-1.5 sm:px-3 sm:py-1.5 rounded-lg hover:bg-emerald-700 transition shadow-sm text-xs sm:text-sm font-medium flex items-center">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Excel
                    </button>
                </div>
            </div>
            
            @if(count($inventoryQuantityData) > 0)
            <div class="overflow-x-auto">
                <div class="overflow-y-auto" style="max-height: 350px;">
                    <table id="inventoryQuantityTable" class="w-full table-auto">
                        <thead class="bg-teal-50 sticky top-0 z-10">
                            <tr>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Rank</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Item Name</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Category</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Unit</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Quantity</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Min. Stock</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-teal-50">
                            @foreach($inventoryQuantityData as $index => $item)
                            <tr class="hover:bg-teal-50/50 transition {{ $item->quantity <= $item->minimum_stock_level ? 'bg-red-50/50' : '' }}">
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-900 font-medium border-r border-teal-50">{{ $index + 1 }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-700 border-r border-teal-50">{{ $item->item_name }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600 border-r border-teal-50">{{ $item->category }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600 border-r border-teal-50">{{ $item->unit }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm font-medium {{ $item->quantity <= $item->minimum_stock_level ? 'text-red-600' : 'text-teal-900' }} border-r border-teal-50">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600 border-r border-teal-50">{{ $item->minimum_stock_level }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm">
                                    @if($item->quantity <= $item->minimum_stock_level)
                                    <span class="px-2 py-0.5 sm:px-3 sm:py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full flex items-center w-fit">
                                        <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 mr-0.5 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                        Low Stock
                                    </span>
                                    @else
                                    <span class="px-2 py-0.5 sm:px-3 sm:py-1 text-xs font-medium bg-emerald-100 text-emerald-800 rounded-full flex items-center w-fit">
                                        <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 mr-0.5 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        In Stock
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="p-6 sm:p-8 text-center text-teal-500 bg-teal-50/50">
                <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-teal-300 mb-3 sm:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <p class="text-base sm:text-lg font-medium">No inventory items found.</p>
                <p class="text-xs sm:text-sm text-teal-500 mt-1">Add items to your inventory to see them here.</p>
            </div>
            @endif
        </div>
    </div>

<!-- Category Distribution Section -->
<div class="bg-white rounded-xl shadow-md overflow-hidden border border-teal-100 mb-6 sm:mb-8 transition-all hover:shadow-lg duration-300">
    <div class="px-4 sm:px-6 py-4 bg-gradient-to-r from-teal-50 to-white border-b border-teal-100 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0 bg-gradient-to-br from-indigo-400 to-teal-500 p-2 rounded-lg shadow-sm">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                </svg>
            </div>
            <div>
                <div class="flex items-center">
                    <h2 class="text-lg sm:text-xl font-semibold text-teal-800">Category Distribution</h2>
                    <div class="ml-2 flex items-center">
                        <span class="px-1.5 py-0.5 text-xs font-medium bg-indigo-100 text-indigo-800 rounded-full flex items-center">
                            <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full mr-1"></span>
                            {{ count($categoryData) }} Categories
                        </span>
                    </div>
                </div>
                <p class="text-xs sm:text-sm text-teal-600">Analyze inventory distribution across different categories</p>
            </div>
        </div>
    </div>
        
        <!-- Category Graphs -->
        <div class="p-3 sm:p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                <div class="bg-gradient-to-b from-teal-50/30 to-white rounded-lg shadow-inner p-2 sm:p-4">
                    <h4 class="text-xs sm:text-sm font-medium text-teal-700 mb-2 sm:mb-3 text-center">Number of Items by Category</h4>
                    <div class="h-56 sm:h-64">
                        <canvas id="categoryItemsChart"></canvas>
                    </div>
                </div>
                <div class="bg-gradient-to-b from-teal-50/30 to-white rounded-lg shadow-inner p-2 sm:p-4">
                    <h4 class="text-xs sm:text-sm font-medium text-teal-700 mb-2 sm:mb-3 text-center">Total Quantity by Category</h4>
                    <div class="h-56 sm:h-64">
                        <canvas id="categoryQuantityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Category Table -->
        <div class="border-t border-teal-100">
            <div class="px-4 sm:px-6 py-3 bg-gradient-to-r from-teal-50 to-white flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0">
                <h3 class="text-sm sm:text-md font-medium text-teal-700">Items by Category</h3>
                
                <!-- Export Buttons -->
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.graphs.inventory.category.pdf') }}" 
                       class="bg-red-600 text-white px-2.5 py-1.5 sm:px-3 sm:py-1.5 rounded-lg hover:bg-red-700 transition shadow-sm text-xs sm:text-sm font-medium flex items-center">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        PDF
                    </a>
                    <button onclick="exportCategoryToExcel()" 
                            class="bg-emerald-600 text-white px-2.5 py-1.5 sm:px-3 sm:py-1.5 rounded-lg hover:bg-emerald-700 transition shadow-sm text-xs sm:text-sm font-medium flex items-center">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Excel
                    </button>
                </div>
            </div>
            
            @if(isset($categoryData) && $categoryData->count() > 0)
            <div class="overflow-x-auto">
                <div class="overflow-y-auto" style="max-height: 350px;">
                    <table id="categoryTable" class="w-full table-auto">
                        <thead class="bg-teal-50 sticky top-0 z-10">
                            <tr>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Rank</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Category</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Number of Items</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100">Total Quantity</th>
                                <th class="px-3 sm:px-6 py-2 sm:py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap">Percentage</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-teal-50">
                            @php
                                $totalItems = $categoryData->sum('item_count');
                            @endphp
                            @foreach($categoryData as $index => $category)
                            <tr class="hover:bg-teal-50/50 transition">
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-900 font-medium border-r border-teal-50">{{ $index + 1 }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm font-medium text-teal-700 border-r border-teal-50">{{ $category->category }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600 border-r border-teal-50">{{ $category->item_count }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600 border-r border-teal-50">{{ $category->total_quantity }}</td>
                                <td class="px-3 sm:px-6 py-2 sm:py-4 text-xs sm:text-sm text-teal-600">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ round(($category->item_count / $totalItems) * 100, 1) }}%</span>
                                        <div class="w-16 sm:w-24 bg-gray-200 rounded-full h-1.5 sm:h-2.5">
                                        <div class="bg-teal-600 h-1.5 sm:h-2.5 rounded-full" style="width: {{ round(($category->item_count / $totalItems) * 100, 1) }}%"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="p-6 sm:p-8 text-center text-teal-500 bg-teal-50/50">
                <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-teal-300 mb-3 sm:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <p class="text-base sm:text-lg font-medium">No category data available.</p>
                <p class="text-xs sm:text-sm text-teal-500 mt-1">Add items with categories to see distribution data.</p>
            </div>
            @endif
        </div>
    </div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Register Chart.js plugins for data labels
    Chart.register(ChartDataLabels);
    
    // Define common chart configuration options
    const commonOptions = {
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
            },
            datalabels: {
                display: false
            }
        }
    };
    
    // Generate color palette for charts
    function generateTealPalette(count) {
        const baseColors = [
            'rgba(20, 184, 166, 0.85)',  // teal-500
            'rgba(13, 148, 136, 0.85)',  // teal-600
            'rgba(15, 118, 110, 0.85)',  // teal-700
            'rgba(17, 94, 89, 0.85)',    // teal-800
            'rgba(19, 78, 74, 0.85)',    // teal-900
            'rgba(45, 212, 191, 0.85)',  // teal-400
            'rgba(94, 234, 212, 0.85)',  // teal-300
            'rgba(153, 246, 228, 0.85)', // teal-200
            'rgba(8, 145, 178, 0.85)',   // cyan-600
            'rgba(6, 182, 212, 0.85)',   // cyan-500
            'rgba(14, 116, 144, 0.85)',  // cyan-700
            'rgba(22, 78, 99, 0.85)',    // cyan-800
            'rgba(5, 150, 105, 0.85)',   // emerald-600
            'rgba(16, 185, 129, 0.85)',  // emerald-500
            'rgba(4, 120, 87, 0.85)',    // emerald-700
        ];
        
        if (count > baseColors.length) {
            for (let i = baseColors.length; i < count; i++) {
                const r = Math.floor(Math.random() * 100) + 20;
                const g = Math.floor(Math.random() * 100) + 120;
                const b = Math.floor(Math.random() * 100) + 120;
                baseColors.push(`rgba(${r}, ${g}, ${b}, 0.85)`);
            }
        }
        return baseColors.slice(0, count);
    }
    
    // Get responsive font sizes based on screen width
    function getResponsiveFontSize() {
        return window.innerWidth < 640 ? {
            title: 12,
            label: 10,
            tick: 9,
            datalabel: 9
        } : {
            title: 14,
            label: 11,
            tick: 10,
            datalabel: 10
        };
    }
    
    // Listen for window resize events
    window.addEventListener('resize', function() {
        // You could implement dynamic chart updates here if needed
    });
    
    // Create inventory usage chart
    const items = {!! json_encode($allItems) !!};
    if (items.length > 0) {
        const topItems = items.slice(0, 15);
        const itemNames = topItems.map(item => item.item_name);
        const itemUsage = topItems.map(item => item.total_used);
        
        const colors = generateTealPalette(topItems.length);
        const fontSizes = getResponsiveFontSize();
        
        const ctx = document.getElementById('inventoryUsageChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: itemNames,
                datasets: [{
                    label: 'Total Used',
                    data: itemUsage,
                    backgroundColor: colors,
                    borderColor: colors.map(color => color.replace('0.85', '1')),
                    borderWidth: 1,
                    borderRadius: 4,
                    barThickness: 'flex',
                    maxBarThickness: 35
                }]
            },
            options: {
                ...commonOptions,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(226, 232, 240, 0.6)'
                        },
                        ticks: {
                            font: {
                                size: fontSizes.tick
                            }
                        },
                        title: {
                            display: true,
                            text: 'Units Used',
                            font: {
                                size: fontSizes.label,
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
                                size: fontSizes.tick
                            }
                        }
                    }
                },
                plugins: {
                    ...commonOptions.plugins,
                    title: {
                        display: true,
                        text: 'Top 15 Most Used Items',
                        font: {
                            size: fontSizes.title,
                            weight: 'bold'
                        },
                        color: '#0F766E',
                        padding: {
                            bottom: 15
                        }
                    },
                    legend: {
                        display: false
                    },
                    datalabels: {
                        display: true,
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: fontSizes.datalabel
                        },
                        formatter: function(value) {
                            if (value > 0) return value;
                            return '';
                        },
                        anchor: 'end',
                        align: 'top',
                        offset: -4
                    }
                }
            }
        });
    }
    
    // Create inventory quantity chart
    const quantityItems = {!! json_encode($inventoryQuantityData) !!};
    if (quantityItems.length > 0) {
        const topQuantityItems = quantityItems.slice(0, 15);
        const itemLabels = topQuantityItems.map(item => item.item_name);
        const itemQuantities = topQuantityItems.map(item => item.quantity);
        const minStockLevels = topQuantityItems.map(item => item.minimum_stock_level);
        
        const quantityColors = topQuantityItems.map(item =>
            item.quantity <= item.minimum_stock_level ? 'rgba(239, 68, 68, 0.85)' : 'rgba(16, 185, 129, 0.85)'
        );
        
        const fontSizes = getResponsiveFontSize();
        
        const quantityCtx = document.getElementById('inventoryQuantityChart').getContext('2d');
        new Chart(quantityCtx, {
            type: 'bar',
            data: {
                labels: itemLabels,
                datasets: [
                    {
                        label: 'Current Quantity',
                        data: itemQuantities,
                        backgroundColor: quantityColors,
                        borderColor: quantityColors.map(color => color.replace('0.85', '1')),
                        borderWidth: 1,
                        borderRadius: 4,
                        barThickness: 'flex',
                        maxBarThickness: 35
                    },
                    {
                        label: 'Minimum Stock Level',
                        data: minStockLevels,
                        type: 'line',
                        borderColor: 'rgba(107, 114, 128, 0.8)',
                        borderWidth: 2,
                        borderDash: [5, 5],
                        fill: false,
                        pointRadius: 0,
                        tension: 0.1
                    }
                ]
            },
            options: {
                ...commonOptions,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(226, 232, 240, 0.6)'
                        },
                        ticks: {
                            font: {
                                size: fontSizes.tick
                            }
                        },
                        title: {
                            display: true,
                            text: 'Quantity',
                            font: {
                                size: fontSizes.label,
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
                                size: fontSizes.tick
                            }
                        }
                    }
                },
                plugins: {
                    ...commonOptions.plugins,
                    title: {
                        display: true,
                        text: 'Current Stock Levels vs Minimum Requirements',
                        font: {
                            size: fontSizes.title,
                            weight: 'bold'
                        },
                        color: '#0F766E',
                        padding: {
                            bottom: 15
                        }
                    },
                    datalabels: {
                        display: true,
                        color: function(context) {
                            return context.dataset.label === 'Current Quantity' ? '#fff' : 'rgba(107, 114, 128, 0.8)';
                        },
                        font: {
                            weight: 'bold',
                            size: fontSizes.datalabel
                        },
                        formatter: function(value, context) {
                            if (context.dataset.label === 'Current Quantity' && value > 0) return value;
                            return '';
                        },
                        anchor: 'end',
                        align: 'top',
                        offset: -4
                    }
                }
            }
        });
    }
    
    // Create category distribution charts
    @if(isset($categoryData) && $categoryData->count() > 0)
    const categoryData = {!! json_encode($categoryData) !!};
    if (categoryData.length > 0) {
        const categories = categoryData.map(cat => cat.category);
        const itemCounts = categoryData.map(cat => cat.item_count);
        const quantityTotals = categoryData.map(cat => cat.total_quantity);
        
        const categoryColors = generateTealPalette(categories.length);
        const fontSizes = getResponsiveFontSize();
        
        // Create items by category chart (doughnut)
        const categoryItemsCtx = document.getElementById('categoryItemsChart').getContext('2d');
        new Chart(categoryItemsCtx, {
            type: 'doughnut',
            data: {
                labels: categories,
                datasets: [{
                    data: itemCounts,
                    backgroundColor: categoryColors,
                    borderColor: 'rgba(255, 255, 255, 0.8)',
                    borderWidth: 2,
                    hoverOffset: 15
                }]
            },
            options: {
                ...commonOptions,
                cutout: '60%',
                plugins: {
                    ...commonOptions.plugins,
                    legend: {
                        position: window.innerWidth < 640 ? 'bottom' : 'right',
                        labels: {
                            boxWidth: 10,
                            font: {
                                size: fontSizes.tick - 1
                            },
                            padding: window.innerWidth < 640 ? 10 : 15
                        }
                    },
                    datalabels: {
                        display: true,
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: fontSizes.datalabel - 1
                        },
                        formatter: function(value, context) {
                            const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                            const percentage = Math.round((value / total) * 100);
                            if (percentage < 5) return '';
                            return percentage + '%';
                        },
                        anchor: 'center',
                        align: 'center'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} items (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
        
        // Create total quantity by category chart (bar)
        const categoryQuantityCtx = document.getElementById('categoryQuantityChart').getContext('2d');
        new Chart(categoryQuantityCtx, {
            type: 'bar',
            data: {
                labels: categories,
                datasets: [{
                    label: 'Total Quantity',
                    data: quantityTotals,
                    backgroundColor: categoryColors,
                    borderColor: categoryColors.map(color => color.replace('0.85', '1')),
                    borderWidth: 1,
                    borderRadius: 4,
                    barThickness: 'flex',
                    maxBarThickness: 35
                }]
            },
            options: {
                ...commonOptions,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(226, 232, 240, 0.6)'
                        },
                        ticks: {
                            font: {
                                size: fontSizes.tick
                            }
                        },
                        title: {
                            display: true,
                            text: 'Total Quantity',
                            font: {
                                size: fontSizes.label,
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
                                size: fontSizes.tick
                            }
                        }
                    }
                },
                plugins: {
                    ...commonOptions.plugins,
                    legend: {
                        display: false
                    },
                    datalabels: {
                        display: true,
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: fontSizes.datalabel
                        },
                        formatter: function(value) {
                            if (value > 0) return value;
                            return '';
                        },
                        anchor: 'end',
                        align: 'top',
                        offset: -4
                    }
                }
            }
        });
    }
    @else
    // Display empty state messages when no category data exists
    const categoryItemsCtx = document.getElementById('categoryItemsChart').getContext('2d');
    categoryItemsCtx.font = '14px Inter, sans-serif';
    categoryItemsCtx.fillStyle = '#0F766E';
    categoryItemsCtx.textAlign = 'center';
    categoryItemsCtx.fillText('No category data available', categoryItemsCtx.canvas.width / 2, categoryItemsCtx.canvas.height / 2);
    
    const categoryQuantityCtx = document.getElementById('categoryQuantityChart').getContext('2d');
    categoryQuantityCtx.font = '14px Inter, sans-serif';
    categoryQuantityCtx.fillStyle = '#0F766E';
    categoryQuantityCtx.textAlign = 'center';
    categoryQuantityCtx.fillText('No category data available', categoryQuantityCtx.canvas.width / 2, categoryQuantityCtx.canvas.height / 2);
    @endif
    
    // Excel export function for inventory usage data
    window.exportToExcel = function() {
        const table = document.getElementById('inventoryTable');
        if (!table) {
            alert('No data available to export');
            return;
        }
        
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.table_to_sheet(table);
        XLSX.utils.book_append_sheet(wb, ws, 'Inventory Usage');
        
        const period = '{{ $period }}';
        const fromDate = '{{ $fromDate }}';
        const toDate = '{{ $toDate }}';
        let filename = 'inventory_usage_';
        
        if (fromDate && toDate) {
            filename += 'custom_range.xlsx';
        } else {
            filename += period + '.xlsx';
        }
        
        XLSX.writeFile(wb, filename);
    };
    
    // Excel export function for inventory quantity data
    window.exportQuantityToExcel = function() {
        const table = document.getElementById('inventoryQuantityTable');
        if (!table) {
            alert('No data available to export');
            return;
        }
        
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.table_to_sheet(table);
        XLSX.utils.book_append_sheet(wb, ws, 'Inventory Quantities');
        XLSX.writeFile(wb, 'inventory_quantity_report.xlsx');
    };
    
    // Excel export function for category distribution data
    window.exportCategoryToExcel = function() {
        const table = document.getElementById('categoryTable');
        if (!table) {
            alert('No data available to export');
            return;
        }
        
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.table_to_sheet(table);
        XLSX.utils.book_append_sheet(wb, ws, 'Category Distribution');
        XLSX.writeFile(wb, 'inventory_category_report.xlsx');
    };
});
</script>
                
@endpush
</x-sidebar-layout>