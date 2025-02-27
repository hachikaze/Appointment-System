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

</head>

    <style>
        .hamburger {
            cursor: pointer;
            width: 24px;
            height: 24px;
            position: relative;
        }

        .hamburger-line {
            background: #374151;
            height: 2px;
            width: 24px;
            position: absolute;
            transition: all 0.3s ease;
        }

        .hamburger-line:nth-child(1) { top: 4px; }
        .hamburger-line:nth-child(2) { top: 11px; }
        .hamburger-line:nth-child(3) { top: 18px; }

        .hamburger.active .hamburger-line:nth-child(1) {
            transform: rotate(45deg);
            top: 11px;
        }

        .hamburger.active .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active .hamburger-line:nth-child(3) {
            transform: rotate(-45deg);
            top: 11px;
        }

        /* Navigation Link Hover Effect */
        .nav-link {
            position: relative;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: #0D9488;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        @media (max-width: 768px) {
            #nav-menu {
                transition: all 0.3s ease-in-out;
                transform: translateY(-100%);
                opacity: 0;
            }

            #nav-menu.show {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-inter">
    <!-- Header -->
    <header class="bg-white shadow-md fixed w-full top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="/" class="flex-shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Clinic Logo" class="h-14">
                </a>

                <!-- Hamburger Menu Button -->
                <button id="mobile-menu-button" class="md:hidden hamburger focus:outline-none">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>

                <!-- Navigation Menu -->
                <nav id="nav-menu" class="hidden md:flex md:items-center fixed md:relative top-20 md:top-0 left-0 md:left-auto w-full md:w-auto bg-white md:bg-transparent shadow-lg md:shadow-none">
                    <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-6 p-6 md:p-0">
                        <!-- Regular Navigation Links -->
                        <a href="/" class="nav-link text-gray-600 hover:text-teal-600 font-medium">Home</a>
                        <a href="/about" class="nav-link text-gray-600 hover:text-teal-600 font-medium">About</a>
                        <a href="/doctor" class="nav-link text-gray-600 hover:text-teal-600 font-medium">Doctors</a>
                        <a href="/contact" class="nav-link text-gray-600 hover:text-teal-600 font-medium">Contact</a>
                        
                        <!-- Button Container -->
                        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                            <!-- Login Button -->
                            <a href="/login" 
                               class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-2.5 rounded-md 
                                      transition-all duration-300 ease-in-out transform hover:scale-105 
                                      hover:shadow-lg shadow-md text-center font-medium">
                                Login
                            </a>
                            <!-- Register Button -->
                            <a href="{{ route('register') }}" 
                               class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2.5 rounded-md 
                                      transition-all duration-300 ease-in-out transform hover:scale-105 
                                      hover:shadow-lg shadow-md text-center font-medium">
                                Register
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-20">
        <div>
            {{ $slot }}
        </div>
    </main>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const navMenu = document.getElementById('nav-menu');

        function toggleMenu() {
            mobileMenuButton.classList.toggle('active');
            navMenu.classList.toggle('hidden');
            navMenu.classList.toggle('show');
        }

        mobileMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMenu();
        });

        document.addEventListener('click', (event) => {
            if (!navMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                mobileMenuButton.classList.remove('active');
                navMenu.classList.add('hidden');
                navMenu.classList.remove('show');
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                mobileMenuButton.classList.remove('active');
                navMenu.classList.remove('hidden');
                navMenu.classList.remove('show');
            } else {
                navMenu.classList.add('hidden');
                navMenu.classList.remove('show');
            }
        });

        navMenu.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    </script>
</body>
</html>