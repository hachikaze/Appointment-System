<x-navbar-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .professional-gradient {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }

        .card-shadow {
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.1), 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
    </style>

    <div class="min-h-screen professional-gradient py-4 px-4 sm:px-6 lg:px-8 flex items-start justify-center pt-[2%]">
        <div class="w-full max-w-[520px] mx-auto">
            <!-- Brand Section -->
            <div class="text-center mb-4">
                <div class="mb-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 mx-auto">
                </div>
                <h1 class="text-3xl font-semibold text-gray-800 tracking-tight">Create Account</h1>
                <p class="mt-1 text-sm text-gray-600">Join us by creating your account</p>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-2xl card-shadow p-6">
                <!-- Alert Messages -->
                @if (session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">{{ session('success') }}</p>
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

                <!-- Registration Form -->
                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <!-- Name Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Last Name
                            </label>
                            <input type="text" 
                                   name="lastname" 
                                   required
                                   class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg
                                          focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20
                                          focus:border-teal-500 transition-all duration-200 text-gray-900 text-sm"
                                   placeholder="Enter last name">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                First Name
                            </label>
                            <input type="text" 
                                   name="firstname" 
                                   required
                                   class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg
                                          focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20
                                          focus:border-teal-500 transition-all duration-200 text-gray-900 text-sm"
                                   placeholder="Enter first name">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Middle Initial
                        </label>
                        <input type="text" 
                               name="middleinitial" 
                               maxlength="1"
                               required
                               class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg
                                      focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20
                                      focus:border-teal-500 transition-all duration-200 text-gray-900 text-sm"
                               placeholder="M">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Email Address
                        </label>
                        <input type="email" 
                               name="email" 
                               required
                               class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg
                                      focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20
                                      focus:border-teal-500 transition-all duration-200 text-gray-900 text-sm"
                               placeholder="name@example.com">
                    </div>

                    <!-- Password Section with Live Validation -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Password
                            </label>
                            <div class="relative">
                                <input type="password" 
                                       id="password"
                                       name="password" 
                                       required
                                       class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg
                                              focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20
                                              focus:border-teal-500 transition-all duration-200 text-gray-900 text-sm"
                                       placeholder="••••••••">
                                <span class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </span>
                            </div>
                            <!-- Password strength indicator -->
                            <div id="password-strength" class="mt-1 text-xs space-y-1">
                                <div class="flex items-center space-x-2">
                                    <span id="length-check" class="text-gray-400">✓ At least 8 characters</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span id="uppercase-check" class="text-gray-400">✓ Contains uppercase letter</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span id="number-check" class="text-gray-400">✓ Contains number</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input type="password" 
                                       id="password_confirmation"
                                       name="password_confirmation" 
                                       required
                                       class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg
                                              focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20
                                              focus:border-teal-500 transition-all duration-200 text-gray-900 text-sm"
                                       placeholder="••••••••">
                                <span class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </span>
                            </div>
                            <!-- Password match indicator -->
                            <div id="password-match-message" class="mt-1 text-sm"></div>
                        </div>
                    </div>

                    <!-- Contact and Gender Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Phone Number
                            </label>
                            <input type="text" 
                                   id="phone"
                                   name="phone" 
                                   required 
                                   maxlength="11"
                                   class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg
                                          focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20
                                          focus:border-teal-500 transition-all duration-200 text-gray-900 text-sm"
                                   placeholder="09123456789">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Gender
                            </label>
                            <select name="gender" 
                                    required
                                    class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg
                                           focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500/20
                                           focus:border-teal-500 transition-all duration-200 text-gray-900 text-sm">
                                <option value="" disabled selected>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" 
                            class="w-full bg-teal-500 text-white mt-6 py-3 px-4 rounded-lg
                                   hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500
                                   focus:ring-offset-2 transition-all duration-200 font-medium
                                   flex items-center justify-center group">
                        Create Account
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>

                    <!-- Login Link -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Already have an account? 
                            <a href="{{ route('login') }}" 
                               class="text-teal-500 hover:text-teal-600 font-medium transition-colors duration-200">
                                Sign in here
                            </a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Footer Text -->
            <div class="mt-6 text-center">
                <p class="text-xs text-gray-500">
                    By creating an account, you agree to our 
                    <a href="#" class="text-teal-500 hover:text-teal-600 transition-colors duration-200">Terms of Service</a> and 
                    <a href="#" class="text-teal-500 hover:text-teal-600 transition-colors duration-200">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript for Password Validation and Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            const matchMessage = document.getElementById('password-match-message');
            const toggleButtons = document.querySelectorAll('.toggle-password');
            const lengthCheck = document.getElementById('length-check');
            const uppercaseCheck = document.getElementById('uppercase-check');
            const numberCheck = document.getElementById('number-check');

            // Function to check password strength
            function checkPasswordStrength(value) {
                // Check length
                if(value.length >= 8) {
                    lengthCheck.classList.remove('text-gray-400');
                    lengthCheck.classList.add('text-green-500');
                } else {
                    lengthCheck.classList.remove('text-green-500');
                    lengthCheck.classList.add('text-gray-400');
                }

                // Check uppercase
                if(/[A-Z]/.test(value)) {
                    uppercaseCheck.classList.remove('text-gray-400');
                    uppercaseCheck.classList.add('text-green-500');
                } else {
                    uppercaseCheck.classList.remove('text-green-500');
                    uppercaseCheck.classList.add('text-gray-400');
                }

                // Check numbers
                if(/[0-9]/.test(value)) {
                    numberCheck.classList.remove('text-gray-400');
                    numberCheck.classList.add('text-green-500');
                } else {
                    numberCheck.classList.remove('text-green-500');
                    numberCheck.classList.add('text-gray-400');
                }
            }

            // Function to check password match
            function checkPasswordMatch() {
                const passwordValue = password.value;
                const confirmValue = confirmPassword.value;

                if (confirmValue.length === 0) {
                    matchMessage.textContent = '';
                    matchMessage.className = 'mt-1 text-sm';
                    confirmPassword.classList.remove('border-red-500', 'border-green-500');
                } else if (passwordValue === confirmValue) {
                    matchMessage.textContent = 'Passwords match!';
                    matchMessage.className = 'mt-1 text-sm text-green-600';
                    confirmPassword.classList.remove('border-red-500');
                    confirmPassword.classList.add('border-green-500');
                } else {
                    matchMessage.textContent = 'Passwords do not match!';
                    matchMessage.className = 'mt-1 text-sm text-red-600';
                    confirmPassword.classList.remove('border-green-500');
                    confirmPassword.classList.add('border-red-500');
                }
            }

            // Toggle password visibility
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('input');
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    
                    // Change eye icon
                    this.innerHTML = type === 'password' 
                        ? `<svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                           </svg>`
                           : `<svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                           </svg>`;
                });
            });

            // Phone number validation
            const phoneInput = document.getElementById('phone');
            phoneInput.addEventListener('input', function(e) {
                // Remove any non-numeric characters
                let value = e.target.value.replace(/\D/g, '');
                
                // Ensure it starts with '09'
                if (value.length >= 2 && value.substring(0, 2) !== '09') {
                    value = '09' + value.substring(2);
                }
                
                // Limit to 11 digits
                value = value.substring(0, 11);
                
                e.target.value = value;
            });

            // Middle initial validation
            const middleInitialInput = document.querySelector('input[name="middleinitial"]');
            middleInitialInput.addEventListener('input', function(e) {
                // Convert to uppercase and remove non-letters
                let value = e.target.value.replace(/[^A-Za-z]/g, '').toUpperCase();
                // Take only the first character
                value = value.substring(0, 1);
                e.target.value = value;
            });

            // Add event listeners for password validation
            password.addEventListener('input', function() {
                checkPasswordStrength(this.value);
                checkPasswordMatch();
            });

            confirmPassword.addEventListener('input', checkPasswordMatch);

            // Form validation before submit
            document.querySelector('form').addEventListener('submit', function(e) {
                const passwordValue = password.value;
                
                // Check password requirements
                if (passwordValue.length < 8 || 
                    !/[A-Z]/.test(passwordValue) || 
                    !/[0-9]/.test(passwordValue)) {
                    e.preventDefault();
                    alert('Please ensure your password meets all requirements.');
                    return;
                }

                // Check if passwords match
                if (passwordValue !== confirmPassword.value) {
                    e.preventDefault();
                    alert('Passwords do not match.');
                    return;
                }

                // Check phone number
                const phoneValue = phoneInput.value;
                if (phoneValue.length !== 11 || !phoneValue.startsWith('09')) {
                    e.preventDefault();
                    alert('Please enter a valid 11-digit phone number starting with 09.');
                    return;
                }
            });

            //fade-up animation to main card
            const mainCard = document.querySelector('.card-shadow');
            mainCard.classList.add('fade-up');

            // Enhanced form validation
            const inputs = document.querySelectorAll('input, select');
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
        });
    </script>
    
<x-chatbot />
<x-footer />
</x-navbar-layout>