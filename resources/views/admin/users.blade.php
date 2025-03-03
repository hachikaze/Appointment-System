<x-sidebar-layout>
    <!--  Header Section  -->
    <div class="mb-8 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">User Management</h1>
                        <p class="text-teal-100">Manage system users, roles, and permissions</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Users Management
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
            <div class="flex items-center text-sm text-teal-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Manage all users from this dashboard. You can add, edit, or remove users as needed.</span>
            </div>
        </div>
    </div>

    <!-- Success Message  -->
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-md shadow-sm animate-fadeIn" role="alert">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

        <!-- User Counts Cards -->
        <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Admin Card -->
            <div class="bg-gradient-to-br from-teal-50 to-white p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 text-sm font-medium uppercase tracking-wider">Administrators</p>
                        <p class="text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">{{ $adminCount }}</p>
                    </div>
                    <div class="bg-teal-100 p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100">
                    <p class="text-xs text-gray-500 flex items-center">
                        <svg class="h-4 w-4 mr-1 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        System administrators with full access
                    </p>
                </div>
            </div>

            <!-- Staff Card -->
            <div class="bg-gradient-to-br from-blue-50 to-white p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-blue-500 transition-all hover:shadow-md group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 text-sm font-medium uppercase tracking-wider">Staff Members</p>
                        <p class="text-2xl font-bold text-blue-700 mt-1 group-hover:text-blue-800 transition-colors">{{ $staffCount }}</p>
                    </div>
                    <div class="bg-blue-100 p-2 rounded-full text-blue-600 group-hover:bg-blue-200 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100">
                    <p class="text-xs text-gray-500 flex items-center">
                        <svg class="h-4 w-4 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Staff with limited administrative access
                    </p>
                </div>
            </div>

            <!-- Patients Card -->
            <div class="bg-gradient-to-br from-purple-50 to-white p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-purple-500 transition-all hover:shadow-md group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 text-sm font-medium uppercase tracking-wider">Patients</p>
                        <p class="text-2xl font-bold text-purple-700 mt-1 group-hover:text-purple-800 transition-colors">{{ $patientCount }}</p>
                    </div>
                    <div class="bg-purple-100 p-2 rounded-full text-purple-600 group-hover:bg-purple-200 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100">
                    <p class="text-xs text-gray-500 flex items-center">
                        <svg class="h-4 w-4 mr-1 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Registered patients with basic access
                    </p>
                </div>
            </div>
        </div>

        <!--  Action Bar  -->
        <div class="mb-6 bg-gradient-to-r from-teal-50 to-white p-4 rounded-lg border border-teal-100 shadow-sm">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-teal-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="search-users" placeholder="Search users..." class="bg-white border border-teal-200 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full pl-10 p-2.5 transition-colors">
                    </div>
                    
                    <div class="relative">
                        <select id="filter-role" class="bg-white border border-teal-200 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full appearance-none pr-10 p-2.5 transition-colors">
                            <option value="">All Roles</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="patient">Patient</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <select id="entries-per-page" class="bg-white border border-teal-200 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full appearance-none pr-10 p-2.5 transition-colors">
                            <option value="10">10 entries</option>
                            <option value="20">20 entries</option>
                            <option value="50">50 entries</option>
                            <option value="100">100 entries</option>
                            <option value="all">All entries</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <button id="add-user-btn" class="flex items-center justify-center text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full md:w-auto transition-colors shadow-sm hover:shadow">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Add New User
                </button>
            </div>
    
            <div class="mt-3 pt-3 border-t border-teal-100 flex justify-between items-center text-xs text-gray-500">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Use filters to narrow down results</span>
                </div>
                <div id="results-count" class="text-teal-600 font-medium">
                    Showing <span id="showing-start">1</span> to <span id="showing-end">10</span> of <span id="total-entries">100</span> entries
                </div>
            </div>
        </div>
                
        <!-- Users Table  -->
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg border border-teal-200">
            <table class="w-full text-sm text-left text-teal-700">
                <thead class="text-xs uppercase bg-gradient-to-r from-teal-50 to-teal-100 text-teal-700">
                    <tr>
                        <th scope="col" class="py-3.5 px-4 font-semibold border-r border-teal-200">User</th>
                        <th scope="col" class="py-3.5 px-4 font-semibold border-r border-teal-200">Email</th>
                        <th scope="col" class="py-3.5 px-4 font-semibold border-r border-teal-200">Role</th>
                        <th scope="col" class="py-3.5 px-4 font-semibold border-r border-teal-200">Gender</th>
                        <th scope="col" class="py-3.5 px-4 font-semibold border-r border-teal-200">Joined</th>
                        <th scope="col" class="py-3.5 px-4 text-right font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody id="users-table-body">
                    @foreach($users as $user)
                    <tr class="bg-white border-b border-teal-100 hover:bg-teal-50 transition-colors" data-user-id="{{ $user->id }}">
                        <td class="py-3.5 px-4 border-r border-teal-50">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-teal-100 flex items-center justify-center text-teal-700 font-semibold mr-3 border border-teal-200">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="font-medium text-teal-900">{{ $user->name }}</div>
                                    <div class="text-xs text-teal-600">ID: #{{ $user->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3.5 px-4 border-r border-teal-50">
                            <div class="text-teal-800">{{ $user->email }}</div>
                            <div class="text-xs">
                                @if($user->email_verified_at)
                                <span class="text-teal-600 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Verified
                                </span>
                                @else
                                <span class="text-red-600 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Not verified
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="py-3.5 px-4 border-r border-teal-50">
                            <span class="px-2.5 py-1 text-xs rounded-full font-medium border
                            @if($user->user_type == 'admin') bg-teal-100 text-teal-800 border-teal-200
                            @elseif($user->user_type == 'staff') bg-blue-100 text-blue-800 border-blue-200
                            @else bg-purple-100 text-purple-800 border-purple-200 @endif">
                                {{ ucfirst($user->user_type) }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4 text-teal-800 border-r border-teal-50">
                            {{ ucfirst($user->gender) }}
                        </td>
                        <td class="py-3.5 px-4 border-r border-teal-50">
                            <div class="text-teal-800">{{ $user->created_at->format('M d, Y') }}</div>
                            <div class="text-xs text-teal-600">{{ $user->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="py-3.5 px-4 text-right">
                            <div class="flex items-center justify-end space-x-3">
                                <button class="text-teal-600 hover:text-teal-800 bg-teal-50 p-1.5 rounded-md edit-user-btn focus:outline-none focus:ring-2 focus:ring-teal-500 transition-colors border border-teal-200" title="Edit user">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-800 bg-red-50 p-1.5 rounded-md delete-user-btn focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors border border-red-200" title="Delete user">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- No Results Message -->
            <div id="no-results" class="hidden p-8 text-center">
                <svg class="mx-auto h-12 w-12 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-teal-900">No users found</h3>
                <p class="mt-1 text-sm text-teal-600">Try adjusting your search or filter to find what you're looking for.</p>
                <button class="mt-4 px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition-colors text-sm font-medium border border-teal-700 shadow-sm">
                    Reset Filters
                </button>
            </div>
            <!-- Pagination -->
            <div class="p-4 bg-teal-50 border-t border-teal-200">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-sm text-teal-700 mb-4 md:mb-0">
                        Showing <span class="font-medium text-teal-800" id="showing-start">1</span> to
                        <span class="font-medium text-teal-800" id="showing-end">10</span> of
                        <span class="font-medium text-teal-800" id="total-entries">{{ $users->total() }}</span> entries
                    </div>
                    <div class="pagination-teal">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- custom CSS for teal pagination -->
        <style>
            .pagination-teal nav .flex .relative z-0 {
                @apply inline-flex shadow-sm rounded-md;
            }
            .pagination-teal nav .flex .relative z-0 span:not(.text-gray-500),
            .pagination-teal nav .flex .relative z-0 a {
                @apply relative inline-flex items-center px-4 py-2 border text-sm font-medium;
            }
            .pagination-teal nav .flex .relative z-0 span.bg-white {
                @apply bg-white border-teal-200 text-teal-500;
            }
            .pagination-teal nav .flex .relative z-0 span.bg-teal-50 {
                @apply z-10 bg-teal-100 border-teal-500 text-teal-700;
            }
            .pagination-teal nav .flex .relative z-0 a {
                @apply bg-white border-teal-200 text-teal-600 hover:bg-teal-50 hover:text-teal-700;
            }
            .pagination-teal nav .flex .relative z-0 span:first-child,
            .pagination-teal nav .flex .relative z-0 a:first-child {
                @apply rounded-l-md;
            }
            .pagination-teal nav .flex .relative z-0 span:last-child,
            .pagination-teal nav .flex .relative z-0 a:last-child {
                @apply rounded-r-md;
            }
        </style>
    
        <!-- Add/Edit User Modal -->
        <div id="user-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center">
            <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full mx-4 md:mx-auto">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-teal-100 rounded-t bg-gradient-to-r from-teal-50 to-white">
                    <h3 id="modal-title" class="text-xl font-semibold text-teal-800 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Add New User
                    </h3>
                    <button type="button" id="close-modal-x" class="text-teal-400 bg-transparent hover:bg-teal-100 hover:text-teal-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                
                <!-- Form Content -->
                <form id="user-form" class="p-4 md:p-5" method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <input type="hidden" name="_method" id="form-method" value="POST">
                    <input type="hidden" name="user_id" id="user-id" value="">
                    
                    <div class="grid gap-4 mb-4 grid-cols-1">
                        <!-- Name Fields -->
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label for="firstname" class="block mb-2 text-sm font-medium text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    First Name
                                </label>
                                <input type="text" name="firstname" id="firstname" class="bg-white border border-teal-200 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                            </div>
                            <div>
                                <label for="middleinitial" class="block mb-2 text-sm font-medium text-gray-700">Middle Initial</label>
                                <input type="text" name="middleinitial" id="middleinitial" maxlength="1" class="bg-white border border-teal-200 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                            </div>
                            <div>
                                <label for="lastname" class="block mb-2 text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="bg-white border border-teal-200 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                            </div>
                        </div>
                        
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-700 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Email Address
                            </label>
                            <input type="email" name="email" id="email" class="bg-white border border-teal-200 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                        </div>
                        
                        <!-- Gender and Role Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div>
                                <label for="gender" class="block mb-2 text-sm font-medium text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Gender
                                </label>
                                <div class="relative">
                                    <select id="gender" name="gender" class="bg-white border border-teal-200 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 appearance-none">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="user_type" class="block mb-2 text-sm font-medium text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Role
                                </label>
                                <div class="relative">
                                    <select id="user_type" name="user_type" class="bg-white border border-teal-200 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 appearance-none">
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                        <option value="patient">Patient</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Password Fields -->
                        <div class="password-fields">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-700 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Password
                            </label>
                            <div class="relative">
                                <input type="password" name="password" id="password" class="bg-white border border-teal-200 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                            </div>
                        </div>
                        
                        <div class="password-fields">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-700 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="bg-white border border-teal-200 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Footer -->
                    <div class="flex items-center justify-end space-x-4 pt-4 border-t border-teal-100">
                        <button type="button" id="cancel-user-btn" class="text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-teal-200 rounded-lg border border-teal-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancel
                        </button>
                        <button type="button" id="save-user-btn" class="text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Save User
                        </button>
                    </div>
                </form>
            </div>
        </div>                    
    
        <!-- Delete Confirmation Modal -->
        <div id="delete-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center">
            <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full mx-4 md:mx-auto">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-red-100 rounded-t bg-gradient-to-r from-red-50 to-white">
                    <h3 class="text-xl font-semibold text-red-800 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete User
                    </h3>
                    <button type="button" id="close-delete-modal-x" class="text-red-400 bg-transparent hover:bg-red-100 hover:text-red-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                
                <!-- Modal Content -->
                <div class="p-4 md:p-5">
                    <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 border border-red-200">
                        <svg class="flex-shrink-0 w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <div class="ml-3 text-sm font-medium">
                            Are you sure you want to delete this user? All of their data will be permanently removed. This action cannot be undone.
                        </div>
                    </div>
                    
                    <form id="delete-form" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    
                    <!-- Modal Footer -->
                    <div class="flex items-center justify-end space-x-4 pt-4 border-t border-red-100">
                        <button type="button" id="cancel-delete-btn" class="text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-200 rounded-lg border border-red-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancel
                        </button>
                        <button type="button" id="confirm-delete-btn" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Delete User
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal elements
        const userModal = document.getElementById('user-modal');
        const deleteModal = document.getElementById('delete-modal');
        const userForm = document.getElementById('user-form');
        const deleteForm = document.getElementById('delete-form');
        const formMethod = document.getElementById('form-method');
        const userId = document.getElementById('user-id');
        const noResults = document.getElementById('no-results');
        
        // Buttons
        const addUserBtn = document.getElementById('add-user-btn');
        const saveUserBtn = document.getElementById('save-user-btn');
        const cancelUserBtn = document.getElementById('cancel-user-btn');
        const closeModalX = document.getElementById('close-modal-x');
        const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
        const cancelDeleteBtn = document.getElementById('cancel-delete-btn');
        const closeDeleteModalX = document.getElementById('close-delete-modal-x');
        
        // Edit buttons
        const editButtons = document.querySelectorAll('.edit-user-btn');
        
        // Delete buttons
        const deleteButtons = document.querySelectorAll('.delete-user-btn');
        
        // Search and filter
        const searchInput = document.getElementById('search-users');
        const roleFilter = document.getElementById('filter-role');
        const entriesPerPage = document.getElementById('entries-per-page');
        
        // Pagination info
        const showingStart = document.getElementById('showing-start');
        const showingEnd = document.getElementById('showing-end');
        const totalEntries = document.getElementById('total-entries');
        
        // Animation classes
        function addModalAnimation() {
            if (!document.querySelector('style#modal-animations')) {
                const style = document.createElement('style');
                style.id = 'modal-animations';
                style.textContent = `
                    @keyframes modalFadeIn {
                        from { opacity: 0; transform: scale(0.95); }
                        to { opacity: 1; transform: scale(1); }
                    }
                    .animate-modal-fade-in {
                        animation: modalFadeIn 0.2s ease-out forwards;
                    }
                `;
                document.head.appendChild(style);
            }
        }
        
        addModalAnimation();
        
        // Show user modal for adding a new user
        addUserBtn.addEventListener('click', function() {
            // Reset form
            userForm.reset();
            
            // Set form method to POST for new user
            formMethod.value = 'POST';
            userId.value = '';
            
            // Show password fields for new users
            document.querySelectorAll('.password-fields').forEach(field => {
                field.style.display = 'block';
            });
            
            // Update form action
            userForm.action = "{{ route('admin.users.store') }}";
            
            // Update modal title
            document.querySelector('#user-modal #modal-title').textContent = 'Add New User';
            
            // Show modal
            userModal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });
        
        // Close user modal
        function closeUserModal() {
            userModal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        
        cancelUserBtn.addEventListener('click', closeUserModal);
        closeModalX.addEventListener('click', closeUserModal);
        
        // Save user (add or update)
        saveUserBtn.addEventListener('click', function() {
            userForm.submit();
        });
        
        // Show edit user modal
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const id = row.dataset.userId;
                
                // Fetch user data
                fetch(`/admin/users/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        // Populate form with user data
                        document.getElementById('firstname').value = data.firstname;
                        document.getElementById('middleinitial').value = data.middleinitial;
                        document.getElementById('lastname').value = data.lastname;
                        document.getElementById('email').value = data.email;
                        document.getElementById('gender').value = data.gender;
                        document.getElementById('user_type').value = data.user_type;
                        
                        // Hide password fields for edit
                        document.querySelectorAll('.password-fields').forEach(field => {
                            field.style.display = 'none';
                        });
                        
                        // Set form method to PUT for update
                        formMethod.value = 'PUT';
                        userId.value = id;
                        
                        // Update form action
                        userForm.action = `/admin/users/${id}`;
                        
                        // Update modal title
                        document.querySelector('#user-modal #modal-title').textContent = 'Edit User';
                        
                        // Show modal
                        userModal.classList.remove('hidden');
                        document.body.classList.add('overflow-hidden');
                    })
                    .catch(error => {
                        console.error('Error fetching user data:', error);
                        showNotification('Failed to load user data. Please try again.', 'error');
                    });
            });
        });
        
        // Show delete confirmation modal
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const id = row.dataset.userId;
                const userName = row.querySelector('td:first-child .font-medium').textContent;
                
                // Update confirmation message with user name
                document.querySelector('#delete-modal .text-sm.font-medium').textContent = 
                    `Are you sure you want to delete the user "${userName}"? All of their data will be permanently removed. This action cannot be undone.`;
                
                // Set delete form action
                deleteForm.action = `/admin/users/${id}`;
                
                // Show modal
                deleteModal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });
        });
        
        // Close delete modal
        function closeDeleteModal() {
            deleteModal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        
        cancelDeleteBtn.addEventListener('click', closeDeleteModal);
        closeDeleteModalX.addEventListener('click', closeDeleteModal);
        
        // Confirm delete
        confirmDeleteBtn.addEventListener('click', function() {
            deleteForm.submit();
        });
        
        // Search functionality with debounce
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const searchTerm = this.value.toLowerCase();
                const rows = document.querySelectorAll('#users-table-body tr');
                let visibleCount = 0;
                
                rows.forEach(row => {
                    const userName = row.querySelector('td:first-child .font-medium').textContent.toLowerCase();
                    const userEmail = row.querySelector('td:nth-child(2) div:first-child').textContent.toLowerCase();
                    const userId = row.querySelector('td:first-child .text-xs').textContent.toLowerCase();
                    
                    if (userName.includes(searchTerm) || userEmail.includes(searchTerm) || userId.includes(searchTerm)) {
                        row.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        row.classList.add('hidden');
                    }
                });
                
                // Show/hide no results message
                if (visibleCount === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
                
                // Update pagination info
                updatePaginationInfo(visibleCount);
            }, 300);
        });
        
        // Filter by role
        roleFilter.addEventListener('change', function() {
            const selectedRole = this.value.toLowerCase();
            const rows = document.querySelectorAll('#users-table-body tr');
            let visibleCount = 0;
            
            if (!selectedRole) {
                // Show all rows if no role is selected
                rows.forEach(row => {
                    row.classList.remove('hidden');
                    visibleCount++;
                });
            } else {
                rows.forEach(row => {
                    const role = row.querySelector('td:nth-child(3) span').textContent.trim().toLowerCase();
                    if (role === selectedRole) {
                        row.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        row.classList.add('hidden');
                    }
                });
            }
            
            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
            
            // Update pagination info
            updatePaginationInfo(visibleCount);
        });
        
        // Entries per page functionality
        entriesPerPage.addEventListener('change', function() {
            const value = this.value;
            const rows = document.querySelectorAll('#users-table-body tr');
            const totalRows = rows.length;
            
            // Reset any existing filters first
            rows.forEach(row => row.classList.remove('hidden'));
            
            if (value !== 'all') {
                const limit = parseInt(value);
                rows.forEach((row, index) => {
                    if (index >= limit) {
                        row.classList.add('hidden');
                    }
                });
                
                // Update pagination info
                updatePaginationInfo(Math.min(limit, totalRows));
            } else {
                // Show all rows
                updatePaginationInfo(totalRows);
            }
        });
        
        // Update pagination info
        function updatePaginationInfo(visibleCount) {
            const total = document.querySelectorAll('#users-table-body tr').length;
            showingStart.textContent = visibleCount > 0 ? '1' : '0';
            showingEnd.textContent = visibleCount.toString();
            totalEntries.textContent = total.toString();
        }
        
        // Notification system
        function showNotification(message, type = 'success') {
            // Create notification element if it doesn't exist
            if (!document.getElementById('notification')) {
                const notification = document.createElement('div');
                notification.id = 'notification';
                notification.className = 'fixed top-4 right-4 z-50 max-w-xs transform transition-transform duration-300 ease-in-out translate-x-full';
                document.body.appendChild(notification);
            }
            
            const notification = document.getElementById('notification');
            
            // Set notification style based on type
            let bgColor, textColor, icon;
            if (type === 'success') {
                bgColor = 'bg-green-100';
                textColor = 'text-green-800';
                icon = '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>';
            } else {
                bgColor = 'bg-red-100';
                textColor = 'text-red-800';
                icon = '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>';
            }
            
            // Set notification content
            notification.innerHTML = `
                <div class="flex items-center p-4 mb-4 ${bgColor} border-t-4 border-${type === 'success' ? 'green' : 'red'}-800 rounded-b shadow-md">
                    <div class="${textColor} mr-3">
                        ${icon}
                    </div>
                    <div class="${textColor} text-sm font-medium">
                        ${message}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 ${bgColor} ${textColor} rounded-lg focus:ring-2 focus:ring-${type === 'success' ? 'green' : 'red'}-400 p-1.5 inline-flex h-8 w-8" onclick="this.parentElement.parentElement.remove()">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            `;
            
            // Show notification
            notification.classList.remove('translate-x-full');
            
            // Hide notification after 5 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 5000);
        }
        
        // Close modals when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === userModal) {
                closeUserModal();
            }
            if (event.target === deleteModal) {
                closeDeleteModal();
            }
        });
        
        // Close modals with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeUserModal();
                closeDeleteModal();
            }
        });
        
        // Initialize pagination info
        updatePaginationInfo(document.querySelectorAll('#users-table-body tr:not(.hidden)').length);
    });
    </script>
    @endpush
</x-sidebar-layout>