@php
    use Carbon\Carbon;
@endphp
<x-patientnav-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Custom Calendar</title>
    </head>

    <body class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="container mx-auto p-4 pr-0 pl-0">

            <div
                class="mb-4 flex flex-col sm:flex-row bg-white p-5 shadow-lg rounded-lg border-l-4 border-teal-500 justify-between my-12 items-center space-y-4 sm:space-y-0">
                <a href="{{ route('patient.dashboard') }}"
                    class="flex items-center bg-red-500 rounded-lg text-white p-2 text-lg shadow-lg font-semibold 
                     hover:bg-red-600 transition duration-200">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Go Back
                </a>


                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 w-full sm:w-auto">
                    <select id="monthSelect"
                        class="border-2 border-teal-500 font-bold p-2 rounded bg-white shadow w-full sm:w-auto">
                        <option value="0">January</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                        <option value="4">May</option>
                        <option value="5">June</option>
                        <option value="6">July</option>
                        <option value="7">August</option>
                        <option value="8">September</option>
                        <option value="9">October</option>
                        <option value="10">November</option>
                        <option value="11">December</option>
                    </select>
                    <select id="yearSelect"
                        class="border-2 border-teal-500 font-bold p-2 rounded bg-white shadow w-full sm:w-auto">
                    </select>
                </div>
            </div>

            @if ($errors->any())
                <div class=" bg-red-500  text-white text-md p-6 w-full rounded-lg my-5">
                    @foreach ($errors->all() as $error)
                        <p><i class="fas fa-exclamation-circle text-white"></i> {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="justify-center  ">
                <div class="border-2 border-teal-500 p-2 rounded-lg">
                    <div class="bg-teal-500 w-full text-center text-3xl text-white p-4 font-bold rounded-t-lg">
                        APPOINTMENT CALENDAR
                    </div>
                    <div class=" bg-teal-200 p-4 content-center rounded-b-lg shadow-lg flex flex-wrap gap-2 sm:grid sm:grid-cols-7"
                        id="calendar">
                        <div
                            class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-grays-200 p-2 rounded">
                            Sun</div>
                        <div
                            class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                            Mon</div>
                        <div
                            class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                            Tue</div>
                        <div
                            class="text-center font-bold tetext-teal-500xt-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                            Wed</div>
                        <div
                            class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                            Thu</div>
                        <div
                            class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                            Fri</div>
                        <div
                            class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                            Sat</div>
                    </div>
                </div>
            </div>


        </div>


        <div class="flex items-center  justify-center m-10  mt-10  ">
            <form id="dateForm" class="w-full">
                <h2 id="selectedDate" class="text-lg font-bold hidden"></h2>
                <input type="hidden" id="hiddenselectedDate" name="hiddenselectedDate" value="">

                <div
                    class="bg-white relative overflow-x-auto border-l-4 border-teal-500  container shadow-lg sm:rounded-lg  p-5 mx-auto">
                    <div class="flex flex-wrap gap-4">
                        <!-- Choose a Time Slot Header -->
                        <div class="bg-teal-500 rounded-lg">
                            <h2 class="text-xl font-bold text-white p-6 shadow-lg" id="modal-title">
                                <i class="fa-solid fa-clock text-white"></i> Choose a Time Slot
                            </h2>
                        </div>

                        <!-- Available Slots Counter -->
                        <div
                            class="bg-gray-100 border border-gray-800 rounded-lg px-6 py-4 flex items-center shadow-lg">
                            <i class="fa-solid fa-user-clock text-teal-600 text-2xl mr-2"></i>
                            <span class="text-lg font-bold text-gray-900">
                                Slots Available: {{ $availableslots }}
                            </span>
                        </div>
                    </div>

                    <!-- Time Slots Selection -->
                    <div class="flex flex-wrap gap-2 mt-4">
                        @if ($selectedDate && count($availableappointments) > 0)
                            @foreach ($availableappointments as $appointment)
                                @if ($appointment->remaining_slots > 0)
                                    <button type="button"
                                        class="appointment-button px-4 py-2 text-md shadow-lg font-medium text-gray-900 bg-gray-100 border border-gray-800 rounded-lg hover:bg-teal-600 hover:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        data-time="{{ $appointment->time_slot }}" onclick="selectAppointmentTime(this)">
                                        {{ $appointment->time_slot }}
                                        ({{ $appointment->remaining_slots }}
                                        slots left)
                                    </button>
                                @endif
                            @endforeach
                        @else
                            <div class="flex items-center space-x-2 ">
                                <i class="fa-solid fa-xmark text-red-500 text-2xl"></i>
                                <p class="text-lg font-bold text-teal-600">
                                    No available time slots for
                                    @if (!empty($selectedDate))
                                        {{ date('F j, Y', strtotime($selectedDate)) }}
                                    @else
                                        {{ 'Choose a date in the Calendar.' }}
                                    @endif
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        @if (!empty($selectedDate))
            <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="flex items-center justify-center m-10 mt-10">
                    <div class="bg-white relative overflow-x-auto container shadow-lg sm:rounded-lg mx-auto">
                        <div class="bg-teal-600  rounded-t-lg text-white p-3">
                            <p class="text-lg font-bold">
                                Please fill in the details to set your dental appointment.
                            </p>
                        </div>

                        <!-- Two-Column Input Fields -->
                        <div class="grid p-6 grid-cols-1 md:grid-cols-2 gap-4 ">

                            <div>
                                <label for="date" class="block mb-2 text-md font-medium text-gray-900">Date
                                    Selected</label>
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-md text-gray-900 bg-teal-200 border rounded-e-0 border-gray-800 border-e-0 rounded-s-md">
                                        <i class="fa-solid fa-calendar text-teal-700 shadow-lg"></i>
                                    </span>
                                    <input type="text" id="date" name="date" value="{{ $selectedDate }}"
                                        readonly
                                        class="rounded-none rounded-e-lg bg-gray-50 border text-gray-500 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500"
                                        placeholder="2025-02-20">
                                </div>
                            </div>

                            <div>
                                <label for="time" class="block mb-2 text-md font-medium text-gray-900">Chosen
                                    Timeslot</label>
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-md text-gray-900 bg-teal-200 border rounded-b-0 border-gray-800 border-e-0 rounded-s-md">
                                        <i class="fa-solid fa-calendar text-teal-700 shadow-lg"></i>
                                    </span>
                                    <input type="text" id="time" name="time" value="" readonly
                                        class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500"
                                        placeholder="Select a Time.">
                                </div>
                            </div>


                            <div>
                                <label for="phone" class="block mb-2 text-md font-medium text-gray-900">Phone
                                    Number</label>
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-teal-200 border rounded-e-0 border-gray-800 border-e-0 rounded-s-md">
                                        <i class="fa-solid fa-phone text-teal-700 shadow-lg"></i>
                                    </span>
                                    <input type="text" id="phone" name="phone" maxlength="11"
                                        class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500"
                                        placeholder="Ex. 09123456789">
                                </div>
                            </div>

                            <div>
                                <label for="appointment-reason" class="block mb-2 text-md font-medium text-gray-900">
                                    Reason for Appointment
                                </label>
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-teal-200 border rounded-e-0 border-gray-800 border-e-0 rounded-s-md">
                                        <i class="fa-solid fa-calendar text-teal-700 shadow-lg"></i>
                                    </span>
                                    <select id="appointment_reason" name="appointment_reason"
                                        class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500">
                                        <option value="">Select Reason</option>
                                        <option value="Tooth Restoration">Tooth Restoration</option>
                                        <option value="Extraction">Extraction</option>
                                        <option value="Teeth Whitening">Teeth Whitening</option>
                                        <option value="Oral Prophylaxis">Oral Prophylaxis</option>
                                        <option value="Odontectomy">Odontectomy</option>
                                        <option value="Orthodontics">Orthodontics</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class=" p-4 sm:mt-2 flex flex-col sm:flex-row-reverse gap-3 sm:gap-2">
                            <button type="button" data-modal-target="create-appointment-modal"
                                data-modal-toggle="create-appointment-modal"
                                class="inline-flex items-center justify-center rounded-md border border-transparent px-4 py-2 bg-teal-600 font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none transition ease-in-out duration-150 text-md">
                                <i class="fa-solid fa-check-circle mr-2"></i>
                                Set Appointment
                            </button>

                            <x-modal modalId="create-appointment-modal" title="Create this Appointment"
                                message="Are you sure you want to create this appointment?"
                                route="{{ route('appointments.store') }}" method="POST" buttonText="Create" />
                        </div>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-center m-10 mt-10">
                    <div
                        class="bg-white relative  p-4 text-teal-600 overflow-x-auto container shadow-lg sm:rounded-lg mx-auto">
                        <p class="text-xl font-bold">
                            <i class="fa-solid fa-calendar-check"></i> No Date Selected
                        </p>
                    </div>
                </div>
        @endif
        </form>
        <div class="flex items-center  justify-center m-10 mb-0 mt-10  ">
            <div class="relative overflow-x-auto  my-5 container shadow-lg sm:rounded-lg  pt-0 pr-0 pl-0 mx-auto">
                <table
                    class="w-full rounded-lg text-lg text-left rtl:text-right text-white dark:text-gray-400 shadow-lg">
                    <thead class="text-lg text-white uppercase bg-teal-600  dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">Patient Name</th>
                            <th scope="col" class="px-6 py-3">Phone Number</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Time</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border">
                        @foreach ($appointments as $appointment)
                            <tr class="border-b text-black hover:bg-teal-200">
                                <td class="px-6 py-4">{{ $appointment->patient_name }}</td>
                                <td class="px-6 py-4">{{ $appointment->phone }}</td>
                                <td class="px-6 py-4">{{ Carbon::parse($appointment->date)->format('F j, Y') }}</td>
                                <td class="px-6 py-4">{{ $appointment->time }}</td>
                                <td class="px-6 py-4">
                                    @php
                                        $buttonClass = match (strtolower($appointment->status)) {
                                            'cancelled',
                                            'delete'  => 'bg-red-600 hover:bg-red-700', // Red for cancelled states
                                            'approved'=> 'bg-green-600 hover:bg-green-700',
                                            'pending' => 'bg-orange-600 hover:bg-orange-700',
                                            'attended'=> 'bg-blue-600 hover:bg-blue-700',
                                            'unattended' => 'bg-red-600 hover:bg-red-700', // You can adjust as needed
                                            default   => 'bg-gray-600 hover:bg-gray-700',
                                        };
                                    @endphp
                                    <span class="px-2 py-1 font-semibold leading-tight {{ $buttonClass }} rounded-full text-white">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $status = strtolower($appointment->status);
                                    @endphp
                                    @if ($status === 'cancelled')
                                        <!-- If cancelled, show text -->
                                        <span class="text-red-600 font-bold">Cancelled</span>
                                    @elseif ($status === 'unattended')
                                        <!-- If unattended, show Reschedule button -->
                                        <button data-modal-target="reschedule-appointment-modal-{{ $appointment->id }}"
                                            data-modal-toggle="reschedule-appointment-modal-{{ $appointment->id }}"
                                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold p-2 rounded-xl shadow-lg">
                                            Reschedule
                                        </button>

                                        <!-- Reschedule Modal Markup -->
                                        <div id="reschedule-appointment-modal-{{ $appointment->id }}" class="modal hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                            <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full relative">
                                                <h2 class="text-xl font-bold mb-4">Reschedule Appointment</h2>
                                                <form action="{{ route('appointments.reschedule', ['id' => $appointment->id]) }}" method="POST" id="rescheduleForm-{{ $appointment->id }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Hidden Fields for Existing Data -->
                                                    <input type="hidden" name="phone" value="{{ $appointment->phone }}">
                                                    <input type="hidden" name="appointment_reason" value="{{ $appointment->appointment_reason }}">

                                                    <!-- Date Picker -->
                                                    <div class="mb-4">
                                                        <label for="reschedule-date-{{ $appointment->id }}" class="block text-md font-medium text-gray-900">Select New Date</label>
                                                        <input type="date" id="reschedule-date-{{ $appointment->id }}" name="selectedDate" class="mt-1 block w-full border-gray-300 rounded-md" required onchange="handleDateSelection({{ $appointment->id }})" min="{{ date('Y-m-d') }}">
                                                    </div>

                                                    <!-- Hidden Input for Time -->
                                                    <input type="hidden" name="time" id="reschedule-time-{{ $appointment->id }}">

                                                    <!-- Time Slots Selection -->
                                                    <div id="time-slots-{{ $appointment->id }}" class="flex flex-wrap gap-2 mt-4">
                                                        <!-- Time slots will be dynamically populated here -->
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <button type="submit"
                                                        class="inline-flex items-center justify-center rounded-md border border-transparent px-4 py-2 bg-teal-600 font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none transition ease-in-out duration-150 text-md">
                                                        <i class="fa-solid fa-check-circle mr-2"></i>
                                                        Reschedule Appointment
                                                    </button>
                                                </form>
                                                <button class="absolute top-0 right-0 m-4 text-gray-500 hover:text-gray-700" onclick="closeRescheduleModal({{ $appointment->id }})">&times;</button>
                                            </div>
                                        </div>
                                    @elseif ($status === 'attended')
                                        <!-- If attended, show Completed text in blue -->
                                        <span class="text-blue-600 font-bold">Completed</span>
                                    @else
                                        <!-- Default action: show Cancel button -->
                                        <button data-modal-target="update-appointment-modal-{{ $appointment->id }}"
                                            data-modal-toggle="update-appointment-modal-{{ $appointment->id }}"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold p-2 rounded-xl shadow-lg">
                                            Cancel
                                        </button>
                                        <x-modal modalId="update-appointment-modal-{{ $appointment->id }}" title="Cancel this Appointment?"
                                            message="Are you sure you want to cancel this appointment?"
                                            route="{{ route('appointments.cancel', ['id' => $appointment->id]) }}"
                                            method="PUT" buttonText="Cancel" />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>

    <script>
        function handleDateSelection(appointmentId) {
            const dateInput = document.getElementById(`reschedule-date-${appointmentId}`);
            const timeSlotsContainer = document.getElementById(`time-slots-${appointmentId}`);

            if (dateInput.value) {
                // Fetch available time slots for the selected date
                fetch(`{{ route('appointments.available-slots') }}?date=${dateInput.value}`)
                    .then(response => response.json())
                    .then(data => {
                        timeSlotsContainer.innerHTML = ''; // Clear previous slots

                        if (data.length > 0) {
                            data.forEach(slot => {
                                if (slot.remaining_slots > 0) {
                                    const button = document.createElement('button');
                                    button.type = 'button';
                                    button.className = 'appointment-button px-4 py-2 text-md shadow-lg font-medium text-gray-900 bg-gray-100 border border-gray-800 rounded-lg hover:bg-teal-600 hover:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none';
                                    button.dataset.time = slot.time_slot;
                                    button.textContent = `${slot.time_slot} (${slot.remaining_slots} slots left)`;
                                    button.onclick = () => selectRescheduleTime(button);
                                    timeSlotsContainer.appendChild(button);
                                }
                            });
                        } else {
                            // Display a message if no slots are available
                            const noSlotsMessage = document.createElement('div');
                            noSlotsMessage.className = 'flex items-center space-x-2';
                            noSlotsMessage.innerHTML = `
                                <i class="fa-solid fa-xmark text-red-500 text-2xl"></i>
                                <p class="text-lg font-bold text-teal-600">
                                    No available time slots for ${dateInput.value}
                                </p>
                            `;
                            timeSlotsContainer.appendChild(noSlotsMessage);
                        }

                        timeSlotsContainer.classList.remove('hidden');
                    })
                    .catch(error => {
                        console.error('Error fetching time slots:', error);
                    });
            } else {
                timeSlotsContainer.classList.add('hidden');
            }
        }
    </script>

    <script>
        function selectAppointmentTime(button) {
            const selectedTime = button.getAttribute('data-time');
            document.getElementById('time').value = selectedTime;

            document.querySelectorAll('.appointment-button').forEach(btn => {
                btn.classList.remove('bg-teal-600', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-900');
            });

            button.classList.remove('bg-gray-100', 'text-gray-900');
            button.classList.add('bg-teal-600', 'text-white');
        }

        function selectRescheduleTime(button) {
            const selectedTime = button.getAttribute('data-time');
            // Retrieve the appointment ID from the modal's ID
            const modalId = button.closest('.modal').id.split('-').pop();
            document.getElementById(`reschedule-time-${modalId}`).value = selectedTime;

            // Highlight the selected time slot only within the reschedule modal
            document.querySelectorAll(`#time-slots-${modalId} .appointment-button`).forEach(btn => {
                btn.classList.remove('bg-teal-600', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-900');
            });
            button.classList.remove('bg-gray-100', 'text-gray-900');
            button.classList.add('bg-teal-600', 'text-white');
        }


        document.addEventListener("DOMContentLoaded", function() {
            const appointments = @json($appointments);
            const calendar = document.querySelector('#calendar');
            const monthSelect = document.getElementById('monthSelect');
            const yearSelect = document.getElementById('yearSelect');

            const currentDate = new Date();
            const currentMonth = currentDate.getMonth();
            const currentYear = currentDate.getFullYear();

            for (let year = currentYear - 10; year <= currentYear + 10; year++) {
                const option = document.createElement('option');
                option.value = year;
                option.innerText = year;
                if (year === currentYear) {
                    option.selected = true;
                }
                yearSelect.appendChild(option);
            }

            monthSelect.value = currentMonth;

            function renderCalendar(month, year) {
                calendar.innerHTML = `
                    <div class="text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Sun</div>
                    <div class="text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Mon</div>
                    <div class="text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Tue</div>
                    <div class="text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Wed</div>
                    <div class="text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Thu</div>
                    <div class="text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Fri</div>
                    <div class="text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Sat</div>
                `;

                const firstDayOfMonth = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const today = new Date();

                for (let i = 0; i < firstDayOfMonth; i++) {
                    const emptySlot = document.createElement('div');
                    emptySlot.className = "w-24 h-24";
                    calendar.appendChild(emptySlot);
                }

                for (let day = 1; day <= daysInMonth; day++) {
                    const daySlot = document.createElement('div');
                    const currentDate = new Date(year, month, day);
                    daySlot.className =
                        "flex flex-col items-center content-center justify-center bg-white shadow-lg border-l-4 border-teal-500 rounded-lg text-xl font-semibold text-teal-700 transition-all duration-300 hover:bg-blue-400 hover:text-white cursor-pointer shadow-md w-16 h-16 sm:w-20 sm:h-20 md:w-32 md:h-24 lg:w-32 lg:h-28 xl:w-48 xl:h-28";
                    const dayNumber = document.createElement('span');
                    dayNumber.className = "xl:text-3xl lg:text-2xl font-bold";
                    dayNumber.innerText = day;
                    daySlot.appendChild(dayNumber);
                    daySlot.addEventListener('click', () => {
                        const modal = document.getElementById('modal');
                        const modalDate = document.getElementById('selectedDate');
                        const hiddenmodalDate = document.getElementById('hiddenselectedDate');

                        // Check if the hidden input exists before updating it
                        if (!hiddenmodalDate) {
                            console.error("Hidden input field 'hiddenselectedDate' not found.");
                            return;
                        }

                        const formattedDate = currentDate.toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });

                        modalDate.innerText = `Selected Date: ${formattedDate}`;
                        document.getElementById('hiddenselectedDate').value = formattedDate;
                        document.getElementById('dateForm').submit();

                        modal.classList.remove('hidden');
                        modal.classList.add('block');

                    });

                    if (currentDate < today.setHours(0, 0, 0, 0)) {
                        daySlot.classList.remove("border-teal-500", "text-teal-700");
                        daySlot.classList.add("border-red-500", "bg-gray-300", "text-red-500", "relative",
                            "cursor-not-allowed", "border-l-4");

                        // Ensure the daySlot has position relative
                        daySlot.style.position = "relative";

                        // Common styles for both diagonal lines
                        const lineStyles = `
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        width: 80%;
                        height: 2px;
                        opacity:40%;
                        background-color: red;
                        transform-origin: center;
                    `;
                        // Create the first diagonal line (/)
                        let line1 = document.createElement("div");
                        line1.style.cssText = lineStyles;
                        line1.style.transform = "translate(-50%, -50%) rotate(45deg)";

                        // Create the second diagonal line (\)
                        let line2 = document.createElement("div");
                        line2.style.cssText = lineStyles;
                        line2.style.transform = "translate(-50%, -50%) rotate(-45deg)";
                        daySlot.appendChild(line1);
                        daySlot.appendChild(line2);
                        daySlot.style.pointerEvents = "none";
                    }

                    if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                        daySlot.classList.add("text-black", "ring-4", "ring-green-500");

                        const todayLabel = document.createElement('span');
                        todayLabel.className =
                            "text-sm font-bold text-white bg-green-500 px-2 py-0.5 rounded-md mt-1";
                        todayLabel.innerText = "Today";

                        daySlot.appendChild(todayLabel);
                    }

                    daySlot.appendChild(dayNumber);

                    function formatTimeTo12Hour(time) {
                        const [hour, minute] = time.split(':');
                        const formattedTime = new Date();
                        formattedTime.setHours(parseInt(hour));
                        formattedTime.setMinutes(parseInt(minute));
                        const options = {
                            hour: 'numeric',
                            minute: 'numeric',
                            hour12: true
                        };
                        return formattedTime.toLocaleString('en-US', options);
                    }

                    const dailyAppointments = appointments.filter(app => {
                        const appDate = new Date(app.date);
                        return appDate.getDate() === day && appDate.getMonth() === month && appDate
                            .getFullYear() === year;
                    });

                    if (dailyAppointments.length > 0) {
                        const appointmentList = document.createElement('div');

                        let bgColor = "";
                        switch (dailyAppointments[0].status) {
                            case 'Pending':
                                bgColor = "bg-yellow-200 shadow-lg";
                                break;
                            case 'Approved':
                                bgColor = "bg-blue-200 shadow-lg";
                                break;
                            case 'Attended':
                                bgColor = "bg-green-200 shadow-lg";
                                break;
                            case 'Unattended':
                                bgColor = "bg-red-200 shadow-lg";
                                break;
                            default:
                                bgColor = "bg-gray-200 shadow-lg";
                        }
                        appointmentList.className =
                            `${bgColor} mt-1 text-sm px-2 py-1 rounded-lg overflow-auto`;
                        dailyAppointments.forEach(res => {
                            const item = document.createElement('p');
                            item.className = "text-gray-800 text-sm font-semibold";
                            const formattedTime = formatTimeTo12Hour(res.time);
                            item.innerText = `${res.status} - ${formattedTime}`;
                            appointmentList.appendChild(item);
                        });
                        appointmentList.classList.add("relative");
                        daySlot.appendChild(appointmentList);
                    }
                    calendar.appendChild(daySlot);
                }
            }

            monthSelect.addEventListener('change', function() {
                renderCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
            });

            yearSelect.addEventListener('change', function() {
                renderCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
            });
            renderCalendar(currentMonth, currentYear);
        });
    </script>
</x-patientnav-layout>
