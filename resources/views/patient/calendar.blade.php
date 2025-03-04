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
        <div class=" mx-5 p-4 pr-0 pl-0">

            <div
                class="mb-4 flex flex-col sm:flex-row bg-teal-50 p-5 shadow-lg rounded-lg border-2 border-teal-400 justify-between my-12 items-center space-y-4 sm:space-y-0">
                <a href="{{ route('patient.dashboard') }}"
                    class="flex items-center sm:w-auto w-full bg-red-500 rounded-lg text-white p-2 text-lg shadow-lg font-semibold 
                     hover:bg-red-600 transition duration-200">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Go Back
                </a>



                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 w-full sm:w-auto">
                    <div class="flex flex-col">
                        <label for="monthSelect" class="text-teal-700 font-semibold mb-1">Month</label>
                        <select id="monthSelect"
                            class="border-2 border-teal-400 text-teal-700 font-bold p-2 rounded bg-white shadow w-full sm:w-auto">
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
                    </div>

                    <div class="flex flex-col">
                        <label for="yearSelect" class="text-teal-700 font-semibold mb-1">Year</label>
                        <select id="yearSelect"
                            class="border-2 border-teal-400 text-teal-700 font-bold p-2 rounded bg-white shadow w-full sm:w-auto">
                        </select>
                    </div>
                </div>

            </div>

            @if ($errors->any())
                <div class=" bg-red-500  text-white text-md p-6 w-full rounded-lg my-5">
                    @foreach ($errors->all() as $error)
                        <p><i class="fas fa-exclamation-circle text-white"></i> {{ $error }}</p>
                    @endforeach
                </div>
            @endif


            <div
                class="flex-1 bg-teal-50 shadow-lg rounded-lg border-l-4 border-t-2  border-r-2 border-b-2 border-teal-400 p-6  mb-6">

                <div class="flex grid-cols-2 justify-between">
                    <div class="space-y-3 text-gray-600">
                        <h3 class="text-lg font-semibold text-teal-700 mb-2">
                            Important Disclaimer
                        </h3>
                        <p class="text-base">
                            This resume parsing algorithm is designed to assist with the extraction and analysis of
                            resume data. Please note:
                        </p>
                        <ul class="list-disc ml-5 space-y-2">
                            <li>Results may vary in accuracy and completeness</li>
                            <li>Parsing accuracy depends on resume formatting and data quality</li>
                            <li>Language variations may affect parsing results</li>
                        </ul>
                        <div class="mt-4 flex items-center">
                            <p class="text-sm bg-teal-100  rounded-lg">
                                <span class="font-semibold">💡 Recommendation:</span>
                                For best results, consider using our provided resume template
                                <button type="button"
                                    class="text-teal-600
                                     hover:text-blue-800 underline
                                    focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-sm ml-1">
                                    Download Template
                                </button>
                            </p>
                        </div>
                    </div>

                    <div class="bg-teal-100 border-teal-500 border-b-4 border-l-2 border-r-2 rounded-lg shadow-lg ">
                        <div class="p-2 flex items-center bg-teal-500 text-lg text-teal-50 font-semibold rounded-t-lg">
                            <i class="fa-solid fa-thumbtack text-teal-50"></i>
                            <h2 class="text-xl mx-2">Legend</h2>
                        </div>

                        <div class="p-2 space-y-2">
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 bg-red-500 rounded"></div>
                                <span class="text-sm text-gray-700">High Priority</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 bg-yellow-500 rounded"></div>
                                <span class="text-sm text-gray-700">Medium Priority</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 bg-green-500 rounded"></div>
                                <span class="text-sm text-gray-700">Low Priority</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 bg-green-500 rounded"></div>
                                <span class="text-sm text-gray-700">Low Priority</span>
                            </div>
                        </div>


                        <div class="p-2">

                        </div>
                    </div>

                </div>
            </div>



            <div class="justify-center ">
                <div class="border-2 border-teal-500 p-2 rounded-lg relative animate-border" id="divborder">
                    <div class="bg-teal-500 w-full text-center text-3xl text-white p-4 font-bold rounded-t-lg">
                        APPOINTMENT CALENDAR
                    </div>
                    <div class="bg-teal-200 p-4 content-center rounded-b-lg shadow-lg flex flex-wrap gap-1 sm:grid sm:grid-cols-7"
                        id="calendar">
                        <div
                            class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                            Sun</div>
                        <div
                            class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                            Mon</div>
                        <div
                            class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                            Tue</div>
                        <div
                            class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
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

        <div class="grid grid-cols-2 flex items-start">
            <div class="flex items-center  justify-center m-4" id="dateformSection">
                <form id="dateForm" class="w-full">
                    <h2 id="selectedDate" class="text-lg font-bold hidden"></h2>
                    <input type="hidden" id="hiddenselectedDate" name="hiddenselectedDate" value="">

                    <div
                        class="bg-teal-100 relative overflow-x-auto border-2 border-l-4 border-teal-500   shadow-lg sm:rounded-lg  p-5 w-full">
                        <div class="flex flex-wrap gap-4">
                            <!-- Choose a Time Slot Header -->
                            <div class="bg-teal-500 rounded-lg w-full md:w-auto ">
                                <h2 class="text-xl font-bold text-white p-6 shadow-lg " id="modal-title">
                                    <i class="fa-solid fa-clock text-white px-2"></i> Choose a Time Slot
                                </h2>
                            </div>

                            <!-- Available Slots Counter -->
                            <div
                                class="bg-teal-50 border border-gray-800 w-full md:w-auto rounded-lg px-6 py-4 flex items-center shadow-lg">
                                <i class="fa-solid fa-user-clock text-teal-600 text-2xl mr-2"></i>
                                <span class="text-lg font-bold text-gray-900">
                                    Slots Available: {{ $availableslots }}
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            @if ($selectedDate && count($availableappointments) > 0)
                                @foreach ($availableappointments as $appointment)
                                    @if ($appointment->remaining_slots > 0)
                                        <button type="button"
                                            class="appointment-button md:w-auto w-full px-4 py-2 text-md shadow-lg font-medium text-gray-900 bg-gray-100 border border-gray-800 rounded-lg hover:bg-teal-600 hover:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                            data-time="{{ $appointment->time_slot }}"
                                            onclick="selectAppointmentTime(this)">
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
                <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST"
                    class="space-y-4">
                    @csrf
                    <div class="flex items-center border-teal-400 justify-center mx-4 mt-10">
                        <div
                            class="bg-teal-100 border-teal-500 border-2  relative overflow-x-auto w-full  mb-12 shadow-lg sm:rounded-lg ">
                            <div class="bg-teal-600    rounded-t-lg text-white p-3">
                                <p class="text-xl font-semibold">
                                    Please fill in the details to set your dental appointment.
                                </p>
                            </div>

                            <!-- Two-Column Input Fields -->
                            <div class="grid p-6 grid-cols-1 md:grid-cols-2 gap-4 ">

                                <div>
                                    <label for="date" class="block mb-2 text-lg font-medium text-teal-800">Date
                                        Selected</label>
                                    <div class="flex">
                                        <span
                                            class="inline-flex items-center px-3 text-md text-gray-900 bg-teal-200 border rounded-e-0 border-gray-800 border-e-0 rounded-s-md">
                                            <i class="fa-solid fa-calendar text-teal-700 shadow-lg"></i>
                                        </span>
                                        <input type="text" id="date" name="date"
                                            value="{{ $selectedDate }}" readonly
                                            class="rounded-none rounded-e-lg bg-gray-50 border text-gray-500 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500"
                                            placeholder="2025-02-20">
                                    </div>
                                </div>

                                <div>
                                    <label for="time" class="block mb-2 text-lg font-medium text-teal-800">Chosen
                                        Timeslot</label>
                                    <div class="flex">
                                        <span
                                            class="inline-flex items-center px-3 text-md text-teal-800 bg-teal-200 border rounded-b-0 border-gray-800 border-e-0 rounded-s-md">
                                            <i class="fa-solid fa-calendar text-teal-700 shadow-lg"></i>
                                        </span>
                                        <input type="text" id="time" name="time" value="" readonly
                                            class="rounded-none rounded-e-lg bg-gray-50 border text-teal-800 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500"
                                            placeholder="Select a Time.">
                                    </div>
                                </div>


                                <div>
                                    <label for="phone" class="block mb-2 text-lg font-medium text-teal-800">Phone
                                        Number</label>
                                    <div class="flex">
                                        <span
                                            class="inline-flex items-center px-3 text-sm text-teal-800 bg-teal-200 border rounded-e-0 border-gray-800 border-e-0 rounded-s-md">
                                            <i class="fa-solid fa-phone text-teal-700 shadow-lg"></i>
                                        </span>
                                        <input type="text" id="phone" name="phone" maxlength="11"
                                            class="rounded-none rounded-e-lg bg-gray-50 border text-teal-800 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500"
                                            placeholder="Ex. 09123456789">
                                    </div>
                                </div>

                                <div>
                                    <label for="appointment-reason"
                                        class="block mb-2 text-teal-800 text-lg font-medium text-gray-900">
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
                    <div class="flex items-start justify-center mt-10">
                        <div
                            class="bg-teal-100 border-2 border-teal-500 flex justify-center items-start relative mb-10  p-6 text-teal-600 overflow-x-auto container shadow-lg sm:rounded-lg mx-auto">
                            <p class="text-xl font-bold">
                                <i class="fa-solid fa-calendar-check"></i> No Date Selected
                            </p>
                        </div>
                    </div>
            @endif
            </form>

        </div>
        </div>
        </div>
    </body>

    </html>

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

                const firstDayOfMonth = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const today = new Date();

                const isSmallScreen = window.matchMedia("(max-width: 640px)").matches;

                calendar.innerHTML = ""; // This removes previous months if the function is run multiple times

                if (isSmallScreen) {
                    const listContainer = document.createElement("ul"); // List for better structure
                    listContainer.className = "space-y-2 w-full";

                    for (let day = 1; day <= daysInMonth; day++) {
                        const currentDate = new Date(year, month, day);

                        const dayOfWeek = currentDate.getDay();
                        const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",
                            "Saturday"
                        ];
                        const dayName = daysOfWeek[dayOfWeek]; // Convert index to day name

                        const listItem = document.createElement("li");
                        listItem.className =
                            "flex justify-between items-center bg-white shadow-md border-l-4 border-teal-500 rounded-lg p-3 cursor-pointer hover:bg-teal-100 transition-all";

                        const dayNumber = document.createElement("span");
                        dayNumber.className = "text-lg font-bold text-teal-700";
                        dayNumber.innerText = day;

                        // Formatted date + day name
                        const formattedDate = currentDate.toLocaleDateString("en-US", {
                            year: "numeric",
                            month: "long",
                            day: "numeric",
                        });

                        const dateText = document.createElement("span");
                        dateText.className = "text-sm text-gray-600";
                        dateText.innerText = `${dayName}, ${formattedDate}`;


                        listItem.appendChild(dayNumber);
                        listItem.appendChild(dateText);

                        listItem.addEventListener("click", () => {
                            // const modal = document.getElementById("modal");
                            const modalDate = document.getElementById("selectedDate");
                            const hiddenmodalDate = document.getElementById("hiddenselectedDate");

                            if (!hiddenmodalDate) {
                                console.error("Hidden input field 'hiddenselectedDate' not found.");
                                return;
                            }

                            modalDate.innerText = `Selected Date: ${dayName}, ${formattedDate}`;
                            hiddenmodalDate.value = formattedDate;
                            document.getElementById("dateForm").submit();

                            // modal.classList.remove("hidden");
                            // modal.classList.add("block");
                        });

                        listContainer.appendChild(listItem);
                    }

                    calendar.appendChild(listContainer);
                } else {
                    calendar.innerHTML = `
                     <div class="hidden sm:block text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Sun</div>
                    <div class="hidden sm:block text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Mon</div>
                    <div class="hidden sm:block text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Tue</div>
                    <div class="hidden sm:block text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Wed</div>
                    <div class="hidden sm:block text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Thu</div>
                    <div class="hidden sm:block text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Fri</div>
                    <div class="hidden sm:block text-center font-bold text-base text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Sat</div>
                `;


                    // Add a wrapper div for scrolling effect
                    const scrollWrapper = document.createElement("div");
                    scrollWrapper.className =
                        "sm:grid sm:grid-cols-7 gap-2 overflow-x-auto flex flex-row sm:flex-wrap w-full";

                    for (let i = 0; i < firstDayOfMonth; i++) {
                        const emptySlot = document.createElement('div');
                        emptySlot.className = "w-full rounded-lg border-teal-400 bg-teal-500 shadow-lg border-2";
                        calendar.appendChild(emptySlot);
                    }

                    for (let day = 1; day <= daysInMonth; day++) {
                        const daySlot = document.createElement('div');
                        const currentDate = new Date(year, month, day);
                        daySlot.className =
                            "hidden sm:flex flex-col items-center justify-center bg-white shadow-lg border-l-4 border-teal-500 rounded-lg text-xl font-semibold text-teal-700 transition-all duration-300 hover:bg-teal-100 hover:text-gray-700 cursor-pointer shadow-md w-full h-16 sm:h-20 md:h-18 lg:h-28 xl:h-24 2xl:h-28";


                        const dayNumber = document.createElement('span');
                        dayNumber.className = "xl:text-3xl lg:text-2xl font-bold";
                        dayNumber.innerText = day;
                        daySlot.appendChild(dayNumber);
                        daySlot.addEventListener('click', (event) => {
                            event.preventDefault();

                            // const modal = document.getElementById('modal');
                            const modalDate = document.getElementById('selectedDate');
                            const hiddenmodalDate = document.getElementById('hiddenselectedDate');
                            const targetSection = document.getElementById("dateformSection");



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


                            // if (targetSection) {
                            //     targetSection.scrollIntoView({ behavior: "smooth", block: "start" });

                            //     targetSection.classList.add("bg-yellow-100");
                            //     setTimeout(() => {
                            //         targetSection.classList.remove("bg-yellow-100");
                            //     }, 1500);
                            // }

                            // modal.classList.remove('hidden');
                            // modal.classList.add('block');

                        });
                        window.onload = () => {
                            const targetSection = document.getElementById("dateformSection");
                            if (targetSection) {
                                targetSection.scrollIntoView({
                                    behavior: "smooth",
                                    block: "start"
                                });

                                targetSection.classList.add("highlight");

                                setTimeout(() => {
                                    targetSection.classList.remove("highlight");
                                }, 1500);
                            }
                        };


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
                                width: 60%;
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



            }
            window.addEventListener("resize", () => renderCalendar(new Date().getMonth(), new Date()
                .getFullYear()));
            renderCalendar(new Date().getMonth(), new Date().getFullYear());

            monthSelect.addEventListener('change', function() {
                renderCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
            });

            yearSelect.addEventListener('change', function() {
                renderCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
            });
            renderCalendar(currentMonth, currentYear);
        });
    </script>

    <style>
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(20px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        #create-appointment-modal:target {
            display: flex;
            opacity: 1;
            pointer-events: auto;
        }

        #create-appointment-modal:target .modal-content {
            animation: modalFadeIn 2s ease-in;
        }

        @keyframes borderAnimation {
            0% {
                box-shadow: 0 0 5px rgba(20, 184, 166, 0.5);
                border-color: rgba(20, 184, 166, 0.5);
            }

            50% {
                box-shadow: 0 0 15px rgba(20, 184, 166, 1);
                border-color: rgba(20, 184, 166, 1);
            }

            100% {
                box-shadow: 0 0 5px rgba(20, 184, 166, 0.5);
                border-color: rgba(20, 184, 166, 0.5);
            }
        }

        .highlight {
            transition: background-color s ease-in-out;
        }

        .animate-border {
            animation: borderAnimation 2s infinite ease-in-out;
        }
    </style>
</x-patientnav-layout>
