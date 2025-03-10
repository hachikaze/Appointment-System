<x-sidebar-layout>
<!-- Header Section -->
<div class="mb-6 rounded-lg shadow-md overflow-hidden">
  <div class="p-5 bg-gradient-to-r from-teal-800 to-teal-700">
    <div class="flex items-center">
      <div class="mr-4 bg-teal-600 bg-opacity-30 p-2.5 rounded-full shadow-inner">
        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
      </div>
      <div>
        <h1 class="text-2xl font-bold text-white">Appointment Calendar</h1>
        <p class="text-sm text-teal-100 mt-1">View your scheduled appointments in calendar format</p>
      </div>
    </div>
  </div>
  <!-- Footer Section  -->
  <div class="p-4 bg-teal-100 border-t border-teal-300 flex flex-wrap justify-between items-center gap-2">
    <div class="text-xs text-teal-700 flex items-center">
      <svg class="w-4 h-4 mr-1 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      Click on any appointment to view details
    </div>
    <div class="text-xs font-medium text-teal-700 flex items-center">
      <span class="bg-teal-600 text-white px-2 py-1 rounded-full text-xs font-bold shadow-sm mr-1.5">Today:</span> 
      <span class="text-teal-800 font-semibold">{{ date('F d, Y') }}</span>
    </div>
  </div>
</div>

<!-- View Toggle Buttons (visible on all screen sizes) -->
<div class="mb-4 flex justify-end">
  <div class="inline-flex rounded-md shadow-sm" role="group">
    <button id="calendar-view-btn" class="px-4 py-2 text-sm font-medium bg-teal-100 text-teal-700 rounded-r-lg hover:bg-teal-200 hover:text-teal-800 focus:z-10 focus:ring-2 focus:ring-teal-500">
      <svg class="w-4 h-4 mr-1 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
      </svg>
      Calendar
    </button>
    <button id="list-view-btn" class="px-4 py-2 text-sm font-medium bg-teal-100 text-teal-700 rounded-r-lg hover:bg-teal-200 hover:text-teal-800 focus:z-10 focus:ring-2 focus:ring-teal-500">
      <svg class="w-4 h-4 mr-1 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      List
    </button>
  </div>
</div>

<!-- Calendar View -->
<div id="calendar-view" class="bg-teal-50 rounded-xl shadow-lg overflow-hidden border-2 border-teal-300">
  <!-- Calendar Header -->
  <div class="flex flex-wrap items-center justify-between p-5 border-b bg-gradient-to-r from-teal-600 to-teal-700">
    <div class="flex items-center space-x-3 mb-2 sm:mb-0">
      <button id="prev-month" class="p-2 rounded-lg bg-teal-500 bg-opacity-30 hover:bg-teal-500 hover:bg-opacity-50 text-white transition-colors focus:outline-none focus:ring-2 focus:ring-teal-300 focus:ring-opacity-50">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
      </button>
      <h2 id="current-month" class="text-xl font-semibold text-white"></h2>
      <button id="next-month" class="p-2 rounded-lg bg-teal-500 bg-opacity-30 hover:bg-teal-500 hover:bg-opacity-50 text-white transition-colors focus:outline-none focus:ring-2 focus:ring-teal-300 focus:ring-opacity-50">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </button>
      <button id="today-button" class="ml-2 px-4 py-2 text-sm bg-white text-teal-700 rounded-lg border border-teal-200 hover:bg-teal-50 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 font-medium">
        Today
      </button>
    </div>
  </div>
  
  <!-- Calendar Grid -->
  <div class="p-4 md:p-6 overflow-x-auto bg-teal-50">
    <!-- Days of week -->
    <div class="hidden md:grid grid-cols-7 gap-2 mb-4 min-w-[700px] md:min-w-0">
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Sunday</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Monday</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Tuesday</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Wednesday</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Thursday</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Friday</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Saturday</div>
    </div>
    
    <!-- days of week header -->
    <div class="grid grid-cols-7 gap-2 mb-4 md:hidden min-w-[700px]">
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Sun</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Mon</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Tue</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Wed</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Thu</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Fri</div>
      <div class="text-center font-medium text-teal-800 text-sm py-2 border-b-2 border-teal-300 bg-teal-100 rounded-t-lg">Sat</div>
    </div>
    
    <!-- Calendar days -->
    <div id="calendar-grid" class="grid grid-cols-7 gap-3 min-w-[700px] md:min-w-0">
      <!-- Calendar cells will be generated by JavaScript -->
    </div>
  </div>
