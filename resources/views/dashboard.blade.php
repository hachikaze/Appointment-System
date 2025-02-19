<x-patientnav-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-6 lg:px-8 grid lg:gap-8 gap-4 lg:grid-cols-4 md:grid-cols-1 sm:grid-cols-1">
            <!-- First Column: Avatar and Buttons (1/4 of the width) -->
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg shadow-lg  xl:col-span-1 md:col-span-2 sm:col-span-2  col-span-2">
                <div class="w-full">
                    <h3 class="bg-teal-500 p-4 font-bold text-xl text-white">
                        <i class="fas fa-user-md"></i> PATIENT DASHBOARD
                    </h3>
                </div>
                <div class="flex flex-col items-center p-6">

                    <img src="{{ asset(path: 'images/logo.png') }}" alt="Clinic Logo"
                        class="h-40 w-40 border-2 border-teal-500 rounded-full m-4 shadow-lg object-contain aspect-square">

                    <form action="{{ route('calendar') }}" method="GET" class="w-full">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-2 w-full">
                            <i class="fas fa-calendar-check text-white font-bold"></i> Dental Appointment
                        </button>

                    </form>
                    <form action="{{ route('history') }}" method="GET" class="w-full">
                        <button class="bg-green-500 text-white px-4 py-2 rounded-lg w-full">
                            <i class="fas fa-history text-white font-bold"></i> View History
                        </button>
                    </form>

                </div>
                <!-- Audit Trail Section -->
                <div class="mt-10 p-6 pt-0">
                    <h3 class="text-lg font-bold text-gray-700 mt-5 mb-4 flex items-center">
                        <i class="fas fa-history text-teal-500 text-xl mr-2"></i> Audit Trail
                    </h3>

                    <div class="max-h-96 overflow-y-auto p-4 bg-gray-50 rounded-lg">
                        <div class="grid grid-cols-2 gap-4 text-gray-700 text-sm">
                            <!-- Column Headers -->
                            <div class="font-semibold">Action</div>
                            <div class="font-semibold">Date & Time</div>

                            <!-- Entry 1 -->
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-user-edit text-blue-500"></i>
                                <span>Updated clinic hours</span>
                            </div>
                            <div class="text-gray-500">Feb 18, 2025, 10:45 AM</div>

                            <!-- Entry 2 -->
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-user-plus text-green-500"></i>
                                <span>New patient record added</span>
                            </div>
                            <div class="text-gray-500">Feb 17, 2025, 3:30 PM</div>

                            <!-- Entry 3 -->
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-trash-alt text-red-500"></i>
                                <span>Deleted old record</span>
                            </div>
                            <div class="text-gray-500">Feb 16, 2025, 1:15 PM</div>

                            <!-- Entry 4 -->
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-calendar-check text-yellow-500"></i>
                                <span>Appointment scheduled</span>
                            </div>
                            <div class="text-gray-500">Feb 15, 2025, 9:00 AM</div>

                            <!-- Entry 5 -->
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-file-alt text-gray-500"></i>
                                <span>Medical record updated</span>
                            </div>
                            <div class="text-gray-500">Feb 14, 2025, 2:45 PM</div>

                            <!-- Entry 6 -->
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-file-alt text-gray-500"></i>
                                <span>Medical record updated</span>
                            </div>
                            <div class="text-gray-500">Feb 14, 2025, 2:45 PM</div>

                            <!-- Entry 7 -->
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-file-alt text-gray-500"></i>
                                <span>Medical record updated</span>
                            </div>
                            <div class="text-gray-500">Feb 14, 2025, 2:45 PM</div>

                            <!-- Entry 8 -->
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-file-alt text-gray-500"></i>
                                <span>Medical record updated</span>
                            </div>
                            <div class="text-gray-500">Feb 14, 2025, 2:45 PM</div>
                        </div>
                    </div>
                </div>




            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg shadow-lg  col-span-2">
                <div class="w-full">
                    <h3 class="bg-teal-500 p-4 font-bold text-xl text-white">
                        <i class="fas fa-user-md"></i> DENTAL CLINIC LOCATION
                    </h3>
                </div>
                <iframe width="100%" height="400" style="border:0" loading="lazy" allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.2050300674914!2d121.04021859999999!3d14.587389799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8312ce6011f%3A0x3b9575c6988133e6!2sANA%20FATIMA%20BARROSO%2C%20DMD%20Dental%20Clinic!5e0!3m2!1sen!2sph!4v1739887099838!5m2!1sen!2sph">
                </iframe>

                <!-- Upcoming Appointments Section -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden  col-span-2 mt-6 ">
                    <h3 class="bg-teal-500 p-4 font-bold text-xl text-white flex justify-between items-center">
                        <span><i class="fas fa-calendar-alt"></i> Appointments Today (9 AM - 6 PM)</span>
                        <button
                            class="bg-white text-teal-500 text-sm font-semibold px-3 py-1 rounded-lg flex items-center hover:bg-gray-100">
                            See More <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </h3>



                    <div class="flex-1 min-h-0 overflow-y-auto p-2 space-y-4">
                        <!-- Today's Appointments -->

                        <!-- Sample appointment cards (Only within 9 AM - 6 PM) -->
                        <div
                            class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md flex justify-between items-center">
                            <div>
                                <p class="font-semibold text-lg">10:00 AM</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Feb 22, 2025</p>
                            </div>
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">24/50</span>
                        </div>

                        <div
                            class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md flex justify-between items-center">
                            <div>
                                <p class="font-semibold text-lg">3:00 PM</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Feb 22, 2025</p>
                            </div>
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">18/50</span>
                        </div>

                        <div
                            class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md flex justify-between items-center">
                            <div>
                                <p class="font-semibold text-lg">5:45 PM</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Feb 22, 2025</p>
                            </div>
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">20/50</span>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Third Column: Additional Content (1/4 of the width) -->
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg shadow-lg  xl:col-span-1 md:col-span-4 sm:col-span-2 col-span-2 ">
                <p class="text-gray-600 dark:text-gray-400 mt-2">

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg  max-w-xxl mx-auto">
                    <h2
                        class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-4 flex items-center border-b-2 border-teal-500  pb-2">
                        <i class="fas fa-address-card text-teal-500 text-2xl mr-2"></i> Contact Details
                    </h2>

                    <div class="space-y-4">
                        <div class="flex items-center bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <i class="fas fa-user text-teal-500 text-xl mr-3"></i>
                            <p><strong>Name:</strong> ANA FATIMA BARROSO, DMD Dental Clinic</p>
                        </div>

                        <div class="flex items-center bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <i class="fas fa-map-marker-alt text-teal-500 text-xl mr-3"></i>
                            <p><strong>Address:</strong> H2PR+X34, Nueve de Febrero, Mandaluyong, Kalakhang Maynila</p>
                        </div>

                        <div class="flex items-center bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <i class="fas fa-phone text-teal-500 text-xl mr-3"></i>
                            <p><strong>Phone:</strong> +63 912 345 6789</p>
                        </div>

                        <div class="flex items-center bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <i class="fas fa-envelope text-teal-500 text-xl mr-3"></i>
                            <p><strong>Email:</strong>
                                <a href="mailto:contact@clinic.com"
                                    class="text-blue-600 hover:underline">contact@clinic.com</a>
                            </p>
                        </div>

                        <div class="flex items-center bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                            <i class="fas fa-clock text-teal-500 text-xl mr-3"></i>
                            <p><strong>Opening Hours:</strong> Mon-Sat: 9 AM - 6 PM</p>
                        </div>
                    </div>
                </div>


                <div
                    class="grid grid-cols-1 xl:grid-cols-2 md:grid-cols-1 gap-4 p-6 mt-6 w-full overflow-auto text-center p-4">
                    <!-- Card 1 -->
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md flex flex-col items-center">
                        <i class="fas fa-user-md text-teal-500 text-4xl mb-2"></i>
                        <h3 class="text-lg font-bold">Expert Dentists</h3>
                        <p class="text-center text-sm text-gray-600">Our professional team ensures quality dental care.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md flex flex-col items-center">
                        <i class="fas fa-calendar-alt text-teal-500 text-4xl mb-2"></i>
                        <h3 class="text-lg font-bold">Easy Appointments</h3>
                        <p class="text-center text-sm text-gray-600">Book an appointment online at your convenience.</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md flex flex-col items-center">
                        <i class="fas fa-tooth text-teal-500 text-4xl mb-2"></i>
                        <h3 class="text-lg font-bold">Quality Services</h3>
                        <p class="text-center text-sm text-gray-600">Providing top-notch dental procedures and care.</p>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md flex flex-col items-center">
                        <i class="fas fa-map-marker-alt text-teal-500 text-4xl mb-2"></i>
                        <h3 class="text-lg font-bold">Accessible Location</h3>
                        <p class="text-center text-sm text-gray-600">Easily reachable with parking available.</p>
                    </div>
                </div>
                </p>
            </div>

        </div>
    </div>
</x-patientnav-layout>