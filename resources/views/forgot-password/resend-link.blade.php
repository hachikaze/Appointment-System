<x-alert-layout>
    <div class="w-full max-w-md px-8 py-6 border-2 border-blue-500 rounded-lg shadow-lg bg-white flex flex-col text-center space-y-6 overflow-hidden">
        <div class="flex flex-col items-center">
            <img src="images/logo.png" class="w-14 mb-4" alt="Notice">
            <h2 class="text-2xl text-blue-500 font-bold">Password Reset Link has already been sent</h2>
            <p class="text-sm text-gray-700">Do you want to resend it? Click the send button</p>
        </div>

        <div class="flex flex-row mx-auto">
            <a href="{{ route('login') }}" class="mr-10 px-6 py-2 text-white bg-gray-500 rounded-lg shadow hover:bg-blue-600 transition duration-300">Cancel</a>
            <form action="{{ route('resend-password-reset-link') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <button class="px-8 py-2 text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600 transition duration-300" type="submit">Send</button>
            </form> 
        </div>
    </div>
</x-alert-layout>
