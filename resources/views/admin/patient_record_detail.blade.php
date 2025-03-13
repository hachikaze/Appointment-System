<x-sidebar-layout>
<!-- Header Section -->
<div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-gradient-to-r from-teal-700 to-teal-800 p-5 rounded-xl shadow-sm text-white">
    <div>
        <h1 class="text-2xl font-bold text-white">Patient Record</h1>
        <p class="text-teal-100">Detailed information and appointment history</p>
    </div>
    <a href="{{ route('admin.patient-records') }}" class="bg-teal-600 hover:bg-teal-500 text-white px-4 py-2 rounded-lg flex items-center shadow-sm border border-teal-500">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to All Patients
    </a>
</div>

<!-- Patient Information Card -->
<div class="bg-teal-50 rounded-xl shadow-sm border border-teal-200 p-6 mb-6">
    <div class="flex flex-col md:flex-row">
        <div class="md:w-1/4 flex justify-center mb-4 md:mb-0">
            @if($patient->image_path)
                <img class="h-32 w-32 rounded-full object-cover border-4 border-teal-200"
                    src="{{ asset($patient->image_path) }}" alt="{{ $patient->firstname }}">
            @else
                <div class="h-32 w-32 rounded-full bg-gradient-to-r from-teal-500 to-teal-700 flex items-center justify-center border-4 border-teal-200">
                    <span class="text-white text-3xl font-medium">{{ substr($patient->firstname, 0, 1) }}{{ substr($patient->lastname, 0, 1) }}</span>
                </div>
            @endif
        </div>
        <div class="md:w-3/4 md:pl-6">
            <h2 class="text-xl font-semibold text-teal-800">{{ $patient->firstname }} {{ $patient->middleinitial }}. {{ $patient->lastname }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <p class="text-sm text-teal-600">Patient ID</p>
                    <p class="text-teal-800">{{ $patient->id }}</p>
                </div>
                <div>
                    <p class="text-sm text-teal-600">Gender</p>
                    <p class="text-teal-800">{{ $patient->gender }}</p>
                </div>
                <div>
                    <p class="text-sm text-teal-600">Email</p>
                    <p class="text-teal-800">{{ $patient->email }}</p>
                </div>
                <div>
                    <p class="text-sm text-teal-600">Phone</p>
                    <p class="text-teal-800">{{ $appointments->first() ? $appointments->first()->phone : 'No phone number' }}</p>
                </div>
                <div>
                    <p class="text-sm text-teal-600">Registered Since</p>
                    <p class="text-teal-800">{{ $patient->created_at->format('M d, Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-teal-600">Total Visits</p>
                    <p class="text-teal-800">
                        @php
                            // Only count ATTENDED appointments as actual visits
                            $actualVisits = $appointments->filter(function($appointment) {
                                return $appointment->status === 'Attended';
                            })->count();
                        @endphp
                        {{ $actualVisits }} ({{ $appointments->count() }} total appointments)
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Appointment History -->
<div class="bg-teal-50 rounded-xl shadow-sm border border-teal-200 p-6 mb-6">
    <h3 class="text-lg font-semibold text-teal-800 mb-4">Appointment History</h3>
    @if($appointments->count() > 0)
        <div class="overflow-x-auto overflow-y-auto" style="max-height: 300px;">
            <table class="min-w-full divide-y divide-teal-200">
                <thead class="bg-teal-100 sticky top-0 z-10">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-teal-800 uppercase tracking-wider">Date & Time</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-teal-800 uppercase tracking-wider">Doctor</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-teal-800 uppercase tracking-wider">Procedure</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-teal-800 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-teal-50 divide-y divide-teal-200">
                    @foreach($appointments as $appointment)
                        <tr class="hover:bg-teal-100 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-teal-900">{{ date('M d, Y', strtotime($appointment->date)) }}</div>
                                <div class="text-xs text-teal-600">{{ $appointment->time }}</div>                           
                             </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-teal-900">{{ $appointment->doctor }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-teal-900">{{ $appointment->appointments }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusColors = [
                                        'Pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                        'Approved' => 'bg-blue-100 text-blue-800 border-blue-200',
                                        'Attended' => 'bg-green-100 text-green-800 border-green-200',
                                        'Unattended' => 'bg-red-100 text-red-800 border-red-200',
                                        'Cancelled' => 'bg-gray-100 text-gray-800 border-gray-200',
                                    ];
                                    $statusColor = $statusColors[$appointment->status] ?? 'bg-gray-100 text-gray-800 border-gray-200';
                                @endphp
                                <span class="px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full border {{ $statusColor }}">
                                    {{ $appointment->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-8 text-teal-600 bg-teal-50 rounded-lg">
            <svg class="w-12 h-12 mx-auto text-teal-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <p class="text-lg text-teal-800 font-medium">No appointment history found for this patient.</p>
            <p class="text-teal-600 mt-1">This patient hasn't scheduled any appointments yet.</p>
        </div>
    @endif
</div>

<!-- Treatment Timeline (only show if there are appointments) -->
@if($appointments->count() > 0)
    <div class="bg-teal-50 rounded-xl shadow-sm border border-teal-200 p-6">
        <h3 class="text-lg font-semibold text-teal-800 mb-4">Treatment Timeline</h3>
        <div class="relative overflow-y-auto" style="max-height: 400px;">
            <!-- Timeline line -->
            <div class="absolute left-5 top-0 bottom-0 w-0.5 bg-teal-300"></div>
            <!-- Timeline items -->
            <div class="space-y-6 pr-2">
                @foreach($appointments as $appointment)
                    <div class="relative pl-10">
                        <!-- Timeline dot -->
                        @php
                            $dotColors = [
                                'Pending' => 'bg-yellow-500',
                                'Approved' => 'bg-blue-500',
                                'Attended' => 'bg-green-500',
                                'Unattended' => 'bg-red-500',
                                'Cancelled' => 'bg-gray-500',
                            ];
                            $dotColor = $dotColors[$appointment->status] ?? 'bg-gray-500';
                        @endphp
                        <div class="absolute left-4 top-1.5 w-3 h-3 rounded-full {{ $dotColor }} transform -translate-x-1/2 border-2 border-teal-50 shadow-sm"></div>
                        <!-- Timeline content -->
                        <div class="bg-gradient-to-r from-teal-100 to-teal-50 rounded-lg p-4 border border-teal-200 shadow-sm hover:shadow-md transition">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                <div>
                                <span class="text-sm text-teal-700">{{ date('M d, Y', strtotime($appointment->date)) }} at {{ $appointment->time }}</span>
                                <h4 class="text-md font-medium text-teal-800">{{ $appointment->appointments }}</h4>
                                </div>
                                <div class="mt-2 md:mt-0">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full border {{ $statusColors[$appointment->status] ?? 'bg-gray-100 text-gray-800 border-gray-200' }}">
                                        {{ $appointment->status }}
                                    </span>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-teal-700">Doctor: <span class="font-medium">{{ $appointment->doctor }}</span></p>
                            @if($appointment->notes)
                                <div class="mt-3 pt-3 border-t border-teal-200">
                                    <p class="text-sm text-teal-700"><span class="font-medium">Notes:</span> {{ $appointment->notes }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

<!-- Patient Statistics Card -->
@if($appointments->count() > 0)
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        @php
            $statusCounts = [
                'Pending' => 0,
                'Approved' => 0,
                'Attended' => 0,
                'Unattended' => 0,
                'Cancelled' => 0
            ];
            foreach ($appointments as $appointment) {
                if (isset($statusCounts[$appointment->status])) {
                    $statusCounts[$appointment->status]++;
                }
            }
            // Get last appointment procedure (excluding cancelled ones)
            $lastAppointment = $appointments->first(function($appointment) {
                return $appointment->status !== 'Cancelled';
            }) ?? $appointments->first();
        @endphp
    </div>
@endif

<!-- Patient Notes Section -->
<div class="mt-6 bg-teal-50 rounded-xl shadow-sm border border-teal-200 p-6">
    <h3 class="text-lg font-semibold text-teal-800 mb-4">Patient Notes</h3>
    @if(isset($patient->notes) && !empty($patient->notes))
        <div class="bg-teal-100 rounded-lg p-4 border border-teal-200">
            <p class="text-teal-700">{{ $patient->notes }}</p>
        </div>
    @else
        <div class="bg-teal-100 rounded-lg p-4 border border-teal-200 text-center">
            <p class="text-teal-600">No additional notes for this patient.</p>
        </div>
    @endif
</div>

<!-- Appointment Analytics -->
@if($appointments->count() > 0)
    <div class="mt-6 bg-teal-50 rounded-xl shadow-sm border border-teal-200 p-6">
        <h3 class="text-lg font-semibold text-teal-800 mb-4">Appointment Analytics</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Appointment Frequency -->
            <div>
                <h4 class="text-sm font-semibold text-teal-700 mb-3">Appointment Frequency</h4>
                <div class="bg-teal-100 rounded-lg p-4 border border-teal-200">
                @php
                        // Get only attended appointments
                        $attendedAppointments = $appointments->filter(function($appointment) {
                            return $appointment->status === 'Attended';
                        });
                        
                        // First and most recent appointments (for display)
                        $firstAppointmentDate = $appointments->last() ? date('M d, Y', strtotime($appointments->last()->date)) : 'N/A';
                        $lastAppointmentDate = $appointments->first() ? date('M d, Y', strtotime($appointments->first()->date)) : 'N/A';
                        
                        // First and most recent visits (attended only)
                        $firstVisit = $attendedAppointments->last();
                        $mostRecentVisit = $attendedAppointments->first();
                        
                        // Calculate days between first and last appointment (if they exist)
                        $daysBetween = 0;
                        if ($appointments->count() > 1) {
                            $daysBetween = \Carbon\Carbon::parse($appointments->last()->date)
                                ->diffInDays(\Carbon\Carbon::parse($appointments->first()->date)) + 1;
                        }
                        
                        // Calculate average visits per month (only for attended appointments)
                        $visitsPerMonth = 'N/A';
                        if ($attendedAppointments->count() > 1 && $daysBetween > 30) {
                            $visitsPerMonth = number_format(($attendedAppointments->count() / ($daysBetween / 30)), 1);
                        }
                    @endphp
                    
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-teal-700">First Appointment:</span>
                        <span class="text-sm font-medium text-teal-800">{{ $firstAppointmentDate }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-teal-700">Most Recent Appointment:</span>
                        <span class="text-sm font-medium text-teal-800">{{ $lastAppointmentDate }}</span>
                    </div>
                    
                    @if($attendedAppointments->count() > 0)
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-teal-700">First Visit:</span>
                            <span class="text-sm font-medium text-teal-800">{{ date('M d, Y', strtotime($firstVisit->date)) }}</span>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-teal-700">Most Recent Visit:</span>
                            <span class="text-sm font-medium text-teal-800">{{ date('M d, Y', strtotime($mostRecentVisit->date)) }}</span>
                        </div>
                    @endif
                    
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-teal-700">Total Visits:</span>
                        <span class="text-sm font-medium text-teal-800">{{ $actualVisits }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Appointment Status Distribution -->
            <div>
                <h4 class="text-sm font-semibold text-teal-700 mb-3">Status Distribution</h4>
                <div class="bg-teal-100 rounded-lg p-4 border border-teal-200">
                    @php
                        $totalAppointments = $appointments->count();
                    @endphp
                    @foreach($statusCounts as $status => $count)
                        @if($count > 0)
                            @php
                                $percentage = ($count / $totalAppointments) * 100;
                                $barColor = match($status) {
                                    'Pending' => 'bg-yellow-500',
                                    'Approved' => 'bg-blue-500',
                                    'Attended' => 'bg-green-500',
                                    'Unattended' => 'bg-red-500',
                                    'Cancelled' => 'bg-gray-500',
                                    default => 'bg-teal-500'
                                };
                            @endphp
                            <div class="mb-2">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-xs text-teal-700">{{ $status }}</span>
                                    <span class="text-xs font-medium text-teal-800">{{ $count }} ({{ number_format($percentage, 1) }}%)</span>
                                </div>
                                <div class="w-full bg-teal-200 rounded-full h-2">
                                    <div class="{{ $barColor }} h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            
            <!-- Additional Analytics: No-show Rate -->
            @if(($statusCounts['Attended'] + $statusCounts['Unattended']) > 0)
                <div class="md:col-span-2 mt-4">
                    <h4 class="text-sm font-semibold text-teal-700 mb-3">Attendance Metrics</h4>
                    <div class="bg-teal-100 rounded-lg p-4 border border-teal-200">
                        @php
                            $totalScheduled = $statusCounts['Attended'] + $statusCounts['Unattended'];
                            $noShowRate = $totalScheduled > 0 
                                ? ($statusCounts['Unattended'] / $totalScheduled) * 100 
                                : 0;
                            $attendanceRate = 100 - $noShowRate;
                        @endphp
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-sm text-teal-700">Attendance Rate:</span>
                                    <span class="text-sm font-medium text-teal-800">{{ number_format($attendanceRate, 1) }}%</span>
                                </div>
                                <div class="w-full bg-teal-200 rounded-full h-3">
                                    <div class="bg-green-500 h-3 rounded-full" style="width: {{ $attendanceRate }}%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-sm text-teal-700">No-show Rate:</span>
                                    <span class="text-sm font-medium text-teal-800">{{ number_format($noShowRate, 1) }}%</span>
                                </div>
                                <div class="w-full bg-teal-200 rounded-full h-3">
                                    <div class="bg-red-500 h-3 rounded-full" style="width: {{ $noShowRate }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif

<!-- JavaScript for Animations and Scrollbar Styling -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const timelineItems = document.querySelectorAll('.relative.pl-10');
    timelineItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(20px)';
        item.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        setTimeout(() => {
            item.style.opacity = '1';
            item.style.transform = 'translateX(0)';
        }, 100 * index);
    });

    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(10px)';
        row.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        setTimeout(() => {
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, 50 * index);
    });

    const scrollableContainers = document.querySelectorAll('.overflow-y-auto');
    scrollableContainers.forEach(container => {
        container.style.scrollbarWidth = 'thin';
        container.style.scrollbarColor = '#0d9488 #e6fffa';
    });

    const style = document.createElement('style');
    style.textContent = `
        .overflow-y-auto::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        .overflow-y-auto::-webkit-scrollbar-track {
            background: #e6fffa;
            border-radius: 4px;
        }
        .overflow-y-auto::-webkit-scrollbar-thumb {
            background-color: #0d9488;
            border-radius: 4px;
            border: 2px solid #e6fffa;
        }
        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background-color: #0f766e;
        }
    `;
    document.head.appendChild(style);

    const tableContainer = document.querySelector('.overflow-y-auto');
    if (tableContainer) {
        tableContainer.addEventListener('scroll', function() {
            const header = this.querySelector('thead');
            if (this.scrollTop > 0) {
                header.classList.add('shadow-md');
                header.style.backgroundColor = '#99f6e4'; 
            } else {
                header.classList.remove('shadow-md');
                header.style.backgroundColor = '#b2f5ea'; 
            }
        });
    }
});
</script>
</x-sidebar-layout>
                        
                