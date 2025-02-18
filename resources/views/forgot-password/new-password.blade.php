<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Fatima Barroso Dental Clinic</title>
    @vite('resources/css/app.css') 
</head>
<body class="h-full">

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Reset Password</h2>
        </div>

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">

            @if (session('error'))
                <x-alert-error>
                    <div class="alert alert-danger text-xs">
                        {!! session('error') !!}
                    </div>
                </x-alert-error>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('reset-password-post') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label for="email" class="block text-sm">Email Address</label>

                    <input type="email" 
                           name="email" 
                           id="email" 
                           placeholder="example@example.com" 
                           :value="old('email')"
                           class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 shadow-lg" />

                    <x-form-error name="email" />
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm">Password</label>
                    </div>

                    <input type="password" 
                           name="password" 
                           id="password" 
                           placeholder="Your Password" 
                           class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 shadow-lg" />

                    <x-form-error name="password" />
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm">Confirm Password</label>
                    </div>

                    <input type="password" 
                           name="password_confirmation" 
                           id="password_confirmation" 
                           placeholder="Your Password" 
                           class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 shadow-lg" />

                    <x-form-error name="password_confirmation" />
                </div>

                <button type="submit" class="w-full bg-teal-500 text-white p-2 rounded hover:bg-teal-600">
                    Confirm
                </button>
            </form>
        </div>
    </div>

</body>
</html>