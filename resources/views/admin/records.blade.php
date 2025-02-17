<x-navbar-layout>

    <div class="flex">

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-100">
            <div class="flex justify-between items-center border-b pb-4">
                <h1 class="text-2xl font-semibold">Administrator Records</h1>
                <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">New Administrator</button>
            </div>

            <!-- Table -->
            <div class="bg-white shadow-md rounded mt-6 overflow-hidden">
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600">
                            <th class="px-4 py-2 border">PHOTO</th>
                            <th class="px-4 py-2 border">NAME</th>
                            <th class="px-4 py-2 border">GENDER</th>
                            <th class="px-4 py-2 border">EMAIL/CONTACT</th>
                            <th class="px-4 py-2 border">USERTYPE</th>
                            <th class="px-4 py-2 border">PASSWORD</th>
                            <th class="px-4 py-2 border">DATE ADDED</th>
                            <th class="px-4 py-2 border">TOOLS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Data (Replace with Laravel data from controller) -->
                        <tr class="text-center">
                            <td class="border px-4 py-2 flex justify-center items-center">
                                <img src="images/doctor1.jpg" alt="Admin Photo" class="rounded-full w-14 h-14 object-cover">
                            </td>
                            <td class="border px-4 py-2">Kendrick Lamar</td>
                            <td class="border px-4 py-2">Male</td>
                            <td class="border px-4 py-2">kendricklamar@example.com</td>
                            <td class="border px-4 py-2"><span class="bg-blue-500 text-white px-2 py-1 rounded">Admin</span></td>
                            <td class="border px-4 py-2">******</td>
                            <td class="border px-4 py-2">2025-02-17</td>
                            <td class="border px-4 py-2">
                                <button class="bg-gray-500 text-white px-2 py-1 rounded">View</button>
                                <button class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Modal -->
    <div id="adminModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Add New Administrator</h2>
            <form>
                <label class="block">Name</label>
                <input type="text" class="w-full border p-2 rounded mb-2">

                <label class="block">Gender</label>
                <select class="w-full border p-2 rounded mb-2">
                    <option>Male</option>
                    <option>Female</option>
                </select>

                <label class="block">Email</label>
                <input type="email" class="w-full border p-2 rounded mb-2">

                <label class="block">Contact</label>
                <input type="text" class="w-full border p-2 rounded mb-2">

                <label class="block">User Type</label>
                <select class="w-full border p-2 rounded mb-2">
                    <option>Admin</option>
                    <option>Staff</option>
                </select>

                <label class="block">Password</label>
                <input type="password" class="w-full border p-2 rounded mb-2">

                <label class="block">Photo</label>
                <input type="file" class="w-full border p-2 rounded mb-2">

                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Administrator</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("adminModal").classList.remove("hidden");
        }
        
        function closeModal() {
            document.getElementById("adminModal").classList.add("hidden");
        }
    </script>

</x-navbar-layout>