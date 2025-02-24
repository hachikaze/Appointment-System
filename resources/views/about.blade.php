<x-navbar-layout>
    <style>
   
        .gradient-bg {
            background: linear-gradient(135deg, #e6fffa 0%, #ffffff 100%);
        }

        .hover-card {
            transition: all 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .testimonial-card {
            position: relative;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -20px;
            left: 20px;
            font-size: 80px;
            color: #99f6e4;
            font-family: serif;
            opacity: 0.3;
        }
    </style>

    <!-- Hero Section  -->
    <div class="relative overflow-hidden bg-gradient-to-b from-teal-50 to-white py-16">
        <div class="absolute top-0 left-0 w-full h-64 bg-teal-50 transform -skew-y-6"></div>
        
        <!-- Main Content Container -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-16 relative">
                <span class="text-teal-600 font-semibold text-lg mb-4 block">Welcome to</span>
                <h1 class="text-5xl font-bold text-gray-900 mb-6">
                    About ANA FATIMA BARROSO
                    <span class="block text-teal-600 mt-2">Dental Clinic</span>
                </h1>
                <div class="w-32 h-1 bg-teal-500 mx-auto mb-8 rounded-full"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Where advanced dental care meets compassionate service. Our mission is to provide 
                    exceptional dental care in a comfortable and welcoming environment.
                </p>
            </div>

            <!-- Main Content Box -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden mb-20">
                <div class="flex flex-col lg:flex-row">
                    <!-- Image Section with Overlay -->
                    <div class="lg:w-1/2 relative">
                        <img src="{{ asset('images/clinic.jpg') }}"
                             alt="Clinic Image"
                             class="w-full h-full object-cover object-center"
                             style="min-height: 500px;">
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-500/20 to-transparent"></div>
                        
                        <!-- Floating Stats -->
                        <div class="absolute bottom-4 left-4 right-4 flex justify-around">
                            <div class="bg-white/90 backdrop-blur-sm rounded-lg p-4 shadow-lg">
                                <div class="text-2xl font-bold text-teal-600">10+</div>
                                <div class="text-sm text-gray-600">Years Experience</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm rounded-lg p-4 shadow-lg">
                                <div class="text-2xl font-bold text-teal-600">1000+</div>
                                <div class="text-sm text-gray-600">Happy Patients</div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="lg:w-1/2 p-8 lg:p-12">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">
                            Experience Excellence in Dental Care
                        </h2>
                        
                        <p class="text-gray-600 mb-8 leading-relaxed">
                            At ANA FATIMA BARROSO Dental Clinic, we combine state-of-the-art technology 
                            with gentle, personalized care. Our commitment to your oral health goes beyond 
                            treating teeth – we create beautiful, confident smiles that last a lifetime.
                        </p>

                        <!-- Enhanced Features List -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center p-4 bg-teal-50 rounded-xl hover-card">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-1">Excellence in Patient Care</h3>
                                    <p class="text-gray-600">Unparalleled commitment to your comfort and satisfaction</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-teal-50 rounded-xl hover-card">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-1">Modern Facilities</h3>
                                    <p class="text-gray-600">State-of-the-art equipment and sterilization protocols</p>
                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-teal-50 rounded-xl hover-card">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-1">Expert Team</h3>
                                    <p class="text-gray-600">Highly qualified professionals with years of experience</p>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced CTA Button -->
                        <div class="mt-8">
                            <a href="/contact" 
                               class="inline-flex items-center px-8 py-4 bg-teal-500 
                                      text-white font-semibold rounded-xl 
                                      transition-all duration-300 transform 
                                      hover:bg-teal-600 hover:scale-105 hover:shadow-lg 
                                      focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                                Schedule Consultation
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-20">
                <!-- Service Card 1 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover-card">
                    <div class="w-16 h-16 bg-teal-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Advanced Technology</h3>
                    <p class="text-gray-600">Utilizing the latest dental technology for precise diagnostics and treatments.</p>
                </div>

                <!-- Service Card 2 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover-card">
                    <div class="w-16 h-16 bg-teal-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Convenient Hours</h3>
                    <p class="text-gray-600">Flexible scheduling options to accommodate your busy lifestyle.</p>
                </div>

                <!-- Service Card 3 -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover-card">
                    <div class="w-16 h-16 bg-teal-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Patient-Centered Care</h3>
                    <p class="text-gray-600">Personalized treatment plans tailored to your unique needs.</p>
                </div>
            </div>

            <!-- Testimonials Section -->
            <div class="bg-white rounded-3xl shadow-xl p-12 mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Patient Testimonials</h2>
                    <div class="w-24 h-1 bg-teal-500 mx-auto"></div>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Testimonial Card 1 -->
                    <div class="testimonial-card bg-gradient-to-br from-teal-50 to-white p-8 rounded-2xl shadow-lg">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-teal-200 rounded-full flex items-center justify-center">
                                <span class="text-teal-700 font-bold text-2xl">J</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-xl font-semibold text-gray-900">John Doe</h4>
                                <p class="text-teal-600">Regular Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-lg italic leading-relaxed">
                            "Outstanding dental care and professional staff. The clinic's modern facilities 
                            and attention to patient comfort made my visits pleasant and stress-free."
                        </p>
                    </div>

                    <!-- Testimonial Card 2 -->
                    <div class="testimonial-card bg-gradient-to-br from-teal-50 to-white p-8 rounded-2xl shadow-lg">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-teal-200 rounded-full flex items-center justify-center">
                                <span class="text-teal-700 font-bold text-2xl">M</span>
                                </div>
                            <div class="ml-4">
                                <h4 class="text-xl font-semibold text-gray-900">Maria Garcia</h4>
                                <p class="text-teal-600">New Patient</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-lg italic leading-relaxed">
                            "The online appointment system is so convenient, and the dental team is incredibly 
                            skilled and friendly. I've found my permanent dental clinic!"
                        </p>
                    </div>
                </div>
            </div>

            <!-- Call to Action Section -->
            <div class="relative overflow-hidden rounded-3xl">
                <div class="absolute inset-0 bg-teal-500 opacity-90"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-teal-600 to-teal-400"></div>
                
                <div class="relative px-8 py-16 text-center">
                    <div class="max-w-3xl mx-auto">
                        <h2 class="text-4xl font-bold text-white mb-6">
                            Ready to Transform Your Smile?
                        </h2>
                        <p class="text-teal-50 text-lg mb-10 leading-relaxed">
                            Take the first step towards better dental health. Book your appointment today 
                            and experience our exceptional care in a comfortable, modern environment.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="/register" 
                               class="inline-flex items-center justify-center px-8 py-4 
                                      bg-white text-teal-600 font-semibold rounded-xl 
                                      transition-all duration-300 transform 
                                      hover:bg-teal-50 hover:scale-105 hover:shadow-lg">
                                Book Appointment
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </a>
                            
                            <a href="/contact" 
                               class="inline-flex items-center justify-center px-8 py-4 
                                      bg-teal-600 text-white font-semibold rounded-xl 
                                      border-2 border-white transition-all duration-300 
                                      hover:bg-teal-700 hover:scale-105 hover:shadow-lg">
                                Contact Us
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Decorative Elements -->
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-teal-300 rounded-full opacity-20"></div>
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-teal-300 rounded-full opacity-20"></div>
            </div>

            <!-- Why Choose Us Section -->
            <div class="mt-20 mb-16">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose Us</h2>
                    <div class="w-24 h-1 bg-teal-500 mx-auto mb-6"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Experience the difference with our comprehensive approach to dental care
                    </p>
                </div>

                <div class="grid md:grid-cols-4 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg hover-card">
                        <div class="w-14 h-14 bg-teal-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Quality Care</h3>
                        <p class="text-gray-600">Highest standards of dental treatment and patient care</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg hover-card">
                        <div class="w-14 h-14 bg-teal-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Timely Service</h3>
                        <p class="text-gray-600">Prompt appointments and minimal waiting times</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg hover-card">
                        <div class="w-14 h-14 bg-teal-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Modern Facility</h3>
                        <p class="text-gray-600">State-of-the-art equipment and comfortable environment</p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg hover-card">
                        <div class="w-14 h-14 bg-teal-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Expert Staff</h3>
                        <p class="text-gray-600">Highly trained and experienced dental professionals</p>
                    </div>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-20">
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Contact Card 1 -->
                    <div class="flex items-center p-6 bg-teal-50 rounded-xl hover-card">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Visit Us</h3>
                            <p class="text-gray-600">123 Dental Street, City, State 12345</p>
                        </div>
                    </div>

                    <!-- Contact Card 2 -->
                    <div class="flex items-center p-6 bg-teal-50 rounded-xl hover-card">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Call Us</h3>
                            <p class="text-gray-600">8715-5170</p>
                        </div>
                    </div>

                    <!-- Contact Card 3 -->
                    <div class="flex items-center p-6 bg-teal-50 rounded-xl hover-card">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Opening Hours</h3>
                            <p class="text-gray-600">Monday - Saturday: 9AM - 6PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<x-chatbot />

<x-footer />
</x-navbar-layout>
                