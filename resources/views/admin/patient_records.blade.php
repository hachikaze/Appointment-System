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
    <div class="bg-white rounded-lg shadow overflow-hidden border border-teal-100">
        @if($distinctPatients->count())
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-gradient-to-r from-teal-50 to-teal-100">
                        <tr>
                            <!-- Sequence Number Column -->
                            <th class="w-12 px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200 text-center">
                                #
                            </th>
                            <!-- Patient's Name -->
                            <th class="w-25 px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200 text-center">
                                Patient Name
                            </th>
                            <!-- No. of Records Column -->
                            <th class="w-22 px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider text-center border-r border-teal-200">
                                No. of Appointment Records
                            </th>
                            <!-- Actions Column -->
                            <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-teal-100">
                        @foreach ($distinctPatients as $patient)
                            @php
                                // Construct the full name exactly as stored in the appointments table
                                $fullName = trim($patient->firstname . ' ' . $patient->middleinitial . ' ' . $patient->lastname);
                                // Retrieve appointment records for that full name, or an empty collection if none exist
                                $records = $allRecords[$fullName] ?? collect([]);
                            @endphp
                            <tr class="hover:bg-teal-50 transition">
                                <!-- Sequence Number Cell -->
                                <td class="w-12 px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium text-center border-r border-teal-50">
                                    {{ $loop->iteration }}
                                </td>
                                <!-- Patient Name Cell -->
                                <td class="w-25 px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-50">
                                    {{ $fullName }}
                                </td>
                                <!-- Record Count Cell -->
                                <td class="w-22 px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium text-left border-r border-teal-50">
                                    @if ($records->count() === 0)
                                        <span class="text-red-600">No Records Found</span>
                                    @elseif ($records->count() === 1)
                                        1 record
                                    @else
                                        {{ $records->count() }} records
                                    @endif
                                </td>
                                <!-- Actions Cell -->
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button onclick="openViewModal('{{ addslashes($fullName) }}', '{{ addslashes($patient->email) }}')"
                                        class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                        View
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
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
    <div id="viewModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b bg-gradient-to-r from-teal-600 to-teal-700 rounded-t-lg flex items-center">
                <svg class="h-6 w-6 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 id="viewModalTitle" class="text-lg font-medium text-white">Patient Records</h3>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-4">
                <div id="patientRecordsContent">
                    <!-- Dynamic content will be inserted here via JavaScript -->
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 border-t flex justify-between items-center">
                <div class="flex gap-2">
                    <a id="exportPdfBtn" href="#" target="_blank" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Print PDF
                    </a>
                    <button id="exportExcelBtn" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        Export to Excel
                    </button>
                </div>
                <button type="button" onclick="closeViewModal()" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Close
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
    <!-- Include SheetJS Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script>
        // Convert grouped patients data into a JavaScript object.
        const patientRecordsData = @json($allRecords);

        function openViewModal(patientName, patientEmail) {
            const records = patientRecordsData[patientName];
            let contentHtml = '';

            if (records && records.length > 0) {
                // Use the first record for common details.
                const firstRecord = records[0];

                // Use default values if any field is missing.
                const doctor = firstRecord.doctor ? firstRecord.doctor : "No Records";
                const email = firstRecord.email ? firstRecord.email : patientEmail;
                const phone = firstRecord.phone ? firstRecord.phone : "No Records";

                // Common details section.
                contentHtml += `
                    <div class="flex gap-4 mb-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">NAME</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">${patientName}</p>
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">DOCTOR ASSIGNED</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">${doctor}</p>
                        </div>
                    </div>
                    <div class="flex gap-4 mb-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">EMAIL</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">${email}</p>
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">PHONE</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">${phone}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-teal-700 mt-3">Appointments Recorded</h3>
                    </div>
                `;

                // Appointment details table with an ID for Excel export.
                contentHtml += `
                    <div class="max-h-64 overflow-y-auto">
                        <table id="appointmentsTableModal" class="w-full table-auto">
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
                // No appointment records.
                contentHtml += `
                    <div class="flex gap-4 mb-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">NAME</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">${patientName}</p>
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">DOCTOR ASSIGNED</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">No Records</p>
                        </div>
                    </div>
                    <div class="flex gap-4 mb-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">EMAIL</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">${patientEmail}</p>
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-teal-700">PHONE</label>
                            <p class="w-full p-2 border border-teal-200 rounded-lg bg-white">No Records</p>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-teal-700 mt-3">Appointments Recorded</h3>
                    </div>
                    <p class="text-center text-red-600">No Appointments Found</p>   
                `;
            }

            // Update the Print PDF link based on patient name.
            const encodedName = encodeURIComponent(patientName);
            document.getElementById('exportPdfBtn').href = `/patient/export-pdf/${encodedName}`;

            // Inject the generated HTML into the modal and display it.
            document.getElementById('patientRecordsContent').innerHTML = contentHtml;
            document.getElementById('viewModalTitle').textContent = 'Patient Records';
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

        // Export to Excel functionality using SheetJS.
        document.getElementById('exportExcelBtn').addEventListener('click', function() {
            var table = document.getElementById('appointmentsTableModal');
            if (table) {
                var workbook = XLSX.utils.table_to_book(table, { sheet: "Appointments" });
                XLSX.writeFile(workbook, 'PatientAppointments.xlsx');
            } else {
                alert('No appointments table found to export.');
            }
        });
    </script>
    @endpush

</x-sidebar-layout>
