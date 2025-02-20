<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANA FATIMA BARROSO Dental Clinic Appointment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="font-inter">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar for desktop, collapsible on mobile -->
        <aside class="fixed top-0 left-0 w-52 h-screen px-2 py-3 bg-white border-r flex flex-col justify-between rounded">
            <!-- Logo Section -->
            <div>
                <div class="flex items-center justify-center mb-4">
                    <img class="h-16" src="/Images/logo.png" alt="PRF Logo">
                </div>

                <!-- Navigation Links -->
                <nav class="mt-4">
                    <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->is('dashboard')" class="flex items-center">
                        <span class="mx-3 text-sm font-medium">Dashboard</span>
                    </x-nav-link>

                    <x-nav-link href="{{ route('appointments.index') }}" :active="request()->is('boats')" class="flex items-center">
                        <span class="mx-3 text-sm font-medium">Manage Appointments</span>
                    </x-nav-link>

                    <x-nav-link href="" :active="request()->is('boats')" class="flex items-center">
                        <span class="mx-3 text-sm font-medium">Calendar</span>
                    </x-nav-link>

                    <x-nav-link href="" :active="request()->is('map')" class="flex items-center">
                        <span class="mx-3 text-sm font-medium">Patient Records</span>
                    </x-nav-link>

                    <div class="relative group">
                        <x-nav-link href="#" onclick="toggleDropdown(event)" :active="request()->is('reports')" class="flex items-center cursor-pointer">
                            <span class="mx-3 text-sm font-medium">Graphs</span>
                        </x-nav-link>

                        <div class="absolute left-0 w-full bg-white shadow-xl z-50 hidden" id="graphsDropdown">
                            <ul class="py-2 border-2 border-solid rounded-md">
                                <li>
                                    <a href="" class="block px-3 py-2 text-sm text-gray-700 transition duration-300 hover:bg-gray-400 rounded-md">
                                        Brrt
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-3 py-2 text-sm text-gray-700 transition duration-300 hover:bg-gray-400 rounded-md">
                                        Brrt
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-3 py-2 text-sm text-gray-700 transition duration-300 hover:bg-gray-400 rounded-md">
                                        Brrt
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-3 py-2 text-sm text-gray-700 transition duration-300 hover:bg-gray-400 rounded-md">
                                        Brrt
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-3 py-2 text-sm text-gray-700 transition duration-300 hover:bg-gray-400 rounded-md">
                                        Brrt
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-3 py-2 text-sm text-gray-700 transition duration-300 hover:bg-gray-400 rounded-md">
                                        Brrt
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="block px-3 py-2 text-sm text-gray-700 transition duration-300 hover:bg-gray-400 rounded-md">
                                        Brrt
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <x-nav-link href="" :active="request()->is('users')" class="flex items-center">
                        <span class="mx-3 text-sm font-medium">Log History</span>
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.users') }}" :active="request()->is('schedules')" class="flex items-center">
                        <span class="mx-3 text-sm font-medium">Users</span>
                    </x-nav-link>

                    <div>
                        <hr class="my-4 border-gray-200 dark:border-gray-600" />
                        <form id="logout-form" method="POST" action="/logout">
                            @csrf
                            <button type="button" class="flex items-center pl-3.5 pr-16 py-2 text-gray-600 dark:text-gray-400 hover:bg-teal-100 dark:hover:bg-teal-800 hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-300 transform rounded-md" onclick="showLogoutModal()">
                                <span class="mx-3 text-sm font-medium">Log Out</span>
                            </button>
                        </form>
                    </div>
                </nav>
            </div>

            <!-- User Information at Bottom -->
            <a href="" class="flex items-center px-1 mx-4 mt-4">
                <img class="object-cover rounded-full h-8 w-8" src="/Images/doctor1.jpg" alt="User Avatar" />
                <span class="mx-2 font-medium text-sm text-gray-800 dark:text-gray-200">John Doe</span>
            </a>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-auto bg-white ml-52">
            <header class="bg-white shadow-md rounded-b-md">
                <div class="p-4 md:p-6 text-center">
                    <h1 class="text-lg md:text-2xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
                </div>
            </header>

            <div>
                {{ $slot }}
            </div>
        </main>
    </div>
    
    <!-- Logout Modal -->
    <x-modal-layout id="logout-modal" class="hidden">
        <h2 class="text-lg font-semibold mb-3">Confirm Logout</h2>
        <p class="mb-3">Are you sure you want to log out?</p>
        <div class="flex justify-end">
            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-3 rounded mr-2" onclick="confirmLogout()">Log Out</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-3 rounded" onclick="hideLogoutModal()">Cancel</button>     
        </div>
    </x-modal-layout>
    
    <script>
        function showLogoutModal() {
            document.getElementById('logout-modal').classList.remove('hidden');
        }
        
        function hideLogoutModal() {
            document.getElementById('logout-modal').classList.add('hidden');
        }
        
        function confirmLogout() {
            document.getElementById('logout-form').submit();
        }
    </script>

    <script>
        function toggleDropdown(event) {
            event.preventDefault();
            const dropdown = document.getElementById('graphsDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close the dropdown if clicked outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('graphsDropdown');
            const isClickInside = dropdown.parentElement.contains(event.target);

            if (!isClickInside) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
