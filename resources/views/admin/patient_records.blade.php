<x-sidebar-layout>
    <!-- Header Section for Patient Records -->
    <div class="mb-8 rounded-2xl shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-700 to-teal-800 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-teal-600 bg-opacity-50 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Patient Records</h1>
                        <p class="text-teal-100">View patient information and appointment history</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-teal-600 text-white shadow-sm border border-teal-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Patient Database
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-100 px-6 py-3 border-t border-teal-300">
            <div class="flex items-center text-sm text-teal-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>View and manage all patient records and their appointment history from this dashboard.</span>
            </div>
        </div>
    </div>

    <!-- Status Legend -->
    <div class="mb-6 bg-teal-50 rounded-xl shadow-sm p-5 border border-teal-200">
        <h3 class="text-sm font-semibold text-teal-800 mb-3">Appointment Status Legend:</h3>
        <div class="flex flex-wrap gap-4">
            <div class="flex items-center">
                <span class="w-4 h-4 rounded-full bg-yellow-500 mr-2"></span>
                <span class="text-sm text-teal-700">Pending</span>
            </div>
            <div class="flex items-center">
                <span class="w-4 h-4 rounded-full bg-blue-500 mr-2"></span>
                <span class="text-sm text-teal-700">Approved</span>
            </div>
            <div class="flex items-center">
                <span class="w-4 h-4 rounded-full bg-green-500 mr-2"></span>
                <span class="text-sm text-teal-700">Attended</span>
            </div>
            <div class="flex items-center">
                <span class="w-4 h-4 rounded-full bg-red-500 mr-2"></span>
                <span class="text-sm text-teal-700">Unattended</span>
            </div>
            <div class="flex items-center">
                <span class="w-4 h-4 rounded-full bg-gray-500 mr-2"></span>
                <span class="text-sm text-teal-700">Cancelled</span>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-gradient-to-r from-teal-100 to-teal-50 rounded-xl shadow-sm p-5 mb-6 border border-teal-200">
        <form id="filterForm" method="GET" class="flex flex-wrap gap-4 items-end">
            <!-- Search by name -->
            <div class="flex-1 min-w-[200px]">
                <label for="search" class="block text-sm font-medium text-teal-800 mb-1">Search Patient</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="search"
                        name="search"
                        placeholder="Search by name or email"
                        value="{{ request('search') }}"
                        class="pl-10 w-full p-2.5 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-teal-50"
                    />
                </div>
            </div>
            
            <!-- Gender filter -->
            <div class="flex-1 min-w-[200px]">
                <label for="gender" class="block text-sm font-medium text-teal-800 mb-1">Gender</label>
                <div class="relative">
                    <select
                        id="gender"
                        name="gender"
                        class="w-full p-2.5 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-teal-50 appearance-none"
                    >
                        <option value="">All Genders</option>
                        <option value="Male" {{ request('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ request('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ request('gender') === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Status filter -->
            <div class="flex-1 min-w-[200px]">
                <label for="status" class="block text-sm font-medium text-teal-800 mb-1">Appointment Status</label>
                <div class="relative">
                    <select
                        id="status"
                        name="status"
                        class="w-full p-2.5 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-teal-50 appearance-none"
                    >
                        <option value="">All Statuses</option>
                        <option value="Pending" {{ request('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ request('status') === 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Attended" {{ request('status') === 'Attended' ? 'selected' : '' }}>Attended</option>
                        <option value="Unattended" {{ request('status') === 'Unattended' ? 'selected' : '' }}>Unattended</option>
                        <option value="Cancelled" {{ request('status') === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="No Appointments" {{ request('status') === 'No Appointments' ? 'selected' : '' }}>No Appointments</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Per page -->
            <div class="flex-1 min-w-[200px]">
                <label for="perPage" class="block text-sm font-medium text-teal-800 mb-1">Show entries</label>
                <div class="relative">
                    <select
                        id="perPage"
                        name="perPage"
                        class="w-full p-2.5 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-teal-50 appearance-none"
                    >
                        <option value="10" {{ request('perPage') == 10 || !request('perPage') ? 'selected' : '' }}>10 entries</option>
                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25 entries</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50 entries</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100 entries</option>
                        <option value="all" {{ request('perPage') == 'all' ? 'selected' : '' }}>All entries</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Reset Filters -->
            <div>
                <a
                    href="{{ route('admin.patient-records') }}"
                    class="bg-teal-600 text-white border border-teal-700 px-5 py-2.5 rounded-lg hover:bg-teal-700 transition shadow-sm font-medium inline-block"
                >
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset Filters
                </a>
            </div>
        </form>
    </div>

    <!-- Patient Records Table -->
    <div class="bg-teal-50 rounded-xl shadow-sm overflow-hidden border border-teal-200">
        <div class="p-4 border-b border-teal-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 bg-teal-100">
            <h3 class="text-lg font-semibold text-teal-800">Patient List</h3>
            <p class="text-sm text-teal-700">
                Showing {{ $patients->firstItem() ?? 0 }} to {{ $patients->lastItem() ?? 0 }} of {{ $patients->total() }} entries
            </p>
        </div>
        <div class="overflow-x-auto overflow-y-auto" style="max-height: 60vh;">
            <table class="w-full table-auto">
                <thead class="sticky top-0 z-10">
                    <tr class="bg-teal-200 text-left">
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-800 uppercase tracking-wider border-r border-teal-300">Patient</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-800 uppercase tracking-wider border-r border-teal-300">Contact Information</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-800 uppercase tracking-wider border-r border-teal-300">Gender</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-800 uppercase tracking-wider border-r border-teal-300">Last Appointment</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-800 uppercase tracking-wider border-r border-teal-300">Status Summary</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-800 uppercase tracking-wider text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-teal-200">
                    @forelse($patients as $patient)
                        @php
                            // Get the latest appointment for this patient
                            $latestAppointment = App\Models\Appointment::where('email', $patient->email)
                                ->orderBy('date', 'desc')
                                ->orderBy('time', 'desc')
                                ->first();
                                
                            // Get status counts for this patient
                            $appointments = App\Models\Appointment::where('email', $patient->email)->get();
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
                            
                            $totalAppointments = count($appointments);
                        @endphp
                        <tr class="hover:bg-teal-100 transition bg-teal-50">
                            <td class="px-6 py-4 whitespace-nowrap border-r border-teal-200">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        @if($patient->image_path)
                                            <img class="h-10 w-10 rounded-full object-cover border border-teal-300" src="{{ asset($patient->image_path) }}" alt="{{ $patient->firstname }}">
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-r from-teal-500 to-teal-700 flex items-center justify-center border border-teal-300">
                                                <span class="text-white font-medium">{{ substr($patient->firstname, 0, 1) }}{{ substr($patient->lastname, 0, 1) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-teal-900">{{ $patient->firstname }} {{ $patient->middleinitial }}. {{ $patient->lastname }}</div>
                                        <div class="text-xs text-teal-700">ID: {{ $patient->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-teal-200">
                                <div class="text-sm text-teal-900">{{ $patient->email }}</div>
                                <div class="text-xs text-teal-700">
                                    {{ $latestAppointment ? $latestAppointment->phone : 'No phone number' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-teal-200">
                                <div class="text-sm text-teal-900">{{ $patient->gender }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-teal-200">
                                @if($latestAppointment)
                                    <div class="text-sm text-teal-900">{{ date('M d, Y', strtotime($latestAppointment->date)) }}</div>
                                    <div class="text-xs text-teal-700">{{ $latestAppointment->appointments }}</div>
                                    <div class="mt-1">
                                        @php
                                            $statusColors = [
                                                'Pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                                'Approved' => 'bg-blue-100 text-blue-800 border-blue-200',
                                                'Attended' => 'bg-green-100 text-green-800 border-green-200',
                                                'Unattended' => 'bg-red-100 text-red-800 border-red-200',
                                                'Cancelled' => 'bg-gray-100 text-gray-800 border-gray-200',
                                            ];
                                            $statusColor = $statusColors[$latestAppointment->status] ?? 'bg-gray-100 text-gray-800 border-gray-200';
                                        @endphp
                                        <span class="px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full border {{ $statusColor }}">
                                            {{ $latestAppointment->status }}
                                        </span>
                                    </div>
                                @else
                                    <div class="text-sm text-teal-700">No appointments yet</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 border-r border-teal-200">
                                @if($totalAppointments > 0)
                                    <div class="flex flex-col space-y-2">
                                        <div class="text-xs text-teal-800 font-medium">Total: {{ $totalAppointments }} appointment(s)</div>
                                        <div class="flex flex-wrap gap-1.5">
                                            <!-- Status indicators -->
                                            @if($statusCounts['Pending'] > 0)
                                                <span class="w-6 h-6 rounded-full bg-yellow-500 flex items-center justify-center text-white text-xs font-medium shadow-sm" title="Pending: {{ $statusCounts['Pending'] }}">
                                                    {{ $statusCounts['Pending'] }}
                                                </span>
                                            @endif
                                            @if($statusCounts['Approved'] > 0)
                                                <span class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-white text-xs font-medium shadow-sm" title="Approved: {{ $statusCounts['Approved'] }}">
                                                    {{ $statusCounts['Approved'] }}
                                                </span>
                                            @endif
                                            @if($statusCounts['Attended'] > 0)
                                                <span class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center text-white text-xs font-medium shadow-sm" title="Attended: {{ $statusCounts['Attended'] }}">
                                                    {{ $statusCounts['Attended'] }}
                                                </span>
                                            @endif
                                            @if($statusCounts['Unattended'] > 0)
                                                <span class="w-6 h-6 rounded-full bg-red-500 flex items-center justify-center text-white text-xs font-medium shadow-sm" title="Unattended: {{ $statusCounts['Unattended'] }}">
                                                    {{ $statusCounts['Unattended'] }}
                                                </span>
                                            @endif
                                            @if($statusCounts['Cancelled'] > 0)
                                                <span class="w-6 h-6 rounded-full bg-gray-500 flex items-center justify-center text-white text-xs font-medium shadow-sm" title="Cancelled: {{ $statusCounts['Cancelled'] }}">
                                                    {{ $statusCounts['Cancelled'] }}
                                                </span>
                                            @endif
                                        </div>
                                        <!-- Text summary for larger screens -->
                                        <div class="hidden md:block text-xs text-teal-700 space-y-1">
                                            <div class="flex flex-wrap gap-x-2">
                                                @if($statusCounts['Pending'] > 0)
                                                    <span class="flex items-center">
                                                        <span class="w-2 h-2 rounded-full bg-yellow-500 mr-1"></span>
                                                        <span>{{ $statusCounts['Pending'] }} Pending</span>
                                                    </span>
                                                @endif
                                                @if($statusCounts['Approved'] > 0)
                                                    <span class="flex items-center">
                                                        <span class="w-2 h-2 rounded-full bg-blue-500 mr-1"></span>
                                                        <span>{{ $statusCounts['Approved'] }} Approved</span>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="flex flex-wrap gap-x-2">
                                                @if($statusCounts['Attended'] > 0)
                                                    <span class="flex items-center">
                                                        <span class="w-2 h-2 rounded-full bg-green-500 mr-1"></span>
                                                        <span>{{ $statusCounts['Attended'] }} Attended</span>
                                                    </span>
                                                @endif
                                                @if($statusCounts['Unattended'] > 0)
                                                    <span class="flex items-center">
                                                        <span class="w-2 h-2 rounded-full bg-red-500 mr-1"></span>
                                                        <span>{{ $statusCounts['Unattended'] }} Unattended</span>
                                                    </span>
                                                @endif
                                                @if($statusCounts['Cancelled'] > 0)
                                                    <span class="flex items-center">
                                                        <span class="w-2 h-2 rounded-full bg-gray-500 mr-1"></span>
                                                        <span>{{ $statusCounts['Cancelled'] }} Cancelled</span>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-100 text-teal-800 border border-teal-200">
                                        No Appointments
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <a href="{{ route('admin.patient-records.show', $patient->id) }}"
                                   class="inline-flex items-center px-3 py-1.5 bg-teal-600 text-white text-sm font-medium rounded-md hover:bg-teal-700 transition shadow-sm">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center bg-teal-50">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-teal-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-teal-800 font-medium text-lg">No patient records found</p>
                                    <p class="text-teal-600 text-sm mt-1">Try adjusting your search or filter criteria</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="p-4 border-t border-teal-200 bg-teal-100">
            {{ $patients->links() }}
        </div>
    </div>

    <!-- JavaScript for Dynamic Filtering -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('filterForm');
            const searchInput = document.getElementById('search');
            const genderSelect = document.getElementById('gender');
            const statusSelect = document.getElementById('status');
            const perPageSelect = document.getElementById('perPage');
            
            function submitForm() {
                filterForm.submit();
            }
            
            genderSelect.addEventListener('change', submitForm);
            statusSelect.addEventListener('change', submitForm);
            perPageSelect.addEventListener('change', submitForm);
            
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(submitForm, 500);
            });
            
            const statusIndicators = document.querySelectorAll('[title^="Pending"], [title^="Approved"], [title^="Attended"], [title^="Unattended"], [title^="Cancelled"]');
            statusIndicators.forEach(indicator => {
                indicator.classList.add('cursor-pointer', 'transition-transform', 'hover:scale-110');
                
                indicator.addEventListener('mouseenter', function() {
                    const title = this.getAttribute('title');
                    if (!title) return;
                    
                    const tooltip = document.createElement('div');
                    tooltip.className = 'absolute z-10 bg-teal-800 text-white text-xs rounded py-1 px-2 -mt-12 -ml-6 shadow-lg';
                    tooltip.textContent = title;
                    tooltip.id = 'status-tooltip';
                    this.appendChild(tooltip);
                });
                
                indicator.addEventListener('mouseleave', function() {
                    const tooltip = document.getElementById('status-tooltip');
                    if (tooltip) {
                        tooltip.remove();
                    }
                });
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
            
            const tableContainer = document.querySelector('.overflow-y-auto');
            
            tableContainer.style.scrollbarWidth = 'thin';
            tableContainer.style.scrollbarColor = '#0d9488 #e6fffa';
            
            // For webkit browsers
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
            
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.classList.add('bg-teal-100');
                    this.classList.remove('bg-teal-50');
                });
                
                row.addEventListener('mouseleave', function() {
                    this.classList.remove('bg-teal-100');
                    this.classList.add('bg-teal-50');
                });
            });
            
            tableContainer.addEventListener('scroll', function() {
                const header = document.querySelector('thead');
                if (this.scrollTop > 0) {
                    header.classList.add('shadow-md');
                    header.style.backgroundColor = '#99f6e4'; 
                } else {
                    header.classList.remove('shadow-md');
                    header.style.backgroundColor = '#b2f5ea'; 
                }
            });
        });
    </script>
</x-sidebar-layout>