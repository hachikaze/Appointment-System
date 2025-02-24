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
    <link rel="stylesheet" href="/fontawesome/all.min.css">
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-md p-4 pr-10 pl-10 flex justify-between items-center">
        <a href="/patient/dashboard">
            <img src="{{ asset('images/logo.png') }}" alt="Clinic Logo" class="h-16">
        </a>
        <nav class="flex space-x-12  items-left">
            <!-- <a href="/" class="text-gray-600 hover:text-blue-500">Home</a> -->
            <!-- <a href="{{ route('calendar') }}" class="text-gray-600 hover:text-blue-500">Calendar Schedules</a>
            <a href="{{ route('notifications') }}" class="text-gray-600 hover:text-blue-500">Notifications</a>
            <a href="{{ route('history') }}" class="text-gray-600 hover:text-blue-500">History</a> -->
        </nav>

        <div class="flex items-center justify-between space-x-4">
            <!-- <a href="{{ route('appointment') }}" class="bg-teal-500 text-white px-3 py-2 rounded-md hover:bg-teal-700">
                Make a Reservation
            </a> -->
            <!-- <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-white bg-teal-500 shadow-lg
                   font-medium rounded-lg text-sm px-5 p-4 py-4 text-center inline-flex items-start w-15"
                type="button">
                <svg class="w-2.5 h-2.5  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button> -->
            <div class="relative inline-block text-left">
                <div>
                    <div class="flex items-center gap-3">
                        <button type="button"
                            class="relative p-2 rounded-full bg-white shadow-xs ring-1 ring-gray-300 hover:bg-gray-50">
                            <i class="fa-solid fa-bell text-gray-700"></i>
                            <span
                                class="absolute -top-1 -right-1 flex items-center justify-center h-5 w-5 text-xs font-bold text-white bg-red-500 rounded-full">
                                4
                            </span>
                        </button>

                        <button type="button"
                            class="inline-flex justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                            id="menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleMenu()">
                            Menu
                            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                </div>
                <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                    id="menu-items">
                    <div class="py-1" role="none">
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-0">
                            <i class="fas fa-cog mr-2"></i> Account settings
                        </a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-1">
                            <i class="fas fa-life-ring mr-2"></i> Support
                        </a>
                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                            id="menu-item-2">
                            <i class="fas fa-file-alt mr-2"></i> License
                        </a>
                        <form method="POST" action="{{ route('logout') }}" role="none">
                            @csrf
                            <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm"
                                role="menuitem" tabindex="-1" id="menu-item-3">
                                <i class="fas fa-sign-out-alt mr-2"></i> Sign out
                            </button>
                        </form>
                    </div>

                </div>
            </div>

            <script>
                function toggleMenu() {
                    var menuItems = document.getElementById('menu-items');
                    var isExpanded = menuItems.classList.contains('hidden');
                    menuItems.classList.toggle('hidden');
                    document.getElementById('menu-button').setAttribute('aria-expanded', isExpanded);
                }
            </script>

        </div>
    </header>
    <div>
        {{ $slot }}
    </div>
</body>

</html>