</div>

<!-- List View -->
<div id="list-view" class="hidden bg-teal-50 rounded-xl shadow-lg overflow-hidden border-2 border-teal-300">
  <div class="p-4 border-b bg-gradient-to-r from-teal-600 to-teal-700 flex justify-between items-center">
    <h3 class="text-lg font-semibold text-white" id="list-view-month">March 2025</h3>
    <div class="flex space-x-2">
      <button id="prev-month-list" class="p-2 rounded-lg bg-teal-500 bg-opacity-30 hover:bg-teal-500 hover:bg-opacity-50 text-white transition-colors focus:outline-none focus:ring-2 focus:ring-teal-300 focus:ring-opacity-50">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
      </button>
      <button id="next-month-list" class="p-2 rounded-lg bg-teal-500 bg-opacity-30 hover:bg-teal-500 hover:bg-opacity-50 text-white transition-colors focus:outline-none focus:ring-2 focus:ring-teal-300 focus:ring-opacity-50">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </button>
      <button id="today-button-list" class="px-4 py-2 text-sm bg-white text-teal-700 rounded-lg border border-teal-200 hover:bg-teal-50 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 font-medium">
        Today
      </button>
    </div>
  </div>
  <div id="appointment-list" class="divide-y divide-teal-200">
    <!-- Appointment list items will be generated by JavaScript -->
  </div>
</div>

<!-- Legend  -->
<div class="mt-6 bg-teal-50 rounded-xl shadow-md p-5 border-2 border-teal-300">
  <h3 class="text-sm font-semibold text-teal-800 mb-4">Appointment Status</h3>
  <div class="flex flex-wrap gap-4">
    <div class="flex items-center">
      <div class="w-4 h-4 rounded-full bg-yellow-400 mr-2 shadow-sm"></div>
      <span class="text-sm text-gray-700">Pending</span>
    </div>
    <div class="flex items-center">
      <div class="w-4 h-4 rounded-full bg-green-500 mr-2 shadow-sm"></div>
      <span class="text-sm text-gray-700">Confirmed</span>
    </div>
    <div class="flex items-center">
      <div class="w-4 h-4 rounded-full bg-blue-500 mr-2 shadow-sm"></div>
      <span class="text-sm text-gray-700">Completed</span>
    </div>
    <div class="flex items-center">
      <div class="w-4 h-4 rounded-full bg-red-500 mr-2 shadow-sm"></div>
      <span class="text-sm text-gray-700">Cancelled</span>
    </div>
  </div>
</div>

<!-- Appointment Details Modal  -->
<div id="appointment-modal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
    <!-- Background overlay  -->
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm" aria-hidden="true"></div>
    <!-- Modal centering spacer -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <!-- Modal panel  -->
    <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-200">
      <!-- Modal header -->
      <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4 border-b border-gray-200">
        <div class="flex items-center">
          <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-teal-500 bg-opacity-30 sm:h-12 sm:w-12 mr-4">
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <h3 class="text-xl leading-6 font-bold text-white" id="modal-title">
            Appointment Details
          </h3>
        </div>
      </div>
      <!-- Modal content -->
      <div class="bg-white px-6 py-5">
        <div class="space-y-5">
          <!-- Patient info  -->
          <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
            <div class="flex justify-between items-center">
              <div>
                <p class="text-sm font-medium text-gray-500">Patient</p>
                <p class="text-lg font-semibold text-gray-900 mt-1" id="modal-patient">John Doe</p>
              </div>
              <div id="modal-status" class="px-3 py-1.5 text-xs font-bold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200 shadow-sm">
                Pending
              </div>
            </div>
          </div>
          <!-- Date and time  -->
          <div class="grid grid-cols-2 gap-4">
            <div class="bg-teal-50 rounded-lg p-4 border border-teal-200">
              <p class="text-sm font-medium text-teal-700">Date</p>
              <p class="text-base font-semibold text-gray-900 mt-1" id="modal-date">March 15, 2025</p>
            </div>
            <div class="bg-teal-50 rounded-lg p-4 border border-teal-200">
              <p class="text-sm font-medium text-teal-700">Time</p>
              <p class="text-base font-semibold text-gray-900 mt-1" id="modal-time">10:00 AM</p>
            </div>
          </div>
          <!-- Service info -->
          <div class="bg-teal-50 rounded-lg p-4 border border-teal-200">
            <p class="text-sm font-medium text-teal-700">Service</p>
            <p class="text-base font-semibold text-gray-900 mt-1" id="modal-service">Dental Checkup</p>
          </div>
          <!-- Notes section -->
          <div class="bg-teal-50 rounded-lg p-4 border border-teal-200">
            <p class="text-sm font-medium text-teal-700">Notes</p>
            <p class="text-sm text-gray-700 mt-2 italic" id="modal-notes">Patient requested a morning appointment. First-time visit for dental cleaning and checkup.</p>
          </div>
          <!-- Contact information -->
          <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
            <p class="text-sm font-medium text-gray-500 mb-3">Contact Information</p>
            <div class="space-y-2">
              <div class="flex items-center">
                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-teal-100 flex items-center justify-center mr-3">
                  <svg class="h-4 w-4 text-teal-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <span class="text-sm text-gray-700" id="modal-email">johndoe@example.com</span>
              </div>
              <div class="flex items-center">
                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-teal-100 flex items-center justify-center mr-3">
                  <svg class="h-4 w-4 text-teal-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                </div>
                <span class="text-sm text-gray-700" id="modal-phone">(123) 456-7890</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer  -->
      <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end">
        <button type="button" id="modal-close-btn" class="inline-flex justify-center items-center rounded-lg border border-teal-300 shadow-sm px-6 py-2.5 bg-teal-600 text-sm font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-colors duration-150">
          <svg class="h-4 w-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
          Close
        </button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
