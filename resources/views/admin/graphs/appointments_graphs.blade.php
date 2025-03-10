<x-sidebar-layout>
    <!-- Header Section -->
    <div class="mb-8 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Appointment Analytics</h1>
                        <p class="text-teal-100">Track and analyze appointment statistics</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 flex space-x-3">
                    <a href="{{ route('admin.graphs.appointments.pdf') }}?status={{ $status }}&filter={{ $filter }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-teal-700 bg-white hover:bg-teal-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors duration-150"
                        target="_blank">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        Export PDF
                    </a>
                    <button id="exportExcel"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-teal-700 bg-white hover:bg-teal-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors duration-150">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Export Excel
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
            <div class="flex items-center text-sm text-teal-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Showing data from {{ \Carbon\Carbon::parse($startDate)->format('M d, Y') }} to {{ \Carbon\Carbon::parse($endDate)->format('M d, Y') }}</span>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="bg-gradient-to-r from-teal-50 to-white rounded-xl shadow-sm p-5 mb-6 border border-teal-100">
        <form id="filterForm" action="{{ route('admin.graphs.appointments') }}" method="GET" class="flex flex-wrap gap-4 items-end">
            <input type="hidden" name="status" value="{{ $status }}">
            
            <!-- Filter Period -->
            <div class="flex-1 min-w-[200px]">
                <label for="filter" class="block text-sm font-medium text-teal-700 mb-1">Filter Period:</label>
                <div class="relative">
                    <select class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none"
                        id="filter" name="filter" onchange="this.form.submit()">
                        <option value="today" {{ $filter == 'today' ? 'selected' : '' }}>Today</option>
                        <option value="this_week" {{ $filter == 'this_week' ? 'selected' : '' }}>This Week</option>
                        <option value="this_month" {{ $filter == 'this_month' ? 'selected' : '' }}>This Month</option>
                        <option value="last_30_days" {{ $filter == 'last_30_days' ? 'selected' : '' }}>Last 30 Days</option>
                        <option value="last_3_months" {{ $filter == 'last_3_months' ? 'selected' : '' }}>Last 3 Months</option>
                        <option value="last_90_days" {{ $filter == 'last_90_days' ? 'selected' : '' }}>Last 90 Days</option>
                        <option value="last_6_months" {{ $filter == 'last_6_months' ? 'selected' : '' }}>Last 6 Months</option>
                        <option value="this_year" {{ $filter == 'this_year' ? 'selected' : '' }}>This Year</option>
                        <option value="all_time" {{ $filter == 'all_time' ? 'selected' : '' }}>All Time</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Search Box -->
            <div class="flex-1 min-w-[200px]">
                <label for="search" class="block text-sm font-medium text-teal-700 mb-1">Search Appointments</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="tableSearch"
                        placeholder="Search appointments..."
                        class="pl-10 w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white"
                    />
                </div>
            </div>
            
            <!-- Apply Filters Button -->
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
                    href="{{ route('admin.graphs.appointments') }}"
                    class="bg-white text-teal-700 border border-teal-200 px-5 py-2.5 rounded-lg hover:bg-teal-50 transition shadow-sm font-medium inline-block"
                >
                    Reset
                </a>
            </div>
        </form>
    </div>

