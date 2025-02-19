<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANA FATIMA BARROSO Dental Clinic Appointment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js" defer></script>
    <link rel="stylesheet" href="/assets/fontawesome/all.min.css">
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Clinic Logo" class="h-16">
        </a>
        <nav class="flex space-x-12  items-left">
            <!-- <a href="/" class="text-gray-600 hover:text-blue-500">Home</a> -->
            <a href="{{ route('calendar') }}" class="text-lg font-bold text-gray-600 hover:text-blue-500">Calendar
                Schedules</a>
            <a href="{{ route('notifications') }}"
                class="text-lg font-bold text-gray-600 hover:text-blue-500">Notifications</a>
            <a href="{{ route('history') }}" class="text-lg  font-bold  text-gray-600 hover:text-blue-500">History</a>
        </nav>

        <div class="flex items-center justify-between space-x-4">
            <a href="{{ route('appointment') }}" class="bg-teal-500 text-white px-3 py-2 rounded-md hover:bg-teal-700">
                Make a Reservation
            </a>
            <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                   font-medium rounded-lg text-sm px-5 p-4 py-4 text-center inline-flex items-start w-15
                   dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                <svg class="w-2.5 h-2.5  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <div id="dropdownDivider"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg 
                dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                    <a href="{{ route('profile') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Update Profile</a>
                    </li>
                </ul>
                <div class="py-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 
                        dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div>
        {{ $slot }}
    </div>
</body>

</html>
