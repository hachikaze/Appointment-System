<x-navbar-layout>

    <div class="">
        <div class="w-full max-w-md mt-20 mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center mb-4">Login</h2>
            <form action="" method="POST">
                @csrf

                <label class="block mb-2 font-bold text-gray-700">Email:</label>
                <input type="email" name="email" required class="w-full p-2 border rounded mb-3">

                <label class="block mb-2 font-bold text-gray-700">Password:</label>
                <input type="password" name="password" required class="w-full p-2 border rounded mb-3">

                <button type="submit" class="w-full bg-teal-500 text-white p-2 rounded hover:bg-teal-600">
                    Login
                </button>
            </form>
            <div class="text-center mt-3">
                <a href="" class="text-sm text-gray-500">Forgot password?</a>
            </div>
        </div>
    </div>

</x-navbar-layout>