<!-- Status Tabs -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6 border border-teal-100">
    <div class="border-b border-teal-100">
        <!-- Desktop Tabs (hidden on small screens) -->
        <nav class="hidden sm:flex" aria-label="Status Tabs">
            @php
            $statuses = ['Pending', 'Approved', 'Attended', 'Unattended', 'Cancelled'];
            $statusColors = [
                'Pending' => 'amber',
                'Approved' => 'emerald',
                'Attended' => 'teal',
                'Unattended' => 'rose',
                'Cancelled' => 'gray'
            ];
            @endphp
            
            @foreach($statuses as $statusTab)
            <a href="{{ route('admin.graphs.appointments', ['status' => $statusTab, 'filter' => $filter]) }}"
                class="{{ $status == $statusTab
                    ? 'border-b-2 border-'.$statusColors[$statusTab].'-500 text-'.$statusColors[$statusTab].'-600 bg-'.$statusColors[$statusTab].'-50'
                    : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 hover:bg-gray-50' }}
                    flex-1 py-4 px-3 text-center font-medium text-sm transition-colors duration-150">
                <span class="flex items-center justify-center">
                    @if($status == $statusTab)
                    <span class="w-2 h-2 rounded-full bg-{{ $statusColors[$statusTab] }}-500 mr-2"></span>
                    @endif
                    {{ $statusTab }}
                </span>
            </a>
            @endforeach
        </nav>
        
        <!-- Mobile Dropdown (visible only on small screens) -->
        <div class="sm:hidden p-2">
            <label for="status-tabs-mobile" class="sr-only">Select a status</label>
            <select id="status-tabs-mobile" 
                    onchange="window.location.href=this.value"
                    class="block w-full rounded-md border-teal-300 py-2 pl-3 pr-10 text-base focus:border-teal-500 focus:outline-none focus:ring-teal-500 sm:text-sm">
                @foreach($statuses as $statusTab)
                <option value="{{ route('admin.graphs.appointments', ['status' => $statusTab, 'filter' => $filter]) }}"
                        {{ $status == $statusTab ? 'selected' : '' }}>
                    {{ $statusTab }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="flex flex-col sm:flex-row gap-4 mb-6">
    <!-- Total Appointments Card -->
    <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl shadow-md overflow-hidden border border-teal-200 hover:shadow-lg transition-shadow duration-300 flex-1">
        <div class="p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-white bg-opacity-70 rounded-lg p-3 shadow-sm">
                    <svg class="h-6 w-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="ml-4 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-teal-800 truncate">
                            Total {{ $status }} Appointments
                        </dt>
                        <dd class="mt-1">
                            <div class="text-xl font-bold text-teal-900">
                                {{ count($appointments) }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Current Status Card -->
    <div class="bg-gradient-to-br from-{{ $statusColors[$status] }}-50 to-{{ $statusColors[$status] }}-100 rounded-xl shadow-md overflow-hidden border border-{{ $statusColors[$status] }}-200 hover:shadow-lg transition-shadow duration-300 flex-1">
        <div class="p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-white bg-opacity-70 rounded-lg p-3 shadow-sm">
                    <svg class="h-6 w-6 text-{{ $statusColors[$status] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </div>
                <div class="ml-4 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-{{ $statusColors[$status] }}-800 truncate">
                            Currently in {{ $status }} Status
                        </dt>
                        <dd class="mt-1">
                            <div class="text-xl font-bold text-{{ $statusColors[$status] }}-900">
                                {{ $appointments->where('status', $status)->count() }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Date Range Card -->
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-md overflow-hidden border border-blue-200 hover:shadow-lg transition-shadow duration-300 flex-1">
        <div class="p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-white bg-opacity-70 rounded-lg p-3 shadow-sm">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="ml-4 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-blue-800 truncate">
                            Date Range
                        </dt>
                        <dd class="mt-1">
                            <div class="text-sm font-medium text-blue-900 bg-white bg-opacity-60 px-2 py-1 rounded-md inline-block">
                                {{ \Carbon\Carbon::parse($startDate)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('M d, Y') }}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Graph Section -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8 border border-teal-200">
        <div class="px-6 py-5 border-b border-teal-200 bg-gradient-to-r from-teal-100 to-white">
            <h3 class="text-lg font-semibold text-teal-800">
                {{ $status }} Appointments Over Time
                <span class="text-sm font-normal text-teal-600 ml-2">(Includes all appointments that were ever in {{ $status }} status)</span>
            </h3>
        </div>
        <div class="p-6">
            <div class="h-80">
                <canvas id="appointmentsChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-teal-100">
        <div class="px-6 py-5 border-b border-teal-100 bg-gradient-to-r from-teal-50 to-white">
            <h3 class="text-lg font-semibold text-teal-700">
                {{ $status }} Appointments List
                <span class="text-sm font-normal text-teal-500 block sm:inline-block mt-1 sm:mt-0 sm:ml-2">(Includes all appointments that were ever in {{ $status }} status)</span>
            </h3>
        </div>
        
        <div class="overflow-x-auto">
            <table id="appointmentsTable" class="w-full table-auto">
                <thead class="bg-gradient-to-r from-teal-50 to-teal-100">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Patient Name</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Email</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Phone</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Date</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Time</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Doctor</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Appointment Type</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Current Status</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap">{{ $status }} Since/Until</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-teal-100" id="appointmentsTableBody">
                    @forelse($appointments as $appointment)
                        <tr class="hover:bg-teal-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-50">{{ $appointment->patient_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $appointment->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $appointment->phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ \Carbon\Carbon::parse($appointment->date)->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">
                                @if(strpos($appointment->time, '-') !== false)
                                    {{ $appointment->time }}
                                @else
                                    {{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $appointment->doctor }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $appointment->appointments }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-teal-50">
                                @php
                                    $statusClass = match($appointment->status) {
                                        'Pending' => 'bg-amber-100 text-amber-800',
                                        'Approved' => 'bg-emerald-100 text-emerald-800',
                                        'Attended' => 'bg-teal-100 text-teal-800',
                                        'Unattended' => 'bg-rose-100 text-rose-800',
                                        'Cancelled' => 'bg-gray-100 text-gray-800',
                                        default => 'bg-blue-100 text-blue-800'
                                    };
                                @endphp
                                <span class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full {{ $statusClass }}">
                                    {{ $appointment->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600">
                                @if($appointment->status == $status)
                                    @php
                                        // Find when the appointment entered this status
                                        $statusChange = $appointment->statusHistory()
                                            ->where('to_status', $status)
                                            ->orderBy('created_at', 'desc')
                                            ->first();
                                        $sinceDate = $statusChange ?
                                            $statusChange->created_at :
                                            ($status == 'Pending' ? $appointment->created_at : $appointment->updated_at);
                                    @endphp
                                    <span class="text-emerald-600 font-medium">Since:</span>
                                    {{ $sinceDate->format('M d, Y h:i A') }}
                                @else
                                    @php
                                        // Find when the appointment entered this status
                                        $enteredStatus = $appointment->statusHistory()
                                            ->where('to_status', $status)
                                            ->orderBy('created_at', 'asc')
                                            ->first();
                                        // Find when the appointment left this status
                                        $leftStatus = $appointment->statusHistory()
                                            ->where('from_status', $status)
                                            ->orderBy('created_at', 'asc')
                                            ->first();
                                        // For Pending status, all appointments start as Pending
                                        if ($status == 'Pending' && !$enteredStatus) {
                                            $enteredStatus = (object)['created_at' => $appointment->created_at];
                                        }
                                    @endphp
                                    @if($enteredStatus)
                                        <span class="text-emerald-600 font-medium">Since:</span>
                                        {{ $enteredStatus->created_at->format('M d, Y h:i A') }}
                                        <br>
                                        @if($leftStatus)
                                            <span class="text-rose-600 font-medium">Until:</span>
                                            {{ $leftStatus->created_at->format('M d, Y h:i A') }}
                                        @elseif($status == 'Pending' && $appointment->status != 'Pending')
                                            <span class="text-rose-600 font-medium">Until:</span>
                                            <span class="text-gray-500">{{ $appointment->updated_at->format('M d, Y h:i A') }}</span>
                                            <span class="text-xs text-amber-600">(estimated)</span>
                                        @endif
                                    @else
                                        <span class="text-gray-400">Never in this status</span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 text-center">No {{ strtolower($status) }} appointments found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- No Results Message -->
        <div id="noResultsMessage" class="hidden px-6 py-4 text-center text-teal-600">
            No appointments match your search criteria
        </div>
        
        <!-- Pagination if needed -->
        @if(method_exists($appointments, 'links') && $appointments->hasPages())
            <div class="p-4 border-t border-teal-100">
                {{ $appointments->withQueryString()->links() }}
            </div>
        @endif
        
        <!-- Note about data -->
        <div class="px-6 py-4 bg-amber-50 border-t border-amber-100">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-amber-700">
                        This report includes all appointments that were ever in the <span class="font-medium">{{ $status }}</span> status, even if they are currently in a different status.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize chart data from server
            const dates = {!! $dates !!};
            const counts = {!! $counts !!};
            const filter = '{{ $filter }}';
            const status = '{{ $status }}';
            
            // Fix duplicate month labels for yearly view
            if (filter === 'this_year') {
                const monthCounts = {};
                
                dates.forEach((date, index) => {
                    if (!monthCounts[date]) {
                        monthCounts[date] = 0;
                    }
                    monthCounts[date] += counts[index];
                });
                
                const uniqueDates = Object.keys(monthCounts);
                const aggregatedCounts = uniqueDates.map(date => monthCounts[date]);
                
                const monthOrder = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                const sortedMonths = [...uniqueDates].sort((a, b) => {
                    return monthOrder.indexOf(a) - monthOrder.indexOf(b);
                });
                
                const sortedCounts = sortedMonths.map(month => monthCounts[month]);
                
                dates.length = 0;
                counts.length = 0;
                
                sortedMonths.forEach((month, i) => {
                    dates.push(month);
                    counts.push(sortedCounts[i]);
                });
            }
            
            // Configure chart display options
            let chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    },
                    x: {
                        ticks: {}
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItems) {
                                return tooltipItems[0].label;
                            },
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed.y;
                                label += ' (includes all appointments that were ever ' + status + ')';
                                return label;
                            }
                        }
                    },
                    legend: {
                        labels: {
                            generateLabels: function(chart) {
                                const defaultLabels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
                                defaultLabels[0].text += ' (All-time)';
                                return defaultLabels;
                            }
                        }
                    }
                }
            };
            
            // Optimize x-axis for large datasets
            if (dates.length > 31) {
                chartOptions.scales.x.ticks.autoSkip = true;
                chartOptions.scales.x.ticks.maxTicksLimit = 15;
            }
            
            // Set chart type to bar
            const chartType = 'bar';
            
            // Set status-specific colors
            let borderColor, backgroundColor;
            switch(status) {
                case 'Pending':
                    borderColor = 'rgba(251, 191, 36, 1)';
                    backgroundColor = 'rgba(251, 191, 36, 0.7)';
                    break;
                case 'Approved':
                    borderColor = 'rgba(16, 185, 129, 1)';
                    backgroundColor = 'rgba(16, 185, 129, 0.7)';
                    break;
                case 'Attended':
                    borderColor = 'rgba(20, 184, 166, 1)';
                    backgroundColor = 'rgba(20, 184, 166, 0.7)';
                    break;
                case 'Unattended':
                    borderColor = 'rgba(244, 63, 94, 1)';
                    backgroundColor = 'rgba(244, 63, 94, 0.7)';
                    break;
                case 'Cancelled':
                    borderColor = 'rgba(107, 114, 128, 1)';
                    backgroundColor = 'rgba(107, 114, 128, 0.7)';
                    break;
                default:
                    borderColor = 'rgba(20, 184, 166, 1)';
                    backgroundColor = 'rgba(20, 184, 166, 0.7)';
            }
            
            // Configure bar chart styling
            chartOptions.scales.x.grid = {
                display: false
            };
            
            chartOptions.scales.y.grid = {
                color: 'rgba(200, 200, 200, 0.2)'
            };
            
            chartOptions.barPercentage = 0.8;
            chartOptions.categoryPercentage = 0.7;
            
            // Initialize chart
            const ctx = document.getElementById('appointmentsChart').getContext('2d');
            const appointmentsChart = new Chart(ctx, {
                type: chartType,
                data: {
                    labels: dates,
                    datasets: [{
                        label: status + ' Appointments',
                        data: counts,
                        backgroundColor: backgroundColor,
                        borderColor: borderColor,
                        borderWidth: 1,
                        borderRadius: 4,
                        hoverBackgroundColor: borderColor,
                        hoverBorderColor: borderColor
                    }]
                },
                options: chartOptions
            });
            
            // Setup Excel export functionality
            document.getElementById('exportExcel').addEventListener('click', function() {
                const wb = XLSX.utils.book_new();
                const table = document.getElementById('appointmentsTable');
                const ws = XLSX.utils.table_to_sheet(table);
                
                XLSX.utils.book_append_sheet(wb, ws, status + ' Appointments');
                
                const filterValue = document.getElementById('filter').value;
                let filename = `${status.toLowerCase()}_appointments_${filterValue}_${new Date().toISOString().split('T')[0]}.xlsx`;
                XLSX.writeFile(wb, filename);
            });
            
            // Setup table search functionality
            const tableSearch = document.getElementById('tableSearch');
            const tableBody = document.getElementById('appointmentsTableBody');
            const noResultsMessage = document.getElementById('noResultsMessage');
            
            tableSearch.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = tableBody.querySelectorAll('tr');
                let hasResults = false;
                
                rows.forEach(row => {
                    if (row.querySelector('td[colspan]')) {
                        return;
                    }
                    
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.classList.remove('hidden');
                        hasResults = true;
                    } else {
                        row.classList.add('hidden');
                    }
                });
                
                if (hasResults || searchTerm === '') {
                    noResultsMessage.classList.add('hidden');
                } else {
                    noResultsMessage.classList.remove('hidden');
                }
            });
        });
        </script>
    @endpush
</x-sidebar-layout>