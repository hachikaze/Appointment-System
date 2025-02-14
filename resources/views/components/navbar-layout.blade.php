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
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Clinic Logo" class="h-12">
        </a>
        <nav class="flex space-x-4 items-center">
            <a href="/" class="text-gray-600 hover:text-blue-500">Home</a>
            <a href="/about" class="text-gray-600 hover:text-blue-500">About</a>
            <a href="/doctor" class="text-gray-600 hover:text-blue-500">Doctors</a>
            <a href="/contact" class="text-gray-600 hover:text-blue-500">Contact</a>
            <a href="/login" class="text-gray-600 hover:text-blue-500">Login</a>
            <a href="/appointment" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-700">
                Make an Appointment
            </a>
        </nav>
    </header>

    <div>
        {{ $slot }}
    </div>
</body>
</html>