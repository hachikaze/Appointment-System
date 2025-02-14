<x-navbar-layout>

    {{-- Contact Section --}}
    <div class="max-w-4xl mx-auto my-10 bg-white p-8 rounded-lg shadow-md">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Contact Us</h2>
        </div>

        {{-- Info Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="text-center p-6 bg-gray-100 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-gray-700">Our Address</h3>
                <p class="text-gray-600 mt-2">605 9 de Febrero St. Brgy, Pleasant Hills Mandaluyong City</p>
            </div>
            <div class="text-center p-6 bg-gray-100 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-gray-700">Email Us</h3>
                <p class="text-gray-600 mt-2">anafatima0717@gmail.com</p>
            </div>
            <div class="text-center p-6 bg-gray-100 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-gray-700">Call Us</h3>
                <p class="text-gray-600 mt-2">+63 9154677338</p>
            </div>
        </div>

        {{-- Contact Form --}}
        <form class="flex flex-col gap-4">
            <input type="text" placeholder="Your Name" required class="w-full p-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
            <input type="email" placeholder="Your Email" required class="w-full p-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
            <input type="text" placeholder="Subject" required class="w-full p-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
            <textarea placeholder="Message" rows="5" required class="w-full p-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500"></textarea>
            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-3 rounded-md text-lg">
                Send Message
            </button>
        </form>
    </div>

</x-navbar-layout>
