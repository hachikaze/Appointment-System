<x-navbar-layout>

    <div class="w-full max-w-md mt-20 mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Login</h2>

        @if (session('success'))
            <div class="text-green-500 mb-3">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="bg-red-500 border border-red-400 text-white px-4 py-3 mb-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label class="block mb-2 font-bold text-gray-700">Email:</label>
            <input type="email" name="email" required class="w-full p-2 border rounded mb-3">

            <label class="block mb-2 font-bold text-gray-700">Password:</label>
            <input type="password" name="password" required class="w-full p-2 border rounded mb-3">

            <button type="submit" class="w-full bg-teal-500 text-white p-2 rounded hover:bg-teal-600">
                Login
            </button>
        </form>

        <form action="{{ route('register') }}" method="GET">
            @csrf
            <button type="submit" class="w-full mt-4 bg-blue-500 text-white p-2 rounded hover:bg-teal-600">
                Not yet Registered?
            </button>
        </form>

        <div class="text-center mt-3">
            <a href="" class="text-sm text-gray-500">Forgot password?</a>
        </div>
    </div>

</x-navbar-layout>