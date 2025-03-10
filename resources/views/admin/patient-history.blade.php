<x-sidebar-layout>
    <!-- Header Section -->
    <div class="mb-8 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Patient History</h1>
                        <p class="text-teal-100">{{ $patient->patient_name }}</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('admin.patient_records') }}" class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm hover:bg-teal-50 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Records
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
            <div class="flex items-center text-sm text-teal-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>View complete appointment history for this patient.</span>
            </div>
        </div>
    </div>

    <!-- Patient Information Card -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-teal-100 mb-6">
        <div class="bg-gradient-to-r from-teal-50 to-white px-6 py-4 border-b border-teal-100">
            <h2 class="text-lg font-semibold text-teal-800">Patient Information</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Full Name</p>
                    <p class="text-lg font-medium text-gray-800">{{ $patient->patient_name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Email Address</p>
                    <p class="text-lg text-gray-800">{{ $patient->email }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Phone Number</p>
                    <p class="text-lg text-gray-800">{{ $patient->phone }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Appointment History -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-teal-100">
        <div class="bg-gradient-to-r from-teal-50 to-white px-6 py-4 border-b border-teal-100">
            <h2 class="text-lg font-semibold text-teal-800">Appointment History</h2>
        </div>
        
        @if($appointments->count())
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100 text-left">Date</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100 text-left">Time</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100 text-left">Doctor</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100 text-left">Appointment Type</th>
                        @if(isset($appointments[0]->status))
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-100 text-left">Status</th>
                        @endif
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-teal-100">
                    @foreach ($appointments as $appointment)
                    <tr class="hover:bg-teal-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-50">
                            {{ date('M d, Y', strtotime($appointment->date)) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">
                            {{ date('g:i A', strtotime($appointment->time)) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">
                            {{ $appointment->doctor }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">
                            {{ $appointment->appointments }}
                        </td>
                        @if(isset($appointment->status))
                        <td class="px-6 py-4 whitespace-nowrap border-r border-teal-50">
                            <span class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full
                            @if($appointment->status == 'Pending') bg-amber-100 text-amber-800
                            @elseif($appointment->status == 'Approved') bg-emerald-100 text-emerald-800
                            @elseif($appointment->status == 'Attended') bg-teal-100 text-teal-800
                            @elseif($appointment->status == 'Unattended') bg-rose-100 text-rose-800
                            @elseif($appointment->status == 'Cancelled') bg-gray-100 text-gray-800
                            @else bg-gray-100 text-gray-800 @endif">
                                {{ $appointment->status }}
                            </span>
                        </td>
                        @endif
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button onclick="openViewModal({{ $appointment->id }})" class="px-3 py-1.5 text-sm bg-teal-600 text-white rounded-md hover:bg-teal-700 transition shadow-sm flex items-center gap-1.5 inline-flex">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View
                            </button>
                            <button type="button" onclick="openDeleteModal({{ $appointment->id }})" class="px-3 py-1.5 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition shadow-sm flex items-center gap-1.5 inline-flex mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="p-6 text-center text-teal-600">
            No appointment history found for this patient.
        </div>
        @endif
    </div>

    <!-- View Appointment Modal -->
    <div id="viewModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl transform transition-all">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-t-lg px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white">Appointment Details</h3>
                </div>
                <button onclick="closeViewModal()" class="text-white hover:text-teal-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Patient Information Section -->
                    <div class="bg-teal-50 p-4 rounded-lg border border-teal-100">
                        <h4 class="text-teal-800 font-semibold mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Patient Information
                        </h4>
                        
                        <div class="space-y-3">
                            <div>
                                <p class="text-xs text-teal-600 font-medium">FULL NAME</p>
                                <p id="viewName" class="text-gray-800 font-medium"></p>
                            </div>
                            
                            <div>
                                <p class="text-xs text-teal-600 font-medium">EMAIL ADDRESS</p>
                                <p id="viewEmail" class="text-gray-800"></p>
                            </div>
                            
                            <div>
                                <p class="text-xs text-teal-600 font-medium">PHONE NUMBER</p>
                                <p id="viewPhone" class="text-gray-800"></p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Appointment Details Section -->
                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                        <h4 class="text-blue-800 font-semibold mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Appointment Details
                        </h4>
                        
                        <div class="space-y-3">
                            <div>
                                <p class="text-xs text-blue-600 font-medium">APPOINTMENT DATE</p>
                                <p id="viewDate" class="text-gray-800"></p>
                            </div>
                            
                            <div>
                                <p class="text-xs text-blue-600 font-medium">APPOINTMENT TIME</p>
                                <p id="viewTime" class="text-gray-800"></p>
                            </div>
                            
                            <div>
                                <p class="text-xs text-blue-600 font-medium">ASSIGNED DOCTOR</p>
                                <p id="viewDoctor" class="text-gray-800"></p>
                            </div>
                            
                            <div>
                                <p class="text-xs text-blue-600 font-medium">APPOINTMENT TYPE</p>
                                <p id="viewAppointment" class="text-gray-800"></p>
                            </div>
                            
                            <div id="statusContainer">
                                <p class="text-xs text-blue-600 font-medium">STATUS</p>
                                <p id="viewStatus" class="mt-1">
                                    <span id="statusBadge" class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Notes Section -->
                <div class="mt-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <h4 class="text-gray-700 font-semibold mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Record Information
                    </h4>
                    
                    <div class="flex items-center justify-between text-sm text-gray-500 mt-2">
                        <span>Record ID: <span id="viewRecordId" class="font-mono"></span></span>
                        <span>Created: <span id="viewCreatedAt">-</span></span>
                    </div>
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="bg-gray-50 px-6 py-4 rounded-b-lg border-t border-gray-200 flex justify-end">
                <button type="button" onclick="closeViewModal()" class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition shadow-sm font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 transform transition-all">
            <div class="flex items-center mb-4 text-red-600">
                <div class="bg-red-100 p-2 rounded-full mr-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Confirm Deletion</h3>
            </div>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this appointment record? This action cannot be undone.</p>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 transition shadow-sm font-medium">
                    Cancel
                </button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition shadow-sm font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Delete Record
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Store appointment data for modal display
        const appointmentData = {
            @foreach($appointments as $appointment)
            "{{ $appointment->id }}": {
                id: "{{ $appointment->id }}",
                patient_name: "{{ $appointment->patient_name }}",
                email: "{{ $appointment->email }}",
                phone: "{{ $appointment->phone }}",
                date: "{{ date('M d, Y', strtotime($appointment->date)) }}",
                time: "{{ date('g:i A', strtotime($appointment->time)) }}",
                doctor: "{{ $appointment->doctor }}",
                appointments: "{{ $appointment->appointments }}",
                @if(isset($appointment->status))
                status: "{{ $appointment->status }}",
                @endif
                created_at: "{{ $appointment->created_at ? date('M d, Y', strtotime($appointment->created_at)) : '-' }}"
            },
            @endforeach
        };
        
        // View Modal Functions
        function openViewModal(id) {
            const data = appointmentData[id];
            
            // Set data in the view modal
            document.getElementById('viewName').textContent = data.patient_name;
            document.getElementById('viewEmail').textContent = data.email;
            document.getElementById('viewPhone').textContent = data.phone;
            document.getElementById('viewDate').textContent = data.date;
            document.getElementById('viewTime').textContent = data.time;
            document.getElementById('viewDoctor').textContent = data.doctor;
            document.getElementById('viewAppointment').textContent = data.appointments;
            document.getElementById('viewRecordId').textContent = data.id;
            document.getElementById('viewCreatedAt').textContent = data.created_at;
            
            // Handle status if it exists
            const statusContainer = document.getElementById('statusContainer');
            const statusBadge = document.getElementById('statusBadge');
            
            if (data.status) {
                statusContainer.classList.remove('hidden');
                statusBadge.textContent = data.status;
                
                // Set appropriate status badge color
                statusBadge.className = 'px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full';
                
                if (data.status === 'Pending') {
                    statusBadge.classList.add('bg-amber-100', 'text-amber-800');
                } else if (data.status === 'Approved') {
                    statusBadge.classList.add('bg-emerald-100', 'text-emerald-800');
                } else if (data.status === 'Attended') {
                    statusBadge.classList.add('bg-teal-100', 'text-teal-800');
                } else if (data.status === 'Unattended') {
                    statusBadge.classList.add('bg-rose-100', 'text-rose-800');
                } else if (data.status === 'Cancelled') {
                    statusBadge.classList.add('bg-gray-100', 'text-gray-800');
                } else {
                    statusBadge.classList.add('bg-gray-100', 'text-gray-800');
                }
            } else {
                statusContainer.classList.add('hidden');
            }
            
            // Show modal
            document.getElementById('viewModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
        
        function closeViewModal() {
            document.getElementById('viewModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        
        // Delete Modal Functions
        function openDeleteModal(id) {
            document.getElementById('deleteForm').action = `/admin/patient-records/${id}`;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
        
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        
        // Close modals when clicking outside
        document.getElementById('viewModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeViewModal();
            }
        });
        
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
        
        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (!document.getElementById('viewModal').classList.contains('hidden')) {
                    closeViewModal();
                }
                if (!document.getElementById('deleteModal').classList.contains('hidden')) {
                    closeDeleteModal();
                }
            }
        });
    </script>
    @endpush
</x-sidebar-layout>                                