// Initialize appointment data from server
const appointmentsData = {!! $appointmentsJson ?? '[]' !!};

document.addEventListener('DOMContentLoaded', function() {
    // Track current date for calendar navigation
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();
    
    // View state and DOM elements
    let isListView = false;
    const calendarViewContainer = document.getElementById('calendar-view');
    const listViewContainer = document.getElementById('list-view');
    const calendarViewBtn = document.getElementById('calendar-view-btn');
    const listViewBtn = document.getElementById('list-view-btn');
    
    // Set initial view based on screen size
    function setInitialView() {
        if (window.innerWidth < 768) {
            // Auto-switch to list view on small screens
            isListView = true;
            calendarViewContainer.classList.add('hidden');
            listViewContainer.classList.remove('hidden');
            calendarViewBtn.classList.remove('bg-teal-600', 'text-white');
            calendarViewBtn.classList.add('bg-teal-100', 'text-teal-700');
            listViewBtn.classList.remove('bg-teal-100', 'text-teal-700');
            listViewBtn.classList.add('bg-teal-600', 'text-white');
        } else {
            isListView = false;
            calendarViewContainer.classList.remove('hidden');
            listViewContainer.classList.add('hidden');
            calendarViewBtn.classList.add('bg-teal-600', 'text-white');
            calendarViewBtn.classList.remove('bg-teal-100', 'text-teal-700');
            listViewBtn.classList.add('bg-teal-100', 'text-teal-700');
            listViewBtn.classList.remove('bg-teal-600', 'text-white');
        }
    }
    
    // Initialize views
    setInitialView();
    window.addEventListener('resize', setInitialView);
    
    // View toggle event handlers
    calendarViewBtn.addEventListener('click', function() {
        if (isListView) {
            isListView = false;
            calendarViewContainer.classList.remove('hidden');
            listViewContainer.classList.add('hidden');
            calendarViewBtn.classList.add('bg-teal-600', 'text-white');
            calendarViewBtn.classList.remove('bg-teal-100', 'text-teal-700');
            listViewBtn.classList.add('bg-teal-100', 'text-teal-700');
            listViewBtn.classList.remove('bg-teal-600', 'text-white');
        }
    });
    
    listViewBtn.addEventListener('click', function() {
        if (!isListView) {
            isListView = true;
            calendarViewContainer.classList.add('hidden');
            listViewContainer.classList.remove('hidden');
            calendarViewBtn.classList.remove('bg-teal-600', 'text-white');
            calendarViewBtn.classList.add('bg-teal-100', 'text-teal-700');
            listViewBtn.classList.remove('bg-teal-100', 'text-teal-700');
            listViewBtn.classList.add('bg-teal-600', 'text-white');
            updateListView();
        }
    });
    
    // Initialize calendar and list views
    updateCalendar();
    updateListView();
    
    // Calendar navigation event handlers
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
    
    // List view navigation event handlers
    document.getElementById('prev-month-list').addEventListener('click', function() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        loadAppointmentsForMonth(currentMonth, currentYear);
    });
    
    document.getElementById('next-month-list').addEventListener('click', function() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        loadAppointmentsForMonth(currentMonth, currentYear);
    });
    
    document.getElementById('today-button-list').addEventListener('click', function() {
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
    
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
    
    // Load appointments for a specific month via AJAX
    function loadAppointmentsForMonth(month, year) {
        fetch(`/admin/calendar/appointments?month=${month + 1}&year=${year}`)
            .then(response => response.json())
            .then(data => {
                appointmentsData = data;
                updateCalendar();
                updateListView();
            })
            .catch(error => {
                console.error('Error loading appointments:', error);
                updateCalendar();
                updateListView();
            });
    }
    
    // Display appointment details in modal
    function showAppointmentDetails(appointment) {
        document.getElementById('modal-patient').textContent = appointment.patient;
        document.getElementById('modal-date').textContent = formatDate(appointment.date);
        document.getElementById('modal-time').textContent = appointment.time;
        document.getElementById('modal-service').textContent = appointment.service;
        document.getElementById('modal-notes').textContent = appointment.notes || 'No additional notes';
        document.getElementById('modal-email').textContent = appointment.email;
        document.getElementById('modal-phone').textContent = appointment.phone;
        
        const statusElement = document.getElementById('modal-status');
        statusElement.textContent = appointment.status;
        statusElement.className = 'px-3 py-1.5 text-xs font-bold rounded-full shadow-sm border';
        
        switch(appointment.status.toLowerCase()) {
            case 'pending':
                statusElement.classList.add('bg-yellow-100', 'text-yellow-800', 'border-yellow-200');
                break;
            case 'approved':
            case 'confirmed':
                statusElement.classList.add('bg-green-100', 'text-green-800', 'border-green-200');
                break;
            case 'attended':
            case 'completed':
                statusElement.classList.add('bg-blue-100', 'text-blue-800', 'border-blue-200');
                break;
            case 'unattended':
            case 'cancelled':
                statusElement.classList.add('bg-red-100', 'text-red-800', 'border-red-200');
                break;
            default:
                statusElement.classList.add('bg-gray-100', 'text-gray-800', 'border-gray-200');
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('animate-fade-in');
    }
    
    // Format date for display
    function formatDate(dateString) {
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const date = new Date(dateString);
        return `${monthNames[date.getMonth()]} ${date.getDate()}, ${date.getFullYear()}`;
    }
    
    // Get appointments for a specific day
    function getAppointmentsForDay(day, month, year) {
        return appointmentsData.filter(appointment => {
            return appointment.day === day &&
                appointment.month === month &&
                appointment.year === year;
        });
    }
    
    // Check if a date is today
    function isToday(day, month, year) {
        const today = new Date();
        return day === today.getDate() &&
            month === today.getMonth() &&
            year === today.getFullYear();
    }
    
    // Check if a date is in the past
    function isPastDate(day, month, year) {
        const today = new Date();
        const checkDate = new Date(year, month, day);
        return checkDate < new Date(today.getFullYear(), today.getMonth(), today.getDate());
    }
    
    // Update list view with appointments grouped by day
    function updateListView() {
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        document.getElementById('list-view-month').textContent = `${monthNames[currentMonth]} ${currentYear}`;
        const appointmentList = document.getElementById('appointment-list');
        appointmentList.innerHTML = '';
        
        const monthAppointments = appointmentsData.filter(appointment => {
            return appointment.month === currentMonth && appointment.year === currentYear;
        });
        
        monthAppointments.sort((a, b) => {
            if (a.day !== b.day) return a.day - b.day;
            return a.time.localeCompare(b.time);
        });
        
        const appointmentsByDay = {};
        monthAppointments.forEach(appointment => {
            const day = appointment.day;
            if (!appointmentsByDay[day]) {
                appointmentsByDay[day] = [];
            }
            appointmentsByDay[day].push(appointment);
        });
        
        const today = new Date();
        const isTodayInCurrentMonth = today.getMonth() === currentMonth && today.getFullYear() === currentYear;
        const todayDate = today.getDate();
        
        if (isTodayInCurrentMonth && !appointmentsByDay[todayDate]) {
            appointmentsByDay[todayDate] = [];
        }
        
        Object.keys(appointmentsByDay).sort((a, b) => parseInt(a) - parseInt(b)).forEach(day => {
            const dayAppointments = appointmentsByDay[day];
            const dayInt = parseInt(day);
            const isPast = isPastDate(dayInt, currentMonth, currentYear);
            
            const dayHeader = document.createElement('div');
            dayHeader.className = `p-3 font-medium border-b ${isPast ? 'bg-gray-100 text-gray-600 border-gray-200' : 'bg-teal-100 text-teal-800 border-teal-200'}`;
            
            const isTodayHeader = isToday(dayInt, currentMonth, currentYear);
            if (isTodayHeader) {
                dayHeader.innerHTML = `
                    <div class="flex items-center justify-between">
                        <span>${monthNames[currentMonth]} ${day}, ${currentYear}</span>
                        <span class="bg-teal-600 text-white px-2 py-0.5 rounded-full text-xs font-bold shadow-sm">Today</span>
                    </div>
                `;
            } else {
                dayHeader.textContent = `${monthNames[currentMonth]} ${day}, ${currentYear}`;
            }
            appointmentList.appendChild(dayHeader);
            
            if (dayAppointments.length === 0) {
                const emptyMessage = document.createElement('div');
                emptyMessage.className = `p-6 text-center ${isPast ? 'text-gray-400' : 'text-teal-500'}`;
                if (isTodayHeader) {
                    emptyMessage.innerHTML = `
                        <svg class="w-10 h-10 mx-auto text-teal-600 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="font-large">No appointments today</p>
                    `;
                } else {
                    emptyMessage.innerHTML = `
                        <p class="font-medium">No appointments scheduled</p>
                    `;
                }
                appointmentList.appendChild(emptyMessage);
            } else {
                dayAppointments.forEach(appointment => {
                    const listItem = document.createElement('div');
                    listItem.className = `p-4 cursor-pointer transition-colors border-b ${isPast ? 'bg-gray-50 hover:bg-gray-100 border-gray-100' : 'hover:bg-teal-100 border-teal-100'}`;
                    
                    let statusStyle = '';
                    switch(appointment.status.toLowerCase()) {
                        case 'pending':
                            statusStyle = isPast ? 'bg-gray-100 text-gray-600 border border-gray-200' : 'bg-yellow-100 text-yellow-800 border border-yellow-200';
                            break;
                        case 'approved':
                        case 'confirmed':
                            statusStyle = isPast ? 'bg-gray-100 text-gray-600 border border-gray-200' : 'bg-green-100 text-green-800 border border-green-200';
                            break;
                        case 'attended':
                        case 'completed':
                            statusStyle = 'bg-blue-100 text-blue-800 border border-blue-200';
                            break;
                        case 'unattended':
                        case 'cancelled':
                            statusStyle = 'bg-red-100 text-red-800 border border-red-200';
                            break;
                        default:
                            statusStyle = 'bg-gray-100 text-gray-800 border border-gray-200';
                    }
                    
                    listItem.innerHTML = `
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                            <div class="mb-2 sm:mb-0">
                                <div class="flex items-center">
                                    <div class="${isPast ? 'bg-gray-200 text-gray-700' : 'bg-teal-200 text-teal-800'} font-medium px-2 py-1 rounded mr-2 text-sm">
                                        ${appointment.time}
                                    </div>
                                    <p class="font-medium ${isPast ? 'text-gray-600' : 'text-gray-900'}">${appointment.patient}</p>
                                </div>
                                <p class="text-sm ${isPast ? 'text-gray-500' : 'text-teal-700'} mt-1">${appointment.service}</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full shadow-sm ${statusStyle} self-start sm:self-center mt-2 sm:mt-0">
                                ${appointment.status}
                            </span>
                        </div>
                    `;
                    
                    listItem.addEventListener('click', function() {
                        showAppointmentDetails(appointment);
                    });
                    
                    appointmentList.appendChild(listItem);
                });
            }
        });
        
        // Show empty state message if no appointments for the month
        if (Object.keys(appointmentsByDay).length === 0) {
            const emptyMessage = document.createElement('div');
            emptyMessage.className = 'p-8 text-center text-teal-500 bg-teal-50';
            emptyMessage.innerHTML = `
                <svg class="w-12 h-12 mx-auto text-teal-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="font-medium">No appointments for this month</p>
            `;
            appointmentList.appendChild(emptyMessage);
        }
    }
    
    // Update calendar grid with appointments
    function updateCalendar() {
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        
        document.getElementById('current-month').textContent = `${monthNames[currentMonth]} ${currentYear}`;
        
        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        
        const calendarGrid = document.getElementById('calendar-grid');
        calendarGrid.innerHTML = '';
        
        // Add empty cells for days before the first day of month
        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'h-28 md:h-32 rounded-lg bg-gray-100/30 border-2 border-gray-200';
            calendarGrid.appendChild(emptyCell);
        }
        
        // Add cells for each day of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const cell = document.createElement('div');
            
            const isTodayCell = isToday(day, currentMonth, currentYear);
            const isPastDate = (currentYear < new Date().getFullYear()) ||
                (currentYear === new Date().getFullYear() && currentMonth < new Date().getMonth()) ||
                (currentYear === new Date().getFullYear() && currentMonth === new Date().getMonth() && day < new Date().getDate());
            
            // Apply styling based on date status
            if (isTodayCell) {
                cell.className = 'h-28 md:h-32 rounded-lg p-2 bg-teal-200 hover:bg-teal-300 transition-colors overflow-hidden border-2 border-teal-500 shadow-md relative flex flex-col';
                cell.classList.add('ring-4', 'ring-teal-400', 'ring-opacity-50');
            } else if (isPastDate) {
                cell.className = 'h-28 md:h-32 rounded-lg p-2 bg-gray-100 hover:bg-gray-200 transition-colors overflow-hidden border-2 border-gray-300 shadow-sm relative flex flex-col';
            } else {
                cell.className = 'h-28 md:h-32 rounded-lg p-2 bg-teal-50 hover:bg-teal-100 transition-colors overflow-hidden border-2 border-teal-300 shadow-sm relative flex flex-col';
            }
            
            // Create date header with day number
            const dateContainer = document.createElement('div');
            dateContainer.className = 'flex justify-between items-center mb-2 flex-shrink-0';
            
            const dateNumber = document.createElement('div');
            if (isTodayCell) {
                dateNumber.className = 'flex items-center justify-center w-7 h-7 rounded-full bg-teal-600 text-white text-sm font-bold shadow-sm';
            } else if (isPastDate) {
                dateNumber.className = 'text-sm font-medium text-gray-500';
            } else {
                dateNumber.className = 'text-sm font-medium text-teal-800';
            }
            dateNumber.textContent = day;
            dateContainer.appendChild(dateNumber);
            
            // Add appointment count badge if there are appointments
            const dayAppointments = getAppointmentsForDay(day, currentMonth, currentYear);
            if (dayAppointments.length > 0) {
                const countBadge = document.createElement('div');
                if (isPastDate && !isTodayCell) {
                    countBadge.className = 'bg-gray-400 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold shadow-sm';
                } else {
                    countBadge.className = 'bg-teal-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold shadow-sm';
                }
                countBadge.textContent = dayAppointments.length;
                dateContainer.appendChild(countBadge);
            }
            cell.appendChild(dateContainer);
            
            // Create scrollable appointment container
            const appointmentContainer = document.createElement('div');
            appointmentContainer.className = 'space-y-1 overflow-y-auto flex-grow scrollbar-thin scrollbar-thumb-teal-400 scrollbar-track-transparent';
            appointmentContainer.style.WebkitOverflowScrolling = 'touch';
            appointmentContainer.style.overscrollBehavior = 'contain';
            
            // Sort appointments by time
            dayAppointments.sort((a, b) => a.time.localeCompare(b.time));
            
            // Show empty state for today if no appointments
            if (isTodayCell && dayAppointments.length === 0) {
                const noAppointmentsMsg = document.createElement('div');
                noAppointmentsMsg.className = 'text-xs text-center text-teal-700 mt-2 bg-teal-100 rounded-md py-1 px-2 border border-teal-300 font-medium';
                noAppointmentsMsg.textContent = 'No appointments today';
                appointmentContainer.appendChild(noAppointmentsMsg);
            } else {
                // Display all appointments for this day
                dayAppointments.forEach(appointment => {
                    const appointmentElement = document.createElement('div');
                    
                    // Determine status style with adjustments for past dates
                    let statusStyle = '';
                    if (isPastDate && !isTodayCell) {
                        switch(appointment.status.toLowerCase()) {
                            case 'attended':
                            case 'completed':
                                statusStyle = 'bg-blue-100 text-blue-800 border-blue-200 opacity-80';
                                break;
                            case 'unattended':
                            case 'cancelled':
                                statusStyle = 'bg-red-100 text-red-800 border-red-200 opacity-80';
                                break;
                            default:
                                statusStyle = 'bg-gray-100 text-gray-600 border-gray-200';
                        }
                    } else {
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
                    }
                    
                    // Style appointment element
                    appointmentElement.className = `text-xs rounded-md px-2 py-1 mb-1 truncate ${statusStyle} border shadow-sm flex items-center cursor-pointer hover:shadow-md transition-shadow`;
                    
                    // Add time indicator
                    const timeSpan = document.createElement('span');
                    timeSpan.className = 'font-medium mr-1';
                    timeSpan.textContent = appointment.time;
                    appointmentElement.appendChild(timeSpan);
                    
                    // Add patient name
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
            }
            
            cell.appendChild(appointmentContainer);
            calendarGrid.appendChild(cell);
        }
        
        // Add pulsing effect for today's cell
        if (document.querySelector('.ring-4')) {
            const pulseStyle = document.getElementById('pulse-animation');
            if (!pulseStyle) {
                const style = document.createElement('style');
                style.id = 'pulse-animation';
                style.textContent = `
                    @keyframes subtle-pulse {
                        0% { box-shadow: 0 0 0 0 rgba(45, 212, 191, 0.4); }
                        70% { box-shadow: 0 0 0 10px rgba(45, 212, 191, 0); }
                        100% { box-shadow: 0 0 0 0 rgba(45, 212, 191, 0); }
                    }
                    .ring-4.ring-teal-400 {
                        animation: subtle-pulse 2s infinite;
                    }
                `;
                document.head.appendChild(style);
            }
        }
    }
    
    // Handle responsive view changes
    const mediaQuery = window.matchMedia('(min-width: 768px)');
    
    function handleScreenSizeChange(e) {
        if (e.matches) {
            // Switch to calendar view on larger screens
            if (isListView) {
                isListView = false;
                calendarViewContainer.classList.remove('hidden');
                listViewContainer.classList.add('hidden');
                calendarViewBtn.classList.add('bg-teal-600', 'text-white');
                calendarViewBtn.classList.remove('bg-teal-100', 'text-teal-700');
                listViewBtn.classList.add('bg-teal-100', 'text-teal-700');
                listViewBtn.classList.remove('bg-teal-600', 'text-white');
            }
        } else {
            // Switch to list view on smaller screens
            if (!isListView) {
                isListView = true;
                calendarViewContainer.classList.add('hidden');
                listViewContainer.classList.remove('hidden');
                calendarViewBtn.classList.remove('bg-teal-600', 'text-white');
                calendarViewBtn.classList.add('bg-teal-100', 'text-teal-700');
                listViewBtn.classList.remove('bg-teal-100', 'text-teal-700');
                listViewBtn.classList.add('bg-teal-600', 'text-white');
                updateListView();
            }
        }
    }
    
    // Initialize responsive behavior
    handleScreenSizeChange(mediaQuery);
    mediaQuery.addEventListener('change', handleScreenSizeChange);
    
    // Add swipe gestures for mobile navigation
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
        const swipeThreshold = 100;
        if (touchEndX < touchStartX - swipeThreshold) {
            // Swipe left - next month
            if (isListView) {
                document.getElementById('next-month-list').click();
            } else {
                document.getElementById('next-month').click();
            }
        }
        if (touchEndX > touchStartX + swipeThreshold) {
            // Swipe right - previous month
            if (isListView) {
                document.getElementById('prev-month-list').click();
            } else {
                document.getElementById('prev-month').click();
            }
        }
    }
    
    // Add animation and scrollbar styles
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
        /* Custom scrollbar for appointment containers */
        .scrollbar-thin::-webkit-scrollbar {
            width: 4px;
        }
        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }
        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: rgba(20, 184, 166, 0.5);
            border-radius: 20px;
        }
        /* Media query for vertical stacking on small screens */
        @media (max-width: 640px) {
            #appointment-list .flex-row {
                flex-direction: column;
            }
            #appointment-list .items-center {
                align-items: flex-start;
            }
            #appointment-list .justify-between > div {
                margin-bottom: 0.5rem;
            }
        }
    `;
    document.head.appendChild(style);
});
</script>

@endpush
</x-sidebar-layout>