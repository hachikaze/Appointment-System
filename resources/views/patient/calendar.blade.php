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
        <div class="container mx-auto p-4">
            <div class="mb-4 flex justify-center items-center">
                <select id="monthSelect" class="border p-2 rounded mx-2 bg-white shadow">
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
                <select id="yearSelect" class="border p-2 rounded mx-2 bg-white shadow">
                    <!-- JavaScript will populate the years here -->
                </select>
            </div>
            <div class=" bg-white p-4 rounded-lg shadow-lg grid grid-cols-7 gap-2" id="calendar">
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
                <div class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-300 p-2 rounded-md">Sun</div>
                <div class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-300 p-2 rounded-md">Mon</div>
                <div class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-300 p-2 rounded-md">Tue</div>
                <div class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-300 p-2 rounded-md">Wed</div>
                <div class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-300 p-2 rounded-md">Thu</div>
                <div class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-300 p-2 rounded-md">Fri</div>
                <div class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-300 p-2 rounded-md">Sat</div>
            `;

                const firstDayOfMonth = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                for (let i = 0; i < firstDayOfMonth; i++) {
                    const emptySlot = document.createElement('div');
                    emptySlot.className = "w-24 h-24";
                    calendar.appendChild(emptySlot);
                }

                for (let day = 1; day <= daysInMonth; day++) {
                    const daySlot = document.createElement('div');
                    daySlot.className = "flex flex-col items-center justify-center border border-blue-300 rounded-lg text-lg font-semibold text-blue-700 transition-all duration-300 hover:bg-blue-400 hover:text-white cursor-pointer shadow-md \
                        w-16 h-16 sm:w-20 sm:h-20 md:w-32 md:h-24 lg:w-32 lg:h-28 xl:w-48 xl:h-28";

                    const dayNumber = document.createElement('span');
                    dayNumber.className = "xl:text-3xl lg:text-2xl font-bold";
                    dayNumber.innerText = day;

                    if (day === currentDate.getDate() && month === currentMonth && year === currentYear) {
                        daySlot.classList.add("text-black", "ring-4", "ring-green-500");

                        const todayLabel = document.createElement('span');
                        todayLabel.className = "text-md font-bold text-white bg-green-500 px-2 py-0.5 rounded-md mt-1";
                        todayLabel.innerText = "Today";

                        daySlot.appendChild(todayLabel);
                    }


                    daySlot.appendChild(dayNumber);

                    // Show appointments
                    const dailyAppointments = appointments.filter(app => {
                        const appDate = new Date(app.date);
                        return appDate.getDate() === day && appDate.getMonth() === month && appDate.getFullYear() === year;
                    });

                    if (dailyAppointments.length > 0) {
                        const appointmentList = document.createElement('div');

                        // Determine background color based on the first appointment status
                        let bgColor = "";

                        switch (dailyAppointments[0].status) {
                            case 'Pending':
                                bgColor = "bg-yellow-200";
                                break;
                            case 'Approved':
                                bgColor = "bg-blue-200";
                                break;
                            case 'Attended':
                                bgColor = "bg-green-200";
                                break;
                            case 'Unattended':
                                bgColor = "bg-red-200";
                                break;
                            default:
                                bgColor = "bg-gray-200";
                        }
                        appointmentList.className = `${bgColor} mt-1 text-sm px-2 py-1 rounded-lg overflow-auto`;
                        // Loop through appointments and add them to the container
                        dailyAppointments.forEach(res => {
                            const item = document.createElement('p');
                            item.className = "text-gray-800 text-sm font-semibold";
                            item.innerText = `${res.status} - ${res.time}`;
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