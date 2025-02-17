<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasig River Ferry</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="font-inter">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar for desktop, collapsible on mobile -->
        <aside class="fixed top-0 left-0 w-52 h-screen px-3 py-6 bg-white border-r dark:bg-teal-900 dark:border-teal-700 flex flex-col justify-between">
            <!-- Logo Section -->
            <div>
                <div class="flex items-center justify-center mb-4">
                    <img class="w-28 h-28" src="/Images/doctor1.jpg" alt="PRF Logo">
                </div>

                <!-- Navigation Links -->
                <nav class="mt-4">
                    <x-nav-link href="" :active="request()->is('dashboard')" class="flex items-center">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                            <path d="M13 12C13 11.4477 13.4477 11 14 11H19C19.5523 11 20 11.4477 20 12V19C20 19.5523 19.5523 20 19 20H14C13.4477 20 13 19.5523 13 19V12Z" stroke="#9ca3af" stroke-width="2" stroke-linecap="round"></path>
                            <path d="M4 5C4 4.44772 4.44772 4 5 4H9C9.55228 4 10 4.44772 10 5V12C10 12.5523 9.55228 13 9 13H5C4.44772 13 4 12.5523 4 12V5Z" stroke="#9ca3af" stroke-width="2" stroke-linecap="round"></path>
                            <path d="M4 17C4 16.4477 4.44772 16 5 16H9C9.55228 16 10 16.4477 10 17V19C10 19.5523 9.55228 20 9 20H5C4.44772 20 4 19.5523 4 19V17Z" stroke="#9ca3af" stroke-width="2" stroke-linecap="round"></path>
                            <path d="M13 5C13 4.44772 13.4477 4 14 4H19C19.5523 4 20 4.44772 20 5V7C20 7.55228 19.5523 8 19 8H14C13.4477 8 13 7.55228 13 7V5Z" stroke="#9ca3af" stroke-width="2" stroke-linecap="round"></path>
                        </svg>
                        <span class="mx-3 font-medium">Dashboard</span>
                    </x-nav-link>

                    <x-nav-link href="" :active="request()->is('patientrecords')" class="flex items-center">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                            <path d="M4 17.5L3 12L12 9L21 12L20 17.5M5 11.3333V7C5 5.89543 5.89543 5 7 5H17C18.1046 5 19 5.89543 19 7V11.3333M10 5V3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5M2 21C3 22 6 22 8 20C10 22 14 22 16 20C18 22 21 22 22 21" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="mx-3 font-medium">Patient Records</span>
                    </x-nav-link>

                    <x-nav-link href="" :active="request()->is('graphs')" class="flex items-center">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                            <path d="M9 20L3 17V4L9 7M9 20L15 17M9 20V7M15 17L21 20V7L15 4M15 17V4M9 7L15 4" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="mx-3 font-medium">Graphs</span>
                    </x-nav-link>

                        <hr class="my-4 border-teal-200 dark:border-teal-600" />
                        <x-nav-link href="" :active="request()->is('calendar')" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="w-5 h-5">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <rect x="6.48" y="18" width="5.76" height="11.52" rx="1" ry="1" 
                                        fill="#9ca3af"></rect>
                                    <rect x="15.12" y="6.48" width="5.76" height="23.04" rx="1" ry="1" 
                                        fill="#9ca3af"></rect>
                                    <rect x="23.76" y="14.16" width="5.76" height="15.36" rx="1" ry="1" 
                                        fill="#9ca3af"></rect>
                                </g>
                            </svg>
                            <span class="mx-3 font-medium">Calendar</span>
                        </x-nav-link>

                    <x-nav-link href="" :active="request()->is('loghistory')" class="flex items-center">
                        <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path id="secondary" d="M13,7.13A3.66,3.66,0,0,0,12,7a4,4,0,1,0,3.46,6" 
                                    style="fill: none; stroke: #9ca3af; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                <path id="secondary-2" data-name="secondary" d="M12,15h0a5,5,0,0,0-5,5v1H17V20A5,5,0,0,0,12,15Zm5-6h4M19,7v4" 
                                    style="fill: none; stroke: #9ca3af; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                <path id="primary" d="M21,15v5a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H19" 
                                    style="fill: none; stroke: #9ca3af; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                            </g>
                        </svg>
                        <span class="mx-3 font-medium">Log History</span>
                    </x-nav-link>

                    <x-nav-link href="" :active="request()->is('users')" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#9ca3af" viewBox="0 0 24 24" class="w-5 h-5">
                            <g id="SVGRepo_bgCarrier" stroke-width="2"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-opacity="1" d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path>
                            </g>
                        </svg>
                        <span class="mx-3 font-medium">Users</span>
                    </x-nav-link>

                    <div>
                        <hr class="my-4 border-teal-200 dark:border-teal-600" />
                        <form id="logout-form" method="POST" action="/logout">
                            @csrf
                            <button type="button" class="flex items-center pl-3.5 pr-16 py-2 text-gray-600 dark:text-gray-400 hover:bg-teal-100 dark:hover:bg-teal-800 hover:text-teal-700 dark:hover:text-teal-200 transition-colors duration-300 transform rounded-md" onclick="showLogoutModal()">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M15 12L6 12M6 12L8 14M6 12L8 10" stroke="#9ca3af" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 21.9827C10.4465 21.9359 9.51995 21.7626 8.87865 21.1213C8.11027 20.3529 8.01382 19.175 8.00171 17M16 21.9983C18.175 21.9862 19.3529 21.8897 20.1213 21.1213C21 20.2426 21 18.8284 21 16V14V10V8C21 5.17157 21 3.75736 20.1213 2.87868C19.2426 2 17.8284 2 15 2H14C11.1715 2 9.75733 2 8.87865 2.87868C8.11027 3.64706 8.01382 4.82497 8.00171 7" stroke="#9ca3af" stroke-width="2.5" stroke-linecap="round"></path>
                                        <path d="M3 9.5V14.5C3 16.857 3 18.0355 3.73223 18.7678C4.46447 19.5 5.64298 19.5 8 19.5M3.73223 5.23223C4.46447 4.5 5.64298 4.5 8 4.5" stroke="#9ca3af" stroke-width="2.5" stroke-linecap="round"></path>
                                    </g>
                                </svg>
                                <span class="mx-3 font-medium">Log Out</span>
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
        <main class="flex-auto bg-white">
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
            <button class="bg-teal-300 hover:bg-teal-400 text-teal-800 font-semibold py-2 px-3 rounded" onclick="hideLogoutModal()">Cancel</button>     
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
    
    @stack('scripts')
</body>
</html>
