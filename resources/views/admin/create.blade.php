<x-navbar-layout>

    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-lg rounded-lg my-4 p-6 w-full max-w-lg">
                <h2 class="text-2xl font-semibold mb-4">Add New Administrator</h2>
                
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-2 rounded-md mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Gender</label>
                        <select name="gender" class="w-full p-2 border rounded-md" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Contact</label>
                        <input type="text" name="contact" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">User Type</label>
                        <select name="usertype" class="w-full p-2 border rounded-md" required>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700">Password</label>
                        <input type="password" name="password" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Profile Picture</label>
                        <input type="file" name="photo" class="w-full p-2 border rounded-md" required>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Administrator</button>
                        <a href="" class="bg-gray-500 text-white px-4 py-2 rounded-md">Cancel</a>
                    </div>
                </form>
        </div>
    </div>

</x-navbar-layout>