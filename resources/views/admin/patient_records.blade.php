<x-sidebar-layout>
    <!-- Header Section (unchanged) -->
    <div class="mb-8 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Patient Records</h1>
                        <p class="text-teal-100">View and manage all patient records</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span
                        class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Records Management
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
            <div class="flex items-center text-sm text-teal-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Manage patient records from this dashboard.</span>
            </div>
        </div>
    </div>

    <!-- Filters Section (unchanged) -->
    <div class="bg-gradient-to-r from-teal-50 to-white rounded-xl shadow-sm p-5 mb-6 border border-teal-100">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <!-- Search by name -->
            <div class="flex-1 min-w-[200px]">
                <label for="search" class="block text-sm font-medium text-teal-700 mb-1">Search Patient</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="search" name="search" placeholder="Search by name"
                        value="{{ request('search') }}"
                        class="pl-10 w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white" />
                </div>
            </div>
            <!-- Per page -->
            <div class="flex-1 min-w-[200px]">
                <label for="perPage" class="block text-sm font-medium text-teal-700 mb-1">Show entries</label>
                <div class="relative">
                    <select id="perPage" name="perPage"
                        class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none">
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10 entries</option>
                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25 entries</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50 entries</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100 entries</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Submit & Reset -->
            <div>
                <button type="submit"
                    class="bg-teal-600 text-white px-5 py-2.5 rounded-lg hover:bg-teal-700 transition shadow-sm font-medium flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Apply Filters
                </button>
            </div>
            <div>
                <a href="{{ route('admin.patient_records') }}"
                    class="bg-white text-teal-700 border border-teal-200 px-5 py-2.5 rounded-lg hover:bg-teal-50 transition shadow-sm font-medium inline-block">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Unique Patient List -->
    <!-- Instead of using $patients->groupBy('patient_name'), 
     use the $distinctPatients paginator. -->
    <div class="bg-white rounded-lg shadow overflow-hidden border border-teal-100">
        @if($distinctPatients->count())
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gradient-to-r from-teal-50 to-teal-100">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">
                            Patient Name
                        </th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-teal-100">
                    @foreach ($distinctPatients as $patientRow)
                        @php
                            $patientName = $patientRow->patient_name;
                            $records     = $allRecords[$patientName] ?? collect([]);
                        @endphp
                        <tr class="hover:bg-teal-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-50">
                                {{ $patientName }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <button onclick="openViewModal('{{ addslashes($patientName) }}')"
                                        class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                    View
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- @if ($distinctPatients->total() > 0)
            <div class="p-4 text-sm text-teal-700">
                Showing {{ $distinctPatients->firstItem() }} to {{ $distinctPatients->lastItem() }} of {{ $distinctPatients->total() }} results
            </div>
        @endif -->

            <!-- Now the pagination links will say "Showing 1 to X of Y" 
                for the *unique* patients, not the total appointments. -->
            <div class="p-4">
            {{ $distinctPatients->appends(request()->query())->links() }}
            </div>
        @else
            <div class="p-6 text-center text-teal-600">
                No patient records found.
            </div>
        @endif
    </div>


    <!-- View Modal -->
    <div id="viewModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b bg-gradient-to-r from-teal-600 to-teal-700 rounded-t-lg">
                <h3 id="viewModalTitle" class="text-lg font-medium text-white">Patient Records</h3>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-4">
                <div id="patientRecordsContent">
                    <!-- Dynamic content will be inserted here via JavaScript -->
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 border-t flex justify-end">
                <button type="button" onclick="closeViewModal()"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Close
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Convert grouped patients data into a JavaScript object.
        const patientRecordsData = @json($allRecords);

        function openViewModal(patientName) {
            const records = patientRecordsData[patientName];
            let contentHtml = '';

            if (records && records.length > 0) {
                // Use the first record for the common details (doctor, email, phone).
                const firstRecord = records[0];

                // 1) Row: NAME and DOCTOR
                contentHtml += `
                    <div class="flex gap-4 mb-4">
                        <!-- NAME -->
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">NAME</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">${patientName}</p>
                        </div>
                        <!-- DOCTOR -->
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">DOCTOR</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">${firstRecord.doctor}</p>
                        </div>
                    </div>
                `;

                // 2) Row: EMAIL and PHONE
                contentHtml += `
                    <div class="flex gap-4 mb-4">
                        <!-- EMAIL -->
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">EMAIL</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">${firstRecord.email}</p>
                        </div>
                        <!-- PHONE -->
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">PHONE</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">${firstRecord.phone}</p>
                        </div>
                    </div>
                `;

                // 3) Table: Appointment details (Date, Time, Appointment)
            contentHtml += `
                <div class="max-h-64 overflow-y-auto">
                <table class="w-full table-auto">
                    <thead class="bg-gradient-to-r from-teal-50 to-teal-100">
                        <tr>
                            <th class="px-4 py-2 text-xs font-semibold text-teal-700 uppercase">Date</th>
                            <th class="px-4 py-2 text-xs font-semibold text-teal-700 uppercase">Time</th>
                            <th class="px-4 py-2 text-xs font-semibold text-teal-700 uppercase">Appointment</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-teal-100">
            `;
            records.forEach(record => {
                contentHtml += `
                <tr class="hover:bg-teal-50 transition">
                    <td class="px-4 py-2 text-sm text-teal-600">${record.date}</td>
                    <td class="px-4 py-2 text-sm text-teal-600">${record.time}</td>
                    <td class="px-4 py-2 text-sm text-teal-600">${record.appointments}</td>
                </tr>
                `;
            });
            contentHtml += `
                    </tbody>
                </table>
                </div>
            `;
            } else {
                // If no records for that patient
                contentHtml = '<p class="text-center text-teal-600">No records found for this patient.</p>';
            }

            // Inject the HTML into the modal
            document.getElementById('patientRecordsContent').innerHTML = contentHtml;
            // Set the modal title to "Patient Records"
            document.getElementById('viewModalTitle').textContent = 'Patient Records';

            // Show the modal
            document.getElementById('viewModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeViewModal() {
            document.getElementById('viewModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Close modal if clicking outside the modal content.
        document.getElementById('viewModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeViewModal();
            }
        });

        // Close modal on pressing the Escape key.
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('viewModal').classList.contains('hidden')) {
                closeViewModal();
            }
        });
    </script>
    @endpush

</x-sidebar-layout>
