<x-patientnav-layout>
    <x-audit-modal modalid="auditModal" title="Audit Log">
        <div class="overflow-x-auto shadow-lg rounded-lg border-teal-500 border-2">
            <div class="flex justify-between items-center p-4 bg-white border-b border-gray-300">
                <h2 class="text-xl font-semibold text-teal-700">Audit Log</h2>
                <form method="GET" action="{{ url()->current() }}" class="searchform flex space-x-2" id="searchform">
                    <input type="hidden" name="auditModal" value="{{ request('auditModal', 'true') }}">
                    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                        class="px-4 py-2 border-2 border-teal-500 rounded-lg focus:ring-2 focus:ring-teal-500 focus:outline-none" />
                    <button type="submit"
                        class="px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition">
                        🔍 Search
                    </button>
                </form>
            </div>

            <table class="min-w-full overflow-y-auto bg-white border border-gray-300 shadow-sm rounded-lg">
                <thead class="bg-teal-500 text-white">
                    <tr>
                        <th class="py-2 px-4 border">Admin</th>
                        <th class="py-2 px-4 border">Action</th>
                        <th class="py-2 px-4 border">Date</th>
                        <th class="py-2 px-4 border">Last Recorded</th>
                    </tr>
                </thead>
                <div class="max-h-96 overflow-y-auto pt-0 bg-teal-50">
                    <tbody class="bg-teal-50">
                        @foreach ($allauditTrails as $allaudit)
                            <tr class="border-t-2 border-teal-100">
                                <td class="py-2 px-4 text-gray-700">
                                    {{ $allaudit->user->firstname ?? 'N/A' }}
                                </td>
                                <td class="py-2 px-4 text-gray-700">{{ $allaudit->action }}</td>
                                <td class="py-2 px-4 text-gray-700">
                                    {{ $allaudit->created_at->format('F j, Y g:i:s A') }}
                                <td class="py-2 px-4 text-gray-700">
                                    {{ $allaudit->created_at->diffForHumans() }}
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        </div>
        <x-pagination :paginator="$allauditTrails->appends([
        'auditModal' => 'true',
        'search' => request('search'),
    ])" />
    </x-audit-modal>
    <script></script>
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-6 lg:px-8  lg:gap-8 gap-4 xl:grid grid-cols-4 lg:grid grid-cols-1   ">
            <!-- First Column: Avatar and Buttons (1/4 of the width) -->
            <div
                class="bg-white fade-up overflow-hidden sm:rounded-lg shadow-lg  xl:col-span-1 md:col-span-2 sm:col-span-2 col-span-2">
                <div class="w-full">
                    <h3 class="bg-teal-500 p-4 font-bold text-xl text-white">
                        <i class="fas fa-user-md "></i> PATIENT DASHBOARD
                    </h3>
                </div>
                <div class="flex flex-col bg-teal-50 rounded-b-lg  border-b-4 border-teal-500 items-center p-2">
                    <div class="relative m-4">
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-400  to-emerald-400 rounded-full p-1">
                        </div>
                        <div
                            class="relative w-44 h-44 p-2 shadow-lg rounded-full bg-gradient-to-r from-teal-400  to-emerald-600">
                            <img src="{{ $user->image_path ? asset(path: 'storage/' . $user->image_path) : asset('images/default-avatar.png') }}"
                                alt="Clinic Logo"
                                class="w-full h-full bg-gradient-to-r from-teal-200  to-emerald-600 rounded-full object-cover p-2 
                                border-4 shadow-lg border-white transform hover:scale-105 transition-transform duration-200">
                        </div>
                    </div>

                    <form action="{{ route('calendar') }}" method="GET" class="w-full">
                        <button
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-2 w-full transform hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-calendar-check text-white font-bold"></i> Dental Appointment
                        </button>

                    </form>
                    <form action="{{ route('history') }}" method="GET" class="w-full">
                        <button
                            class="bg-green-500 text-white px-4 py-2 rounded-lg w-full transform hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-history text-white font-bold"></i> View History
                        </button>
                    </form>

                </div>
                <div class="bg-white rounded-lg  p-4">
                    <h2 class="text-xl font-semibold text-teal-600 mb-4">
                        <i class="fa-solid fa-history text-teal-500 px-2 fa-spin"
                            style="--fa-animation-duration: 3s;"></i> Activity Logs
                    </h2>
                    <div class="relative rounded-lg border-l-4 border-teal-500 h-96 overflow-y-auto m-1 pl-6">
                        @foreach ($auditTrails as $audit)
                            <div class="relative mb-6">
                                <div
                                    class="absolute -left-3 top-8 w-5 h-5 bg-gradient-to-r from-teal-500 to-emerald-300 rounded-full border-2 border-white">
                                </div>

                                <div class="bg-teal-50 border-l-4 border-teal-400  shadow-md rounded-lg mr-2 p-4 ml-4">
                                    <div class="flex items-center space-x-2">
                                        @if ($audit->action === 'Logged In')
                                            <i class="fas fa-sign-in-alt text-green-600"></i>
                                        @elseif($audit->action === 'Logged Out')
                                            <i class="fas fa-sign-out-alt text-red-600"></i>
                                        @elseif($audit->action === 'Create Appointment')
                                            <i class="fas fa-calendar-plus text-blue-600"></i>
                                        @elseif($audit->action === 'Delete Appointment')
                                            <i class="fas fa-calendar-minus text-yellow-600"></i>
                                        @else
                                            <i class="fas fa-user-edit text-gray-500"></i>
                                        @endif
                                        <span class="font-bold text-gray-800">{{ $audit->action }}</span>
                                    </div>
                                    <p class="text-gray-600 text-sm mt-1">
                                        {{ \Carbon\Carbon::parse($audit->created_at)->setTimezone('Asia/Singapore')->format('M d, Y, h:i A') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="p-5 pt-0">
                    <button onclick="openModal('auditModal')"
                        class="bg-gradient-to-r from-teal-500 to-teal-700 text-white px-4 py-2 rounded-lg w-full transform hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-history text-white font-bold"></i> View Full Audit
                    </button>
                </div>

                <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 ">
                    <div
                        class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                        <div class="w-max rounded-lg bg-teal-500 p-5 text-white">
                            <i class="fa-solid fa-pie-chart fa-lg"></i>
                        </div>
                        <div
                            class="bg-teal-100 w-full shadow-lg rounded-lg p-2 border-b-4 border-teal-600 transform hover:scale-105 transition-transform duration-200">
                            <h6
                                class="block text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Your Appointments
                            </h6>
                            <p class="block max-w-sm text-sm font-normal leading-normal text-gray-700 antialiased">
                                Visualize your appoinents data in categories.
                            </p>
                        </div>
                    </div>
                    <div class="py-6 mt-4 grid place-items-center px-2">
                        <div class="flex items-center justify-start gap-2 text-xl font-semibold text-teal-600 mx-2">
                            <i class="fa-solid fa-calendar"></i>
                            <p>Appointments Categories</p>
                        </div>
                        @if ($appointmentCategories->isEmpty())
                            <div class="bg-red-400 shadow-lg p-6 m-2 rounded-lg ">
                                <p class="text-white">No attended appointments available. Click <span
                                        class="rounded-lg bg-teal-600 p-1 shadow cursor-pointer"
                                        onclick="window.location.href='{{ route('calendar') }}'">here</span> to
                                    add
                                    one.
                                </p>
                            </div>
                        @else
                            <p class="bg-teal-100 p-2 border-2 border-teal-600 rounded-lg shadow-lg">
                                <strong>{{ $appointmentCategories->count() }}</strong>
                                {{ $appointmentCategories->count() == 1 ? 'Category' : 'Categories' }} Found
                            </p>
                            <div id="pie-chart"></div>
                        @endif
                    </div>
                </div>



            </div>

            <div
                class="bg-white  border-t-4 border-teal-400 fade-up overflow-hidden sm:rounded-lg shadow-lg  col-span-2">
                <div class="w-lg m-4 bg-gradient-to-r from-teal-500 to-teal-700   rounded-xl shadow-lg" role="alert"
                    tabindex="-1" aria-labelledby="hs-toast-message-with-loading-indicator-label">
                    <div class="flex items-center w-full p-4">
                        <!-- Loading Spinner -->
                        <i class="fa-solid fa-sync fa-spin text-gray-100 text-2xl"></i>

                        <!-- Message -->
                        <p id="hs-toast-message-with-loading-indicator-label"
                            class="ml-3 text-lg font-semibold  text-gray-100"
                            data-date="{{ isset($upcomingappointment) ? \Carbon\Carbon::parse($upcomingappointment->date)->format('F j, Y') : 'No Date Available' }}"
                            data-time="{{ $start_time ?? 'N/A' }}" data-end-time="{{ $end_time ?? 'N/A' }}">
                            Upcoming Appointment...
                            {{ $start_time ?? 'N/A' }} - {{ $end_time ?? 'N/A' }}
                            {{ isset($upcomingappointment) ? \Carbon\Carbon::parse($upcomingappointment->date)->format('F j, Y') : 'No Date Available' }}
                        </p>

                    </div>
                </div>
                <script>
                    function startCountdown(targetDate, targetTime, endTime, countdownElementId) {
                        const countdownElement = document.getElementById(countdownElementId);

                        function updateCountdown() {
                            const now = new Date();
                            const appointmentStartTime = new Date(targetDate + ' ' + targetTime);
                            const appointmentEndTime = new Date(targetDate + ' ' + endTime);
                            const interval = setInterval(updateCountdown, 1000);

                            if (!targetDate || !targetTime) {
                                countdownElement.textContent = "No upcoming appointment.";
                                return;
                            }

                            if (now >= appointmentEndTime) {
                                countdownElement.textContent = "Appointment has ended!";
                                clearInterval(interval);
                                return;
                            }


                            if (now >= appointmentStartTime) {
                                countdownElement.textContent = "Appointment is happening now!";
                                return;
                            }
                            const timeDiff = appointmentStartTime - now;
                            const hours = Math.floor((timeDiff / (1000 * 60 * 60)) % 24);
                            const minutes = Math.floor((timeDiff / (1000 * 60)) % 60);
                            const seconds = Math.floor((timeDiff / 1000) % 60);
                            countdownElement.textContent = `Upcoming Appointment in ${hours}h ${minutes}m ${seconds}s`;
                        }
                        updateCountdown();
                    }

                    document.addEventListener("DOMContentLoaded", function () {
                        const countdownElement = document.getElementById("hs-toast-message-with-loading-indicator-label");
                        const targetDate = countdownElement.getAttribute("data-date");
                        const targetTime = countdownElement.getAttribute("data-time");
                        const endTime = countdownElement.getAttribute("data-end-time");
                        startCountdown(targetDate, targetTime, endTime, "hs-toast-message-with-loading-indicator-label");
                    });
                </script>

                <div class="p-4  grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
                    <div
                        class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-white/80 text-sm">Available Dates</p>
                                <h3 class="text-4xl font-bold mt-2"> {{ $availableDates }}
                                </h3>
                            </div>
                            <div class="bg-white/20 p-3 rounded-xl">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 text-white/80 text-sm">
                            Current Available Dates
                        </div>
                    </div>

                    <!-- Today's Appointments -->
                    <div
                        class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl p-6 text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-white/80 text-sm">Today's Appointments</p>
                                <h3 class="text-4xl font-bold mt-2"> {{ $currentAppointments }}
                                </h3>
                            </div>
                            <div class="bg-white/20 p-3 rounded-xl">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M8 2a1 1 0 011 1v1h2V3a1 1 0 112 0v1h1a2 2 0 012 2v1h-9V6a2 2 0 012-2h1V3a1 1 0 011-1zm9 6v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8h14z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 text-white/80 text-sm">
                            Current Available Appointments
                        </div>
                    </div>

                    <!-- Monthly Stats -->
                    <div
                        class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-white/80 text-sm">Cancelled Appointments</p>
                                <h3 class="text-4xl font-bold mt-2"> {{ $cancelledAppointments }}
                                </h3>
                            </div>
                            <div class="bg-white/20 p-3 rounded-xl">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                                    <path fill-rule="evenodd"
                                        d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 text-white/80 text-sm">
                            Total Number of Cancelled Appointments
                        </div>
                    </div>
                </div>

                <div class="w-full bg-gradient-to-r from-teal-100 to-blue-100 roundd-t-lg p-5 ">
                    <div
                        class="mb-2 bg-teal-50 p-4  rounded-lg border-l-4 border-teal-500 shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <h1 class="text-3xl font-bold text-gray-800">Welcome back,
                            {{ Auth::user()->firstname . ' ' . Auth::user()->middleinitial . ' ' . Auth::user()->lastname }}!
                            👋
                        </h1>
                        <p class="text-gray-600 mt-2">Here's what's happening in your dental clinic today.</p>
                    </div>

                </div>
                <!-- <div class="bg-gradient-to-r from-teal-500 to-teal-700 text-white p-3 rounded-lg"> -->

                <div class="w-full">
                    <h3 class="bg-gradient-to-r from-teal-500 to-teal-700 p-4 font-bold text-xl text-white">
                        <i class="fas fa-user-md mx-2 fa-beat-fade" style="--fa-animation-duration: 3s;"></i>
                        Quick
                        Stats
                    </h3>
                </div>

                <div class="relative flex flex-col  bg-white bg-clip-border text-gray-700 shadow-md">
                    <div
                        class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                        <div class="w-max rounded-lg bg-teal-500 shadow-lg p-5 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="bg-teal-100 shadow-lg rounded-lg p-2 border-b-4 border-teal-600 transform hover:scale-105 transition-transform duration-200">
                            <h6
                                class="block text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Monthly Appointments
                            </h6>
                            <p class="block max-w-sm text-sm font-normal leading-normal text-gray-700 antialiased">
                                Visualize your Monthly Appointments below
                            </p>
                        </div>
                    </div>
                    @if ($monthlyData->isEmpty())
                        <div class="text-center p-6 bg-red-400 m-4 rounded-lg shadow-lg">
                            <p class="text-white text-lg">Still no appointments? Click <span
                                    class="rounded-lg bg-teal-600 p-1 shadow cursor-pointer"
                                    onclick="window.location.href='{{ route('calendar') }}'">here</span> to be
                                included in a
                                slot.</p>
                        </div>
                    @else
                        <div class="pt-6 px-2 pb-0">
                            <div id="line-chart"></div>
                        </div>
                    @endif
                    <div
                        class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                        <div class="w-max rounded-lg bg-teal-500 shadow-lg p-5 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="bg-teal-100 shadow-lg rounded-lg p-2 border-b-4 border-teal-600 transform hover:scale-105 transition-transform duration-200">
                            <h6
                                class="block text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Daily Appointments
                            </h6>
                            <p class="block max-w-sm text-sm font-normal leading-normal text-gray-700 antialiased">
                                Visualize your Daily Appointments below
                            </p>
                        </div>
                    </div>
                    @if ($dailyAppointments->isEmpty())
                        <div class="text-center p-6 bg-red-400 m-4 rounded-lg shadow-lg">
                            <p class="text-white text-lg">Still no appointments? Click <span
                                    class="rounded-lg bg-teal-600 p-1 shadow cursor-pointer"
                                    onclick="window.location.href='{{ route('calendar') }}'">here</span> to be
                                included in a
                                slot.</p>
                        </div>
                    @else
                        <div class="pt-6 px-2 pb-0">
                            <div id="line-chart2"></div>
                        </div>
                    @endif
                </div>
                <div class="bg-white  overflow-hidden  col-span-2 ">
                    <h3
                        class="bg-gradient-to-r from-teal-500 to-teal-700 p-4 font-bold text-xl text-white flex justify-between items-center">
                        <span><i class="fas fa-calendar-alt fa-beat-fade mx-2" style="--fa-animation-duration: 3s;"></i>
                            Appointments Today (9 AM - 6 PM)</span>
                        <button onclick="window.location.href='{{ route('calendar') }}'"
                            class="bg-white text-teal-500 text-md font-semibold px-3 py-1 rounded-lg flex items-center hover:bg-gray-100">
                            See More <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </h3>
                    @forelse ($availableAppointments as $appointments)
                        <div
                            class="flex-1 min-h-0 overflow-y-auto p-2 pt-4 space-y-4 scrollbar-thin scrollbar-thumb-teal-600 scrollbar-track-gray-200">
                            <div
                                class="bg-gray-100 border-l-4 border-teal-500 p-4 rounded-lg shadow-md flex justify-between items-center   ">
                                <div>
                                    <p class="font-semibold text-lg">
                                        {{ \Carbon\Carbon::parse($appointments->date)->format('F j, Y') }}
                                    </p>

                                    <span class="time-slot" data-time="{{ $appointments->time_slot }}"
                                        data-date="{{ $appointments->date }}">
                                        {{ $appointments->time_slot }}
                                    </span>
                                    <span
                                        class="countdown text-red-500 bg-red-100 border-red-500 p-1 font-semibold rounded-lg m-2"></span>

                                </div>
                                <span
                                    class="bg-teal-600 text-white px-3 py-1 rounded-full text-md transform hover:scale-105 transition-transform duration-200">{{ $appointments->max_slots }}
                                    Slots Remaining</span>
                            </div>
                        </div>
                    @empty
                        <div
                            class="bg-teal-50 m-2 border-4 border-teal-400 hover:bg-teal-100 transition-all duration-300 ease-out p-4 rounded-lg shadow-md">
                            <div class="m-2 text-center ">
                                <div class="flex items-center justify-center">
                                    <div class="rounded-full bg-teal-200  p-4 flex items-center justify-center">
                                        <i class="fa-solid fa-face-frown text-4xl text-teal-600"></i>
                                    </div>
                                </div>
                                <br>
                                <p class="text-lg font-semibold text-teal-600">
                                    No appointments available.
                                </p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Third Column: Additional Content (1/4 of the width) -->
            <div
                class="bg-teal-50 border-t-4 border-teal-400 fade-up overflow-hidden sm:rounded-lg shadow-lg  xl:col-span-1 md:col-span-4 sm:col-span-2 col-span-2  ">
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                <div class="bg-teal-50 p-6 rounded-lg  max-w-xxl mx-auto flex flex-col items-center justify-center ">
                    <div class="relative size-72 items-center justify-center">
                        <svg class="size-full rotate-180" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#4CAF50" /> <!-- Green -->
                                    <stop offset="100%" stop-color="#2196F3" /> <!-- Blue -->
                                </linearGradient>
                            </defs>

                            <defs>
                                <linearGradient id="tealGradient" x1="100%" y1="0%" x2="0%" y2="0%">
                                    <stop offset="0%" stop-color="#bae6fd" />
                                    <!-- Lighter Blue (Tailwind blue-200) -->
                                    <stop offset="100%" stop-color="#5eead4" />
                                    <!-- Lighter Teal (Tailwind teal-300) -->
                                </linearGradient>
                            </defs>





                            <!-- Background Circle -->
                            <circle cx="18" cy="18" r="16" fill="none" stroke="url(#tealGradient)" stroke-width="2"
                                stroke-dasharray="50 100" stroke-linecap="round">
                            </circle>

                            <!-- Gradient Progress Circle -->
                            <circle cx="18" cy="18" r="16" fill="none" stroke="url(#gradient)" stroke-width="3"
                                stroke-dasharray="{{ ($attendanceRate / 100) * 50 }}, 100" stroke-linecap="round">
                            </circle>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span class="text-3xl font-bold text-teal-600 mt-20">{{ $attendedCount }} /
                                {{ $totalEligible }}</span>
                            <span class="text-sm text-teal-600">Are attended by
                                {{ Auth::user()->firstname }}</span>
                            @php

                                if ($totalAppointments == 0) {
                                    $message =
                                        'No attendance records found. Please schedule an appointment to track your attendance.';
                                    $color = 'text-gray-700 border-gray-500 bg-gray-50';
                                } elseif ($attendanceRate >= 90) {
                                    $message = 'Excellent attendance! Keep up the great work!';
                                    $color = 'text-green-700 border-green-500 bg-green-50';
                                } elseif ($attendanceRate >= 75) {
                                    $message = 'Good attendance! A little more consistency will make it even better.';
                                    $color = 'text-blue-700 border-blue-500 bg-blue-50';
                                } elseif ($attendanceRate >= 50) {
                                    $message = 'Fair attendance. Try to improve your consistency.';
                                    $color = 'text-yellow-700 border-yellow-500 bg-yellow-50';
                                } else {
                                    $message =
                                        'Poor attendance! Consider improving your participation to avoid any issues.';
                                    $color = 'text-red-700 border-red-500 bg-red-50';
                                }
                            @endphp

                            <div
                                class="w-full flex items-center justify-center gap-3 mb-12 p-4 text-lg {{ $color }} shadow-lg border-l-4 mt-12   rounded-lg relative group">
                                <i class="fa-solid fa-info-circle cursor-pointer relative">
                                    <!-- Tooltip -->
                                </i>

                                <span
                                    class="absolute left-1/2 bottom-full mb-2 w-max max-w-xs -translate-x-1/2 bg-gray-800 text-white text-sm p-2 rounded-md opacity-0 group-hover:opacity-100 transition-opacity">
                                    {{ $message ?? 'No data available' }}
                                </span>


                                @if ($totalAppointments == 0)
                                    <p>Attendance Rate: N/A</p>
                                @else
                                    <p>Attendance Rate: {{ number_format($attendanceRate, 2) . '%' }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-teal-100 to-blue-100 text-white p-5 rounded-lg shadow-lg">
                        <h2
                            class="text-xl w-full font-bold text-teal-600 mb-4 flex items-center border-b-2 border-teal-500  pb-2">
                            <i class="fas fa-address-card text-2xl mr-2"></i> Contact Details
                        </h2>
                        <div class="space-y-4">
                            <div
                                class="flex items-center bg-teal-50 shadow-lg p-4 border-l-4 border-teal-500 rounded-lg transform hover:scale-105 transition-transform duration-200">
                                <i class="fas fa-user text-teal-500 text-xl mr-3"></i>
                                <p class="text-gray-700"><strong>Name:</strong> ANA FATIMA BARROSO, DMD Dental
                                    Clinic
                                </p>
                            </div>

                            <div
                                class="flex items-center bg-teal-50 border-l-4 border-teal-500  shadow-lg p-4 rounded-lg transform hover:scale-105 transition-transform duration-200">
                                <i class="fas fa-map-marker-alt text-teal-500 text-xl mr-3"></i>
                                <p class="text-gray-700"><strong>Address:</strong>605 9 de Febrero St. Brgy Pleasant
                                    Hills, Mandaluyong City</p>
                            </div>

                            <div
                                class="flex items-center bg-teal-50 border-l-4 border-teal-500 shadow-lg p-4 rounded-lg transform hover:scale-105 transition-transform duration-200">
                                <i class="fas fa-phone text-teal-500 text-xl mr-3"></i>
                                <p class="text-gray-700"><strong>Phone:</strong> +63 919 467 7338</p>
                            </div>

                            <div
                                class="flex items-center bg-teal-50 border-l-4 border-teal-500 shadow-lg p-4 rounded-lg transform hover:scale-105 transition-transform duration-200">
                                <i class="fas fa-envelope text-teal-500 text-xl mr-3"></i>
                                <p class="text-gray-700"><strong>Email:</strong>
                                    <a href="mailto:anafatima0717@gmail.com"
                                        class="text-blue-600 hover:underline">anafatima0717@gmail.com</a>
                                </p>
                            </div>

                            <div
                                class="flex items-center bg-teal-50  border-l-4 border-teal-500 shadow-lg p-4 rounded-lg transform hover:scale-105 transition-transform duration-200">
                                <i class="fas fa-clock text-teal-500 text-xl mr-3"></i>
                                <p class="text-gray-700"><strong>Opening Hours:</strong> Mon-Sat: 9 AM - 6 PM</p>
                            </div>
                        </div>

                    </div>


                </div>


                <div
                    class="grid grid-cols-1 xl:grid-cols-2 md:grid-cols-1 gap-4 p-6 mt-6 w-full overflow-auto text-center p-4">
                    <!-- Card 1 -->
                    <div
                        class="bg-teal-50  rounded-lg shadow-md flex flex-col items-center transform hover:scale-105 transition-transform duration-200">
                        <div class="bg-teal-200 p-4 rounded-t-lg rounded-b-lg border-b-4 border-teal-600 w-full">
                            <i class="fas fa-user-md text-teal-600 text-4xl mb-2"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Expert Dentists</h3>
                            <p class="text-center text-sm text-gray-600">Our professional team ensures quality
                                dental
                                care.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="bg-teal-50  rounded-lg shadow-md flex flex-col items-center transform hover:scale-105 transition-transform duration-200">
                        <div class="bg-teal-200 p-4 rounded-t-lg rounded-b-lg border-b-4 border-teal-600 w-full">
                            <i class="fas fa-calendar-alt text-teal-600 text-4xl mb-2"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Easy Appointments</h3>
                            <p class="text-center text-sm text-gray-600">Book an appointment online at your
                                convenience.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="bg-teal-50  rounded-lg shadow-md flex flex-col items-center transform hover:scale-105 transition-transform duration-200">
                        <div class="bg-teal-200 p-4 rounded-t-lg rounded-b-lg border-b-4 border-teal-600 w-full">
                            <i class="fas fa-tooth text-teal-600 text-4xl mb-2"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Quality Services</h3>
                            <p class="text-center text-sm text-gray-600">Providing top-notch dental procedures
                                and
                                care.
                            </p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="bg-teal-50  rounded-lg shadow-md flex flex-col items-center transform hover:scale-105 transition-transform duration-200">
                        <div class="bg-teal-200 p-4 rounded-t-lg rounded-b-lg border-b-4 border-teal-600 w-full">
                            <i class="fas fa-map-marker-alt text-teal-600 text-4xl mb-2"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Accessible Location</h3>
                            <p class="text-center text-sm text-gray-600">Easily reachable with parking
                                available.</p>
                        </div>
                    </div>

                </div>
                </p>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let urlParams = new URLSearchParams(window.location.search);

            if (urlParams.has("auditModal") || "{{ session('audit_modal_open') }}" === "true") {
                console.log("Opening Audit Modal");
                openModal("auditModal");
            }

            document.addEventListener("DOMContentLoaded", function () {
                let searchForm = document.querySelector("form#searchform");

                if (searchForm) {
                    searchForm.addEventListener("submit", function (event) {
                        let searchInput = document.querySelector("input[name='search']");
                        let auditModalInput = document.querySelector("input[name='auditModal']");
                        let formAction = new URL(searchForm.action, window.location.origin);
                        let currentParams = new URL(window.location.href).searchParams;

                        if (searchInput && searchInput.value.trim()) {
                            formAction.searchParams.set("search", searchInput.value.trim());
                        }

                        if (currentParams.has("auditModal")) {
                            formAction.searchParams.set("auditModal", "true");
                            auditModalInput.value = "true";

                            console.log("Final Form Action URL:", formAction
                                .toString());
                            searchForm.action = formAction.toString();
                        }
                    });
                }

                let urlParams = new URLSearchParams(window.location.search);
                if (urlParams.has("auditModal")) {
                    openModal("auditModal");
                }

            });



            let paginationLinks = document.querySelectorAll(".pagination a");
            paginationLinks.forEach(link => {
                link.addEventListener("click", function (event) {
                    event.preventDefault();
                    let url = new URL(link.href);
                    let currentParams = new URL(window.location.href).searchParams;

                    if (currentParams.has("search")) {
                        url.searchParams.set("search", currentParams.get("search"));
                    }
                    if (currentParams.has("auditModal")) {
                        url.searchParams.set("auditModal", "true");
                    }

                    console.log("Navigating to:", url.toString());
                    window.location.href = url.toString();
                });
            });
        });

        function closeAuditModal(modalId) {
            fetch("{{ route('close.audit.modal') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json",
                },
            })
                .then(response => response.json())
                .then(data => {
                    console.log("Audit Modal Closed:", data.message);
                    closeModal(modalId);
                    removeQueryParams(["auditModal"]); // Removes only "auditModal", keeps "search"
                })
                .catch(error => console.error("Error:", error));
        }

        function closeModal(modalId) {
            let modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('opacity-0', 'scale-95', 'transition', 'duration-300');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('opacity-0', 'scale-95');
                }, 300);
            }
        }

        function removeQueryParams(params) {
            const url = new URL(window.location.href);
            params.forEach(param => url.searchParams.delete(param));
            window.history.replaceState({}, document.title, url);
            console.log("Updated URL after removing params:", url.toString());
        }


        // COUNT DOWN
        document.addEventListener("DOMContentLoaded", function () {
            let timeSlots = document.querySelectorAll(".time-slot");

            timeSlots.forEach(slot => {
                let timeRange = slot.getAttribute("data-time"); // e.g., "10:00 AM - 12:00 PM"
                let appointmentDate = slot.getAttribute("data-date"); // e.g., "2024-03-03"
                let countdownElement = slot.nextElementSibling; // Get the countdown span
                let timeZone = "Asia/Singapore";
                let now = new Date(new Date().toLocaleString("en-US", {
                    timeZone
                }));

                console.log(`Now: ${now.toLocaleString("en-US", { timeZone })}`);

                let appointmentDateObj = new Date(appointmentDate + "T00:00:00");

                if (now.toDateString() > appointmentDateObj.toDateString()) {
                    countdownElement.innerHTML = "Appointment Already Passed";
                    countdownElement.classList.add("text-gray-500");
                    return;
                }

                let [startStr, endStr] = timeRange.split(" - ");
                let startTimeObj = new Date(`${appointmentDate} ${startStr}`);
                let endTimeObj = new Date(`${appointmentDate} ${endStr}`);

                function updateCountdown() {
                    let now = new Date(new Date().toLocaleString("en-US", {
                        timeZone: "Asia/Singapore"
                    }));

                    if (now < startTimeObj) {
                        let diff = Math.floor((startTimeObj - now) / 1000);
                        let hours = String(Math.floor(diff / 3600)).padStart(2, "0");
                        let minutes = String(Math.floor((diff % 3600) / 60)).padStart(2, "0");
                        let seconds = String(diff % 60).padStart(2, "0");

                        countdownElement.innerHTML = `Starts in: ${hours}h ${minutes}m ${seconds}s`;
                        countdownElement.classList.remove("text-green-500", "text-gray-500");
                        countdownElement.classList.add("text-blue-500"); // Indicating upcoming appointment
                    } else if (now >= startTimeObj && now <= endTimeObj) {
                        let diff = Math.floor((endTimeObj - now) / 1000);
                        let hours = String(Math.floor(diff / 3600)).padStart(2, "0");
                        let minutes = String(Math.floor((diff % 3600) / 60)).padStart(2, "0");
                        let seconds = String(diff % 60).padStart(2, "0");

                        countdownElement.innerHTML = `Ends in: ${hours}h ${minutes}m ${seconds}s`;
                        countdownElement.classList.remove("text-blue-500", "text-gray-500");
                        countdownElement.classList.add("text-green-500"); // Active appointment
                    } else {
                        countdownElement.innerHTML = "Appointment Finished";
                        countdownElement.classList.remove("text-blue-500", "text-green-500");
                        countdownElement.classList.add("text-gray-500");
                    }
                }


                updateCountdown();
                setInterval(updateCountdown, 1000);
            });
        });


        var monthlyappointmentsData = @json($monthlyData);
        const monthlycategories = @json($monthlyCategories);
        const dailyappointmentsData = @json($dailyAppointments->values());
        const dailycategories = @json($dailyAppointments->keys());



        const linechartConfig = {
            series: [{
                name: "Monthly Appointments",
                data: monthlyappointmentsData,
            },],
            chart: {
                type: "line",
                height: 240,
                toolbar: {
                    show: false,
                },
            },
            title: {
                show: "",
            },
            dataLabels: {
                enabled: false,
            },
            colors: ["#2596be"],
            stroke: {
                lineCap: "round",
                curve: "smooth",
            },
            markers: {
                size: 0,
            },
            xaxis: {
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                labels: {
                    style: {
                        colors: "#616161",
                        fontSize: "15px",
                        fontFamily: "Poppins",
                        fontWeight: 400,
                    },
                },
                categories: monthlycategories,
            },
            yaxis: {
                tickAmount: 2,
                labels: {
                    style: {
                        colors: "#616161",
                        fontSize: "14px",
                        fontFamily: "Poppins",
                        fontWeight: 400,
                    },
                    formatter: function (value) {
                        return Math.round(value);
                    },
                },
            },
            grid: {
                show: true,
                borderColor: "oklch(0.855 0.138 181.071)",
                strokeDashArray: 5,
                xaxis: {
                    lines: {
                        show: true,
                    },
                },
                padding: {
                    top: 5,
                    right: 20,
                },
            },
            fill: {
                opacity: 0.8,
            },
            tooltip: {
                theme: "light",
                style: {
                    colors: "#616161",
                    fontSize: "14px",
                    fontFamily: "Poppins",
                    fontWeight: 400,
                }
            },
        };

        if (document.querySelector("#line-chart")) {
            const linechart = new ApexCharts(document.querySelector("#line-chart"), linechartConfig);
            linechart.render();
        }

        const linechartConfig2 = {
            series: [{
                name: "Daily Appointments",
                data: dailyappointmentsData,
            },],
            chart: {
                type: "line",
                height: 240,
                toolbar: {
                    show: false,
                },
            },
            title: {
                show: "",
            },
            dataLabels: {
                enabled: false,
            },
            colors: ["#2596be"],
            stroke: {
                lineCap: "round",
                curve: "smooth",
            },
            markers: {
                size: 0,
            },
            xaxis: {
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                labels: {
                    style: {
                        colors: "#616161",
                        fontSize: "15px",
                        fontFamily: "Poppins",
                        fontWeight: 400,
                    },
                    formatter: function (value) {
                        const date = new Date(value);
                        return date.toLocaleDateString('en-US', {
                            month: 'short',
                            day: 'numeric'
                        });
                    }
                },
                categories: dailycategories,
            },
            yaxis: {
                tickAmount: 2,
                labels: {
                    style: {
                        colors: "#616161",
                        fontSize: "14px",
                        fontFamily: "Poppins",
                        fontWeight: 400,
                    },
                    formatter: function (value) {
                        return Math.round(value);
                    },
                },
            },
            grid: {
                show: true,
                borderColor: "oklch(0.855 0.138 181.071)",
                strokeDashArray: 5,
                xaxis: {
                    lines: {
                        show: true,
                    },
                },
                padding: {
                    top: 5,
                    right: 20,
                },
            },
            fill: {
                opacity: 0.8,
            },
            tooltip: {
                theme: "light",
                style: {
                    colors: "#616161",
                    fontSize: "14px",
                    fontFamily: "Poppins",
                    fontWeight: 400,
                }
            },
        };
        if (document.querySelector("#line-chart2")) {
            const linechart2 = new ApexCharts(document.querySelector("#line-chart2"), linechartConfig2);
            linechart2.render();
        }


        const piechartConfig = {
            series: @json($appointmentCategories->values()),
            chart: {
                type: "pie",
                width: 300,
                height: 300,
                toolbar: {
                    show: false,
                },
            },
            labels: @json($appointmentCategories->keys()), // appointment reasons as labels
            title: {
                show: "",
            },
            dataLabels: {
                enabled: false,
            },
            colors: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40"],
            legend: {
                show: false,
                position: 'bottom',
                horizontalAlign: 'left',
                fontSize: '14px',
                fontFamily: 'Poppins, sans-serif',
                fontWeight: 400,
                width: 500,
                itemMargin: {
                    horizontal: 10,
                    vertical: 5
                },
                markers: {
                    width: 12,
                    height: 12,
                    radius: 12
                }
            },
            tooltip: {
                style: {
                    colors: "#616161",
                    fontSize: "14px",
                    fontFamily: "Poppins, sans-serif",
                    fontWeight: 400,
                }
            }
        };


        if (document.querySelector("#pie-chart")) {
            const piechart = new ApexCharts(document.querySelector("#pie-chart"), piechartConfig);
            piechart.render();
        }
    </script>
</x-patientnav-layout>