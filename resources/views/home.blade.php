<x-navbar-layout>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    </head>

    {{-- Top Header with Enhanced Design --}}
    <header class="bg-teal-500 text-white py-4 px-6">
        <div class="container mx-auto">
            <div class="flex justify-center items-center space-x-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">Monday - Saturday, 9AM - 6PM</span>
                </div>
                <span class="hidden md:inline">|</span>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <a href="tel:8715-5170" class="hover:text-white font-medium">Call us now: 8715-5170</a>
                </div>
            </div>
        </div>
    </header>

    {{-- Hero Section with Improved Design --}}
    <section class="relative bg-gradient-to-b from-gray-50 to-white">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-teal-100 rounded-full opacity-20"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-teal-100 rounded-full opacity-20"></div>
        </div>

        <!-- Main Content -->
        <div class="relative container mx-auto px-4 py-20">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                <!-- Text Content -->
                <div class="flex-1 text-center lg:text-left max-w-2xl mx-auto lg:mx-0">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6 leading-tight">
                        Welcome to 
                        <span class="text-teal-600">ANA FATIMA BARROSO</span>
                        <span class="block mt-2">DENTAL CLINIC APPOINTMENT</span>
                    </h1>
                    
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Discover a seamless healthcare experience with our modern dental services. 
                        Your journey to better dental health begins here with our expert care and 
                        state-of-the-art facilities.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#" class="inline-flex items-center justify-center px-8 py-3 
                                        bg-teal-500 text-white rounded-lg font-semibold
                                        transform transition-all duration-300
                                        hover:bg-teal-600 hover:scale-105 hover:shadow-lg">
                            Book Appointment
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                        <a href="#" class="inline-flex items-center justify-center px-8 py-3 
                                        bg-white text-teal-500 rounded-lg font-semibold
                                        border-2 border-teal-500
                                        transform transition-all duration-300
                                        hover:bg-teal-50 hover:scale-105">
                            Learn More
                        </a>
                    </div>

                    <!-- Features -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mt-12">
                        <div class="flex items-center space-x-2 text-gray-600">
                            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Expert Dentists</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-600">
                            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Modern Equipment</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-600">
                            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Emergency Care</span>
                        </div>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="flex-1 w-full max-w-2xl lg:max-w-none">
                    <div class="relative">
                        <img src="{{ asset('images/clinic.jpg') }}" 
                             alt="Doctor operating in a clinic"
                             class="rounded-2xl shadow-2xl w-full object-cover"
                             style="height: 500px;">
                        <div class="absolute inset-0 rounded-2xl bg-teal-500 opacity-10"></div>
                    </div>
                    </div>
            </div>
        </div>
    </section>

    {{-- Statistics Section --}}
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center">
                    <div class="text-4xl font-bold text-teal-500 mb-2">1000+</div>
                    <div class="text-gray-600">Happy Patients</div>
                </div>
                <!-- Stat 2 -->
                <div class="text-center">
                    <div class="text-4xl font-bold text-teal-500 mb-2">10+</div>
                    <div class="text-gray-600">Years Experience</div>
                </div>
                <!-- Stat 3 -->
                <div class="text-center">
                    <div class="text-4xl font-bold text-teal-500 mb-2">50+</div>
                    <div class="text-gray-600">Dental Services</div>
                </div>
                <!-- Stat 4 -->
                <div class="text-center">
                    <div class="text-4xl font-bold text-teal-500 mb-2">24/7</div>
                    <div class="text-gray-600">Online Support</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Preview Section --}}
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Dental Services</h2>
                <div class="w-24 h-1 bg-teal-500 mx-auto"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:scale-105">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">General Dentistry</h3>
                        <p class="text-gray-600">Comprehensive dental care for all your basic needs, including cleanings and check-ups.</p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:scale-105">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Cosmetic Dentistry</h3>
                        <p class="text-gray-600">Enhance your smile with our range of cosmetic dental procedures and treatments.</p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:scale-105">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Emergency Care</h3>
                        <p class="text-gray-600">Quick response and treatment for dental emergencies when you need it most.</p>
                    </div>
                </div>
            </div>

            <!-- View All Services Button -->
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center justify-center px-8 py-3 
                                  bg-teal-500 text-white rounded-lg font-semibold
                                  transform transition-all duration-300
                                  hover:bg-teal-600 hover:scale-105 hover:shadow-lg">
                    View All Services
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Call to Action Section --}}
    <section class="bg-teal-500 py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="text-white text-center md:text-left mb-8 md:mb-0">
                    <h2 class="text-3xl font-bold mb-4">Ready to Schedule Your Visit?</h2>
                    <p class="text-teal-100">Book your appointment today and take the first step towards better dental health.</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#" class="inline-flex items-center justify-center px-8 py-3 
                                    bg-white text-teal-500 rounded-lg font-semibold
                                    transform transition-all duration-300
                                    hover:bg-teal-50 hover:scale-105">
                        Book Appointment
                    </a>
                    <a href="#" class="inline-flex items-center justify-center px-8 py-3 
                                    bg-teal-600 text-white rounded-lg font-semibold
                                    transform transition-all duration-300
                                    hover:bg-teal-700 hover:scale-105">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Choose Us Section --}}
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Why Choose Us</h2>
                <div class="w-24 h-1 bg-teal-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Experience exceptional dental care with our team of professionals dedicated to your oral health and comfort.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Advanced Technology</h3>
                    <p class="text-gray-600">State-of-the-art equipment for precise and comfortable treatments</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Convenient Hours</h3>
                    <p class="text-gray-600">Flexible scheduling to fit your busy lifestyle</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Expert Team</h3>
                    <p class="text-gray-600">Experienced professionals committed to your care</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Patient Comfort</h3>
                    <p class="text-gray-600">Ensuring a relaxing and comfortable experience</p>
                </div>
            </div>
        </div>
    </section>

    
    <style>
        html {
            scroll-behavior: smooth;
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .custom-gradient {
            background: linear-gradient(135deg, #e6fffa 0%, #ffffff 100%);
        }
    </style>
    <x-chatbot />

    <x-footer />
</x-navbar-layout>