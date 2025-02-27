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
</style>



<body class="bg-gray-100">
    <div class="grid-bg">
        <!-- Header -->
        <header class="bg-white shadow-md p-4 pr-10 pl-10 flex justify-between items-center">
            <a href="/patient/dashboard">
                <img src="{{ asset('images/logo.png') }}" alt="Clinic Logo" class="h-16">
            </a>
            <div class="flex items-center justify-between space-x-4">
                <div class="relative inline-block text-left">
                    <div>
                        <div class="flex items-center gap-3">
                            <a data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                                class="relative p-2 rounded-full bg-white shadow-xs ring-1 ring-gray-300 hover:bg-gray-50">
                                <i class="fa-solid fa-bell text-gray-700"></i>
                                <span
                                    class="absolute -top-1 -right-1 flex items-center justify-center h-5 w-5 text-xs font-bold text-white bg-red-500 rounded-full">
                                    4
                                </span>
                            </a>


                            <!-- drawer component -->
                            <div id="drawer-example"
                                class="fixed top-0 left-0 z-40 shadow-lg  h-screen p-0 overflow-y-auto transition-transform-translate-x-full bg-white lg:w-96 md:72 sm:56 "
                                tabindex="-1" aria-labelledby="drawer-label">
                                <div class="flex items-center justify-between w-full p-4 bg-teal-500 text-white">
                                    <h2 class="text-xl font-semibold"><a
                                            class="fa-solid fa-bell text-white px-2"></a>Notifications</h2>
                                    <button type="button" data-drawer-hide="drawer-example"
                                        aria-controls="drawer-example"
                                        class="text-gray-400 text-xl bg-teal-500 text-white hover:bg-gray-600 hover:text-white rounded-lg text-sm w-8 h-8 flex items-center justify-center">
                                        X
                                        <span class="sr-only">Close menu</span>
                                    </button>
                                </div>

                                <div class="p-4 pl-2">

                                    <div class="grid grid-cols-1 gap-4">
                                        @foreach ($notifications as $notifs)
                                            <div
                                                class="m-4 p-3 bg-white justify-center  border border-teal-300 border-l-4 border-t-0 border-b-0 border-r-0 shadow-lg rounded-md">
                                                <div class="p-4 pl-0 text-start">
                                                    <p class="font-bold text-xl text-center text-teal-500">
                                                        <i
                                                            class="fa-solid fa-tooth fa-lg px-2"></i>{{ $notifs->appointments }}
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
                                                    'Approved' => ' p-4 bg-green-100 text-green-700 border-green-500',
                                                    'Cancelled' => 'p-4 bg-red-100 text-red-700 border-red-500',
                                                    'Attended' => 'p-4 bg-blue-100 text-blue-700 border-blue-500',
                                                    'Unattended' => 'p-4 bg-red-100 text-red-700 border-red-500',
                                                    'Pending' => 'p-4 bg-orange-100 text-orange-700 border-orange-500',
                                                    default => 'p-4 bg-gray-100 text-gray-700 border-gray-500',
                                                };
                                                ?>
                                                <p
                                                    class="rounded-lg shadow-lg border-l-4 text-center {{ $statusClass }}">
                                                    {{ $notifs->status }}</p>
                                                <button
                                                    class="rounded-lg justify-center text-center bg-blue-500 font-bold p-2 w-full my-5 text-white ">
                                                    <i class="fa-solid fa-eye px-2 "></i>Visit
                                                </button>

                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>

                            <button type="button"
                                class="inline-flex justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                id="menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleMenu()">
                                Menu
                            </button>
                        </div>

                    </div>
                    <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                        id="menu-items">
                        <div class="py-1" role="none">
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                tabindex="-1" id="menu-item-0">
                                <i class="fas fa-cog mr-2"></i> Account settings
                            </a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                tabindex="-1" id="menu-item-1">
                                <i class="fas fa-life-ring mr-2"></i> Support
                            </a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                tabindex="-1" id="menu-item-2">
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
    </div>
</body>

</html>
