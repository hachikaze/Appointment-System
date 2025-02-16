<x-navbar-layout>
    <!-- About Section -->
    <div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">About Us</h2>
            <p class="text-gray-600 mt-2">
                Welcome to ANA FATIMA BARROSO Dental Clinic Appointment, where your health is our priority.
                Our mission is to provide seamless and efficient appointment services to ensure you receive
                the care you need when you need it.
            </p>
        </div>

        <div class="flex flex-col md:flex-row gap-6 mt-6">
            <img src="{{ asset('images/clinic.jpg') }}" alt="Clinic Image" class="md:w-1/2 rounded-lg shadow-md">
            <div class="md:w-1/2">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">
                    Experience Quality Healthcare at ANA FATIMA BARROSO Dental Clinic
                </h3>
                <p class="text-gray-600">
                    Discover a healthcare experience like no other at Centralians Clinic.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                </p>
                <ul class="mt-4 space-y-2 text-gray-700">
                    <li class="flex items-center"><span class="text-teal-500 mr-2">✔</span> Unparalleled commitment to
                        patient care and satisfaction.</li>
                    <li class="flex items-center"><span class="text-teal-500 mr-2">✔</span> Expert doctor providing
                        personalized medical services.</li>
                    <li class="flex items-center"><span class="text-teal-500 mr-2">✔</span> State-of-the-art facilities
                        for comprehensive healthcare.</li>
                </ul>
                <p class="text-gray-600 mt-4">
                    At ANA FATIMA BARROSO Dental Clinic, we strive to create a welcoming and healing environment for our
                    patients.
                    Our dedicated team works tirelessly to provide the best care possible.
                </p>
            </div>
        </div>
    </div>
</x-navbar-layout>