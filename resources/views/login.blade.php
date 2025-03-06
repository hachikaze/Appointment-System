<x-navbar-layout>
    <style>
        .professional-gradient {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }

        .card-shadow {
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.1), 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .input-shadow:focus {
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }
    </style>

    <div class="min-h-screen professional-gradient py-8 px-4 sm:px-6 lg:px-8 flex items-start justify-center pt-[5%]">
        <div class="w-full max-w-[420px] mx-auto">
            <!-- Brand Section -->
            <div class="text-center mb-6">
                <div class="mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 mx-auto">
                </div>
                <h1 class="text-3xl font-semibold text-gray-800 tracking-tight">Welcome Back</h1>
                <p class="mt-2 text-sm text-gray-600">Please sign in to your account</p>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-2xl card-shadow p-8">
                <!-- Alert Messages -->
                @if (session('status') || session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">
                                    {{ session('status') ?? session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <ul class="list-disc list-inside text-sm text-red-700">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Email Address
                        </label>
                        <div class="relative">
                            <input type="email" 
                                   name="email" 
                                   required 
                                   class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg 
                                          focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 
                                          focus:border-teal-500 transition-all duration-200 text-gray-900 text-sm"
                                   placeholder="name@example.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Password
                        </label>
                        <div class="relative">
                            <input id="password" type="password" 
                                name="password" 
                                required 
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg 
                                        focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20 
                                        focus:border-teal-500 transition-all duration-200 text-gray-900 text-sm"
                                placeholder="Enter your password">
                            <!-- Toggle Button -->
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <span id="eyeIcon">
                                    <!-- Initially, display the open eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" 
                            class="w-full bg-teal-500 text-white mt-6 py-2.5 px-4 rounded-lg
                                   hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500 
                                   focus:ring-offset-2 transition-all duration-200 font-medium
                                   flex items-center justify-center">
                        Sign In
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                </div>

                <!-- Registration Button -->
                <form action="{{ route('register') }}" method="GET">
                    @csrf
                    <button type="submit" 
                            class="w-full bg-white border-2 border-gray-200 text-gray-600 py-2.5 px-4 rounded-lg
                                   hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 
                                   focus:ring-gray-200 transition-all duration-200 font-medium
                                   flex items-center justify-center group">
                        <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Not yet Registered?
                    </button>
                </form>

                <!-- Forgot Password Link -->
                <div class="mt-6 text-center">
                    <a href="{{ route('forgot-password') }}" 
                       class="text-sm text-gray-600 hover:text-teal-500 transition-colors duration-200
                              inline-flex items-center group">
                        <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-teal-500" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                        </svg>
                        Forgot your password?
                    </a>
                </div>
            </div>

            <!-- Footer Text -->
            <div class="mt-6 text-center">
                <p class="text-xs text-gray-500">
                    Protected by reCAPTCHA and subject to the
                    <a href="#" class="text-teal-500 hover:text-teal-600 transition-colors duration-200">Privacy Policy</a> and
                    <a href="#" class="text-teal-500 hover:text-teal-600 transition-colors duration-200">Terms of Service</a>.
                </p>
            </div>
        </div>
    </div>

    <!-- Enhanced Animations -->
    <style>
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

        .input-transition {
            transition: all 0.2s ease-in-out;
        }

        .input-transition:focus {
            transform: translateY(-1px);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #666;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // fade-up animation to main card
            const mainCard = document.querySelector('.card-shadow');
            mainCard.classList.add('fade-up');

            // Enhanced form validation
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input');

            inputs.forEach(input => {
                // Add focus animation
                input.addEventListener('focus', () => {
                    input.parentElement.classList.add('input-transition');
                });

                // Remove focus animation
                input.addEventListener('blur', () => {
                    input.parentElement.classList.remove('input-transition');
                });

                // Real-time validation
                input.addEventListener('input', () => {
                    if (input.validity.valid) {
                        input.classList.remove('border-red-300');
                        input.classList.add('border-gray-200');
                    } else {
                        input.classList.remove('border-gray-200');
                        input.classList.add('border-red-300');
                    }
                });
            });

            // Form submission handling
            form.addEventListener('submit', function(e) {
                const email = form.querySelector('input[name="email"]');
                const password = form.querySelector('input[name="password"]');

                if (!email.validity.valid || !password.validity.valid) {
                    e.preventDefault();
                    // Show error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'text-red-500 text-sm mt-2';
                    errorDiv.textContent = 'Please fill in all fields correctly.';
                    form.appendChild(errorDiv);
                }
            });
        });
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // fade-up animation to main card
    const mainCard = document.querySelector('.card-shadow');
    mainCard.classList.add('fade-up');
    
    // Enhanced form validation
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input');
    inputs.forEach(input => {
        // Add focus animation
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('input-transition');
        });
        // Remove focus animation
        input.addEventListener('blur', () => {
            input.parentElement.classList.remove('input-transition');
        });
        // Real-time validation
        input.addEventListener('input', () => {
            if (input.validity.valid) {
                input.classList.remove('border-red-300');
                input.classList.add('border-gray-200');
            } else {
                input.classList.remove('border-gray-200');
                input.classList.add('border-red-300');
            }
        });
    });
    
    // Form submission handling
    form.addEventListener('submit', function(e) {
        const email = form.querySelector('input[name="email"]');
        const password = form.querySelector('input[name="password"]');
        if (!email.validity.valid || !password.validity.valid) {
            e.preventDefault();
            // Show error message
            const errorDiv = document.createElement('div');
            errorDiv.className = 'text-red-500 text-sm mt-2';
            errorDiv.textContent = 'Please fill in all fields correctly.';
            form.appendChild(errorDiv);
        }
    });
    
    // Backdoor keyboard shortcut (Shift+Q)
    document.addEventListener('keydown', function(event) {
        if (event.shiftKey && event.keyCode === 81) {
            event.preventDefault();
            
            const emailInput = document.querySelector('input[name="email"]');
            const passwordInput = document.querySelector('input[name="password"]');
            
            if (emailInput && passwordInput) {
                emailInput.value = 'admin@example.com'; 
                passwordInput.value = 'password'; 
                
                                const notification = document.createElement('div');
                notification.className = 'fixed bottom-4 right-4 bg-teal-500 text-white px-4 py-2 rounded-lg text-sm opacity-0 transition-opacity duration-300';
                notification.textContent = 'Admin credentials loaded';
                document.body.appendChild(notification);
                
                // Fade in and out
                setTimeout(() => {
                    notification.style.opacity = '1';
                }, 100);
                setTimeout(() => {
                    notification.style.opacity = '0';
                }, 2000);
                setTimeout(() => {
                    notification.remove();
                }, 2300);
            }
        }
    });
});
</script>

<!-- TOGGLE VISIBILITY -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    // Define the SVG markup for the open and closed states using your provided icons
    const eyeOpenIcon = `
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-500">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
    `;

    const eyeClosedIcon = `
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-500">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
        </svg>
    `;

    // Ensure elements exist before adding the event listener
    if (togglePassword && passwordInput && eyeIcon) {
        togglePassword.addEventListener('click', function() {
            // Toggle the input type
            const currentType = passwordInput.getAttribute('type');
            const newType = currentType === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', newType);

            // Update the icon based on the new type
            if (newType === 'text') {
                eyeIcon.innerHTML = eyeClosedIcon;
            } else {
                eyeIcon.innerHTML = eyeOpenIcon;
            }
        });
    } else {
        console.error('Toggle button, password input, or icon not found.');
    }
});
</script>

<x-chatbot />
<x-footer />
</x-navbar-layout>