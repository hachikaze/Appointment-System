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
</style>



<body class="bg-gray-100">
    <div class="grid-bg">
        <!-- Header -->
        <header class="bg-white shadow-md p-4 pt-2 pr-10 pl-10 flex justify-between items-center">
            <div class="flex sm:flex-row items-center space-x-4">
                <a href="/patient/dashboard">
                    <img src="{{ asset('images/logo.png') }}" alt="Clinic Logo" class="h-16 rounded-xl bg-teal-50">
                </a>
                <p class="hidden sm:block font-bold text-2xl text-teal-500">ANNA FATIMA <span class="">DENTAL
                        CLINIC</span></p>
            </div>
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
                                    {{ $notifcount }}
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

                                <div class="bg-teal-50 p-4 pl-2">
                                    <div class="grid grid-cols-1 gap-4 overflow-y-auto p-2">
                                        @foreach ($notifications as $notifs)
                                            <div
                                                class="m-4 p-3 bg-white justify-center  border border-teal-300 border-l-4 border-t-0 border-b-0 border-r-0 shadow-lg rounded-md">

                                                <div class="p-4 pl-0 text-start">
                                                    <p class="font-bold text-xl text-center text-teal-500">
                                                        <i
                                                            class="fa-solid fa-tooth fa-lg px-2 "></i>{{ $notifs->appointments }}
                                                    </p>
                                                </div>
                                                <div
                                                    class="rounded-lg bg-teal-500 flex items-center justify-center w-fit font-bold text-white mb-2 p-2 mx-auto">
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
                                                };
                                                ?>
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
                    <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                        id="menu-items">
                        <div class="py-1" role="none">
                            <a href="{{ route('messages') }}" class="text-gray-700 block px-4 py-2 text-sm"
                                role="menuitem" tabindex="-1" id="menu-item-2">
                                <i class="fas fa-envelope text-teal-500 mr-2"></i> Messages
                            </a>

                            <a href="{{ route('profile') }}" class="text-gray-700 block px-4 py-2 text-sm"
                                role="menuitem" tabindex="-1" id="menu-item-2">
                                <i class="fas fa-user text-teal-500 mr-2"></i> Update Profile
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
