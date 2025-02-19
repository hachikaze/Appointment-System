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
        <style>
            /* .calendar {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 0.5rem;
                padding: 1rem;
                background-color: #f9f9f9;
                border-radius: 12px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            } */
        </style>
    </head>

    <body class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="container mx-auto p-4 pr-0 pl-0">

            <div class="mb-4 flex justify-end my-12 pr-4 items-center">
                <select id="monthSelect"
                    class="border border-2 border-teal-300  font-bold p-2 mr-4 rounded mx-4 bg-white shadow pr-12">
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
                    class="border border-2 border-teal-300  font-bold p-2 mr-4 rounded mx-4 bg-white shadow pr-12">
                    <!-- JavaScript will populate the years here -->
                </select>
            </div>

            <div class="flex items-center  justify-center ">
                <div class=" bg-teal-200 p-4 content-center rounded-lg shadow-lg grid grid-cols-7 gap-2 " id="calendar">
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


        <div class="flex items-center  justify-center m-10  mt-10  ">
            <div class="relative overflow-x-auto  my-12 container shadow-lg sm:rounded-lg p-5 pt-0 pr-0 pl-0 mx-auto">
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
                            <tr class="border-b text-black hover:bg-teal-200 ">
                                <td class="px-6 py-4">{{ $appointment->patient_name }}</td>
                                <td class="px-6 py-4">{{ $appointment->phone }}</td>
                                <td class="px-6 py-4">{{ Carbon::parse($appointment->date)->format('F j, Y') }}</td>
                                <td class="px-6 py-4">{{ Carbon::parse($appointment->time)->format('g:i A') }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $appointment->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold p-2 rounded-xl shadow-lg">
                                        Cancel
                                    </button>
                                </td>
                                <!-- Main modal -->
                                <div id="default-modal" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-20 justify-center items-center w-full md:inset-0 h-screen max-h-full bg-black bg-opacity-50">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-gray-100 rounded-lg shadow-sm ">
                                            <!-- Modal header -->
                                            <div
                                                class="flex bg-teal-500 items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                                <h3 class="text-xl font-semibold  text-white">
                                                    Cancel Appointment?
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="default-modal">
                                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 my-5 md:p-5 space-y-4">
                                                <p class="text-xl text-center   text-black ">
                                                    Are you sure you want to cancel this appointment?
                                                </p>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center justify-end p-4  md:p-5  rounded-b dark:border-gray-600">
                                                <form
                                                    action="{{ route('appointments.destroy', ['id' => $appointment->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-modal-hide="default-modal" type="submit"
                                                        class="text-white bg-green-600 p-3 font-bold shadow-lg rounded-lg">
                                                        Confirm
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </body>

    </html>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
                        "flex flex-col items-center content-center justify-center bg-white shadow-lg border-2 border-teal-300 rounded-lg text-xl font-semibold text-teal-700 transition-all duration-300 hover:bg-blue-400 hover:text-white cursor-pointer shadow-md w-16 h-16 sm:w-20 sm:h-20 md:w-32 md:h-24 lg:w-32 lg:h-28 xl:w-48 xl:h-28";
                    const dayNumber = document.createElement('span');
                    dayNumber.className = "xl:text-3xl lg:text-2xl font-bold";
                    dayNumber.innerText = day;

                    if (currentDate < today.setHours(0, 0, 0, 0)) {
                        daySlot.classList.remove("border-teal-300");
                        daySlot.classList.remove("text-teal-700");

                        daySlot.classList.add("border-red-500");
                        daySlot.classList.add("bg-gray-250");
                        daySlot.classList.add("text-red-500");
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
                        daySlot.appendChild(appointmentList);
                    }
                    calendar.appendChild(daySlot);
                }
            }

            monthSelect.addEventListener('change', function () {
                renderCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
            });

            yearSelect.addEventListener('change', function () {
                renderCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
            });
            renderCalendar(currentMonth, currentYear);
        });
    </script>
</x-patientnav-layout>