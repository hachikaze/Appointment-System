<x-navbar-layout>
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-teal-50 to-white py-16">
        <div class="absolute top-0 left-0 w-full h-64 bg-teal-50 transform -skew-y-6"></div>
        
        <!-- Doctor Section -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-teal-600 font-semibold text-lg mb-4 block">Meet Our Expert</span>
                <h1 class="text-4xl font-bold text-gray-900 mb-6">
                    Our Distinguished Doctor
                </h1>
                <div class="w-24 h-1 bg-teal-500 mx-auto mb-8"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Providing exceptional dental care with expertise and compassion
                </p>
            </div>

            <!-- Doctor Card -->
            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover-card">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/2">
                            <img src="{{ asset('images/doctor1.jpg') }}" 
                                 alt="Dr. Ana Fatima Barroso"
                                 class="w-full h-full object-cover object-center"
                                 style="min-height: 400px;">
                        </div>
                        <div class="md:w-1/2 p-8">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-2xl font-bold text-gray-900">Dr. Ana Fatima Barroso</h2>
                                    <p class="text-teal-600 font-medium">General Dentist, Orthodontics, Cosmetic Dentist</p>
                                </div>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-teal-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                    <span class="text-gray-600">10+ Years of Experience</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-teal-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    <span class="text-gray-600">Specialized in Advanced Dental Procedures</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-teal-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                    </svg>
                                    <span class="text-gray-600">Continuous Professional Development</span>
                                </div>
                            </div>

                            <div class="mt-8">
                                <a href="/appointment" 
                                   class="inline-flex items-center px-6 py-3 bg-teal-500 text-white font-semibold rounded-lg 
                                          transition-all duration-300 hover:bg-teal-600 hover:shadow-lg">
                                    Book an Appointment
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Staff Section -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-32">
            <div class="text-center mb-16">
                <span class="text-teal-600 font-semibold text-lg mb-4 block">Our Team</span>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Meet Our Professional Staff
                </h2>
                <div class="w-24 h-1 bg-teal-500 mx-auto mb-8"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Dedicated professionals committed to providing you with the best dental care experience
                </p>
            </div>

            <!-- Staff Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    [
                        'name' => 'Jovielyn Estioco',
                        'role' => 'Dental Assistant',
                        'image' => 'staff1.jpg',
                        'description' => 'Experienced dental assistant dedicated to patient care and comfort.'
                    ],
                    [
                        'name' => 'Jennifer Vanguardia',
                        'role' => 'Front Desk Officer',
                        'image' => 'staff2.jpg',
                        'description' => 'Friendly and efficient, ensuring smooth clinic operations.'
                    ],
                    [
                        'name' => 'John Mark Paulo Estioco',
                        'role' => 'Dental Assistant',
                        'image' => 'staff3.jpg',
                        'description' => 'Skilled professional with attention to detail.'
                    ],
                    [
                        'name' => 'Kevin Clark Afable',
                        'role' => 'Dental Assistant',
                        'image' => 'staff4.jpg',
                        'description' => 'Committed to providing excellent patient support.'
                    ]
                ] as $staff)
                <div class="group">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 
                                hover:shadow-2xl hover:-translate-y-2">
                        <div class="relative">
                            <img src="{{ asset('images/doctor1.jpg') }}" 
                                 alt="{{ $staff['name'] }}"
                                 class="w-full h-64 object-cover object-center">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent 
                                      opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $staff['name'] }}</h3>
                                    <p class="text-teal-600 font-medium">{{ $staff['role'] }}</p>
                                </div>
                                <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <p class="text-gray-600 mb-4">{{ $staff['description'] }}</p>
                            
                            <div class="flex items-center space-x-3">
                                <a href="#" class="text-gray-400 hover:text-teal-500 transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-teal-500 transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-teal-500 transition-colors duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Team Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20">
                <div class="text-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl font-bold text-teal-500 mb-2">4+</div>
                    <div class="text-gray-600">Team Members</div>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl font-bold text-teal-500 mb-2">5+</div>
                    <div class="text-gray-600">Years Experience</div>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl font-bold text-teal-500 mb-2">1000+</div>
                    <div class="text-gray-600">Happy Patients</div>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl font-bold text-teal-500 mb-2">100%</div>
                    <div class="text-gray-600">Satisfaction Rate</div>
                </div>
            </div>

            <!-- Join Our Team CTA -->
            <div class="mt-20 bg-gradient-to-r from-teal-500 to-teal-600 rounded-3xl shadow-xl p-12 text-center">
                <h3 class="text-3xl font-bold text-white mb-4">Join Our Growing Team</h3>
                <p class="text-teal-100 text-lg mb-8 max-w-2xl mx-auto">
                    We're always looking for talented and passionate individuals to join our dental family. 
                    If you're committed to providing exceptional patient care, we'd love to hear from you.
                </p>
                <a href="/careers" 
                   class="inline-flex items-center px-8 py-4 bg-white text-teal-600 font-semibold rounded-xl 
                          transition-all duration-300 hover:bg-teal-50 hover:scale-105 hover:shadow-lg">
                    View Career Opportunities
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <style>
        .hover-card {
            transition: all 0.3s ease;
        }
        
        .hover-card:hover {
            transform: translateY(-5px);
        }

        .staff-image-hover {
            transition: all 0.3s ease;
        }

        .staff-card:hover .staff-image-hover {
            transform: scale(1.05);
        }
    </style>

    <x-chatbot/>
    <x-footer/>
</x-navbar-layout>