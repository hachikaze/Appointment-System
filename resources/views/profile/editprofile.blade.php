<x-patientnav-layout>



    <!-- 2-Column Form Section -->



    <form action="{{ route('profile.update', $authUser->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div
            class="relative w-full bg-gradient-to-r from-teal-400 to-teal-700 h-64 py-10 flex justify-center items-center">
            <div class="relative w-48 h-48 top-1/2 transform -translate-y-1/6">
                <label for="avatarUpload"
                    class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 transition-opacity rounded-full cursor-pointer group">
                    <img id="avatarPreview"
                        src="{{ $authUser->image_path ? asset('storage/' . $authUser->image_path) : asset('images/default-avatar.png') }}"
                        class="w-48 h-48 rounded-full border-4 border-white bg-gray-400 shadow-lg object-cover">

                    <div
                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-camera text-teal-500 text-3xl"></i>
                    </div>
                </label>
                <input type="file" id="avatarUpload" name="image" class="hidden" accept="image/*"
                    onchange="previewImage(event)">
                <script>
                    function previewImage(event) {
                        const input = event.target;
                        const preview = document.getElementById('avatarPreview');

                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
            </div>
        </div>

        <div class="max-w-7xl mx-auto bg-white  mt-12 shadow-xl rounded-lg">
            @if ($errors->any())
                <div class="bg-red-100 border-2 border-red-500 text-white p-4 my-4 rounded">
                    <ul>
                        <li class="text-red-500">{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif
            <div class="p-0 bg-teal-500 p-4 text-2xl text-white font-bold rounded-t-lg ">
                <i class="fa-solid fa-pen ml-4 mr-4"></i> Edit Profile
            </div>
            <div class="grid grid-cols-1 p-4 md:grid-cols-2 gap-6 ">
                <div class="border-l-4 p-4 shadow-lg rounded-lg border-teal-500">
                    <label class="block text-gray-700 font-semibold text-md">First Name</label>
                    <input type="text" name="firstname"
                        class="w-full p-3 border border-gray-400 rounded-md focus:ring-2 focus:ring-teal-500"
                        placeholder="Enter first name" value="{{ old('firstname', $authUser->firstname) }}">

                    <label class="block text-gray-700 font-semibold text-md mt-4">Middle Initial</label>
                    <input type="text" name="middleinitial"
                        class="w-full p-3 border border-gray-400 rounded-md focus:ring-2 focus:ring-teal-500"
                        placeholder="Enter first name" value="{{ old('middleinitial', $authUser->middleinitial) }}">

                    <label class="block text-gray-700 font-semibold mt-4">Email</label>
                    <input type="email" name="email"
                        class="w-full p-3 border border-gray-400 rounded-md focus:ring-2 focus:ring-teal-500"
                        value="{{ old('email', $authUser->email) }}" readonly>
                </div>

                <!-- Right Column -->
                <div class="p-4 shadow-lg rounded-lg border-teal-500">
                    <label class="block text-gray-700 font-semibold">Last Name</label>
                    <input type="text" name="lastname"
                        class="w-full p-3 border border-gray-400 rounded-md focus:ring-2 focus:ring-teal-500"
                        placeholder="Enter last name" value="{{ old('lastname', $authUser->lastname) }}">

                    <label class="block text-gray-700 font-semibold mt-4">Gender</label>
                    <select class="w-full p-3 border border-gray-400 rounded-md focus:ring-2 focus:ring-teal-500"
                        name="gender">
                        <option value="{{ ucwords($authUser->gender) }}" disabled selected>
                            {{ ucwords($authUser->gender) }}
                        </option>
                        <option value="male" {{ $authUser->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $authUser->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $authUser->gender == 'other' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>
            </div>
            <div class="mt-6 p-4 flex flex-col sm:flex-row justify-center sm:justify-between text-center gap-4">
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
