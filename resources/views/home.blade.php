<x-navbar-layout>

    {{-- Top Header --}}
    <header class="bg-teal-500 text-white py-3 px-6 flex justify-center items-center">
        <div class="text-lg font-semibold text-center">
            Monday - Saturday, 9AM - 6PM | Call us now 8715-5170
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="bg-gray-100 flex flex-col items-center justify-center text-center py-16 px-6">
        <div class="max-w-2xl">
            <h1 class="text-xl mt-4 mb-4 font-bold text-gray-800">
                Welcome to ANA FATIMA BARROSO DENTAL CLINIC APPOINTMENT
            </h1>
            <p class="text-lg text-gray-600">
                Discover a seamless healthcare experience with Doctors Appointment. Your wellness journey begins here.
            </p>
            <a href="#" class="mt-6 inline-block bg-teal-500 text-white px-6 py-3 rounded-md text-lg font-semibold hover:bg-teal-600">
                Read More
            </a>
        </div>
        <div class="my-10 flex justify-center">
            <img src="{{ asset('images/clinic.jpg') }}" alt="Doctor operating in a clinic" class="max-w-full rounded-lg shadow-lg mx-auto">
        </div>
    </section>

</x-navbar-layout>
