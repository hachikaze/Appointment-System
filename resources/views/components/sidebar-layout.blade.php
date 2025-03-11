<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>ANA FATIMA BARROSO Dental Clinic Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Tailwind & Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-teal-50/30 overflow-x-hidden">
    <!-- Mobile Header -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow z-40 px-4 py-3 flex items-center justify-between md:flex lg:hidden sm:flex">
        <div class="flex items-center space-x-3">
            <img src="/Images/doctor1.jpg" alt="User Avatar" class="h-9 w-9 rounded-full object-cover border-2 border-teal-200" />
            <div>
                <span class="block text-teal-800 font-medium text-sm">{{ \Auth::user()->firstname }} {{ \Auth::user()->middleinitial }}. {{ \Auth::user()->lastname }}</span>
                <span class="block text-teal-500 text-xs">@if (Auth::user()->user_type === 'admin') Administrator @else Staff @endif</span>
            </div>
        </div>
        <button type="button"
            id="burger-button"
            class="text-teal-600 p-2 rounded hover:bg-teal-50 hover:text-teal-800 transition md:block lg:hidden sm:block">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </header>
    <!-- Overlay -->
    <div id="sidebar-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 cursor-pointer"></div>
    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 w-72 h-screen bg-white shadow-xl z-50 transform -translate-x-full transition-transform duration-300 lg:translate-x-0 flex flex-col">
        <!-- Logo & Profile -->
        <div class="flex flex-col items-center border-b border-teal-100 px-4 py-6">
            <div class="mb-4">
                <img src="/Images/logo.png" alt="Clinic Logo" class="h-16 object-contain" />
            </div>
            <img src="/Images/doctor1.jpg" alt="Admin Avatar" class="h-24 w-24 rounded-full object-cover border-4 border-teal-100 shadow" />
            <div class="mt-4 text-center">
                <h2 class="text-lg font-semibold text-teal-800">{{ \Auth::user()->firstname }} {{ \Auth::user()->middleinitial }}. {{ \Auth::user()->lastname }}</h2>
                <p class="text-sm text-teal-500">@if (Auth::user()->user_type === 'admin') Administrator @else Staff @endif</p>
            </div>
        </div>
        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto px-4 py-4">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center p-3 rounded-lg hover:bg-teal-50 hover:text-teal-600 text-gray-600 mb-1
                @if (request()->routeIs('admin.dashboard')) bg-teal-50 text-teal-600 font-medium @endif">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Dashboard
            </a>
            <!-- Appointments -->
            <a href="{{ route('appointments.index') }}"
                class="flex items-center p-3 rounded-lg hover:bg-teal-50 hover:text-teal-600 text-gray-600 mb-1
                @if (request()->routeIs('appointments.index')) bg-teal-50 text-teal-600 font-medium @endif">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 01-1-1H5a2 2 0 01-1 1v12a2 2 0 002 2z">
                    </path>
                </svg>
                Manage Appointments
            </a>

            <!-- Manage Slots -->
            <a href="{{ route('admin.appointments.create') }}"
                class="flex items-center p-3 rounded-lg hover:bg-teal-50 hover:text-teal-600 text-gray-600 mb-1
                @if (request()->routeIs('admin.appointments.create')) bg-teal-50 text-teal-600 font-medium @endif">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
                Manage Slots
            </a>
            <!-- Calendar -->
            <a href="{{ route('admin.calendar') }}"
                class="flex items-center p-3 rounded-lg hover:bg-teal-50 hover:text-teal-600 text-gray-600 mb-1
                @if (request()->routeIs('admin.calendar')) bg-teal-50 text-teal-600 font-medium @endif">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                Calendar
            </a>
            <!-- Manage Inventory -->
            <a href="{{ route('admin.inventory') }}"
                class="flex items-center p-3 rounded-lg hover:bg-teal-50 hover:text-teal-600 text-gray-600 mb-1
                @if (request()->routeIs('admin.inventory')) bg-teal-50 text-teal-600 font-medium @endif">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                Manage Inventory
            </a>
            <!-- Patient Records -->
            <a href="{{ route('admin.patient_records') }}" class="flex items-center p-3 rounded-lg hover:bg-teal-50 hover:text-teal-600 text-gray-600 mb-1">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Patient Records
            </a>
            <!-- Graphs Dropdown -->
            <div x-data="{ open: false }" class="mb-1">
                <button @click="open = !open"
                    class="w-full flex items-center p-3 rounded-lg hover:bg-teal-50 hover:text-teal-600 text-gray-600 transition">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                    Graphs and Reports
                    <svg class="w-5 h-5 ml-auto transform transition-transform" :class="open ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown items -->
                <div x-show="open" x-transition class="mt-1 ml-8 space-y-1 bg-white rounded">
                <a href="{{ route('admin.graphs.appointments') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 rounded-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 01-2-2H6a2 2 0 01-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Appointment Analytics
                    </a>
                    <a href="{{ route('admin.reports.status_during_period', ['status' => 'Pending']) }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 rounded-lg {{ request()->routeIs('admin.reports.status_during_period') && request()->status == 'Pending' ? 'bg-teal-50 text-teal-600' : '' }}">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Appointment Status History
                        </a>
                    <a href="{{ route('admin.graphs.inventory') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 rounded-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z">
                            </path>
                        </svg>
                        Inventory Metrics
                    </a>
                    <a href="{{ route('admin.graphs.users') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:bg-teal-50 hover:text-teal-600 rounded-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        User Registration Analytics
                    </a>
                </div>
                </div>
            <!-- Log History -->
            @can('view-logHistory')
                <a href="{{ route('admin.log-history') }}" class="flex items-center p-3 rounded-lg hover:bg-teal-50 hover:text-teal-600 text-gray-600 mb-1">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Log History
                </a>
            @endcan

            @can('view-users')
                <!-- Users -->
                <a href="{{ route('admin.users') }}" 
                    class="flex items-center p-3 rounded-lg hover:bg-teal-50 hover:text-teal-600 text-gray-600 mb-1
                    @if (request()->routeIs('admin.users')) bg-teal-50 text-teal-600 font-medium @endif">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    Users
                </a>
            @endcan
        </nav>
        <!-- Logout at the bottom -->
        <div class="border-t border-teal-100 px-4 py-3">
            <form id="logout-form" method="POST" action="/logout">
                @csrf
                <button type="button" onclick="showLogoutModal()"
                    class="flex items-center w-full px-3 py-2 text-gray-600 rounded-lg hover:bg-red-50 hover:text-red-600 transition">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Log Out
                </button>
            </form>
        </div>
    </aside>
    <!-- Main content area -->
    <main class="lg:ml-72 pt-16 lg:pt-0 min-h-screen">
        <div class="p-6 max-w-[2000px] mx-auto">
            <div class="bg-white rounded-lg shadow-md border border-teal-100 p-6">
                {{ $slot }}
            </div>
        </div>
    </main>
    <!-- Logout Modal -->
    <div id="logout-modal" class="hidden fixed inset-0 z-50">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 backdrop-blur-sm"></div>
        <div class="fixed inset-0 flex items-center justify-center px-4 py-6">
            <div class="bg-white rounded-xl shadow-lg max-w-md w-full overflow-hidden border border-teal-100">
                <div class="px-4 pt-5 pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Confirm Logout</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to log out? You'll need to sign in again to access your account.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse border-t border-teal-100">
                    <button type="button"
                        class="w-full inline-flex justify-center rounded-xl bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-500 sm:ml-3 sm:w-auto border border-red-700 shadow-sm"
                        onclick="confirmLogout()">
                        Log Out
                    </button>
                    <button type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-xl bg-white px-4 py-2 text-sm font-medium text-gray-700 ring-1 ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                        onclick="hideLogoutModal()">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const burgerButton = document.getElementById('burger-button');
        const overlay = document.getElementById('sidebar-overlay');
        
        function toggleSidebar() {
            const isOpen = !sidebar.classList.contains('-translate-x-full');
            if (isOpen) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            }
            document.body.classList.toggle('overflow-hidden');
        }
        
        // Burger button click
        burgerButton?.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleSidebar();
        });
        
        // Overlay click
        overlay?.addEventListener('click', toggleSidebar);
        
        // Click outside
        document.addEventListener('click', (e) => {
            if (
                window.innerWidth < 1024 && // For mobile and tablet
                !sidebar.contains(e.target) &&
                !burgerButton.contains(e.target) &&
                !sidebar.classList.contains('-translate-x-full')
            ) {
                toggleSidebar();
            }
        });
        
        // Resize handler
        window.addEventListener('resize', () => {
            const width = window.innerWidth;
            if (width >= 1024) { // Desktop
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            } else { // Mobile and Tablet
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
        
        // Initialize sidebar state on page load
        window.addEventListener('load', () => {
            const width = window.innerWidth;
            if (width < 1024) {
                sidebar.classList.add('-translate-x-full');
            }
        });
        
        // Logout functions
        function showLogoutModal() {
            document.getElementById('logout-modal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
        
        function hideLogoutModal() {
            document.getElementById('logout-modal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        
        function confirmLogout() {
            document.getElementById('logout-form').submit();
        }
        
        // ESC key handler
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                hideLogoutModal();
                if (!sidebar.classList.contains('-translate-x-full') && window.innerWidth < 1024) {
                    toggleSidebar();
                }
            }
        });
    </script>
    @stack('scripts')
    <!-- Screen Size Indicator (Optional - for debugging) -->
    <div class="fixed bottom-0 right-0 bg-teal-800 text-white p-2 text-sm z-50">
        <span class="sm:hidden">Mobile View (Hidden Sidebar)</span>
        <span class="hidden sm:inline md:inline lg:hidden">Medium View (Burger Menu)</span>
        <span class="hidden lg:inline">Large View (Fixed Sidebar)</span>
    </div>
</body>
</html>