<x-sidebar-layout>
    <x-slot:heading>
        Manage Available Appointments
    </x-slot:heading>
    <div class="container mx-auto p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Manage Available Appointments</h1>
            <p class="text-gray-600 mt-2">Create and manage appointment slots for patients to book</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="bg-teal-100 border-l-4 border-teal-500 text-teal-700 p-4 mb-6 rounded shadow" role="alert">
            <div class="flex">
                <div class="py-1">
                    <svg class="w-6 h-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Top Section: Form and Calendar Side by Side -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Create Form Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden h-full">
                <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-white">Add New Appointment Slot</h2>
                </div>
                <form method="POST" action="{{ route('admin.appointments.store') }}" class="p-6">
                    @csrf
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="date">Date</label>
                            <input type="date" id="date" name="date"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                value="{{ now()->format('Y-m-d') }}"
                                min="{{ now()->format('Y-m-d') }}"
                                onchange="updateAvailableTimeSlots()">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="time_slot">Time Slot</label>
                            <select id="time_slot" name="time_slot"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                required>
                                <option value="">Select a time slot</option>
                                @foreach (range(8, 17) as $hour)
                                <option value="{{ sprintf('%02d:00 - %02d:00', $hour, $hour + 1) }}">
                                    {{ sprintf('%02d:00 - %02d:00', $hour, $hour + 1) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="max_slots">Max Slots</label>
                            <input type="number" id="max_slots" name="max_slots"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                min="1" value="1">
                        </div>
                        <div class="pt-2">
                            <button type="submit"
                                class="w-full px-4 py-3 bg-teal-600 text-white rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-150">
                                Add Appointment Slot
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Calendar Filter Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden h-full">
                <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-white">Appointment Calendar</h2>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <button id="prevMonth" class="text-teal-600 hover:text-teal-800 bg-teal-50 hover:bg-teal-100 rounded-full p-2 transition-colors duration-150">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <h3 id="currentMonthYear" class="text-xl font-medium text-gray-800">March 2025</h3>
                        <button id="nextMonth" class="text-teal-600 hover:text-teal-800 bg-teal-50 hover:bg-teal-100 rounded-full p-2 transition-colors duration-150">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="grid grid-cols-7 gap-1 text-center mb-3">
                        <div class="text-sm font-medium text-gray-500">Sun</div>
                        <div class="text-sm font-medium text-gray-500">Mon</div>
                        <div class="text-sm font-medium text-gray-500">Tue</div>
                        <div class="text-sm font-medium text-gray-500">Wed</div>
                        <div class="text-sm font-medium text-gray-500">Thu</div>
                        <div class="text-sm font-medium text-gray-500">Fri</div>
                        <div class="text-sm font-medium text-gray-500">Sat</div>
                    </div>
                    <div id="calendarDays" class="grid grid-cols-7 gap-1">
                        <!-- Calendar days will be inserted by JavaScript ditows -->
                    </div>
                    <div class="mt-6 flex flex-wrap items-center justify-between text-sm gap-2">
                        <div class="flex items-center">
                            <div class="w-5 h-5 bg-teal-100 border border-teal-300 rounded-full mr-2"></div>
                            <span class="text-gray-600">Available</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-5 h-5 bg-teal-500 rounded-full mr-2"></div>
                            <span class="text-gray-600">Selected</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-5 h-5 bg-gray-200 rounded-full mr-2"></div>
                            <span class="text-gray-600">Past/Unavailable</span>
                        </div>
                    </div>
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Quick Actions</h4>
                        <div class="grid grid-cols-2 gap-3">
                            <button onclick="resetFilter()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-150 text-sm">
                                Reset Filter
                            </button>
                            <button onclick="goToToday()" class="px-4 py-2 bg-teal-100 text-teal-700 rounded-md hover:bg-teal-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-150 text-sm">
                                Today
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments Table Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <h2 class="text-xl font-semibold text-white">Current Available Appointments</h2>
                    <div class="mt-2 sm:mt-0">
                        <input type="text" id="appointmentSearch" placeholder="Search appointments..."
                            class="w-full sm:w-64 p-2 pl-3 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                </div>
            </div>
            <div class="p-6">
                @if($availableAppointments->count() > 0)
                <div class="overflow-x-auto">
                    <table id="appointmentsTable" class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" onclick="sortTable(0)">
                                    Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" onclick="sortTable(1)">
                                    Time Slot
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" onclick="sortTable(2)">
                                    Max Slots
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($availableAppointments as $appointment)
                            <tr class="hover:bg-gray-50" data-date="{{ $appointment->date }}" data-time="{{ $appointment->time_slot }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ \Carbon\Carbon::parse($appointment->date)->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $appointment->time_slot }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $appointment->max_slots }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $appointment->created_at->format('M d, Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2 flex">
                                    <button type="button"
                                        onclick="openEditModal({{ $appointment->id }}, '{{ $appointment->date }}', '{{ $appointment->time_slot }}', {{ $appointment->max_slots }})"
                                        class="text-teal-600 hover:text-teal-900 bg-teal-100 hover:bg-teal-200 px-3 py-1 rounded-md transition-colors duration-150">
                                        Edit
                                    </button>
                                    <button type="button"
                                        onclick="openDeleteModal({{ $appointment->id }})"
                                        class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-3 py-1 rounded-md transition-colors duration-150">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if(method_exists($availableAppointments, 'links'))
                <div class="mt-4">
                    {{ $availableAppointments->links() }}
                </div>
                @endif
                @else
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No appointments available</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating a new appointment slot.</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Edit Modal -->
        <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden">
                <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-white">Edit Appointment Slot</h3>
                    <button onclick="closeEditModal()" class="text-white hover:text-gray-200 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form id="editForm" method="POST" action="" class="p-6">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="edit_date">Date</label>
                            <input type="date" id="edit_date" name="date"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                onchange="updateEditTimeSlots()">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="edit_time_slot">Time Slot</label>
                            <select id="edit_time_slot" name="time_slot"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                required>
                                <option value="">Select a time slot</option>
                                @foreach (range(8, 17) as $hour)
                                <option value="{{ sprintf('%02d:00 - %02d:00', $hour, $hour + 1) }}">
                                    {{ sprintf('%02d:00 - %02d:00', $hour, $hour + 1) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2" for="edit_max_slots">Max Slots</label>
                            <input type="number" id="edit_max_slots" name="max_slots"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                min="1">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-150">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-150">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden">
                <div class="bg-gradient-to-r from-red-500 to-red-600 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-white">Delete Appointment Slot</h3>
                    <button onclick="closeDeleteModal()" class="text-white hover:text-gray-200 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 bg-red-100 rounded-full p-2 mr-3">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Delete Confirmation</h3>
                            <p class="text-sm text-gray-500 mt-1">Are you sure you want to delete this appointment slot? This action cannot be undone.</p>
                        </div>
                    </div>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <div class="mt-6 flex justify-end space-x-3">
                            <button type="button" onclick="closeDeleteModal()"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-150">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-150">
                                Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        @php
        $appointmentsJson = $availableAppointments->map(function($appointment) {
            return [
                'id' => $appointment->id,
                'date' => $appointment->date,
                'time_slot' => $appointment->time_slot,
                'max_slots' => $appointment->max_slots
            ];
        })->toJson();
        @endphp

        // Store all appointment data for client-side validation and calendar display
        const existingAppointments = {!! $appointmentsJson !!};

        // Current appointment ID being edited (to exclude from validation)
        let currentEditId = null;

        // Calendar variables
        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let currentYear = currentDate.getFullYear();

        // Function to update available time slots based on selected date
        function updateAvailableTimeSlots() {
            const selectedDate = document.getElementById('date').value;
            const timeSlotSelect = document.getElementById('time_slot');
            const options = timeSlotSelect.options;
            
            // Reset all options
            for (let i = 0; i < options.length; i++) {
                options[i].disabled = false;
                options[i].classList.remove('text-gray-400', 'bg-gray-100');
            }
            
            // Disable time slots that are already taken for the selected date
            existingAppointments.forEach(appointment => {
                if (appointment.date === selectedDate) {
                    for (let i = 0; i < options.length; i++) {
                        if (options[i].value === appointment.time_slot) {
                            options[i].disabled = true;
                            options[i].classList.add('text-gray-400', 'bg-gray-100');
                        }
                    }
                }
            });
            
            // If the currently selected option is now disabled, reset the selection
            if (timeSlotSelect.selectedIndex > 0 && options[timeSlotSelect.selectedIndex].disabled) {
                timeSlotSelect.selectedIndex = 0;
            }
        }

        // Function to update available time slots in the edit modal
        function updateEditTimeSlots() {
            const selectedDate = document.getElementById('edit_date').value;
            const timeSlotSelect = document.getElementById('edit_time_slot');
            const options = timeSlotSelect.options;
            const originalTimeSlot = document.getElementById('edit_time_slot').getAttribute('data-original');
            
            // Reset all options
            for (let i = 0; i < options.length; i++) {
                options[i].disabled = false;
                options[i].classList.remove('text-gray-400', 'bg-gray-100');
            }
            
            // Disable time slots that are already taken for the selected date (except the current one being edited)
            existingAppointments.forEach(appointment => {
                if (appointment.date === selectedDate && appointment.id !== currentEditId) {
                    for (let i = 0; i < options.length; i++) {
                        if (options[i].value === appointment.time_slot) {
                            options[i].disabled = true;
                            options[i].classList.add('text-gray-400', 'bg-gray-100');
                        }
                    }
                }
            });
            
            // If the currently selected option is now disabled, reset the selection
            if (timeSlotSelect.selectedIndex > 0 && options[timeSlotSelect.selectedIndex].disabled) {
                // If we have the original time slot and it's for this date, select it
                if (originalTimeSlot && selectedDate === document.getElementById('edit_date').getAttribute('data-original-date')) {
                    for (let i = 0; i < options.length; i++) {
                        if (options[i].value === originalTimeSlot) {
                            timeSlotSelect.selectedIndex = i;
                            break;
                        }
                    }
                } else {
                    timeSlotSelect.selectedIndex = 0;
                }
            }
        }

        // Calendar functions
        function renderCalendar() {
            const calendarDays = document.getElementById('calendarDays');
            const monthYearText = document.getElementById('currentMonthYear');
            
            // Update month/year display
            const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            monthYearText.textContent = `${monthNames[currentMonth]} ${currentYear}`;
            
            // Clear previous calendar
            calendarDays.innerHTML = '';
            
            // Get first day of month and total days in month
            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
            
            // Get today's date for highlighting
            const today = new Date();
            const todayDate = today.getDate();
            const todayMonth = today.getMonth();
            const todayYear = today.getFullYear();
            
            // Create empty cells for days before the first day of the month
            for (let i = 0; i < firstDay; i++) {
                const emptyCell = document.createElement('div');
                emptyCell.className = 'h-10 w-10 mx-auto';
                calendarDays.appendChild(emptyCell);
            }
            
            // Create cells for each day of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dateCell = document.createElement('div');
                const formattedDate = formatDate(currentYear, currentMonth, day);
                const isPast = new Date(currentYear, currentMonth, day) < new Date(todayYear, todayMonth, todayDate);
                const isToday = day === todayDate && currentMonth === todayMonth && currentYear === todayYear;
                const hasAppointments = existingAppointments.some(appointment => appointment.date === formattedDate);
                
                // Set base classes
                dateCell.className = 'h-10 w-10 rounded-full flex items-center justify-center text-sm cursor-pointer mx-auto';
                
                // styling based on date status
                if (isPast) {
                    dateCell.className += ' bg-gray-200 text-gray-500';
                } else if (isToday) {
                    dateCell.className += ' bg-teal-500 text-white font-bold';
                    dateCell.classList.add('today');
                } else if (hasAppointments) {
                    dateCell.className += ' bg-teal-100 text-teal-800 border border-teal-300 hover:bg-teal-200';
                } else {
                    dateCell.className += ' hover:bg-gray-100 text-gray-700';
                }
                
                dateCell.textContent = day;
                dateCell.setAttribute('data-date', formattedDate);
                
                //click event to filter appointments by date
                dateCell.addEventListener('click', function() {
                    if (!isPast) {
                        filterAppointmentsByDate(formattedDate);
                        
                        // Highlight selected date
                        document.querySelectorAll('#calendarDays div').forEach(cell => {
                            if (cell.classList.contains('bg-teal-500') && !cell.classList.contains('today')) {
                                cell.classList.remove('bg-teal-500', 'text-white');
                                if (cell.getAttribute('data-date') && existingAppointments.some(appointment => appointment.date === cell.getAttribute('data-date'))) {
                                    cell.classList.add('bg-teal-100', 'text-teal-800', 'border', 'border-teal-300');
                                } else {
                                    cell.classList.add('text-gray-700');
                                }
                            }
                        });
                        
                        if (!isToday) {
                            dateCell.classList.remove('bg-teal-100', 'text-teal-800', 'border', 'border-teal-300', 'text-gray-700');
                            dateCell.classList.add('bg-teal-500', 'text-white');
                        }
                    }
                });
                
                calendarDays.appendChild(dateCell);
            }
        }

        // Helper function to format date as YYYY-MM-DD
        function formatDate(year, month, day) {
            return `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        }

        // Function to filter appointments by date
        function filterAppointmentsByDate(date) {
            const rows = document.querySelectorAll('#appointmentsTable tbody tr');
            let hasVisibleRows = false;
            
            rows.forEach(row => {
                if (row.getAttribute('data-date') === date) {
                    row.style.display = '';
                    hasVisibleRows = true;
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Show "no results" message if needed
            const noResults = document.getElementById('noFilterResults');
            if (!hasVisibleRows) {
                if (!noResults) {
                    const table = document.getElementById('appointmentsTable');
                    const message = document.createElement('div');
                    message.id = 'noFilterResults';
                    message.className = 'text-center py-4 text-gray-500';
                    message.innerHTML = `No appointments found for ${new Date(date).toLocaleDateString()}. <a href="#" class="text-teal-500 hover:underline" onclick="resetFilter(event)">Show all</a>`;
                    table.parentNode.insertBefore(message, table.nextSibling);
                }
            } else if (noResults) {
                noResults.remove();
            }
        }

        // Function to reset filter
        function resetFilter(event) {
            if (event) event.preventDefault();
            
            const rows = document.querySelectorAll('#appointmentsTable tbody tr');
            rows.forEach(row => {
                row.style.display = '';
            });
            
            const noResults = document.getElementById('noFilterResults');
            if (noResults) noResults.remove();
            
            // Reset calendar selection
            document.querySelectorAll('#calendarDays div').forEach(cell => {
                if (cell.classList.contains('bg-teal-500') && !cell.classList.contains('today')) {
                    cell.classList.remove('bg-teal-500', 'text-white');
                    if (cell.getAttribute('data-date') && existingAppointments.some(appointment => appointment.date === cell.getAttribute('data-date'))) {
                        cell.classList.add('bg-teal-100', 'text-teal-800', 'border', 'border-teal-300');
                    } else {
                        cell.classList.add('text-gray-700');
                    }
                }
            });
        }

        // Function to go to today in calendar
        function goToToday() {
            currentMonth = new Date().getMonth();
            currentYear = new Date().getFullYear();
            renderCalendar();
            
            // Get today's formatted date
            const today = new Date();
            const formattedDate = formatDate(today.getFullYear(), today.getMonth(), today.getDate());
            
            // Filter appointments for today
            filterAppointmentsByDate(formattedDate);
        }

        // Function to search appointments
        function searchAppointments() {
            const searchInput = document.getElementById('appointmentSearch');
            const filter = searchInput.value.toLowerCase();
            const rows = document.querySelectorAll('#appointmentsTable tbody tr');
            let hasVisibleRows = false;
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = '';
                    hasVisibleRows = true;
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Show "no results" message if needed
            const noResults = document.getElementById('noFilterResults');
            if (!hasVisibleRows) {
                if (!noResults) {
                    const table = document.getElementById('appointmentsTable');
                    const message = document.createElement('div');
                    message.id = 'noFilterResults';
                    message.className = 'text-center py-4 text-gray-500';
                    message.innerHTML = `No appointments found matching "${filter}". <a href="#" class="text-teal-500 hover:underline" onclick="resetFilter(event)">Show all</a>`;
                    table.parentNode.insertBefore(message, table.nextSibling);
                } else {
                    noResults.innerHTML = `No appointments found matching "${filter}". <a href="#" class="text-teal-500 hover:underline" onclick="resetFilter(event)">Show all</a>`;
                }
            } else if (noResults) {
                noResults.remove();
            }
        }

        // Function to sort table
        function sortTable(columnIndex) {
            const table = document.getElementById('appointmentsTable');
            const tbody = table.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));
            
            // Get current sort direction
            const th = table.querySelectorAll('th')[columnIndex];
            const currentDirection = th.getAttribute('data-sort') === 'asc' ? 'desc' : 'asc';
            
            // Update sort direction attribute
            table.querySelectorAll('th').forEach(header => {
                header.removeAttribute('data-sort');
            });
            th.setAttribute('data-sort', currentDirection);
            
            // Sort rows
            rows.sort((a, b) => {
                const aValue = a.querySelectorAll('td')[columnIndex].textContent.trim();
                const bValue = b.querySelectorAll('td')[columnIndex].textContent.trim();
                
                if (columnIndex === 0) {
                    // Date sorting
                    const aDate = new Date(aValue);
                    const bDate = new Date(bValue);
                    return currentDirection === 'asc' ? aDate - bDate : bDate - aDate;
                } else if (columnIndex === 2) {
                    // Number sorting
                    return currentDirection === 'asc' ?
                        parseInt(aValue) - parseInt(bValue) :
                        parseInt(bValue) - parseInt(aValue);
                } else {
                    // Text sorting
                    return currentDirection === 'asc' ?
                        aValue.localeCompare(bValue) :
                        bValue.localeCompare(aValue);
                }
            });
            
            // Reorder rows
            rows.forEach(row => {
                tbody.appendChild(row);
            });
        }

        // Edit Modal Functions
        function openEditModal(id, date, timeSlot, maxSlots) {
            // Set current edit ID
            currentEditId = id;
            
            // Set form action
            document.getElementById('editForm').action = `/admin/appointments/${id}`;
            
            // Set form values
            const dateInput = document.getElementById('edit_date');
            dateInput.value = date;
            dateInput.setAttribute('data-original-date', date);
            
            const timeSlotSelect = document.getElementById('edit_time_slot');
            timeSlotSelect.value = timeSlot;
            timeSlotSelect.setAttribute('data-original', timeSlot);
            
            document.getElementById('edit_max_slots').value = maxSlots;
            
            // Update available time slots
            updateEditTimeSlots();
            
            // Show modal
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
            
            // Prevent background scrolling
            document.body.style.overflow = 'hidden';
        }

        function closeEditModal() {
            // Reset current edit ID
            currentEditId = null;
            
            // Hide modal
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
            
            // Re-enable background scrolling
            document.body.style.overflow = 'auto';
        }

        // Delete Modal Functions
        function openDeleteModal(id) {
            // Set form action
            document.getElementById('deleteForm').action = `/admin/appointments/${id}`;
            
            // Show modal
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
            
            // Prevent background scrolling
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            // Hide modal
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
            
            // Re-enable background scrolling
            document.body.style.overflow = 'auto';
        }

        // Calendar navigation
        document.getElementById('prevMonth').addEventListener('click', function() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar();
        });

        document.getElementById('nextMonth').addEventListener('click', function() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar();
        });

        // Search functionality
        document.getElementById('appointmentSearch').addEventListener('input', searchAppointments);

        // Close modals if user clicks outside of them
        document.getElementById('editModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeEditModal();
            }
        });

        document.getElementById('deleteModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeDeleteModal();
            }
        });

        //keyboard support for closing modals with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeEditModal();
                closeDeleteModal();
            }
        });

        // Initialize time slot availability and calendar on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateAvailableTimeSlots();
            renderCalendar();
            
            //animation to the cards
            const cards = document.querySelectorAll('.bg-white.rounded-lg.shadow-md');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 * (index + 1));
            });
        });
    </script>
</x-sidebar-layout>
            