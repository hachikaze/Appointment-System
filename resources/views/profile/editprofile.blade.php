<x-patientnav-layout>

    <div class="relative w-full bg-gradient-to-r from-teal-400 to-teal-700 h-64 py-10 flex justify-center items-center">
        <div class="relative w-48 h-48 top-1/2 transform -translate-y-1/6">
            <label for="avatarUpload"
                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 transition-opacity rounded-full cursor-pointer group">
                <img id="avatarPreview" src="https://via.placeholder.com/100"
                    class="w-48 h-48 rounded-full border-4 border-white bg-gray-400 shadow-lg object-cover">
                <div
                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-camera text-white text-3xl"></i>
                </div>
            </label>
            <input type="file" id="avatarUpload" class="hidden" accept="image/*" onchange="previewImage(event)">
        </div>


        <!-- FORM 2 COLS -->


    </div>

    <!-- 2-Column Form Section -->
    <div class="max-w-7xl mx-auto bg-white  p-6 mt-12 shadow-lg rounded-lg">
        <form>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-semibold">First Name</label>
                    <input type="text"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500"
                        placeholder="Enter first name">

                    <label class="block text-gray-700 font-semibold mt-4">Email</label>
                    <input type="email"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500"
                        placeholder="Enter email">

                    <label class="block text-gray-700 font-semibold mt-4">Phone</label>
                    <input type="tel"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500"
                        placeholder="Enter phone number">
                </div>

                <!-- Right Column -->
                <div>
                    <label class="block text-gray-700 font-semibold">Last Name</label>
                    <input type="text"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500"
                        placeholder="Enter last name">

                    <label class="block text-gray-700 font-semibold mt-4">Gender</label>
                    <input type="text"
                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500"
                        placeholder="Enter Gender">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex flex-col sm:flex-row justify-center sm:justify-between text-center gap-4">
                <button type="button" onclick="window.location.href='{{ route('patient.dashboard') }}'"
                    class="w-full sm:w-auto bg-red-500 text-white font-bold py-3 px-6 rounded-md hover:bg-red-600 transition">
                    Cancel
                </button>
                <button type="submit"
                    class="w-full sm:w-auto bg-teal-500 text-white font-bold py-3 px-6 rounded-md hover:bg-teal-600 transition">
                    Save Changes
                </button>
            </div>

        </form>
    </div>



</x-patientnav-layout>