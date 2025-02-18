<x-alert-layout>
    <div class="max-w-xl mx-auto w-full p-8 rounded-lg shadow-lg bg-white flex flex-col overflow-hidden">
        <div class="flex flex-col items-center mb-6">
            <h2 class="text-2xl text-gray-700 font-bold self-start mb-6">Verify Your Email Address</h2>
            <p class="text-gray-500 self-start">
                Thank you for signing up! To complete your registration, please verify your email address by clicking the button below:
            </p>
        </div>

        <div class="flex mx-auto mb-6">
            <a href="{{ $verificationUrl }}" 
               class="mr-10 px-6 py-2 text-white bg-gray-500 rounded shadow hover:bg-gray-700 transition duration-300">
                Verify Email Address
            </a>
        </div>

        <p class="text-gray-500 self-start mb-6">
            If you did not create an account, no further action is required. You can safely ignore this email.
        </p>

        <p class="text-gray-500 self-start">Regards,</p>
        <p class="text-gray-500 self-start">The Pasig River Ferry Team</p>

        <hr class="my-6">

        <p class="text-gray-500 self-start">
            Trouble clicking the button? Copy and paste the link below into your browser:
        </p>
        <p class="break-all">
            <a href="{{ $verificationUrl }}">{{ $verificationUrl }}</a>
        </p>
    </div>
</x-alert-layout>