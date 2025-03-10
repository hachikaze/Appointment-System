<x-sidebar-layout>
    <!-- Header Section -->
    <div class="mb-8 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-700 to-teal-800 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Appointment Status History</h1>
                        <p class="text-teal-100">Track status changes over time</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Status Analytics
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
            <div class="flex items-center text-sm text-teal-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>View appointments that were in a specific status during a selected time period.</span>
            </div>
        </div>
    </div>

    <!-- Filter Form -->
    <div class="mb-6 bg-gradient-to-r from-teal-50 to-white rounded-xl shadow-sm p-5 border border-teal-100">
        <form id="reportForm" action="{{ route('admin.reports.status_during_period') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="status" class="block text-sm font-medium text-teal-700 mb-1">Status:</label>
                    <div class="relative">
                        <select id="status" name="status" class="w-full p-2.5 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 bg-white appearance-none">
                            @foreach($statuses as $statusOption)
                                <option value="{{ $statusOption }}" {{ $status == $statusOption ? 'selected' : '' }}>
                                    {{ $statusOption }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="start_date" class="block text-sm font-medium text-teal-700 mb-1">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $startDate }}"
                           class="w-full p-2.5 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 bg-white">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-teal-700 mb-1">End Date:</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $endDate }}"
                           class="w-full p-2.5 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 bg-white">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="py-2.5 px-4 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-teal-700 hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 w-full flex items-center justify-center">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Generate Report
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Report Summary Card -->
    <div class="mb-6 bg-white rounded-lg shadow-sm border border-teal-200 overflow-hidden">
        <div class="bg-gradient-to-r from-teal-50 to-white px-6 py-4 border-b border-teal-200">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div>
                    <h3 class="text-lg font-semibold text-teal-800">Report Summary</h3>
                    <p class="text-sm text-teal-600 mt-1">
                        Showing appointments that were <span class="font-medium text-teal-700">{{ $status }}</span> between 
                        <span class="font-medium text-teal-700">{{ \Carbon\Carbon::parse($startDate)->format('M d, Y') }}</span> and 
                        <span class="font-medium text-teal-700">{{ \Carbon\Carbon::parse($endDate)->format('M d, Y') }}</span>
                    </p>
                </div>
                <div class="mt-4 md:mt-0 flex items-center">
                <div class="bg-teal-100 text-teal-800 px-4 py-2 rounded-lg mr-4 flex items-center">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="font-bold">{{ count($appointments) }}</span>
                    <span class="ml-1">appointments</span>
                </div>
                    <a href="{{ route('admin.reports.status_during_period.pdf', ['status' => $status, 'start_date' => $startDate, 'end_date' => $endDate]) }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-teal-700 hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 shadow-sm"
                       target="_blank">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        Export PDF
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Appointments Table -->
    <div class="bg-white rounded-lg shadow-sm border border-teal-200 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-teal-200 bg-gradient-to-r from-teal-50 to-white flex justify-between items-center">
            <h3 class="text-lg font-semibold text-teal-800">Appointment Details</h3>
            
            <!-- Search Box -->
            <div class="relative w-64">
                <input type="text" id="tableSearch" placeholder="Search appointments..." 
                       class="w-full pl-10 pr-4 py-2 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto max-h-[500px]">
            <table id="appointmentsTable" class="min-w-full divide-y divide-teal-200">
                <thead class="bg-teal-50 sticky top-0 z-10">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Patient Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Time</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Doctor</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Current Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">{{ $status }} Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-teal-700 uppercase tracking-wider">{{ $status }} Since/Until</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-teal-100">
                    @forelse($appointments as $appointment)
                        <tr class="hover:bg-teal-50 transition" 
                            data-patient="{{ strtolower($appointment->patient_name) }}" 
                            data-doctor="{{ strtolower($appointment->doctor) }}"
                            data-date="{{ \Carbon\Carbon::parse($appointment->date)->format('M d, Y') }}"
                            data-time="{{ strpos($appointment->time, '-') !== false ? $appointment->time : \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}"
                            data-status="{{ strtolower($appointment->status) }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-teal-900 border-r border-teal-50">{{ $appointment->patient_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ \Carbon\Carbon::parse($appointment->date)->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">
                                @if(strpos($appointment->time, '-') !== false)
                                    {{ $appointment->time }}
                                @else
                                    {{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $appointment->doctor }}</td>
                            <!-- Current Status Column -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm border-r border-teal-50">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                    @if($appointment->status == 'Pending') bg-amber-100 text-amber-800
                                    @elseif($appointment->status == 'Approved') bg-emerald-100 text-emerald-800
                                    @elseif($appointment->status == 'Attended') bg-teal-100 text-teal-800
                                    @elseif($appointment->status == 'Unattended') bg-rose-100 text-rose-800
                                    @elseif($appointment->status == 'Cancelled') bg-gray-100 text-gray-800
                                    @endif">
                                    {{ $appointment->status }}
                                </span>
                            </td>
                            <!-- Selected Status Column -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm border-r border-teal-50">
                                @if($appointment->status == $status)
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if($status == 'Pending') bg-amber-100 text-amber-800
                                        @elseif($status == 'Approved') bg-emerald-100 text-emerald-800
                                        @elseif($status == 'Attended') bg-teal-100 text-teal-800
                                        @elseif($status == 'Unattended') bg-rose-100 text-rose-800
                                        @elseif($status == 'Cancelled') bg-gray-100 text-gray-800
                                        @endif">
                                        Current
                                    </span>
                                @else
                                    @php
                                        $wasInStatus = false;
                                        if ($status == 'Pending') {
                                            // All appointments start as Pending
                                            $wasInStatus = true;
                                        } else {
                                            // Check if it was ever in this status
                                            $wasInStatus = $appointment->statusHistory()
                                                ->where('to_status', $status)
                                                ->exists();
                                        }
                                    @endphp
                                    @if($wasInStatus)
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-50 text-teal-700 border border-teal-300">
                                            Previously
                                        </span>
                                    @else
                                        <span class="text-xs text-gray-400">Never</span>
                                    @endif
                                @endif
                            </td>
                            <!-- Since/Until Column -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600">
                                @if($appointment->status == $status)
                                    <div class="flex items-center">
                                        <span class="flex items-center text-emerald-600 font-medium">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Since:
                                        </span> 
                                        <span class="ml-1">{{ $appointment->updated_at->format('M d, Y h:i A') }}</span>
                                    </div>
                                @else
                                    @php
                                        $statusChange = $appointment->statusHistory()
                                            ->where(function($query) use ($status) {
                                                $query->where('to_status', $status)
                                                    ->orWhere('from_status', $status);
                                            })
                                            ->orderBy('created_at', 'desc')
                                            ->first();
                                    @endphp
                                    @if($statusChange)
                                        @if($statusChange->to_status == $status)
                                            <div class="flex items-center">
                                                <span class="flex items-center text-emerald-600 font-medium">
                                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    Since:
                                                </span> 
                                                <span class="ml-1">{{ $statusChange->created_at->format('M d, Y h:i A') }}</span>
                                            </div>
                                        @else
                                            <div class="flex items-center">
                                                <span class="flex items-center text-rose-600 font-medium">
                                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Until:
                                                </span> 
                                                <span class="ml-1">{{ $statusChange->created_at->format('M d, Y h:i A') }}</span>
                                            </div>
                                        @endif
                                    @else
                                        @if($appointment->created_at && $status == 'Pending')
                                            <div class="flex items-center">
                                                <span class="flex items-center text-emerald-600 font-medium">
                                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    Since:
                                                </span> 
                                                <span class="ml-1">{{ $appointment->created_at->format('M d, Y h:i A') }}</span>
                                            </div>
                                            @if($appointment->status != 'Pending')
                                                <div class="flex items-center mt-1">
                                                    <span class="flex items-center text-rose-600 font-medium">
                                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        Until:
                                                    </span>
                                                    <span class="ml-1 text-gray-500">{{ $appointment->updated_at->format('M d, Y h:i A') }}</span>
                                                    <span class="ml-1 text-xs text-amber-600 italic">(estimated)</span>
                                                </div>
                                            @endif
                                        @else
                                            <span class="text-gray-400 italic">N/A</span>
                                        @endif
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 whitespace-nowrap text-sm text-center text-teal-500 bg-teal-50/50">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="h-10 w-10 text-teal-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="font-medium">No appointments were {{ strtolower($status) }} during this period</span>
                                    <p class="mt-1 text-teal-400">Try adjusting your filter criteria or selecting a different date range</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- No Results Message for Table (Hidden by default) -->
        <div id="tableNoResults" class="hidden py-10 text-center border-t border-teal-100">
            <svg class="h-10 w-10 text-teal-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <p class="text-teal-600 font-medium">No matching appointments found</p>
            <p class="text-teal-500 text-sm mt-1">Try a different search term</p>
        </div>
    </div>

    <!-- Status Timeline with Search -->
    @if(count($appointments) > 0)
        <div class="bg-white rounded-lg shadow-sm border border-teal-200 overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-teal-200 bg-gradient-to-r from-teal-50 to-white flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold text-teal-800">Status Timeline</h3>
                    <p class="text-sm text-teal-600 mt-1">Visual history of status changes for each appointment</p>
                </div>
                
                <!-- Timeline Search Box -->
                <div class="relative w-64">
                    <input type="text" id="timelineSearch" placeholder="Search timeline..." 
                           class="w-full pl-10 pr-4 py-2 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Scrollable Timeline Container -->
            <div class="p-6 max-h-[600px] overflow-y-auto" id="timelineContainer">
                <div class="space-y-6" id="timelineContent">
                    @foreach($appointments as $appointment)
                        <div class="bg-gradient-to-r from-teal-50/30 to-white p-5 rounded-lg shadow-sm border border-teal-200 timeline-item" 
                             data-patient="{{ strtolower($appointment->patient_name) }}" 
                             data-doctor="{{ strtolower($appointment->doctor) }}"
                             data-date="{{ \Carbon\Carbon::parse($appointment->date)->format('M d, Y') }}"
                             data-time="{{ strpos($appointment->time, '-') !== false ? strtolower($appointment->time) : strtolower(\Carbon\Carbon::parse($appointment->time)->format('h:i A')) }}"
                             data-status="{{ strtolower($appointment->status) }}">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 pb-3 border-b border-teal-100">
                                <div>
                                    <h4 class="text-md font-semibold text-teal-800">{{ $appointment->patient_name }}</h4>
                                    <p class="text-sm text-teal-600">
                                        <span class="inline-flex items-center">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>

                                            Appointment: {{ \Carbon\Carbon::parse($appointment->date)->format('M d, Y') }}
                                        </span>
                                        <span class="inline-flex items-center ml-4">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            Doctor: {{ $appointment->doctor }}
                                        </span>
                                        <span class="inline-flex items-center ml-4">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Time: 
                                            @if(strpos($appointment->time, '-') !== false)
                                                {{ $appointment->time }}
                                            @else
                                                {{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}
                                            @endif
                                        </span>
                                    </p>
                                </div>
                                <span class="mt-2 sm:mt-0 px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                    @if($appointment->status == 'Pending') bg-amber-100 text-amber-800
                                    @elseif($appointment->status == 'Approved') bg-emerald-100 text-emerald-800
                                    @elseif($appointment->status == 'Attended') bg-teal-100 text-teal-800
                                    @elseif($appointment->status == 'Unattended') bg-rose-100 text-rose-800
                                    @elseif($appointment->status == 'Cancelled') bg-gray-100 text-gray-800
                                    @endif">
                                    Current: {{ $appointment->status }}
                                </span>
                            </div>
                            <div class="relative">
                                <!-- Timeline line -->
                                <div class="absolute left-5 top-0 h-full w-0.5 bg-teal-200"></div>
                                <!-- Timeline events -->
                                <div class="space-y-6 relative">
                                    <!-- Creation event -->
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-teal-100 flex items-center justify-center z-10">
                                            <svg class="h-5 w-5 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-teal-800">Appointment Created</div>
                                            <div class="text-sm text-teal-600">{{ $appointment->created_at->format('M d, Y h:i A') }}</div>
                                            <div class="text-sm text-teal-600">Initial Status: <span class="font-medium text-amber-600">Pending</span></div>
                                        </div>
                                    </div>
                                    <!-- Status change events -->
                                    @if($appointment->statusHistory->count() > 0)
                                        @foreach($appointment->statusHistory->sortBy('created_at') as $history)
                                            <div class="flex items-start">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full
                                                    @if($history->to_status == 'Pending') bg-amber-100
                                                    @elseif($history->to_status == 'Approved') bg-emerald-100
                                                    @elseif($history->to_status == 'Attended') bg-teal-100
                                                    @elseif($history->to_status == 'Unattended') bg-rose-100
                                                    @elseif($history->to_status == 'Cancelled') bg-gray-100
                                                    @endif
                                                    flex items-center justify-center z-10">
                                                    <svg class="h-5 w-5
                                                        @if($history->to_status == 'Pending') text-amber-700
                                                        @elseif($history->to_status == 'Approved') text-emerald-700
                                                        @elseif($history->to_status == 'Attended') text-teal-700
                                                        @elseif($history->to_status == 'Unattended') text-rose-700
                                                        @elseif($history->to_status == 'Cancelled') text-gray-700
                                                        @endif"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-teal-800">Status Changed</div>
                                                    <div class="text-sm text-teal-600">{{ $history->created_at->format('M d, Y h:i A') }}</div>
                                                    <div class="text-sm text-teal-600">
                                                        From 
                                                        <span class="font-medium
                                                            @if($history->from_status == 'Pending') text-amber-700
                                                            @elseif($history->from_status == 'Approved') text-emerald-700
                                                            @elseif($history->from_status == 'Attended') text-teal-700
                                                            @elseif($history->from_status == 'Unattended') text-rose-700
                                                            @elseif($history->from_status == 'Cancelled') text-gray-700
                                                            @endif">
                                                            {{ $history->from_status }}
                                                        </span> 
                                                        to 
                                                        <span class="font-medium
                                                            @if($history->to_status == 'Pending') text-amber-700
                                                            @elseif($history->to_status == 'Approved') text-emerald-700
                                                            @elseif($history->to_status == 'Attended') text-teal-700
                                                            @elseif($history->to_status == 'Unattended') text-rose-700
                                                            @elseif($history->to_status == 'Cancelled') text-gray-700
                                                            @endif">
                                                            {{ $history->to_status }}
                                                        </span>
                                                    </div>
                                                    @if($history->user)
                                                        <div class="text-sm text-teal-600 flex items-center mt-1">
                                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                            </svg>
                                                            By: {{ $history->user->name }}
                                                        </div>
                                                    @endif
                                                    @if($history->notes)
                                                        <div class="mt-2 text-sm text-teal-600 italic bg-teal-50 p-2 rounded-md border-l-2 border-teal-300">
                                                            "{{ $history->notes }}"
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <!-- Current status -->
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full
                                            @if($appointment->status == 'Pending') bg-amber-100
                                            @elseif($appointment->status == 'Approved') bg-emerald-100
                                            @elseif($appointment->status == 'Attended') bg-teal-100
                                            @elseif($appointment->status == 'Unattended') bg-rose-100
                                            @elseif($appointment->status == 'Cancelled') bg-gray-100
                                            @endif
                                            flex items-center justify-center z-10">
                                            <svg class="h-5 w-5
                                                @if($appointment->status == 'Pending') text-amber-700
                                                @elseif($appointment->status == 'Approved') text-emerald-700
                                                @elseif($appointment->status == 'Attended') text-teal-700
                                                @elseif($appointment->status == 'Unattended') text-rose-700
                                                @elseif($appointment->status == 'Cancelled') text-gray-700
                                                @endif"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-teal-800">Current Status</div>
                                            <div class="text-sm text-teal-600">
                                                Status: 
                                                <span class="font-medium
                                                    @if($appointment->status == 'Pending') text-amber-700
                                                    @elseif($appointment->status == 'Approved') text-emerald-700
                                                    @elseif($appointment->status == 'Attended') text-teal-700
                                                    @elseif($appointment->status == 'Unattended') text-rose-700
                                                    @elseif($appointment->status == 'Cancelled') text-gray-700
                                                    @endif">
                                                    {{ $appointment->status }}
                                                </span>
                                            </div>
                                            <div class="text-sm text-teal-600">Last Updated: {{ $appointment->updated_at->format('M d, Y h:i A') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- No Results Message (Hidden by default) -->
                <div id="timelineNoResults" class="hidden py-10 text-center">
                    <svg class="h-10 w-10 text-teal-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <p class="text-teal-600 font-medium">No matching appointments found</p>
                    <p class="text-teal-500 text-sm mt-1">Try a different search term</p>
                </div>
            </div>
        </div>
    @endif

    <!-- About This Report -->
    <div class="bg-white rounded-lg shadow-sm border border-teal-200 overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-teal-200 bg-gradient-to-r from-teal-50 to-white">
            <h3 class="text-lg font-semibold text-teal-800 flex items-center">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                About This Report
            </h3>
        </div>
        <div class="p-6 bg-gradient-to-r from-teal-50/30 to-white">
            <div class="prose prose-teal max-w-none">
                <p class="text-teal-700">This report shows appointments that were in the <strong class="text-teal-800">{{ $status }}</strong> status at any point during the selected time period. This includes:</p>
                <ul class="mt-2 space-y-1 text-teal-700">
                    <li class="flex items-start">
                    <svg class="h-5 w-5 text-teal-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Appointments that were created with this status during the period</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-teal-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Appointments that changed to this status during the period</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-teal-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Appointments that were already in this status at the start of the period</span>
                    </li>
                </ul>
                
                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded-lg border border-teal-200 shadow-sm">
                        <h4 class="font-medium text-teal-800 mb-2 flex items-center">
                            <svg class="h-5 w-5 mr-2 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Status Column
                        </h4>
                        <p class="text-teal-600 text-sm">The "{{ $status }} Status" column shows whether each appointment is currently in this status, was previously in this status, or was never in this status.</p>
                    </div>
                    
                    <div class="bg-white p-4 rounded-lg border border-teal-200 shadow-sm">
                        <h4 class="font-medium text-teal-800 mb-2 flex items-center">
                            <svg class="h-5 w-5 mr-2 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Since/Until Column
                        </h4>
                        <p class="text-teal-600 text-sm">The "{{ $status }} Since/Until" column shows when each appointment entered or left this status, providing a timeline of status changes.</p>
                    </div>
                </div>
                
                <div class="mt-4 bg-white p-4 rounded-lg border border-teal-200 shadow-sm">
                    <h4 class="font-medium text-teal-800 mb-2 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Status Timeline
                    </h4>
                    <p class="text-teal-600 text-sm">The "Status Timeline" section provides a visual representation of each appointment's status history, showing when each status change occurred and who made the change. Use the search box to quickly find specific appointments by patient name, doctor, date, time, or status.</p>
                </div>
                
                <div class="mt-4 bg-white p-4 rounded-lg border border-teal-200 shadow-sm">
                    <h4 class="font-medium text-teal-800 mb-2 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search Functionality
                    </h4>
                    <p class="text-teal-600 text-sm">Both the appointments table and status timeline have search functionality. You can search for any information including patient names, doctors, dates, times, and status values. The search is case-insensitive and will match partial text.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-submit the form when status changes
            document.getElementById('status').addEventListener('change', function() {
                document.getElementById('reportForm').submit();
            });
            
            // Table search functionality
            const tableSearch = document.getElementById('tableSearch');
            if (tableSearch) {
                tableSearch.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const table = document.getElementById('appointmentsTable');
                    const rows = table.querySelectorAll('tbody tr');
                    let hasResults = false;
                    
                    rows.forEach(row => {
                        // Check all data attributes and text content
                        const patientName = row.getAttribute('data-patient') || '';
                        const doctorName = row.getAttribute('data-doctor') || '';
                        const appointmentDate = row.getAttribute('data-date') || '';
                        const appointmentTime = row.getAttribute('data-time') || '';
                        const status = row.getAttribute('data-status') || '';
                        const text = row.textContent.toLowerCase();
                        
                        if (
                            patientName.includes(searchTerm) || 
                            doctorName.includes(searchTerm) || 
                            appointmentDate.includes(searchTerm) ||
                            appointmentTime.includes(searchTerm) ||
                            status.includes(searchTerm) ||
                            text.includes(searchTerm)
                        ) {
                            row.style.display = '';
                            hasResults = true;
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    
                    // Show/hide no results message
                    const noResultsMessage = document.getElementById('tableNoResults');
                    if (noResultsMessage) {
                        noResultsMessage.style.display = hasResults ? 'none' : 'block';
                    }
                });
            }
            
            // Timeline search functionality
            const timelineSearch = document.getElementById('timelineSearch');
            if (timelineSearch) {
                timelineSearch.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const timelineItems = document.querySelectorAll('.timeline-item');
                    let hasResults = false;
                    
                    timelineItems.forEach(item => {
                        // Check all data attributes and text content
                        const patientName = item.getAttribute('data-patient') || '';
                        const doctorName = item.getAttribute('data-doctor') || '';
                        const appointmentDate = item.getAttribute('data-date') || '';
                        const appointmentTime = item.getAttribute('data-time') || '';
                        const status = item.getAttribute('data-status') || '';
                        const itemText = item.textContent.toLowerCase();
                        
                        // Check for day/month/year matches for more flexible date searching
                        const dateMatches = searchForDateParts(appointmentDate, searchTerm);
                        
                        // Check for time matches (hour, minute, am/pm)
                        const timeMatches = searchForTimeParts(appointmentTime, searchTerm);
                        
                        if (
                            patientName.includes(searchTerm) || 
                            doctorName.includes(searchTerm) || 
                            appointmentDate.includes(searchTerm) ||
                            appointmentTime.includes(searchTerm) ||
                            status.includes(searchTerm) ||
                            itemText.includes(searchTerm) ||
                            dateMatches ||
                            timeMatches
                        ) {
                            item.style.display = '';
                            hasResults = true;
                        } else {
                            item.style.display = 'none';
                        }
                    });
                    
                    // Show/hide no results message
                    const noResultsMessage = document.getElementById('timelineNoResults');
                    if (noResultsMessage) {
                        noResultsMessage.style.display = hasResults ? 'none' : 'block';
                    }
                });
            }
            
            // Helper function to search for date parts (day, month, year)
            function searchForDateParts(dateString, searchTerm) {
                if (!dateString) return false;
                
                try {
                    // Extract parts from date string (e.g., "Jan 15, 2023")
                    const parts = dateString.split(/[\s,]+/); // Split by spaces and commas
                    
                    // Check if search term matches any part
                    for (const part of parts) {
                        if (part.toLowerCase().includes(searchTerm)) {
                            return true;
                        }
                    }
                    
                    // Check for month names (if user types "january" it should match "Jan")
                    const months = ["january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december"];
                    const monthAbbreviations = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
                    
                    // Check if search term is part of a month name
                    for (let i = 0; i < months.length; i++) {
                        if (months[i].includes(searchTerm) && dateString.toLowerCase().includes(monthAbbreviations[i])) {
                            return true;
                        }
                    }
                    
                    // Check for "today", "yesterday", etc.
                    if (searchTerm === "today" && isToday(dateString)) {
                        return true;
                    }
                    
                    if (searchTerm === "yesterday" && isYesterday(dateString)) {
                        return true;
                    }
                    
                    if (searchTerm === "tomorrow" && isTomorrow(dateString)) {
                        return true;
                    }
                    
                    return false;
                } catch (e) {
                    return false;
                }
            }
            
            // Helper function to search for time parts (hour, minute, am/pm)
            function searchForTimeParts(timeString, searchTerm) {
                if (!timeString) return false;
                
                try {
                    // Check for direct match
                    if (timeString.includes(searchTerm)) {
                        return true;
                    }
                    
                    // Check for AM/PM variations
                    if ((searchTerm === "am" || searchTerm === "a.m." || searchTerm === "morning") && 
                        (timeString.includes("am") || timeString.includes("a.m."))) {
                        return true;
                    }
                    
                    if ((searchTerm === "pm" || searchTerm === "p.m." || searchTerm === "afternoon" || searchTerm === "evening") && 
                        (timeString.includes("pm") || timeString.includes("p.m."))) {
                        return true;
                    }
                    
                    // Check for hour matches
                    const hourMatch = timeString.match(/(\d+):/);
                    if (hourMatch && hourMatch[1] === searchTerm) {
                        return true;
                    }
                    
                    // Check for minute matches
                    const minuteMatch = timeString.match(/:(\d+)/);
                    if (minuteMatch && minuteMatch[1] === searchTerm) {
                        return true;
                    }
                    
                    return false;
                } catch (e) {
                    return false;
                }
            }
            
            // Helper functions for date comparisons
            function isToday(dateString) {
                const today = new Date();
                return dateString.includes(today.getDate()) && 
                       dateString.toLowerCase().includes(today.toLocaleString('default', { month: 'short' }).toLowerCase());
            }
            
            function isYesterday(dateString) {
                const yesterday = new Date();
                yesterday.setDate(yesterday.getDate() - 1);
                return dateString.includes(yesterday.getDate()) && 
                       dateString.toLowerCase().includes(yesterday.toLocaleString('default', { month: 'short' }).toLowerCase());
            }
            
            function isTomorrow(dateString) {
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                return dateString.includes(tomorrow.getDate()) && 
                       dateString.toLowerCase().includes(tomorrow.toLocaleString('default', { month: 'short' }).toLowerCase());
            }
        });
    </script>
</x-sidebar-layout>