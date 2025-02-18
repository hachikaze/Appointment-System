<x-navbar-layout>

    <div class="w-full max-w-md mt-20 mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Forgot Password</h2>

        @if (session('success'))
            <div class="text-green-500 mb-3">{{ session('success') }}</div>
        @endif

        <form action="{{ route('forgot-password-post') }}" method="POST">
            @csrf
            <label for="email" class="block mb-2 text-sm">Email Address:</label>
            <input type="email" name="email" class="w-full p-2 border rounded mb-3" required>

            <button type="submit" class="w-full bg-teal-500 text-white p-2 rounded hover:bg-teal-600">
                Submit
            </button>
        </form>
    </div>

</x-navbar-layout>