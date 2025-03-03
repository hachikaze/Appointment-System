<x-patientnav-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-6 lg:px-8  lg:gap-8 gap-4 xl:grid grid-cols-4 lg:grid grid-cols-1   ">
            <!-- First Column: Avatar and Buttons (1/4 of the width) -->
            <div
                class="bg-white fade-up overflow-hidden sm:rounded-lg shadow-lg  xl:col-span-1 md:col-span-2 sm:col-span-2  col-span-2">
                <div class="w-full">
                    <h3 class="bg-teal-500 p-4 font-bold text-xl text-white">
                        <i class="fas fa-user-md"></i> PATIENT DASHBOARD
                    </h3>
                </div>
                <div class="flex flex-col bg-gray-100 rounded-b-lg  border-b-4 border-teal-500 items-center p-6">
                    <img src="{{ $user->image_path ? asset('storage/' . $user->image_path) : asset('images/default-avatar.png') }}"
                        alt="Clinic Logo"
                        class="h-40 w-40 bg-white border-2 border-teal-500 rounded-full m-4 shadow-lg object-contain aspect-square">

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
                <!-- Audit Trail Section -->
                <div class="mt-10 p-6 pt-0">
                    <h3 class="text-lg font-bold text-gray-700 mt-5 mb-4 flex items-center">
                        <i class="fas fa-history text-teal-500 text-xl mr-2"></i> Activity Log
                    </h3>

                    <div class="bg-gray-100 rounded-lg">
                        <!-- Column Headers -->
                        <div class="flex rounded-t-lg font-semibold bg-teal-500 p-2 text-white text-md">
                            <div class="flex-1">Action</div>
                            <div class="flex-1">Date & Time</div>
                        </div>
                        <div class="grid grid-cols-2 m-2 max-h-96 overflow-y-auto   text-gray-700 text-sm">
                            @foreach ($auditTrails as $audit)
                                <div class="p-4 flex items-center justify-between border-b-2 border-gray-300">
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
                                        <span class="font-bold">{{ $audit->action }}</span>
                                    </div>
                                </div>
                                <div class="text-gray-600 flex items-center border-b-2 border-gray-300 ">
                                    {{ \Carbon\Carbon::parse($audit->created_at)->setTimezone('Asia/Singapore')->format('M d, Y, h:i A') }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white fade-up overflow-hidden sm:rounded-lg shadow-lg  col-span-2">
                <!-- Quick Stats Overview -->
                <div
                    class="p-4 border-t-4 border-teal-400 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
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
                                <h3 class="text-4xl font-bold mt-2"> {{ $canceledAppointments }}
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
                <div class="w-full bg-gray-100 p-5 ">
                    <!-- Welcome Section -->
                    <div
                        class="mb-2 bg-white p-4  rounded-lg border-l-4 border-teal-500 shadow-lg transform hover:scale-105 transition-transform duration-200">
                        <h1 class="text-3xl font-bold text-gray-800">Welcome back,
                            {{ Auth::user()->firstname . ' ' . Auth::user()->middleinitial . ' ' . Auth::user()->lastname }}!
                            👋
                        </h1>
                        <p class="text-gray-600 mt-2">Here's what's happening in your dental clinic today.</p>
                    </div>

                </div>
                <div class="w-full">
                    <h3 class="bg-teal-500 p-4 font-bold text-xl text-white">
                        <i class="fas fa-user-md"></i> DENTAL CLINIC LOCATION
                    </h3>
                </div>
                {{-- <iframe width="100%" height="300" style="border:0" loading="lazy" allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.2050300674914!2d121.04021859999999!3d14.587389799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8312ce6011f%3A0x3b9575c6988133e6!2sANA%20FATIMA%20BARROSO%2C%20DMD%20Dental%20Clinic!5e0!3m2!1sen!2sph!4v1739887099838!5m2!1sen!2sph">
                </iframe> --}}

                <!-- Upcoming Appointments Section -->
                <div class="bg-white  overflow-hidden  col-span-2 ">
                    <h3 class="bg-teal-500 p-4 font-bold text-xl text-white flex justify-between items-center">
                        <span><i class="fas fa-calendar-alt"></i> Appointments Today (9 AM - 6 PM)</span>
                        <button onclick="window.location.href='{{ route('calendar') }}'"
                            class="bg-white text-teal-500 text-sm font-semibold px-3 py-1 rounded-lg flex items-center hover:bg-gray-100">
                            See More <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </h3>
                    @foreach ($availableAppointments as $appointments)
                        <div
                            class="flex-1 min-h-0 overflow-y-auto p-2 pt-4 space-y-4 scrollbar-thin scrollbar-thumb-teal-600 scrollbar-track-gray-200">
                            <div
                                class="bg-gray-100 border-l-4 border-teal-500 p-4 rounded-lg shadow-md flex justify-between items-center   ">
                                <div>
                                    <p class="font-semibold text-lg">
                                        {{ \Carbon\Carbon::parse($appointments->date)->format('F j, Y') }}
                                    </p>

                                    <span class="time-slot" data-time="{{ $appointments->time_slot }}">
                                        {{ $appointments->time_slot }}
                                    </span>
                                    <span
                                        class="countdown text-red-500 bg-red-100 border-red-500 p-1 font-semibold rounded-lg m-2"></span>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            let timeSlots = document.querySelectorAll(".time-slot");

                                            timeSlots.forEach(slot => {
                                                let timeRange = slot.getAttribute("data-time"); // "8:00 AM - 9:00 AM"
                                                let countdownElement = slot.nextElementSibling; // Get the countdown span
                                                let startTime = new Date();
                                                let [startStr, endStr] = timeRange.split(" - ");

                                                let startTimeObj = new Date(startTime.toDateString() + " " + startStr);
                                                let endTimeObj = new Date(startTime.toDateString() + " " + endStr);

                                                function updateCountdown() {
                                                    let now = new Date();

                                                    if (now < startTimeObj) {
                                                        let diff = Math.floor((startTimeObj - now) / 1000);
                                                        let hours = Math.floor(diff / 3600);
                                                        let minutes = Math.floor((diff % 3600) / 60);
                                                        let seconds = diff % 60;
                                                        countdownElement.innerHTML = `Starts in: ${hours}h ${minutes}m ${seconds}s`;
                                                    } else if (now >= startTimeObj && now <= endTimeObj) {
                                                        let diff = Math.floor((endTimeObj - now) / 1000);
                                                        let minutes = Math.floor(diff / 60);
                                                        let seconds = diff % 60;
                                                        countdownElement.innerHTML = `Ends in: ${minutes}m ${seconds}s`;
                                                        countdownElement.classList.add("text-green-500");
                                                    } else {
                                                        countdownElement.innerHTML = "Appointment Finished";
                                                        countdownElement.classList.add("text-gray-500");
                                                    }
                                                }
                                                updateCountdown();
                                                setInterval(updateCountdown, 1000);
                                            });
                                        });
                                    </script>

                                </div>
                                <span
                                    class="bg-teal-600 text-white px-3 py-1 rounded-full text-md transform hover:scale-105 transition-transform duration-200">{{ $appointments->max_slots }}
                                    Slots Remaining</span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Third Column: Additional Content (1/4 of the width) -->
            <div
                class="bg-white fade-up overflow-hidden sm:rounded-lg shadow-lg  xl:col-span-1 md:col-span-4 sm:col-span-2 col-span-2 ">
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                <div class="bg-white  p-6 rounded-lg  max-w-xxl mx-auto">
                    <h2 class="text-xl font-bold text-teal-500 mb-4 flex items-center border-b-2 border-teal-500  pb-2">
                        <i class="fas fa-address-card  text-2xl mr-2"></i> Contact Details
                    </h2>
                    <div class="space-y-4">
                        <div
                            class="flex items-center bg-gray-100 shadow-lg p-4 border-l-4 border-teal-500 rounded-lg transform hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-user text-teal-500 text-xl mr-3"></i>
                            <p><strong>Name:</strong> ANA FATIMA BARROSO, DMD Dental Clinic</p>
                        </div>

                        <div
                            class="flex items-center bg-gray-100 border-l-4 border-teal-500  shadow-lg p-4 rounded-lg transform hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-map-marker-alt text-teal-500 text-xl mr-3"></i>
                            <p><strong>Address:</strong> H2PR+X34, Nueve de Febrero, Mandaluyong, Kalakhang Maynila</p>
                        </div>

                        <div
                            class="flex items-center bg-gray-100 border-l-4 border-teal-500 shadow-lg p-4 rounded-lg transform hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-phone text-teal-500 text-xl mr-3"></i>
                            <p><strong>Phone:</strong> +63 912 345 6789</p>
                        </div>

                        <div
                            class="flex items-center bg-gray-100 border-l-4 border-teal-500 shadow-lg p-4 rounded-lg transform hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-envelope text-teal-500 text-xl mr-3"></i>
                            <p><strong>Email:</strong>
                                <a href="mailto:contact@clinic.com"
                                    class="text-blue-600 hover:underline">contact@clinic.com</a>
                            </p>
                        </div>

                        <div
                            class="flex items-center bg-gray-100  border-l-4 border-teal-500 shadow-lg p-4 rounded-lg transform hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-clock text-teal-500 text-xl mr-3"></i>
                            <p><strong>Opening Hours:</strong> Mon-Sat: 9 AM - 6 PM</p>
                        </div>
                    </div>
                </div>


                <div
                    class="grid grid-cols-1 xl:grid-cols-2 md:grid-cols-1 gap-4 p-6 mt-6 w-full overflow-auto text-center p-4">
                    <!-- Card 1 -->
                    <div
                        class="bg-gray-100  rounded-lg shadow-md flex flex-col items-center transform hover:scale-105 transition-transform duration-200">
                        <div class="bg-teal-200 p-4 rounded-t-lg rounded-b-lg border-b-4 border-teal-600 w-full">
                            <i class="fas fa-user-md text-teal-600 text-4xl mb-2"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Expert Dentists</h3>
                            <p class="text-center text-sm text-gray-600">Our professional team ensures quality dental
                                care.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="bg-gray-100  rounded-lg shadow-md flex flex-col items-center transform hover:scale-105 transition-transform duration-200">
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
                        class="bg-gray-100  rounded-lg shadow-md flex flex-col items-center transform hover:scale-105 transition-transform duration-200">
                        <div class="bg-teal-200 p-4 rounded-t-lg rounded-b-lg border-b-4 border-teal-600 w-full">
                            <i class="fas fa-tooth text-teal-600 text-4xl mb-2"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Quality Services</h3>
                            <p class="text-center text-sm text-gray-600">Providing top-notch dental procedures and
                                care.
                            </p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="bg-gray-100  rounded-lg shadow-md flex flex-col items-center transform hover:scale-105 transition-transform duration-200">
                        <div class="bg-teal-200 p-4 rounded-t-lg rounded-b-lg border-b-4 border-teal-600 w-full">
                            <i class="fas fa-map-marker-alt text-teal-600 text-4xl mb-2"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold">Accessible Location</h3>
                            <p class="text-center text-sm text-gray-600">Easily reachable with parking available.</p>
                        </div>
                    </div>

                </div>
                </p>
            </div>

        </div>
    </div>
</x-patientnav-layout>
