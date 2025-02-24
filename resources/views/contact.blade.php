<x-navbar-layout>
    <!-- Custom Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

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

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .contact-input:focus {
            box-shadow: 0 0 0 2px rgba(13, 148, 136, 0.2);
        }
    </style>

    <!-- Hero Section  -->
    <div class="relative overflow-hidden bg-gradient-to-b from-teal-50 to-white py-20">
        <div class="absolute top-0 left-0 w-full h-64 bg-teal-50 transform -skew-y-6"></div>
        
        <!-- Main Content Container -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-16 relative">
                <span class="text-teal-600 font-medium text-lg mb-4 block tracking-wide">Get in Touch</span>
                <h1 class="text-5xl font-bold text-gray-900 mb-6 tracking-tight">
                    Contact Us
                    <span class="block text-teal-600 mt-2 text-3xl font-medium">We're Here to Help</span>
                </h1>
                <div class="w-32 h-1 bg-gradient-to-r from-teal-500 to-teal-400 mx-auto mb-8 rounded-full"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-light">
                    Have questions or need assistance? Our friendly team is here to help you with any inquiries 
                    about our dental services and treatments.
                </p>
            </div>

            <!-- Contact Information Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <!-- Address Card -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 
                            transform hover:-translate-y-2 hover:bg-gradient-to-b hover:from-white hover:to-teal-50">
                    <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-teal-400 to-teal-500 
                                rounded-2xl mb-6 mx-auto transform rotate-3 hover:rotate-6 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 text-center mb-2">Visit Our Clinic</h3>
                    <p class="text-gray-600 text-center font-light">
                        605 9 de Febrero St. Brgy,<br>
                        Pleasant Hills Mandaluyong City
                    </p>
                    <a href="https://maps.google.com" target="_blank" 
                       class="mt-6 text-teal-500 hover:text-teal-600 flex items-center justify-center 
                              group font-medium">
                        Get Directions
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
                                <!-- Email Card -->
                                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 
                            transform hover:-translate-y-2 hover:bg-gradient-to-b hover:from-white hover:to-teal-50">
                    <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-teal-400 to-teal-500 
                                rounded-2xl mb-6 mx-auto transform -rotate-3 hover:rotate-6 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 text-center mb-2">Email Us</h3>
                    <p class="text-gray-600 text-center font-light">anafatima0717@gmail.com</p>
                    <a href="mailto:anafatima0717@gmail.com" 
                       class="mt-6 text-teal-500 hover:text-teal-600 flex items-center justify-center 
                              group font-medium">
                        Send Email
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>

                <!-- Phone Card -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 
                            transform hover:-translate-y-2 hover:bg-gradient-to-b hover:from-white hover:to-teal-50">
                    <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-teal-400 to-teal-500 
                                rounded-2xl mb-6 mx-auto transform rotate-3 hover:rotate-6 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 text-center mb-2">Call Us</h3>
                    <p class="text-gray-600 text-center font-light">+63 9154677338</p>
                    <a href="tel:+639154677338" 
                       class="mt-6 text-teal-500 hover:text-teal-600 flex items-center justify-center 
                              group font-medium">
                        Call Now
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <!-- Form -->
                    <div class="md:w-2/3 p-8 lg:p-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-8">Send Us a Message</h2>
                        <form class="space-y-6">
                            <div class="space-y-5">
                                <div class="relative">
                                    <label class="text-gray-600 mb-2 block font-medium">Your Name</label>
                                    <input type="text" 
                                           required
                                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 
                                                  focus:ring-teal-500 focus:border-transparent transition-all duration-300
                                                  placeholder-gray-400 font-light"
                                           placeholder="John Doe">
                                </div>

                                <div class="relative">
                                    <label class="text-gray-600 mb-2 block font-medium">Your Email</label>
                                    <input type="email" 
                                           required
                                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 
                                                  focus:ring-teal-500 focus:border-transparent transition-all duration-300
                                                  placeholder-gray-400 font-light"
                                           placeholder="john@example.com">
                                </div>
                                <div class="relative">
                                    <label class="text-gray-600 mb-2 block font-medium">Subject</label>
                                    <input type="text" 
                                           required
                                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 
                                                  focus:ring-teal-500 focus:border-transparent transition-all duration-300
                                                  placeholder-gray-400 font-light"
                                           placeholder="How can we help?">
                                </div>

                                <div class="relative">
                                    <label class="text-gray-600 mb-2 block font-medium">Message</label>
                                    <textarea rows="5" 
                                              required
                                              class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 
                                                     focus:ring-teal-500 focus:border-transparent transition-all duration-300
                                                     placeholder-gray-400 font-light"
                                              placeholder="Your message here..."></textarea>
                                </div>
                            </div>

                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-teal-500 to-teal-600 text-white font-semibold 
                                           py-4 rounded-xl hover:from-teal-600 hover:to-teal-700 
                                           transition-all duration-300 transform hover:scale-[1.02]
                                           focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2
                                           shadow-lg hover:shadow-xl flex items-center justify-center">
                                <span>Send Message</span>
                                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- Info Sidebar -->
                    <div class="md:w-1.5/3 bg-gradient-to-b from-teal-500 to-teal-600 p-8 lg:p-12 text-white">
                        <h3 class="text-2xl font-bold mb-8">Contact Information</h3>
                        
                        <div class="space-y-8">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 bg-teal-400 bg-opacity-20 p-3 rounded-lg">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-1">Opening Hours</h4>
                                    <p class="text-teal-100 font-light">
                                        Monday - Saturday: 9:00 AM - 6:00 PM<br>
                                        Sunday: Closed
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 bg-teal-400 bg-opacity-20 p-3 rounded-lg">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-1">Emergency Contact</h4>
                                    <p class="text-teal-100 font-light">+63 9154677338</p>
                                </div>
                            </div>

                            <div class="pt-8 border-t border-teal-400 border-opacity-30">
                                <h4 class="font-semibold text-lg mb-4">Follow Us</h4>
                                <div class="flex space-x-4">
                                    <a href="#" class="bg-teal-400 bg-opacity-20 p-3 rounded-lg hover:bg-opacity-30 
                                                     transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="bg-teal-400 bg-opacity-20 p-3 rounded-lg hover:bg-opacity-30 
                                                     transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="bg-teal-400 bg-opacity-20 p-3 rounded-lg hover:bg-opacity-30 
                                                     transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="mt-16 rounded-3xl overflow-hidden shadow-xl bg-white p-2">
                <div class="rounded-2xl overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.9554958849839!2d121.04235005872192!3d14.583329500000012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c81581b42b3b%3A0x4e23e4e0c769efd9!2s605%209%20de%20Febrero%20St%2C%20Mandaluyong%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1645123456789!5m2!1sen!2sph" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        class="w-full">
                    </iframe>
                </div>
            </div>

            <!-- FAQ Section  -->
            <div class="mt-20">
                <div class="text-center mb-12">
                    <span class="text-teal-600 font-medium text-lg mb-4 block">FAQ</span>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-teal-500 to-teal-400 mx-auto mb-8 rounded-full"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto font-light">
                        Find quick answers to common questions about our dental services
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300
                                transform hover:-translate-y-1">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 bg-teal-100 rounded-lg p-3">
                                <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">What are your operating hours?</h3>
                                <p class="text-gray-600 font-light">
                                    We are open Monday through Saturday from 9:00 AM to 6:00 PM. 
                                    We are closed on Sundays and holidays.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300
                                transform hover:-translate-y-1">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 bg-teal-100 rounded-lg p-3">
                                <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Do you accept walk-in patients?</h3>
                                <p class="text-gray-600 font-light">
                                    While we welcome walk-ins, we recommend scheduling an appointment 
                                    to ensure prompt service and minimize waiting time.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300
                                transform hover:-translate-y-1">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 bg-teal-100 rounded-lg p-3">
                                <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">What payment methods do you accept?</h3>
                                <p class="text-gray-600 font-light">
                                    We accept cash, credit cards, and major insurance providers. 
                                    Please contact us for specific insurance coverage details.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300
                                transform hover:-translate-y-1">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 bg-teal-100 rounded-lg p-3">
                                <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">How do I schedule an appointment?</h3>
                                <p class="text-gray-600 font-light">
                                    You can schedule an appointment through our website, by calling us, 
                                    or sending an email. We'll respond promptly to confirm your booking.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br> <br> <br> <br> <br>

                <!-- Emergency Contact Banner -->
                <div class="bg-gradient-to-r from-rose-500 to-pink-500 rounded-3xl shadow-xl overflow-hidden">
                    <div class="relative px-8 py-12 md:p-12">
                        <!-- Decorative Elements -->
                        <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                        <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                        
                        <div class="relative flex flex-col md:flex-row items-center justify-between">
                            <div class="mb-8 md:mb-0 text-center md:text-left">
                                <h3 class="text-3xl font-bold text-white mb-3">Dental Emergency?</h3>
                                <p class="text-rose-100 text-lg max-w-xl font-light">
                                    Don't wait! Contact our emergency dental care service immediately. 
                                    We're here to help you 24/7 for urgent dental situations.
                                </p>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="tel:+639154677338" 
                                   class="inline-flex items-center justify-center px-8 py-4 bg-white text-rose-500 
                                          font-semibold rounded-xl transition-all duration-300 transform 
                                          hover:bg-rose-50 hover:scale-105 hover:shadow-lg group">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Call Emergency Line
                                </a>
                                <a href="/emergency-care" 
                                   class="inline-flex items-center justify-center px-8 py-4 border-2 border-white 
                                          text-white font-semibold rounded-xl transition-all duration-300 
                                          hover:bg-white hover:text-rose-500 hover:scale-105 group">
                                    Learn More
                                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" 
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form validation and submission handling
        const form = document.querySelector('form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
                        
            // Example success message
            const formData = new FormData(form);
            console.log('Form submitted:', Object.fromEntries(formData));
            
            // Show success message 
            alert('Thank you for your message. We will get back to you soon!');
            form.reset();
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // animation on scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.hover-card');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('animate-fade-in-up');
                }
            });
        };

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>

<x-chatbot />
<x-footer />

</x-navbar-layout>