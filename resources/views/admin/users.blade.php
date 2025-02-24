<x-sidebar-layout>
    <x-slot:heading>
        Administrator Records
    </x-slot:heading>

    <!--  Statistics  -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Total Users Card -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200 hover:shadow-lg transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-800 text-sm font-medium">Total Users</p>
                    <p class="text-2xl font-bold text-blue-900 mt-2">{{ $users->count() }}</p>
                    <p class="text-xs text-blue-600 mt-1">All registered users</p>
                </div>
                <div class="p-3 rounded-xl bg-white/80 group-hover:bg-white group-hover:scale-110 transition-all duration-300 shadow-sm">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Admin Users Card -->
        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 border border-purple-200 hover:shadow-lg transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-800 text-sm font-medium">Admin Users</p>
                    <p class="text-2xl font-bold text-purple-900 mt-2">{{ $users->where('user_type', 'admin')->count() }}</p>
                    <p class="text-xs text-purple-600 mt-1">System administrators</p>
                </div>
                <div class="p-3 rounded-xl bg-white/80 group-hover:bg-white group-hover:scale-110 transition-all duration-300 shadow-sm">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Staff Users Card -->
        <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl p-6 border border-emerald-200 hover:shadow-lg transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-emerald-800 text-sm font-medium">Staff Users</p>
                    <p class="text-2xl font-bold text-emerald-900 mt-2">{{ $users->where('user_type', 'staff')->count() }}</p>
                    <p class="text-xs text-emerald-600 mt-1">Active staff members</p>
                </div>
                <div class="p-3 rounded-xl bg-white/80 group-hover:bg-white group-hover:scale-110 transition-all duration-300 shadow-sm">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Active Users Card -->
        <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-6 border border-amber-200 hover:shadow-lg transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-amber-800 text-sm font-medium">Active Users</p>
                    <p class="text-2xl font-bold text-amber-900 mt-2">{{ $users->where('status', 'active')->count() }}</p>
                    <p class="text-xs text-amber-600 mt-1">Currently online</p>
                </div>
                <div class="p-3 rounded-xl bg-white/80 group-hover:bg-white group-hover:scale-110 transition-all duration-300 shadow-sm">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

        <!-- Search and Filters -->
        <div class="bg-white rounded-xl p-6 mb-6 border border-gray-200">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <!-- Search -->
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" 
                           placeholder="Search users..." 
                           class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-200">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Filters -->
            <div class="flex flex-wrap items-center gap-4">
                <select class="text-sm border border-gray-300 rounded-lg px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-200">
                    <option value="">Filter by Role</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                </select>

                <button onclick="openModal()" 
                        class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-4 py-2.5 rounded-lg transition duration-200 flex items-center gap-2 shadow-sm hover:shadow group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    New Staff User
                </button>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">User Management</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Photo</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email/Contact</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Gender</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User Type</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date Added</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="relative w-10 h-10">
                                    <img src="images/doctor1.jpg" 
                                         alt="User Photo" 
                                         class="w-10 h-10 rounded-full object-cover ring-2 ring-gray-100">
                                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                <div class="text-xs text-gray-500">ID: #{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                <div class="text-xs text-gray-500">{{ $user->contact ?? 'No contact' }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $user->gender }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                    {{ $user->user_type === 'admin' ? 'bg-purple-50 text-purple-700 ring-1 ring-purple-700/10' : 'bg-blue-50 text-blue-700 ring-1 ring-blue-700/10' }}">
                                    <span class="w-1 h-1 mr-1.5 rounded-full 
                                        {{ $user->user_type === 'admin' ? 'bg-purple-500' : 'bg-blue-500' }}"></span>
                                    {{ $user->user_type }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $user->created_at->format('M d, Y') }}</div>
                                <div class="text-xs text-gray-500">{{ $user->created_at->format('h:i A') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200" title="View Details">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="p-1.5 text-gray-500 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all duration-200" title="Edit User">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </button>
                                    <button class="p-1.5 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200" title="Delete User">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--  Modal -->
    <div id="adminModal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-xl shadow-xl w-full max-w-md relative transform transition-all duration-300">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-gray-50 via-white to-white px-6 py-4 border-b border-gray-100 rounded-t-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-50 rounded-lg p-2">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Add New Administrator</h3>
                        </div>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500 hover:bg-gray-100 p-2 rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.store') }}" class="space-y-6">
                        @csrf
                        <!-- Profile Image Upload -->
                        <div class="flex justify-center mb-6">
                            <div class="relative group">
                                <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-50 border-4 border-white shadow-inner">
                                    <img id="preview" src="/images/default-avatar.png" alt="Profile preview" class="w-full h-full object-cover">
                                </div>
                                <label class="absolute bottom-0 right-0 bg-blue-600 rounded-full p-2 cursor-pointer hover:bg-blue-700 transition-colors duration-200 shadow-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    <input type="file" class="hidden" accept="image/*" onchange="previewImage(event)">
                                </label>
                            </div>
                        </div>

                        <!-- Form Fields in Grid -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                <input type="text" name="firstname" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors duration-200"
                                       placeholder="Enter first name">
                            </div>

                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Middle Initial</label>
                                <input type="text" name="middleinitial" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors duration-200"
                                       placeholder="M.I.">
                            </div>

                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                <input type="text" name="lastname" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors duration-200"
                                       placeholder="Enter last name">
                            </div>

                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                                <select name="gender" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors duration-200">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">User Type</label>
                                <select name="user_type" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors duration-200">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" name="email" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors duration-200"
                                       placeholder="email@example.com">
                            </div>

                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <div class="relative">
                                    <input type="password" name="password" id="password"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-colors duration-200"
                                           placeholder="Enter password">
                                    <button type="button" onclick="togglePassword()" 
                                            class="absolute right-2 top-2 text-gray-400 hover:text-gray-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="flex justify-end space-x-3 pt-6 mt-6 border-t border-gray-100">
                            <button type="button" onclick="closeModal()"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-gray-200 transition-all duration-200">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-lg focus:ring-2 focus:ring-blue-500/20 transition-all duration-200">
                                Add Administrator
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Modal Functions with Animation
        function openModal() {
            const modal = document.getElementById('adminModal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // entrance animation
            setTimeout(() => {
                modal.querySelector('.transform').classList.add('scale-100', 'opacity-100');
                modal.querySelector('.transform').classList.remove('scale-95', 'opacity-0');
            }, 50);
        }

        function closeModal() {
            const modal = document.getElementById('adminModal');
            const modalContent = modal.querySelector('.transform');
            
            // exit animation
            modalContent.classList.add('scale-95', 'opacity-0');
            modalContent.classList.remove('scale-100', 'opacity-100');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 200);
        }

        // Image Preview Function
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.classList.add('scale-110');
                setTimeout(() => preview.classList.remove('scale-110'), 200);
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type');
            const button = passwordInput.nextElementSibling;
            
            if (type === 'password') {
                passwordInput.setAttribute('type', 'text');
                button.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                    </svg>`;
            } else {
                passwordInput.setAttribute('type', 'password');
                button.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>`;
            }
        }

        // Close modal when clicking outside
        document.getElementById('adminModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('adminModal').classList.contains('hidden')) {
                closeModal();
            }
        });

        // Search Function with Debounce
        const searchInput = document.querySelector('input[placeholder="Search users..."]');
        const tableRows = document.querySelectorAll('tbody tr');
        let searchTimeout;

        searchInput.addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            
            searchTimeout = setTimeout(() => {
                const searchTerm = e.target.value.toLowerCase();
                
                tableRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    const shouldShow = text.includes(searchTerm);
                    
                    if (shouldShow) {
                        row.style.display = '';
                        row.classList.remove('opacity-0');
                    } else {
                        row.classList.add('opacity-0');
                        setTimeout(() => {
                            row.style.display = 'none';
                        }, 200);
                    }
                });
            }, 300);
        });

        // Role Filter with Animation
        const roleFilter = document.querySelector('select');
        roleFilter.addEventListener('change', function(e) {
            const selectedRole = e.target.value.toLowerCase();
            
            tableRows.forEach(row => {
                if (!selectedRole) {
                    row.style.display = '';
                    setTimeout(() => row.classList.remove('opacity-0'), 50);
                    return;
                }
                
                const roleCell = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
                const shouldShow = roleCell.includes(selectedRole);
                
                if (shouldShow) {
                    row.style.display = '';
                    setTimeout(() => row.classList.remove('opacity-0'), 50);
                } else {
                    row.classList.add('opacity-0');
                    setTimeout(() => {
                        row.style.display = 'none';
                    }, 200);
                }
            });
        });
    </script>

    <style>
        .transform {
            transition: all 0.2s ease-in-out;
        }

        .scale-95 {
            transform: scale(0.95);
        }

        .scale-100 {
            transform: scale(1);
        }

        .scale-110 {
            transform: scale(1.1);
        }

        .opacity-0 {
            opacity: 0;
        }

        .opacity-100 {
            opacity: 1;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        tbody tr {
            transition: all 0.2s ease-in-out;
        }

        tbody tr:hover {
            transform: translateX(4px);
        }

        button {
            transition: all 0.2s ease-in-out;
        }

        button:active {
            transform: scale(0.95);
        }

        input:focus, select:focus {
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
    </style>
</x-sidebar-layout>