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
                class="relative flex bg-white flex-col w-full h-full text-gray-700 shadow-md rounded-xl bg-clip-border">
                <div
                    class="flex-1 bg-teal-50 shadow-lg rounded-lg border-l-4 border-t-2  border-r-2 border-b-2 border-teal-400 p-6  mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-4">
                        <div class="space-y-3 text-gray-600">
                            <h3 class="text-lg font-semibold text-teal-700 mb-2">
                                Important Disclaimer
                            </h3>
                            <p class="text-base">
                                Please note the following appointment booking guidelines:
                            </p>
                            <ul class="list-disc ml-5 space-y-2">
                                <li>Users can only have one active approved appointment at a time.</li>
                                <li>If an approved appointment is not attended, it will be marked as unattended.
                                </li>
                                <li>Users can reschedule an appointment if it is marked as unattended.</li>
                                <li>Approved appointments can be canceled, and users may reschedule afterward.</li>
                            </ul>
                            <div class="mt-4 flex items-center">
                                <p class="text-sm bg-teal-100 rounded-lg p-2">
                                    <span class="font-semibold">💡 Note:</span>
                                    Ensure you attend or manage your appointments promptly to avoid scheduling
                                    conflicts.
                                </p>
                            </div>
                        </div>


                        <div class="bg-teal-100 border-teal-500 border-b-4 border-l-2 border-r-2 rounded-lg shadow-lg">
                            <div
                                class="p-2 flex items-center bg-teal-500 text-lg text-teal-50 font-semibold rounded-t-lg">
                                <i class="fa-solid fa-thumbtack text-teal-50"></i>
                                <h2 class="text-xl mx-2">Legend</h2>
                            </div>

                            <div class="p-2 space-y-5">
                                <div class="flex items-center space-x-2">
                                    <div class="w-4 h-4 bg-blue-300 border-2 border-blue-500 rounded"></div>
                                    <span class="text-sm text-gray-700"><span
                                            class="font-bold text-blue-500">Attended</span> - The participant has
                                        successfully attended
                                        the event.</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-4 h-4 bg-gray-300 border-2 border-gray-500 rounded"></div>
                                    <span class="text-sm text-gray-700"><span
                                            class="font-bold text-gray-500">Unattended</span> - The participant was
                                        expected
                                        but did
                                        not attend.</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-4 h-4 bg-orange-300 border-2 border-orange-500 rounded"></div>
                                    <span class="text-sm text-gray-700"><span
                                            class="font-bold text-orange-500">Pending</span> - Attendance status is
                                        not
                                        yet
                                        confirmed.</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-4 h-4 bg-red-300 border-2 border-red-500  rounded"></div>
                                    <span class="text-sm text-gray-700"><span
                                            class="font-bold text-red-500">Cancelled</span>- The event or attendance
                                        was
                                        canceled.</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-4 h-4 bg-teal-300 border-2 border-teal-500  rounded"></div>
                                    <span class="text-sm text-gray-700"><span
                                            class="font-bold text-teal-500">Approved</span> - Attendance has been
                                        approved or
                                        confirmed.</span>
                                </div>
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


            <div
                class="relative flex my-10 flex-col w-full h-full  text-gray-700 bg-teal-50 border-2 border-teal-500 shadow-md rounded-xl bg-clip-border">
                <div
                    class="relative mx-4 mt-4 overflow-hidden shadow-lg text-gray-700 p-4 bg-teal-100 rounded-lg border-2 border-teal-500 bg-clip-border">
                    <div class="flex items-center justify-between gap-8 mb-8">
                        <div>
                            <h5
                                class="block text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                Appointments List
                            </h5>
                            <p class="block mt-1 text-base antialiased font-normal leading-relaxed text-gray-700">
                                See information about all appointments
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                        <div class="block w-full overflow-hidden md:w-max">
                            <nav class="flex items-center gap-3">
                                <input type="date" id="dateFilter" onchange="filterDate()"
                                    class="h-full rounded-[7px]  border-teal-600 border-4 bg-teal-50 px-3 py-2.5 text-sm font-normal text-blue-gray-700 outline-none transition-all focus:border-2 focus:border-teal-600">

                                <div class="flex">
                                    <button onclick="resetFilter()"
                                        class="px-4 py-3 text-white bg-teal-600 rounded-lg shadow-md transition-all hover:bg-teal-700">
                                        Reset
                                    </button>
                                </div>
                            </nav>
                        </div>


                        <div class="w-full md:w-72">
                            <div class="relative h-10 w-full min-w-[200px]">
                                <div
                                    class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                        </path>
                                    </svg>
                                </div>

                                <input oninput="filterAppointments()" id="searchInput"
                                    class="peer h-full w-full rounded-[7px]  border-teal-600 border-4 bg-teal-50 px-3 py-2.5 !pr-9 text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-teal-600 focus:border-2 focus:border-teal-600 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                    placeholder=" " />


                                <label
                                    class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-teal-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-teal-600 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-teal-600 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                    Search
                                </label>

                                <script></script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 px-0  overflow-x-auto">

                    <table class="w-full mt-4  text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th
                                    class="p-4 border-r-0 border-l-0 bg-teal-100 border-2 border-teal-600 bg-blue-gray-50/50">
                                    <p class="flex text-lg justify-center font-semibold text-teal-600 leading-none ">
                                        Date
                                    </p>
                                </th>
                                <th
                                    class="p-4 border-r-0 border-l-0 bg-teal-100 border-2 border-teal-600 bg-blue-gray-50/50">
                                    <p class="block text-lg  font-semibold text-teal-600 leading-none ">
                                        Time Slot
                                    </p>
                                </th>
                                <th
                                    class="p-4 border-r-0 border-l-0 bg-teal-100 border-2 border-teal-600 bg-blue-gray-50/50">
                                    <p class="block text-lg  font-semibold text-teal-600 leading-none ">
                                        Max Slot
                                    </p>
                                </th>
                                <th
                                    class="p-4 border-r-0 border-l-0 bg-teal-100 border-2 border-teal-600 bg-blue-gray-50/50">
                                </th>
                            </tr>
                        </thead>
                        <tbody id="appointmentsTableBody">

                            @if ($allData->isEmpty())
                                <tr>
                                    <td colspan="4" class="p-4 text-center text-gray-700 flex-col">
                                        <i class="fa-solid fa-calendar-xmark fa-2x text-teal-600 mb-2"></i>
                                        <p> No available slots at the moment.</p>
                                    </td>
                                </tr>
                            @else
                                @foreach ($allData as $slots)
                                    @php
                                        $appointmentExists = App\Models\Appointment::where('date', $slots->date)
                                            ->where('time', $slots->time_slot)
                                            ->whereIn('status', ['Pending', 'Approved', 'Attended', 'Unattended'])
                                            ->exists();

                                        $remainingSlots =
                                            $slots->remaining_slots ??
                                            $slots->max_slots -
                                                App\Models\Appointment::where('date', $slots->date)
                                                    ->where('time', $slots->time_slot)
                                                    ->whereIn('status', ['Pending', 'Approved', 'Attended'])
                                                    ->count();
                                    @endphp
                                    <tr data-date="{{ Carbon::parse($slots->date)->format('F j, Y') }}">
                                        <td class="p-4 border-b border-teal-100">
                                            <div class="flex items-center justify-center gap-3">
                                                <img src="{{ Auth::user()->image_path ? asset('storage/' . Auth::user()->image_path) : asset('images/logo.png') }}"
                                                    alt="Avatar"
                                                    class="relative shadow-lg inline-block h-9 w-9 !rounded-full object-cover object-center" />
                                                <div class="flex flex-col">
                                                    <p
                                                        class="block text-md antialiased font-normal leading-normal text-blue-gray-900">
                                                        {{ Carbon::parse($slots->date)->format('F j, Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 border-b border-teal-100">
                                            <div class="flex flex-col">
                                                <p
                                                    class="block text-md antialiased font-normal leading-normal text-blue-gray-900">
                                                    {{ $slots->time_slot }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="p-4 border-b border-teal-100">
                                            <div class="w-max">
                                                <div
                                                    class="relative grid items-center px-2 py-1 text-md font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                                                    <span>{{ $remainingSlots }} Slots Remaining</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 border-b w-full flex justify-center border-teal-100">
                                            @if (!$appointmentExists)
                                                <a href="{{ route('patient.bookappointment', ['id' => $slots->id]) }}"
                                                    class="relative flex p-2 bg-teal-500 flex-row space-x-2 items-center justify-center h-12 w-44 select-none rounded-lg text-center align-middle text-xs font-medium uppercase hover:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                    <i class="fa-solid fa-pen fa-lg text-white"></i>
                                                    <span class="mt-1 text-lg font-semibold text-white">CREATE</span>
                                                </a>
                                            @else
                                                <a href="{{ route('history') }}"
                                                    class="flex flex-col items-center text-center px-5 py-2 text-white bg-teal-600 rounded-lg hover:bg-teal-700 transition">
                                                    <span class="text-lg font-semibold">Appointment Already Set</span>
                                                    <div class="flex flex-row items-center justify-center mt-1">
                                                        <p class="text-sm text-gray-200 mx-2">Click to view</p>
                                                        <i class="fa-solid fa-arrow-right mt-0.5"></i>
                                                    </div>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>

                    </table>
                </div>

            </div>
        </div>


    </body>

    </html>

    <script>
        function resetFilter() {
            document.getElementById("dateFilter").value = "";
            filterDate();
        }

        function filterAppointments() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let tableBody = document.getElementById("appointmentsTableBody");
            let rows = tableBody.getElementsByTagName("tr");
            for (let row of rows) {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            }
        }

        function filterDate() {
            let dateValue = document.getElementById("dateFilter").value;
            console.log("Selected Date:", dateValue);
            let tableBody = document.getElementById("appointmentsTableBody");
            let rows = tableBody.getElementsByTagName("tr");

            for (let row of rows) {
                let rowDateText = row.getAttribute("data-date");
                let rowDate = convertDate(rowDateText);
                console.log(`Row Date (Converted): ${rowDate} | Original: ${rowDateText}`);

                if (!dateValue || rowDate === dateValue) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        function convertDate(dateString) {
            let dateObj = new Date(dateString);
            if (isNaN(dateObj)) {
                console.log(`⚠️ Invalid date format: ${dateString}`);
                return "";
            }

            let year = dateObj.getFullYear();
            let month = (dateObj.getMonth() + 1).toString().padStart(2, "0");
            let day = dateObj.getDate().toString().padStart(2, "0");

            return `${year}-${month}-${day}`;
        }

        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll(".checkbox-item");
            const clearButton = document.getElementById("clear-checkboxes");

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function() {
                    let checkedBoxes = document.querySelectorAll(".checkbox-item:checked");

                    if (checkedBoxes.length > 3) {
                        this.checked = false;
                        alert("You can only select up to 3 checkboxes.");
                    }
                });
            });

            clearButton.addEventListener("click", function(event) {
                event.preventDefault();
                checkboxes.forEach(checkbox => checkbox.checked = false);
            });
        });

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

        function fetchAppointments(selectedDate) {
            console.log("Fetching appointments for:", selectedDate);

            fetch(`/appointments/${selectedDate}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Failed to fetch appointments");
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Fetched Appointments Data:", data); // Debugging output
                    updateAppointmentsTable(data);
                })
                .catch(error => {
                    console.error("Error fetching appointments:", error);
                    document.getElementById("appointmentsTableBody").innerHTML =
                        `<tr><td colspan="4" class="text-center p-4 text-red-500">Failed to load appointments.</td></tr>`;
                });
        }

        function updateAppointmentsTable(appointments) {
            const tableBody = document.getElementById("appointmentsTableBody");
            tableBody.innerHTML = ""; // Clear existing rows

            // If no appointments are available, show a message
            if (!appointments || appointments.length === 0) {
                tableBody.innerHTML =
                    `<tr><td colspan="4" class="text-center p-4 text-gray-500">No appointments available.</td></tr>`;
                return;
            }

            console.log(appointments); // Debugging: Log the appointments array

            // Loop through each appointment slot
            appointments.forEach(slot => {
                const appointmentExists = slot.appointment_exists; // Check if an appointment exists
                const row = document.createElement("tr");

                row.innerHTML = `
                    <td class="p-4 border-b border-teal-100">
                        <div class="flex items-center justify-center gap-3">
                            <img src="/images/logo.png" alt="Logo"
                                class="relative shadow-lg inline-block h-9 w-9 rounded-full object-cover object-center" />
                            <div class="flex flex-col">
                                <p class="block text-md antialiased font-normal leading-normal text-blue-gray-900">
                                    ${new Date(slot.date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 border-b border-teal-100">
                        <div class="flex flex-col">
                            <p class="block text-md antialiased font-normal leading-normal text-blue-gray-900">
                                ${slot.time_slot}
                            </p>
                        </div>
                    </td>
                    <td class="p-4 border-b border-teal-100">
                        <div class="w-max">
                            <div class="relative grid items-center px-2 py-1 text-md font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                                <span>${slot.remaining_slots} Slots Remaining</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 border-b w-full flex justify-center border-teal-100">
                        ${!appointmentExists ?
                        `<a href="/patient/bookappointment/${slot.id}" 
                                                                                    class="relative flex p-2 bg-teal-500 flex-row space-x-2 items-center justify-center h-12 w-44 select-none rounded-lg text-center align-middle text-xs font-medium uppercase hover:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                                                    <i class="fa-solid fa-pen fa-lg text-white"></i>
                                                                                    <span class="mt-1 text-lg font-semibold text-white">CREATE</span>
                                                                                </a>`
                        :
                        `<a href="/patient/history">
                                                                                    <span class="px-5 py-2 text-white bg-teal-600 rounded-lg flex flex-col items-center text-center hover:bg-teal-700 transition">
                                                                                        <span class="text-lg font-semibold">Appointment Already Set</span>
                                                                                        <div class="flex flex-row items-center justify-center mt-1">
                                                                                            <p class="text-sm text-gray-200 mx-2">Click to view</p>
                                                                                            <i class="fa-solid fa-arrow-right mt-0.5"></i>
                                                                                        </div>
                                                                                    </span>
                                                                                </a>`
                    }
                    </td>
                `;

                console.log(appointmentExists); // Debugging: Log if an appointment exists
                tableBody.appendChild(row);
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            const appointments = @json($appointments);
            var remainingSlotsByDate = @json($remainingSlotsByDate);
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
                        const currentDate = new Date(Date.UTC(year, month, day));
                        const dateString = currentDate.toISOString().split("T")[0];

                        const dayOfWeek = currentDate.getDay();
                        const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",
                            "Saturday"
                        ];
                        const dayName = daysOfWeek[dayOfWeek];

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
                            const modalDate = document.getElementById("selectedDate");
                            fetchAppointments(dateString);

                            if (!modalDate) {
                                console.error("selecter'hiddenselectedDate' not found.");
                                return;
                            }


                            console.log(modalDate);
                            modalDate.innerText = `Selected Date: ${dayName}, ${formattedDate}`;
                            hiddenmodalDate.value = formattedDate;
                            console.log("Selected Date:", formattedDate);
                            document.getElementById("dateForm").submit();
                        });

                        listContainer.appendChild(listItem);
                    }

                    calendar.appendChild(listContainer);
                } else { // FOR DESKTOP VIEW
                    calendar.innerHTML = `
                        
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Sun</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Mon</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Tue</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Wed</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Thu</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Fri</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Sat</div>
                    `;


                    const scrollWrapper = document.createElement("div");
                    scrollWrapper.className =
                        "sm:grid sm:grid-cols-7 gap-2 overflow-x-auto flex flex-row sm:flex-wrap w-full";

                    const daysInPrevMonth = new Date(year, month, 0).getDate();

                    for (let i = 0; i < firstDayOfMonth; i++) {
                        const prevDate = daysInPrevMonth - (firstDayOfMonth - 1) +
                            i; // Calculate previous month's last dates
                        const emptySlot = document.createElement('div');
                        emptySlot.className =
                            "hidden sm:flex flex-col items-center justify-center bg-teal-700 opacity-60 shadow-lg border-l-4 border-teal-500 rounded-lg text-2xl font-semibold text-white transition-all duration-300 hover:bg-teal-300 hover:text-gray-700 cursor-pointer shadow-md w-full h-16 sm:h-20 md:h-18 lg:h-28 xl:h-24 2xl:h-28"; // Style previous dates
                        emptySlot.innerText = prevDate;
                        calendar.appendChild(emptySlot);
                    }


                    for (let day = 1; day <= daysInMonth; day++) {
                        const daySlot = document.createElement('div');
                        const currentDate = new Date(Date.UTC(year, month, day));
                        const dateString = currentDate.toISOString().split("T")[0];

                        const totalSlots = remainingSlotsByDate[dateString] || 0;
                        const appointment = appointments.find(app => app.date === dateString);


                        var bgColor = "bg-white";
                        var borderColor = "border-teal-500";
                        var textColor = "text-teal-700";
                        var tooltipText = "No appointment";


                        daySlot.className =
                            `hidden sm:flex flex-col items-center justify-center shadow-lg border-l-4 rounded-lg text-xl font-semibold transition-all duration-300 hover:bg-teal-100 hover:text-gray-700 cursor-pointer shadow-md w-full h-16 sm:h-20 md:h-18 lg:h-28 xl:h-24 2xl:h-28 ${bgColor} ${borderColor} ${textColor}`;
                        daySlot.title = tooltipText;

                        // DAY NUMBER ELEMENTS
                        const dayNumber = document.createElement('span');
                        dayNumber.className = "text-center xl:text-3xl lg:text-2xl font-bold";
                        dayNumber.innerText = day;

                        daySlot.addEventListener("click", function() {
                            const tableBody = document.getElementById("appointmentsTableBody");

                            if (tableBody) {
                                tableBody.innerHTML = "";
                            }
                            console.log(dateString);
                            fetchAppointments(dateString);
                        });

                        const slotsContainer = document.createElement('div');
                        slotsContainer.className = "text-sm text-black font-light flex flex-col items-center";

                        if (totalSlots > 0) {
                            const slotsDropdownContainer = document.createElement('div');
                            slotsDropdownContainer.className = "relative inline-block";

                            const toggleButton = document.createElement('button');
                            toggleButton.type = "button";
                            toggleButton.className =
                                "bg-teal-600 text-white shadow-lg mt-2 font-semibold px-4 py-2 rounded-lg focus:outline-none";

                            toggleButton.innerHTML = `
                                <span class="hidden lg:inline m-2">Slots Availability</span>
                                <i class='fas fa-chevron-down ml-2'></i>
                            `;


                            const slotsInfoContainer = document.createElement('div');
                            slotsInfoContainer.className =
                                "absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-lg p-4 hidden";

                            const icon = document.createElement('i');
                            icon.className = "fas fa-circle-check text-lg text-teal-600 mr-2";

                            // Create text span
                            const totalSlotsInfo = document.createElement('span');
                            totalSlotsInfo.className = "font-semibold text-lg text-teal-800";
                            totalSlotsInfo.innerText = `Available: ${totalSlots}`;

                            slotsInfoContainer.appendChild(icon);
                            slotsInfoContainer.appendChild(totalSlotsInfo);

                            slotsDropdownContainer.appendChild(toggleButton);
                            slotsDropdownContainer.appendChild(slotsInfoContainer);

                            slotsContainer.appendChild(slotsDropdownContainer);

                            toggleButton.addEventListener('click', (event) => {
                                event.stopPropagation();
                                event.preventDefault();
                                const isHidden = slotsInfoContainer.classList.contains('hidden');
                                slotsInfoContainer.classList.toggle('hidden', !isHidden);
                                toggleButton.innerHTML = isExpanded ?
                                    `<span class="hidden lg:inline">Hide Slot</span> <i class='fas fa-chevron-up ml-2'></i>` :
                                    `<span class="hidden lg:inline">Slots Availability</span> <i class='fas fa-chevron-down ml-2'></i>`;

                            });
                        } else {
                            const noSlotText = document.createElement('span');
                            noSlotText.className = "font-semibold text-red-700"
                            const icon = document.createElement('i');
                            icon.className = "fas fa-exclamation-circle text-red-400 mx-2";
                            noSlotText.innerHTML = `<span class="hidden lg:inline">No Slots Available</span>`;
                            noSlotText.prepend(icon);
                            slotsContainer.appendChild(noSlotText);
                            bgColor = "bg-gray-100";
                            borderColor = "border-teal-600";
                            textColor = "text-teal-700";
                            tooltipText = "No appointment";
                        }


                        if (appointment) {
                            var isClickable = false;
                            var cursorStyle = "cursor-not-allowed";
                            var pointerEvents = "pointer-events-none"; // Prevents all interactions

                            switch (appointment.status) {
                                case "Attended":
                                    bgColor = "bg-blue-300";
                                    borderColor = "border-blue-700 border-2";
                                    textColor = "text-blue-700";
                                    tooltipText = "Attended";
                                    isClickable = true;
                                    break;
                                case "Unattended":
                                    bgColor = "bg-gray-300";
                                    borderColor = "border-gray-700 border-2";
                                    textColor = "text-gray-600";
                                    tooltipText = "Unattended";
                                    isClickable = true;
                                    break;
                                case "Pending":
                                    bgColor = "bg-orange-300 hover:bg-orange-400";
                                    borderColor = "border-orange-700 border-2";
                                    textColor = "text-orange-600 font-semibold";
                                    tooltipText = "Pending - Click to take action";
                                    isClickable = true;
                                    break;
                                case "Cancelled":
                                    bgColor = "bg-red-300";
                                    borderColor = "border-red-600 border-2";
                                    textColor = "text-red-600";
                                    tooltipText = "Cancelled";
                                    isClickable = true;
                                    break;
                                case "Approved":
                                    bgColor = "bg-teal-200 hover:bg-teal-300";
                                    borderColor = "border-teal-600 border-2";
                                    textColor = "text-teal-600 font-semibold";
                                    tooltipText = "Approved - Click to view details";
                                    isClickable = true;
                                    break;
                                default:
                                    bgColor = "bg-gray-200";
                                    borderColor = "border-teal-600";
                                    textColor = "text-teal-700";
                                    tooltipText = "No appointment";
                                    isClickable = false;
                                    break;
                            }

                            if (isClickable) {
                                cursorStyle = "cursor-pointer";
                                pointerEvents = "pointer-events-auto";
                            }

                        }
                        daySlot.className =
                            `hidden sm:flex flex-col items-center justify-center shadow-lg border-l-4 rounded-lg text-xl font-semibold transition-all duration-300 hover:bg-teal-100 hover:text-gray-700 cursor-pointer shadow-md w-full h-16 sm:h-20 md:h-18 lg:h-28 xl:h-24 2xl:h-28 ${bgColor} ${borderColor} ${textColor} ${pointerEvents}`;
                        daySlot.setAttribute("data-date", dateString);
                        daySlot.appendChild(dayNumber);
                        dayNumber.appendChild(slotsContainer);
                        calendar.appendChild(daySlot);
                        daySlot.addEventListener('click', (event) => {
                            event.preventDefault();
                            const modalDate = document.getElementById('selectedDate');
                            const hiddenmodalDate = document.getElementById('hiddenselectedDate');
                            const targetSection = document.getElementById("dateformSection");

                            // if (!hiddenmodalDate) {
                            //     console.error("Hidden input field 'hiddenselectedDate' not found.");
                            //     return;
                            // }

                            const formattedDate = currentDate.toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            });

                            modalDate.innerText = `Selected Date: ${formattedDate}`;
                            document.getElementById('modalselectedDate').value = formattedDate;
                            document.getElementById('dateForm').submit();

                        });

                        if (currentDate < today.setHours(0, 0, 0, 0)) {
                            daySlot.classList.remove("border-teal-500", "text-teal-700");
                            daySlot.classList =
                                "hidden sm:flex flex-col items-center justify-center shadow-lg border-l-4 rounded-lg text-xl font-semibold transition-all duration-300 hover:bg-teal-100 hover:text-gray-700 cursor-pointer shadow-md w-full h-16 sm:h-20 md:h-18 lg:h-28 xl:h-24 2xl:h-28 ${bgColor} ${borderColor} ${textColor}";
                            daySlot.classList.add("border-red-500", "bg-gray-300", "text-red-500", "relative",
                                "cursor-not-allowed", "border-l-4");

                            daySlot.style.position = "relative";

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
