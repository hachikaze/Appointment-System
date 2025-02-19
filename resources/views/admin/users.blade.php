<x-sidebar-layout>

    <x-slot:heading>
        Administrator Records
    </x-slot:heading>

    <div class="flex">

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="flex justify-end items-center border-b pb-4">
                <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">New Staff User</button>
            </div>

            <!-- Table -->
            <div class="bg-white shadow-md rounded mt-6 overflow-hidden">
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600">
                            <th class="px-4 py-2 text-sm border">PHOTO</th>
                            <th class="px-4 py-2 text-sm  border">NAME</th>
                            <th class="px-4 py-2 text-sm  border">EMAIL/CONTACT</th>
                            <th class="px-4 py-2 text-sm  border">GENDER</th>
                            <th class="px-4 py-2 text-sm  border">USERTYPE</th>
                            <th class="px-4 py-2 text-sm  border">DATE ADDED</th>
                            <th class="px-4 py-2 text-sm  border">TOOLS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td class="border px-4 py-2 flex justify-center items-center">
                                    <img src="images/doctor1.jpg" alt="Admin Photo" class="rounded-full w-10 h-10 object-cover">
                                </td>
                                <td class="border text-xs px-4 py-2">{{ $user->name }}</td>
                                <td class="border text-xs px-4 py-2">{{ $user->email }}</td>
                                <td class="border text-xs px-4 py-2">{{ $user->gender }}</td>
                                <td class="border text-xs px-4 py-2"><span class="bg-blue-500 text-white px-2 py-1 rounded">{{ $user->user_type }}</span></td>
                                <td class="border text-xs px-4 py-2">{{ $user->created_at->format('Y-m-d') }}</td>
                                <td class="border text-xs px-4 py-2">
                                    <button class="bg-gray-500 text-white px-2 py-1 rounded">View</button>
                                    <button class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                                    <button class="bg-red-500 text-white px-2 py-1 rounded">Disable</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-2">
            <strong>Whoops! Something went wrong.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Modal -->
    <div id="adminModal" class="py-4 fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-1/3 max-h-full overflow-y-auto custom-scrollbar">
            <h2 class="text-xl font-semibold mb-4">Add New Administrator</h2>
            <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                @csrf
                <label class="block">First Name</label>
                <input type="text" name="firstname" class="w-full border p-2 rounded mb-2">

                <label class="block">Middle Initial</label>
                <input type="text" name="middleinitial" class="w-full border p-2 rounded mb-2">

                <label class="block">Last Name</label>
                <input type="text" name="lastname" class="w-full border p-2 rounded mb-2">

                <label class="block">Gender</label>
                <select name="gender" class="w-full border p-2 rounded mb-2">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

                <label class="block">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded mb-2">

                <label class="block">User Type</label>
                <select name="user_type" class="w-full border p-2 rounded mb-2">
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                </select>

                <label class="block">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded mb-2">

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

</x-sidebar-layout>