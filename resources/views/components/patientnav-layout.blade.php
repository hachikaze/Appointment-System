<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ANA FATIMA BARROSO Dental Clinic Appointment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js" defer></script>
    <link rel="stylesheet" href="/fontawesome/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <x-toastr-notification />
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-up {
        animation: fadeUp 0.4s ease-out;
    }

    .grid-bg {
        position: relative;
        min-height: 100vh;
        background-color: white;
        background-image: linear-gradient(#F5F7F8 2px, transparent 1px),
            linear-gradient(90deg, #F5F7F8 2px, transparent 1px);
        background-size: 40px 40px;
    }

    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f3f4f6;
        border-radius: 10px;

    }


    ::-webkit-scrollbar-thumb {
        background: #14b8a6;
        border-radius: 10px;

    }

    ::-webkit-scrollbar-thumb:hover {
        background: #0d9488;
    }

    @keyframes movingGradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .animate-gradient {
        background-size: 200% 200%;
        background-image: linear-gradient(90deg, #14b8a6, #06b6d4, #14b8a6);
        animation: movingGradient 3s infinite linear;
    }
</style>



<body class="bg-gray-100">
    <div class="grid-bg">
        <!-- Header -->
        <header class="bg-white shadow-md p-4 pt-2 sm:pr-10 sm:pl-10 flex justify-between w-full">
            <div class="flex sm:flex-row items-center w-full">
                <a href="/patient/dashboard">
                    <img src="{{ asset('images/logo.png') }}" alt="Clinic Logo"
                        class="h-16 hidden md:flex rounded-xl bg-gradient-to-r from-teal-50 to-blue-50 ">
                </a>

                <!-- Clinic Name with Vertical Line -->
                <div class="hidden md:flex items-center mx-2 space-x-2">
                    <div class="h-12 border-l-2 border-teal-300"></div> <!-- Vertical Line -->
                    <p
                        class="flex flex-col font-bold text-xl ml-4 leading-tight 
                        bg-gradient-to-r from-teal-500 to-cyan-400 bg-clip-text text-transparent animate-gradient">
                        ANA FATIMA BARROSO
                        <span class="whitespace-nowrap">DENTAL CLINIC</span>
                    </p>
                </div>


                <!-- Centered Navigation Links -->
                <div class="hidden sm:flex flex-grow  justify-center space-x-8 pr-28">
                    <a href="/patient/dashboard"
                        class="relative flex items-center gap-2 text-lg font-semibold 
               bg-gradient-to-r from-teal-500 to-cyan-500 bg-clip-text text-transparent
               hover:from-teal-600 hover:to-cyan-500 transition duration-300 
               after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-full after:h-0.5 
               after:bg-gradient-to-r after:from-teal-500 after:to-cyan-400 
               after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100">
                        <i class="fas fa-home"></i> HOME
                    </a>
                    <a href="{{ route('pricing') }}"
                        class="relative flex items-center gap-2 text-lg font-semibold 
               bg-gradient-to-r from-teal-500 to-cyan-500 bg-clip-text text-transparent
               hover:from-teal-600 hover:to-cyan-500 transition duration-300 
               after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-full after:h-0.5 
               after:bg-gradient-to-r after:from-teal-500 after:to-cyan-400 
               after:scale-x-0 after:transition-transform after:duration-300 hover:after:scale-x-100">
                        <i class="fas fa-tag"></i> PRICING
                    </a>
                </div>
            </div>

            <x-notification-modal :approvedApplications="$approvedApplications" />
            
            <div class="flex items-center justify-between space-x-4">
                <div class="relative inline-block text-left">
                    <div>
                        <div class="flex items-center gap-3">
                            <a type="button" data-drawer-target="drawer-right-example"
                                data-drawer-show="drawer-right-example" data-drawer-placement="right"
                                aria-controls="drawer-right-example"
                                class="relative p-2 rounded-full bg-white shadow-xs ring-1 ring-gray-300
                                hover:bg-gray-50">
                                <i class="fa-solid fa-bell  text-teal-600 fa-shake"
                                    style="--fa-animation-duration: 3s;"></i>
                                <span
                                    class="absolute -top-1 -right-1 flex items-center justify-center h-5 w-5 text-xs font-bold text-white bg-red-500 rounded-full">
                                    {{ $notifcount + $messagecount }}
                                </span>
                            </a>

                            <!-- drawer component -->
                            <div id="drawer-right-example"
                                class="fixed top-0 right-0 z-40 h-screen overflow-y-auto transition-transform translate-x-full bg-white xl:w-96 lg:w-80 md:w-72 sm:56"
                                tabindex="-1" aria-labelledby="drawer-right-label">
                                <div class="flex items-center justify-between w-full p-4 bg-teal-500 text-white">
                                    <h2 class="text-xl font-semibold"><a
                                            class="fa-solid fa-bell text-white px-2"></a>Notifications</h2>
                                    <button type="button" data-drawer-hide="drawer-right-example"
                                        aria-controls="drawer-example"
                                        class="text-white text-xl bg-teal-500  hover:bg-gray-600 hover:text-white rounded-lg  w-8 h-8 flex items-center justify-center">
                                        X
                                        <span class="sr-only">Close menu</span>
                                    </button>
                                </div>

                                <div class="h-full bg-teal-50 p-4 pl-2">
                                    <div class="grid grid-cols-1 gap-4 overflow-y-auto p-2">
                                        <div class="relative inline-block my-4">
                                            <button onclick="window.location.href='{{ route('messages') }}'"
                                                class="w-full rounded-lg bg-blue-500 font-bold p-2 text-white transform hover:scale-105 transition-transform duration-200">
                                                <i class="fa-solid fa-envelope px-2"></i>
                                                {{ $messagecount > 0 ? $messagecount . ' Message' . ($messagecount > 1 ? 's' : '') . ' found' : 'No Messages' }}
                                            </button>

                                            @if ($messagecount > 0)
                                                <span
                                                    class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full px-2 py-1 shadow-lg animate-bounce">
                                                    {{ $messagecount }}
                                                </span>
                                            @endif
                                        </div>

                                        @foreach ($notifications as $notifs)
                                            <div
                                                class="relative m-4 p-3 bg-gradient-to-r from-blue-100 to-teal-100 justify-center  border border-teal-500 border-l-4 border-t-0 border-b-0 border-r-0 shadow-lg rounded-md">
                                                <!-- Pulsating Background -->
                                                <span
                                                    class="absolute -top-2 -right-2 h-6 w-6 rounded-full bg-red-500 opacity-75 animate-ping"></span>

                                                <!-- Notification Badge -->
                                                <span
                                                    class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-500 text-white text-sm font-bold shadow-md">
                                                    1
                                                </span>
                                                <div class="p-4 pl-0 text-start">
                                                    <p class="font-bold text-xl text-center text-teal-600">
                                                        <i
                                                            class="fa-solid fa-tooth fa-lg px-2 "></i>{{ $notifs->appointments }}
                                                    </p>
                                                </div>
                                                <div
                                                    class="rounded-lg bg-teal-600 flex items-center justify-center w-fit font-bold text-white mb-2 p-2 mx-auto">
                                                    <p>{{ date('F d, Y', strtotime($notifs->date)) }}</p>
                                                </div>

                                                <p class="text-center">{{ $notifs->time }}</p>
                                                <br>

                                                <?php
                                                $statusClass = match ($notifs->status) {
                                                    'Approved' => ' p-2 bg-green-100 text-green-700 border-green-500',
                                                    'Cancelled' => 'p-2 bg-red-100 text-red-700 border-red-500',
                                                    'Attended' => 'p-2 bg-blue-100 text-blue-700 border-blue-500',
                                                    'Unattended' => 'p-2 bg-red-100 text-red-700 border-red-500',
                                                    'Pending' => 'p-2 bg-orange-100 text-orange-700 border-orange-500',
                                                    default => 'p-2 bg-gray-100 text-gray-700 border-gray-500',
                                                }; ?>
                                                <p
                                                    class="rounded-lg shadow-lg border-l-4 text-center {{ $statusClass }}">
                                                    {{ $notifs->status }} Appointment
                                                </p>

                                                <button onclick="window.location.href='{{ route('history') }}'"
                                                    class="rounded-lg justify-center text-center bg-blue-500 font-bold p-2 w-full my-5 mb-0 text-white transform hover:scale-105 transition-transform duration-200">
                                                    <i class="fa-solid fa-arrow-right px-2"></i> Visit
                                                </button>
                                                <button
                                                    onclick="window.location.href='{{ route('appointment.markAsRead', $notifs->id) }}'"
                                                    class="rounded-lg justify-center text-center bg-red-500 font-bold p-2 w-full my-5 mt-2 text-white transform hover:scale-105 transition-transform duration-200">
                                                    <i class="fa-solid fa-eye px-2"></i> Mark As Read
                                                </button>
                                                <div
                                                    class="bg-teal-500 border-l-4 border-r-4 border-teal-700 text-center justify-center flex items-center text-white rounded-lg p-2">
                                                    {{ $notifs->created_at->format('F j, Y g:i A') }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button type="button"
                                class="inline-flex items-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                id="menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleMenu()">
                                <i class="fa-solid fa-bars"></i>Menu
                            </button>
                        </div>

                    </div>
                    <div class="absolute right-0 z-10 mt-2 w-56 sm:w-72 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                        id="menu-items">

                        <div
                            class="px-4 py-2 bg-gradient-to-r from-teal-100 to-blue-200 rounded-t-md flex items-center gap-3">
                            <img src="{{ $userImage ? asset(path: 'storage/' . $userImage) : asset('images/default-avatar.png') }}"
                                alt="Profile Picture" class="w-14 h-14 rounded-full border border-teal-600 bg-teal-50">

                            <p
                                class="font-semibold text-transparent bg-gradient-to-r from-teal-600 to-blue-800 bg-clip-text">
                                {{ $fullname }}
                            </p>
                        </div>


                        <div class="py-1" role="none">
                            <a href="{{ route('messages') }}" class="text-gray-700 block px-4 py-2 text-sm"
                                role="menuitem" tabindex="-1" id="menu-item-2">
                                <i class="fas fa-envelope text-teal-500 mr-2"></i> Messages
                            </a>

                            <a href="{{ route('profile') }}" class="text-gray-700 block px-4 py-2 text-sm"
                                role="menuitem" tabindex="-1" id="menu-item-2">
                                <i class="fas fa-user text-teal-500 mr-2"></i> Update Profile
                            </a>

                            <!-- Pricing Link (Visible only on small screens) -->
                            <a href="" class="text-gray-700 block px-4 py-2 text-sm sm:hidden" role="menuitem"
                                tabindex="-1" id="menu-item-4">
                                <i class="fas fa-tag text-teal-500 mr-2"></i> Pricing
                            </a>

                            <form method="POST" action="{{ route('logout') }}" role="none">
                                @csrf
                                <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm"
                                    role="menuitem" tabindex="-1" id="menu-item-3">
                                    <i class="fas fa-sign-out-alt text-red-500 mr-2"></i> Sign out
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
    </div>
</body>

</html>
