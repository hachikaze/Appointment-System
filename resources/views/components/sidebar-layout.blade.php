<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANA FATIMA BARROSO Dental Clinic Appointment</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar Responsive Behavior */
        @media (min-width: 1280px) {
            #sidebar {
                transform: translateX(0) !important;
            }
            
            .main-content {
                margin-left: 18rem !important;
            }
        }

        @media (max-width: 1279px) {
            #sidebar.translate-x-[-100%] {
                transform: translateX(-100%);
            }
            
            #sidebar.translate-x-0 {
                transform: translateX(0);
            }
        }

        /* Overlay */
        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            z-index: 45;
            backdrop-filter: blur(4px);
        }

        .overlay.show {
            display: block;
        }

        /* Navigation Styles */
        .nav-link {
            @apply flex items-center px-4 py-2.5 text-gray-600 transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 rounded-xl;
        }

        .nav-link.active {
            @apply bg-blue-50 text-blue-600 font-medium;
        }

        .dropdown-item {
            @apply flex items-center px-4 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 rounded-xl;
        }

        .sidebar-shadow {
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.05);
        }

        /* Animations */
        @keyframes slideDown {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        [x-show="open"] {
            animation: slideDown 0.2s ease-out;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Enhanced Transitions */
        .transform {
            transition: all 0.3s ease-in-out;
        }

        /* Ensure proper z-index stacking */
        #sidebar {
            z-index: 50;
        }

        .mobile-header {
            z-index: 40;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Overlay -->
    <div id="sidebar-overlay" class="overlay"></div>

    <div class="flex flex-col xl:flex-row relative min-h-screen">
        <!-- Mobile Header -->
        <div class="xl:hidden fixed top-0 left-0 right-0 bg-white shadow-md z-40 px-4 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <img class="h-9 w-9 rounded-full object-cover border-2 border-blue-100" 
                         src="/Images/doctor1.jpg" 
                         alt="User Avatar" />
                    <div class="flex flex-col">
                        <span class="font-medium text-sm text-gray-800">John Doe</span>
                        <span class="text-xs text-gray-500">Administrator</span>
                    </div>
                </div>
                <button type="button" 
                        id="burger-button" 
                        class="text-gray-500 hover:text-gray-700 focus:outline-none p-2 hover:bg-gray-100 rounded-lg transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Sidebar -  -->
        <aside id="sidebar" 
               class="fixed top-0 left-0 w-72 h-screen bg-white border-r flex flex-col justify-between transform transition-transform duration-300 ease-in-out z-50 sidebar-shadow xl:translate-x-0 translate-x-[-100%]">
            <div class="flex flex-col h-full">
                <!-- Logo and Admin Profile Section -->
                <div class="border-b">
                    <!-- Logo -->
                    <div class="flex items-center justify-center py-6">
                        <img class="h-20" src="/Images/logo.png" alt="PRF Logo">
                    </div>
                    <!-- Admin Profile Picture -->
                    <div class="flex justify-center pb-4">
                        <img class="h-24 w-24 rounded-full object-cover border-4 border-blue-100 shadow-md"
                             src="/Images/doctor1.jpg" 
                             alt="Admin Avatar" />
                    </div>
                    <!-- Admin Info -->
                    <div class="text-center pb-6">
                        <h2 class="text-xl font-semibold text-gray-800">John Doe</h2>
                        <p class="text-sm text-gray-600">Administrator</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-4 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all duration-200 {{ request()->is('dashboard') ? 'bg-blue-50 text-blue-600' : '' }}">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="text-base font-medium">Dashboard</span>
                    </a>

                    <!-- Appointments -->
                    <a href="{{ route('appointments.index') }}"
                        class="flex items-center px-4 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all duration-200 {{ request()->is('appointments') ? 'bg-blue-50 text-blue-600' : '' }}">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 01-1-1H5a2 2 0 01-1 1v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="text-base font-medium">Manage Appointments</span>
                    </a>

                    <!-- Calendar -->
                    <a href="#"
                        class="flex items-center px-4 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <span class="text-base font-medium">Calendar</span>
                    </a>

                    <!-- Patient Records -->
                    <a href="#"
                        class="flex items-center px-4 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <span class="text-base font-medium">Patient Records</span>
                    </a>

                    <!-- Graphs Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="w-full flex items-center px-4 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all duration-200">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            <span class="text-base font-medium">Graphs</span>
                            <svg class="w-5 h-5 ml-auto transition-transform duration-200" 
                                 :class="{'rotate-180': open}" 
                                 fill="none" 
                                 stroke="currentColor" 
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Items -->
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="mt-2 space-y-1">
                            
                            <a href="#" class="flex items-center px-11 py-3 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 01-2-2H6a2 2 0 01-2 2v12a2 2 0 012 2z"></path>
                                </svg>
                                <span class="text-sm font-medium">Patient Demographics</span>
                            </a>

                            <a href="#" class="flex items-center px-11 py-3 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                </svg>
                                <span class="text-sm font-medium">Treatment Statistics</span>
                            </a>

                            <a href="#" class="flex items-center px-11 py-3 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span class="text-sm font-medium">Revenue Analysis</span>
                            </a>
                        </div>
                    </div>

                    <!-- Log History -->
                    <a href="#"
                        class="flex items-center px-4 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <span class="text-base font-medium">Log History</span>
                    </a>

                    <!-- Users -->
                    <a href="{{ route('admin.users') }}"
                        class="flex items-center px-4 py-3 text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-all duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <span class="text-base font-medium">Users</span>
                    </a>
                </nav>

                <!-- Logout Section -->
                <div class="border-t p-4">
                    <form id="logout-form" method="POST" action="/logout">
                        @csrf
                        <button type="button" 
                                onclick="showLogoutModal()"
                                class="w-full flex items-center px-4 py-3 text-gray-600 hover:bg-red-50 hover:text-red-600 rounded-xl transition-all duration-200">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span class="text-base font-medium">Log Out</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 xl:ml-72 bg-gray-50 min-h-screen transition-all duration-300">
            <div class="p-6 mt-16 xl:mt-0"> <!-- Adjusted margin for mobile header -->
                <div class="max-w-[2000px] mx-auto">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Logout Modal -->
    <div id="logout-modal" class="fixed inset-0 z-[60] hidden">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 backdrop-filter backdrop-blur-sm transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-lg font-semibold leading-6 text-gray-900">Confirm Logout</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Are you sure you want to log out? You'll need to sign in again to access your account.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" 
                                class="inline-flex w-full justify-center rounded-xl bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto transition-colors duration-200" 
                                onclick="confirmLogout()">
                            Log Out
                        </button>
                        <button type="button" 
                                class="mt-3 inline-flex w-full justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-all duration-200" 
                                onclick="hideLogoutModal()">
                            Cancel
                        </button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Get DOM elements
        const sidebar = document.getElementById('sidebar');
        const burgerButton = document.getElementById('burger-button');
        const overlay = document.getElementById('sidebar-overlay');
        const mainContent = document.querySelector('main');

        // Debug logging
        console.log('Sidebar:', sidebar);
        console.log('Burger Button:', burgerButton);
        console.log('Overlay:', overlay);

        // Toggle mobile menu
        function toggleMobileMenu() {
            console.log('Toggle menu clicked');
            
            if (window.innerWidth < 1280) {
                sidebar.classList.toggle('translate-x-[-100%]');
                sidebar.classList.toggle('translate-x-0');
                overlay.classList.toggle('show');
                document.body.classList.toggle('overflow-hidden');
                
                console.log('Sidebar classes after toggle:', sidebar.classList.toString());
            }
        }

        // Initialize sidebar state
        function handleResponsiveLayout() {
            const isLargeScreen = window.innerWidth >= 1280;
            console.log('Screen width:', window.innerWidth, 'Is large screen:', isLargeScreen);
            
            if (isLargeScreen) {
                sidebar.classList.remove('translate-x-[-100%]');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('show');
                document.body.classList.remove('overflow-hidden');
            } else {
                if (!overlay.classList.contains('show')) {
                    sidebar.classList.add('translate-x-[-100%]');
                    sidebar.classList.remove('translate-x-0');
                }
            }
        }

        // Event Listeners
        burgerButton?.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            toggleMobileMenu();
        });

        overlay?.addEventListener('click', toggleMobileMenu);

        // Handle clicks outside sidebar
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 1280 && 
                !sidebar.contains(e.target) && 
                !burgerButton.contains(e.target) && 
                !sidebar.classList.contains('translate-x-[-100%]')) {
                toggleMobileMenu();
            }
        });

        // Logout Modal Functions
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

        // Handle Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                hideLogoutModal();
                if (!sidebar.classList.contains('translate-x-[-100%]') && window.innerWidth < 1280) {
                    toggleMobileMenu();
                }
            }
        });

        // Handle window resize with debounce
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(handleResponsiveLayout, 100);
        });

        // Handle touch events for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        document.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        document.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, { passive: true });

        function handleSwipe() {
            const SWIPE_THRESHOLD = 50;
            const difference = touchStartX - touchEndX;

            if (Math.abs(difference) < SWIPE_THRESHOLD) return;

            if (window.innerWidth < 1280) {
                if (difference > 0 && !sidebar.classList.contains('translate-x-[-100%]')) {
                    // Swipe left - close sidebar
                    toggleMobileMenu();
                } else if (difference < 0 && sidebar.classList.contains('translate-x-[-100%]')) {
                    // Swipe right - open sidebar
                    toggleMobileMenu();
                }
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', () => {
            handleResponsiveLayout();
            
            // Initialize Alpine.js components if needed
            if (window.Alpine) {
                window.Alpine.start();
            }
        });
    </script>

    @stack('scripts')
</body>
</html>