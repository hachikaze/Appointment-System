<x-patientnav-layout>

    <div class=" h-screen grid grid-cols-1 gap-2 p-10 md:grid-cols-3 md:grid-rows-2 w-full">

        <div class="border-2 rounded-lg shadow-lg bg-white  md:col-span-1 p-4 flex flex-col items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Clinic Logo"
                class="h-40 w-40 border-2 rounded-full m-4 shadow-lg object-contain">


            <h3 class="text-xl font-bold">SERVICES OFFERED</h3>
            <button class="mt-2 bg-blue-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">
                Dental Appointment
            </button>
            <button class="mt-2 bg-green-500 w-full text-white px-4 py-2 rounded hover:bg-green-600">
                View History
            </button>
        </div>

        <div class="border-2 rounded-lg  row-span-3 md:col-span-2 flex justify-center items-center p-2">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.2050300674914!2d121.04021859999999!3d14.587389799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8312ce6011f%3A0x3b9575c6988133e6!2sANA%20FATIMA%20BARROSO%2C%20DMD%20Dental%20Clinic!5e0!3m2!1sen!2sph!4v1739887099838!5m2!1sen!2sph"
                width="100%" height="500" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="mt-6 p-4 border-2 bg-white rounded-lg">
            <h2 class="text-lg font-semibold mb-4">Audit Log</h2>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Date</th>
                            <th class="border border-gray-300 px-4 py-2">User</th>
                            <th class="border border-gray-300 px-4 py-2">Action</th>
                            <th class="border border-gray-300 px-4 py-2">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td class="border border-gray-300 px-4 py-2">2025-02-18</td>
                            <td class="border border-gray-300 px-4 py-2">John Doe</td>
                            <td class="border border-gray-300 px-4 py-2">Login</td>
                            <td class="border border-gray-300 px-4 py-2">User logged in successfully</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">2025-02-17</td>
                            <td class="border border-gray-300 px-4 py-2">Jane Smith</td>
                            <td class="border border-gray-300 px-4 py-2">Update</td>
                            <td class="border border-gray-300 px-4 py-2">Updated account settings</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="border border-gray-300 px-4 py-2">2025-02-16</td>
                            <td class="border border-gray-300 px-4 py-2">Alice Johnson</td>
                            <td class="border border-gray-300 px-4 py-2">Delete</td>
                            <td class="border border-gray-300 px-4 py-2">Deleted a user account</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">2025-02-15</td>
                            <td class="border border-gray-300 px-4 py-2">Bob Williams</td>
                            <td class="border border-gray-300 px-4 py-2">Create</td>
                            <td class="border border-gray-300 px-4 py-2">Added a new user</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</x-patientnav-layout>