<x-sidebar-layout>
    <!-- Header Section -->
    <div class="mb-8 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Patient Records</h1>
                        <p class="text-teal-100">View and manage all patient records</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Records Management
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
            <div class="flex items-center text-sm text-teal-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Manage patient records from this dashboard.</span>
            </div>
        </div>
    </div>

<!-- Filters  -->
<div class="bg-gradient-to-r from-teal-50 to-white rounded-xl shadow-sm p-5 mb-6 border border-teal-100">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <!-- Search by name -->
            <div class="flex-1 min-w-[200px]">
                <label for="search" class="block text-sm font-medium text-teal-700 mb-1">Search Patient</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="search"
                        name="search"
                        placeholder="Search by name"
                        value="{{ request('search') }}"
                        class="pl-10 w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white"
                    />
                </div>
            </div>
            
            <!-- Status filter -->
            <!-- <div class="flex-1 min-w-[200px]">
                <label for="filter" class="block text-sm font-medium text-teal-700 mb-1">Status</label>
                <div class="relative">
                    <select
                        id="filter"
                        name="filter"
                        class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none"
                    >
                        <option value="">All Status</option>
                        <option value="Pending" {{ request('filter') === 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ request('filter') === 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Attended" {{ request('filter') === 'Attended' ? 'selected' : '' }}>Attended</option>
                        <option value="Unattended"{{ request('filter') === 'Unattended'? 'selected' : '' }}>Unattended</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div> -->
            
            <!-- Per page -->
            <div class="flex-1 min-w-[200px]">
                <label for="perPage" class="block text-sm font-medium text-teal-700 mb-1">Show entries</label>
                <div class="relative">
                    <select
                        id="perPage"
                        name="perPage"
                        class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none"
                    >
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10 entries</option>
                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25 entries</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50 entries</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100 entries</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
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
                    href="{{ route('admin.patient_records') }}"
                    class="bg-white text-teal-700 border border-teal-200 px-5 py-2.5 rounded-lg hover:bg-teal-50 transition shadow-sm font-medium inline-block"
                >
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Patient Records Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden border border-teal-100">
        @if($patients->count())
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gradient-to-r from-teal-50 to-teal-100">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Patient Name</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Email</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Phone</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Date</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Time</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Doctor</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Appointment</th>
                        <!-- <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Status</th> -->
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-teal-100">
                    @foreach ($patients as $patient)
                    <tr class="hover:bg-teal-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-50">{{ $patient->patient_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $patient->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $patient->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $patient->date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $patient->time }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $patient->doctor }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">{{ $patient->appointments }}</td>
                        <!-- <td class="px-6 py-4 whitespace-nowrap border-r border-teal-50">
                            <span class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full
                                @if($patient->status == 'Pending') bg-amber-100 text-amber-800
                                @elseif($patient->status == 'Approved') bg-emerald-100 text-emerald-800
                                @elseif($patient->status == 'Attended') bg-teal-100 text-teal-800
                                @elseif($patient->status == 'Unattended') bg-rose-100 text-rose-800
                                @elseif($patient->status == 'Cancelled') bg-gray-100 text-gray-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ $patient->status }}
                            </span> -->
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button onclick="openEditModal({{ $patient->id }})" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                View
                            </button>
                            <button type="button" onclick="openDeleteModal({{ $patient->id }})" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="p-4">
            {{ $patients->links() }}
        </div>
        @else
        <div class="p-6 text-center text-teal-600">
            No patient records found.
        </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Confirm Deletion</h3>
            <p class="text-gray-600 mb-4">Are you sure you want to delete this patient record? This action cannot be undone.</p>
            <div class="flex justify-end gap-4">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 border rounded hover:bg-gray-100 transition">
                    Cancel
                </button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Scripts -->
    @push('scripts')
    <script>
        function openDeleteModal(id) {
            document.getElementById('deleteForm').action = `/admin/patient-records/${id}`;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('deleteModal').classList.contains('hidden')) {
                closeDeleteModal();
            }
        });

        // View Modal functions
        const patientData = {
            @foreach($patients as $patient)
            "{{ $patient->id }}": {
                id: "{{ $patient->id }}",
                patient_name: "{{ $patient->patient_name }}",
                email: "{{ $patient->email }}",
                phone: "{{ $patient->phone }}",
                date: "{{ $patient->date }}",
                time: "{{ $patient->time }}",
                doctor: "{{ $patient->doctor }}",
                appointments: "{{ $patient->appointments }}",
                status: "{{ $patient->status }}"
            },
            @endforeach
        };

        function openEditModal(id) {
            const data = patientData[id];
            document.getElementById('editPatientId').value = data.id;
            document.getElementById('editName').value = data.patient_name;
            document.getElementById('editEmail').value = data.email;
            document.getElementById('editPhone').value = data.phone;
            document.getElementById('editDate').value = data.date;
            document.getElementById('editTime').value = data.time;
            document.getElementById('editDoctor').value = data.doctor;
            document.getElementById('editAppointment').value = data.appointments;
            // document.getElementById('editStatus').value = data.status;
            document.getElementById('editForm').action = `/admin/patient-records/${data.id}`;
            document.getElementById('editModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('editModal').classList.contains('hidden')) {
                closeEditModal();
            }
        });
    </script>
    @endpush

    <!-- View Modal -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
            <div class="px-6 py-4 border-b rounded-sm bg-gradient-to-r from-teal-600 to-teal-700 p-6">
                <h3 class="text-lg font-medium text-white">View Patient Record</h3>
            </div>
            <div class="px-6 py-4">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="editPatientId">
                    <div class="mb-4">
                        <label for="editName" class="block text-sm font-medium text-gray-700">Patient's Name</label>
                        <input type="text" name="patient_name" id="editName" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="editEmail" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="editPhone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" id="editPhone" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="editDate" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" name="date" id="editDate" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="editTime" class="block text-sm font-medium text-gray-700">Time</label>
                        <input type="time" name="time" id="editTime" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="editDoctor" class="block text-sm font-medium text-gray-700">Doctor</label>
                        <input type="text" name="doctor" id="editDoctor" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="editAppointment" class="block text-sm font-medium text-gray-700">Appointment</label>
                        <input type="text" name="appointments" id="editAppointment" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <!-- <div class="mb-4">
                        <label for="editStatus" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="editStatus" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Attended">Attended</option>
                            <option value="Unattended">Unattended</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div> -->
                    <div class="flex justify-end gap-4">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-lg mb-4 mt-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                            Cancel
                        </button>
                        <!-- <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Update
                        </button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-sidebar-layout>
