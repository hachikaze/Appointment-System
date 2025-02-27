<x-sidebar-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Appointment Calendar</h1>
        <p class="text-sm text-gray-500">View and manage your appointments in calendar format</p>
    </div>
    <!-- Calendar Card -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
        <!-- Calendar Header with Controls -->
        <div class="flex flex-wrap items-center justify-between p-5 border-b bg-gradient-to-r from-blue-50 to-indigo-50">
            <div class="flex items-center space-x-3 mb-2 sm:mb-0">
                <button id="prev-month" class="p-2 rounded-lg hover:bg-white/80 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <h2 id="current-month" class="text-xl font-semibold text-gray-800"></h2>
                <button id="next-month" class="p-2 rounded-lg hover:bg-white/80 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                <button id="today-button" class="ml-2 px-4 py-2 text-sm bg-white text-blue-600 rounded-lg border border-blue-200 hover:bg-blue-50 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Today
                </button>
            </div>
            <div class="flex space-x-1">
                <button class="px-4 py-2 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="hidden sm:inline">Month</span>
                    <span class="sm:hidden">M</span>
                </button>
                <button class="px-4 py-2 text-sm bg-white text-gray-700 rounded-lg border border-gray-200 hover:bg-gray-50 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <span class="hidden sm:inline">Week</span>
                    <span class="sm:hidden">W</span>
                </button>
                <button class="px-4 py-2 text-sm bg-white text-gray-700 rounded-lg border border-gray-200 hover:bg-gray-50 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <span class="hidden sm:inline">Day</span>
                    <span class="sm:hidden">D</span>
                </button>
            </div>
        </div>
        <!-- Calendar Grid with Responsive Adjustments -->
        <div class="p-4 md:p-6 overflow-x-auto"> <!-- Added overflow-x-auto for horizontal scrolling on small screens -->
            <!-- Days of week header for larger screens -->
            <div class="hidden md:grid grid-cols-7 gap-2 mb-4 min-w-[700px] md:min-w-0"> <!-- Added min-width for small screens -->
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Sunday</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Monday</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Tuesday</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Wednesday</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Thursday</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Friday</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Saturday</div>
            </div>
            <!-- Responsive days of week header for small screens -->
            <div class="grid grid-cols-7 gap-2 mb-4 md:hidden min-w-[700px]"> <!-- Added min-width for small screens -->
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Sun</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Mon</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Tue</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Wed</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Thu</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Fri</div>
                <div class="text-center font-medium text-gray-600 text-sm py-2 border-b border-gray-200">Sat</div>
            </div>
            <!-- Calendar days -->
            <div id="calendar-grid" class="grid grid-cols-7 gap-2 min-w-[700px] md:min-w-0"> <!-- Added min-width for small screens -->
                <!-- Calendar cells will be generated by JavaScript -->
            </div>
        </div>
    </div>
    <!-- Alternative Mobile View Toggle -->
    <div class="md:hidden mt-4 flex justify-center">
        <button id="toggle-view-btn" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            Switch to List View
        </button>
    </div>
    <!-- Mobile List View (initially hidden) -->
    <div id="list-view" class="md:hidden mt-4 hidden">
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
            <div class="p-4 border-b bg-gradient-to-r from-blue-50 to-indigo-50">
                <h3 class="text-lg font-semibold text-gray-800" id="list-view-month">March 2025</h3>
            </div>
            <div id="appointment-list" class="divide-y divide-gray-200">
                <!-- Appointment list items will be generated by JavaScript -->
            </div>
        </div>
    </div>
    <!-- Legend -->
    <div class="mt-6 bg-white rounded-lg shadow-md p-4 border border-gray-200">
        <h3 class="text-sm font-semibold text-gray-700 mb-3">Appointment Status</h3>
        <div class="flex flex-wrap gap-3">
            <div class="flex items-center">
                <div class="w-3 h-3 rounded-full bg-yellow-400 mr-2"></div>
                <span class="text-xs text-gray-600">Pending</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                <span class="text-xs text-gray-600">Confirmed</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                <span class="text-xs text-gray-600">Completed</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 rounded-full bg-red-500 mr-2"></div>
                <span class="text-xs text-gray-600">Cancelled</span>
            </div>
        </div>
    </div>
    <!-- Appointment Details Modal -->
    <div id="appointment-modal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Appointment Details
                            </h3>
                            <div class="mt-4 space-y-4">
                                <div class="border-b pb-3">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm text-gray-500">Patient</p>
                                            <p class="text-base font-medium text-gray-900" id="modal-patient">John Doe</p>
                                        </div>
                                        <div id="modal-status" class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Pending
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Date</p>
                                        <p class="text-base font-medium text-gray-900" id="modal-date">March 15, 2025</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Time</p>
                                        <p class="text-base font-medium text-gray-900" id="modal-time">10:00 AM</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Service</p>
                                    <p class="text-base font-medium text-gray-900" id="modal-service">Dental Checkup</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Notes</p>
                                    <p class="text-sm text-gray-700" id="modal-notes">Patient requested a morning appointment. First-time visit for dental cleaning and checkup.</p>
                                </div>
                                <div class="border-t pt-3">
                                    <p class="text-sm text-gray-500">Contact Information</p>
                                    <div class="mt-1 flex items-center">
                                        <svg class="h-4 w-4 text-gray-400 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-sm text-gray-700" id="modal-email">johndoe@example.com</span>
                                    </div>
                                    <div class="mt-1 flex items-center">
                                        <svg class="h-4 w-4 text-gray-400 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <span class="text-sm text-gray-700" id="modal-phone">(123) 456-7890</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="modal-edit-btn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Edit Appointment
                    </button>
                    <button type="button" id="modal-close-btn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        // This will be populated with real data from the database
        const appointmentsData = {!! $appointmentsJson ?? '[]' !!};

        document.addEventListener('DOMContentLoaded', function() {
            // Current date tracking
            let currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();
            
            // View state
            let isListView = false;
            const calendarView = document.getElementById('calendar-grid').parentElement;
            const listView = document.getElementById('list-view');
            const toggleViewBtn = document.getElementById('toggle-view-btn');
            
            // Toggle between calendar and list view on mobile
            toggleViewBtn.addEventListener('click', function() {
                isListView = !isListView;
                if (isListView) {
                    calendarView.classList.add('hidden');
                    listView.classList.remove('hidden');
                    toggleViewBtn.textContent = 'Switch to Calendar View';
                    updateListView();
                } else {
                    calendarView.classList.remove('hidden');
                    listView.classList.add('hidden');
                    toggleViewBtn.textContent = 'Switch to List View';
                }
            });
            
            // Initialize calendar
            updateCalendar();
            
            // Event listeners for controls
            document.getElementById('prev-month').addEventListener('click', function() {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                loadAppointmentsForMonth(currentMonth, currentYear);
            });
            
            document.getElementById('next-month').addEventListener('click', function() {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                loadAppointmentsForMonth(currentMonth, currentYear);
            });
            
            document.getElementById('today-button').addEventListener('click', function() {
                const today = new Date();
                currentMonth = today.getMonth();
                currentYear = today.getFullYear();
                loadAppointmentsForMonth(currentMonth, currentYear);
            });
            
            // Modal functionality
            const modal = document.getElementById('appointment-modal');
            const closeModalBtn = document.getElementById('modal-close-btn');
            closeModalBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
            });
            
            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
            
            // Function to load appointments for a specific month via AJAX
            function loadAppointmentsForMonth(month, year) {
                fetch(`/admin/calendar/appointments?month=${month + 1}&year=${year}`)
                    .then(response => response.json())
                    .then(data => {
                        // Update appointmentsData with the new data
                        appointmentsData = data;
                        // Update the calendar display
                        updateCalendar();
                        if (isListView) updateListView();
                    })
                    .catch(error => {
                        console.error('Error loading appointments:', error);
                        // Fallback to updating with current data if AJAX fails
                        updateCalendar();
                        if (isListView) updateListView();
                    });
            }
            
            // Function to show appointment details in modal
            function showAppointmentDetails(appointment) {
                // Update modal content with appointment details
                document.getElementById('modal-patient').textContent = appointment.patient;
                document.getElementById('modal-date').textContent = formatDate(appointment.date);
                document.getElementById('modal-time').textContent = appointment.time;
                document.getElementById('modal-service').textContent = appointment.service;
                document.getElementById('modal-notes').textContent = appointment.notes || 'No additional notes';
                document.getElementById('modal-email').textContent = appointment.email;
                document.getElementById('modal-phone').textContent = appointment.phone;
                
                // Update status with appropriate styling
                const statusElement = document.getElementById('modal-status');
                statusElement.textContent = appointment.status;
                
                // Reset all status classes
                statusElement.className = 'px-3 py-1 text-xs font-semibold rounded-full';
                
                // Add appropriate status class
                switch(appointment.status.toLowerCase()) {
                    case 'pending':
                        statusElement.classList.add('bg-yellow-100', 'text-yellow-800');
                        break;
                    case 'approved':
                    case 'confirmed':
                        statusElement.classList.add('bg-green-100', 'text-green-800');
                        break;
                    case 'attended':
                    case 'completed':
                        statusElement.classList.add('bg-blue-100', 'text-blue-800');
                        break;
                    case 'unattended':
                    case 'cancelled':
                        statusElement.classList.add('bg-red-100', 'text-red-800');
                        break;
                    default:
                        statusElement.classList.add('bg-gray-100', 'text-gray-800');
                }
                
                // Show the modal
                modal.classList.remove('hidden');
            }
            
            // Helper function to format date
            function formatDate(dateString) {
                const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                const date = new Date(dateString);
                return `${monthNames[date.getMonth()]} ${date.getDate()}, ${date.getFullYear()}`;
            }
            
            // Function to get appointments for a specific day
            function getAppointmentsForDay(day, month, year) {
                return appointmentsData.filter(appointment => {
                    return appointment.day === day && 
                           appointment.month === month && 
                           appointment.year === year;
                });
            }
            
            // Function to update list view for mobile
            function updateListView() {
                const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                document.getElementById('list-view-month').textContent = `${monthNames[currentMonth]} ${currentYear}`;
                const appointmentList = document.getElementById('appointment-list');
                appointmentList.innerHTML = '';
                
                // Get appointments for the current month
                const monthAppointments = appointmentsData.filter(appointment => {
                    return appointment.month === currentMonth && appointment.year === currentYear;
                });
                
                // Sort appointments by date and time
                monthAppointments.sort((a, b) => {
                    if (a.day !== b.day) return a.day - b.day;
                    return a.time.localeCompare(b.time);
                });
                
                // Create list items for each appointment
                monthAppointments.forEach(appointment => {
                    const listItem = document.createElement('div');
                    listItem.className = 'p-4 hover:bg-gray-50 cursor-pointer';
                    
                    // Determine status style
                    let statusStyle = '';
                    switch(appointment.status.toLowerCase()) {
                        case 'pending':
                            statusStyle = 'bg-yellow-100 text-yellow-800';
                            break;
                        case 'approved':
                        case 'confirmed':
                            statusStyle = 'bg-green-100 text-green-800';
                            break;
                        case 'attended':
                        case 'completed':
                            statusStyle = 'bg-blue-100 text-blue-800';
                            break;
                        case 'unattended':
                        case 'cancelled':
                            statusStyle = 'bg-red-100 text-red-800';
                            break;
                        default:
                            statusStyle = 'bg-gray-100 text-gray-800';
                    }
                    
                    listItem.innerHTML = `
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="font-medium text-gray-900">${appointment.patient}</p>
                                <p class="text-sm text-gray-500">${formatDate(appointment.date)} at ${appointment.time}</p>
                                <p class="text-sm text-gray-700 mt-1">${appointment.service}</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full ${statusStyle}">
                                ${appointment.status}
                            </span>
                        </div>
                    `;
                    
                    listItem.addEventListener('click', function() {
                        showAppointmentDetails(appointment);
                    });
                    
                    appointmentList.appendChild(listItem);
                });
                
                // Show message if no appointments
                if (monthAppointments.length === 0) {
                    const emptyMessage = document.createElement('div');
                    emptyMessage.className = 'p-8 text-center text-gray-500';
                    emptyMessage.textContent = 'No appointments for this month';
                    appointmentList.appendChild(emptyMessage);
                }
            }
            
            // Function to update calendar
            function updateCalendar() {
                const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                
                // Update header
                document.getElementById('current-month').textContent = `${monthNames[currentMonth]} ${currentYear}`;
                
                // Get first day of month and total days
                const firstDay = new Date(currentYear, currentMonth, 1).getDay();
                const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
                
                // Clear grid
                const calendarGrid = document.getElementById('calendar-grid');
                calendarGrid.innerHTML = '';
                
                // Add empty cells for days before the first day of month
                for (let i = 0; i < firstDay; i++) {
                    const emptyCell = document.createElement('div');
                    emptyCell.className = 'h-28 md:h-32 rounded-lg bg-gray-50 border border-gray-100';
                    calendarGrid.appendChild(emptyCell);
                }
                
                // Add cells for each day of the month
                for (let day = 1; day <= daysInMonth; day++) {
                    const cell = document.createElement('div');
                    cell.className = 'h-28 md:h-32 rounded-lg p-2 bg-white hover:bg-gray-50 transition-colors overflow-hidden border border-gray-200 relative group';
                    
                    // Date number with day of week
                    const dateContainer = document.createElement('div');
                    dateContainer.className = 'flex justify-between items-center mb-2';
                    
                    // Day of month
                    const dateNumber = document.createElement('div');
                    dateNumber.className = 'text-sm font-medium text-gray-700';
                    dateNumber.textContent = day;
                    
                    // Check if this is today
                    const today = new Date();
                    if (day === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear()) {
                        dateNumber.className = 'flex items-center justify-center w-7 h-7 rounded-full bg-blue-600 text-white text-sm font-medium';
                    }
                    
                    dateContainer.appendChild(dateNumber);
                    cell.appendChild(dateContainer);
                    
                    // Add appointment container
                    const appointmentContainer = document.createElement('div');
                    appointmentContainer.className = 'space-y-1 overflow-y-auto max-h-20 md:max-h-24 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent';
                    
                    // Get real appointments for this day
                    const dayAppointments = getAppointmentsForDay(day, currentMonth, currentYear);
                    
                    // Sort appointments by time
                    dayAppointments.sort((a, b) => a.time.localeCompare(b.time));
                    
                    // Display appointments (limit to 3 for display)
                    const displayLimit = 3;
                    const displayedAppointments = dayAppointments.slice(0, displayLimit);
                    
                    displayedAppointments.forEach(appointment => {
                        const appointmentElement = document.createElement('div');
                        
                        // Determine status style
                        let statusStyle = '';
                        switch(appointment.status.toLowerCase()) {
                            case 'pending':
                                statusStyle = 'bg-yellow-100 text-yellow-800 border-yellow-200';
                                break;
                            case 'approved':
                            case 'confirmed':
                                statusStyle = 'bg-green-100 text-green-800 border-green-200';
                                break;
                            case 'attended':
                            case 'completed':
                                statusStyle = 'bg-blue-100 text-blue-800 border-blue-200';
                                break;
                            case 'unattended':
                            case 'cancelled':
                                statusStyle = 'bg-red-100 text-red-800 border-red-200';
                                break;
                            default:
                                statusStyle = 'bg-gray-100 text-gray-800 border-gray-200';
                        }
                        
                        // Style the appointment element
                        appointmentElement.className = `text-xs rounded px-2 py-1 mb-1 truncate ${statusStyle} border flex items-center cursor-pointer hover:shadow-sm`;
                        
                        // Time indicator
                        const timeSpan = document.createElement('span');
                        timeSpan.className = 'font-medium mr-1';
                        timeSpan.textContent = appointment.time;
                        appointmentElement.appendChild(timeSpan);
                        
                        // Appointment text
                        const textSpan = document.createElement('span');
                        textSpan.className = 'truncate';
                        textSpan.textContent = appointment.patient;
                        appointmentElement.appendChild(textSpan);
                        
                        // Add click event to show appointment details
                        appointmentElement.addEventListener('click', function() {
                            showAppointmentDetails(appointment);
                        });
                        
                        appointmentContainer.appendChild(appointmentElement);
                    });
                    
                    cell.appendChild(appointmentContainer);
                    
                    // Add "more" indicator if there are more appointments than the display limit
                    if (dayAppointments.length > displayLimit) {
                        const moreIndicator = document.createElement('div');
                        moreIndicator.className = 'text-xs text-center text-gray-500 mt-1 bg-gray-50 rounded-sm py-0.5 cursor-pointer hover:bg-gray-100';
                        moreIndicator.textContent = `+${dayAppointments.length - displayLimit} more`;
                        
                        // Show all appointments when clicking "more"
                        moreIndicator.addEventListener('click', function(e) {
                            e.stopPropagation(); // Prevent cell click event
                            
                            // Build a list of appointments for the alert or show in modal
                            let appointmentList = `Appointments for ${monthNames[currentMonth]} ${day}, ${currentYear}:\n\n`;
                            dayAppointments.forEach(app => {
                                appointmentList += `• ${app.time} - ${app.patient} (${app.service}) - ${app.status}\n`;
                            });
                            alert(appointmentList);
                        });
                        
                        cell.appendChild(moreIndicator);
                    }
                    
                    // Add hover effect for adding new appointments
                    const addButton = document.createElement('button');
                    addButton.className = 'absolute bottom-1 right-1 w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500';
                    addButton.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>';
                    addButton.title = 'Add appointment';
                    
                    // Add click event for the add button
                    addButton.addEventListener('click', function(e) {
                        e.stopPropagation(); // Prevent cell click event
                        alert(`Add new appointment for ${monthNames[currentMonth]} ${day}, ${currentYear}`);
                        // Here you would typically open a form modal to add a new appointment
                    });
                    
                    cell.appendChild(addButton);
                    calendarGrid.appendChild(cell);
                }
            }
            
            // Edit appointment button functionality
            document.getElementById('modal-edit-btn').addEventListener('click', function() {
                alert('Edit appointment functionality would go here');
                // redirect to an edit form or open an edit modal
            });
            
            // Check for screen size changes to handle responsive behavior
            const mediaQuery = window.matchMedia('(min-width: 768px)');
            function handleScreenSizeChange(e) {
                if (e.matches) {
                    // Screen is at least medium size (md)
                    // Switch back to calendar view if we're in list view
                    if (isListView) {
                        isListView = false;
                        calendarView.classList.remove('hidden');
                        listView.classList.add('hidden');
                        toggleViewBtn.textContent = 'Switch to List View';
                    }
                }
            }
            
            // Initial check
            handleScreenSizeChange(mediaQuery);
            
            // listener for changes
            mediaQuery.addEventListener('change', handleScreenSizeChange);
            
            // swipe gestures for mobile navigation (optional enhancement)
            let touchStartX = 0;
            let touchEndX = 0;
            
            document.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
            }, false);
            
            document.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, false);
            
            function handleSwipe() {
                const swipeThreshold = 100; // Minimum distance for a swipe
                if (touchEndX < touchStartX - swipeThreshold) {
                    // Swipe left - next month
                    document.getElementById('next-month').click();
                }
                if (touchEndX > touchStartX + swipeThreshold) {
                    // Swipe right - previous month
                    document.getElementById('prev-month').click();
                }
            }
        });
    </script>
    @endpush
</x-sidebar-layout>