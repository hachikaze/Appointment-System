<x-sidebar-layout>
    <!-- Header Section for Log History -->
    <div class="mb-8 rounded-2xl shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-700 to-teal-800 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-teal-600 bg-opacity-30 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Log History</h1>
                        <p class="text-teal-100">View activities of users</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-teal-600 text-white shadow-sm border border-teal-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Audit Trail
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-100 px-6 py-3 border-t border-teal-300">
            <div class="flex items-center text-sm text-teal-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Track, review, and manage all activities and changes within the clinic from this dashboard.</span>
            </div>
        </div>
    </div>

    <!-- Activity Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Login Activities Card -->
        <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl shadow-sm p-4 border border-teal-200 hover:shadow-md transition duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-teal-600 bg-opacity-20 text-teal-700 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-teal-600 uppercase tracking-wide">Login Activities</p>
                    <p class="text-2xl font-bold text-teal-800">{{ App\Models\AuditTrail::where('action', 'Logged In')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Logout Activities Card -->
        <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl shadow-sm p-4 border border-teal-200 hover:shadow-md transition duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-teal-600 bg-opacity-20 text-teal-700 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-teal-600 uppercase tracking-wide">Logout Activities</p>
                    <p class="text-2xl font-bold text-teal-800">{{ App\Models\AuditTrail::where('action', 'Logged Out')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Appointment Activities Card -->
        <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl shadow-sm p-4 border border-teal-200 hover:shadow-md transition duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-teal-600 bg-opacity-20 text-teal-700 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-teal-600 uppercase tracking-wide">Appointment Activities</p>
                    <p class="text-2xl font-bold text-teal-800">{{ App\Models\AuditTrail::where('action', 'Create Appointment')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Cancellation Activities Card -->
        <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl shadow-sm p-4 border border-teal-200 hover:shadow-md transition duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-teal-600 bg-opacity-20 text-teal-700 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-teal-600 uppercase tracking-wide">Cancellation Activities</p>
                    <p class="text-2xl font-bold text-teal-800">{{ App\Models\AuditTrail::where('action', 'Cancelled Appointment')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-gradient-to-r from-teal-100 to-teal-50 rounded-xl shadow-sm p-5 mb-6 border border-teal-200">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <!-- Search by name -->
            <div class="flex-1 min-w-[200px]">
                <label for="search" class="block text-sm font-medium text-teal-800 mb-1">Search User</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="search"
                        name="search"
                        placeholder="Search by name"
                        value="{{ request('search') }}"
                        class="pl-10 w-full p-2.5 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-teal-50"
                    />
                </div>
            </div>

            <!-- Action filter -->
            <div class="flex-1 min-w-[200px]">
                <label for="filter" class="block text-sm font-medium text-teal-800 mb-1">Action</label>
                <div class="relative">
                    <select
                        id="filter"
                        name="filter"
                        class="w-full p-2.5 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-teal-50 appearance-none"
                    >
                        <option value="">All Actions</option>
                        <option value="Logged In" {{ request('filter') === 'Logged In' ? 'selected' : '' }}>Logged In</option>
                        <option value="Logged Out" {{ request('filter') === 'Logged Out' ? 'selected' : '' }}>Logged Out</option>
                        <option value="Create Appointment" {{ request('filter') === 'Create Appointment' ? 'selected' : '' }}>Create Appointment</option>
                        <option value="Cancelled Appointment" {{ request('filter') === 'Cancelled Appointment' ? 'selected' : '' }}>Cancelled Appointment</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Show entries -->
            <div class="flex-1 min-w-[200px]">
                <label for="perPage" class="block text-sm font-medium text-teal-800 mb-1">Show entries</label>
                <div class="relative">
                    <select
                        id="perPage"
                        name="perPage"
                        class="w-full p-2.5 border border-teal-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-teal-50 appearance-none"
                    >
                        <option value="50" {{ request('perPage', 50) == 50 ? 'selected' : '' }}>50 entries</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100 entries</option>
                        <option value="200" {{ request('perPage') == 200 ? 'selected' : '' }}>200 entries</option>
                        <option value="500" {{ request('perPage') == 500 ? 'selected' : '' }}>500 entries</option>
                        <option value="1000" {{ request('perPage') == 1000 ? 'selected' : '' }}>1000 entries</option>
                        <option value="all" {{ request('perPage') == 'all' ? 'selected' : '' }}>All entries</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
            <button
                    type="submit"
                    class="bg-teal-600 text-white px-5 py-2.5 rounded-lg hover:bg-teal-700 transition shadow-sm font-medium flex items-center gap-2 hover:shadow-md"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Apply Filters
                </button>
            </div>

            <!-- Reset Filters -->
            <div>
                <a
                    href="{{ route('admin.log-history') }}"
                    class="bg-white text-teal-700 border border-teal-300 px-5 py-2.5 rounded-lg hover:bg-teal-50 transition shadow-sm font-medium inline-flex items-center gap-2 hover:shadow-md"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset Filters
                </a>
            </div>
        </form>
    </div>

    <!-- Log History Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-teal-200">
        <div class="p-4 border-b border-teal-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 bg-gradient-to-r from-teal-100 to-teal-50">
            <h3 class="text-lg font-semibold text-teal-800 flex items-center">
                <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                Audit Trail Records
            </h3>
            <div class="flex items-center">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-teal-100 text-teal-800">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                    Showing {{ count($auditTrails) }} {{ count($auditTrails) == 1 ? 'entry' : 'entries' }}
                </span>
            </div>
        </div>
        <div class="overflow-x-auto overflow-y-auto" style="max-height: 65vh;">
            <table class="w-full table-auto">
                <thead class="sticky top-0 z-10">
                    <tr class="bg-teal-200 text-left">
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-800 uppercase tracking-wider border-r border-teal-300">User</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-800 uppercase tracking-wider border-r border-teal-300">Action</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-800 uppercase tracking-wider border-r border-teal-300">IP Address</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-800 uppercase tracking-wider">Timestamp</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-teal-200">
                    @forelse($auditTrails as $audit)
                        <tr class="hover:bg-teal-100 transition bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-200">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 flex-shrink-0 mr-3">
                                        <div class="h-8 w-8 rounded-full bg-gradient-to-r from-teal-500 to-teal-700 flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                            {{ substr($audit->user->firstname ?? 'N', 0, 1) }}{{ substr($audit->user->lastname ?? 'A', 0, 1) }}
                                        </div>
                                    </div>
                                    <div>
                                        {{ $audit->user->firstname ?? 'N/A' }}
                                        {{ $audit->user->middleinitial ?? '' }}
                                        {{ $audit->user->lastname ?? '' }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm border-r border-teal-200">
                                @php
                                    $actionColors = [
                                        'Logged In' => 'bg-green-100 text-green-800 border-green-200',
                                        'Logged Out' => 'bg-blue-100 text-blue-800 border-blue-200',
                                        'Create Appointment' => 'bg-purple-100 text-purple-800 border-purple-200',
                                        'Cancelled Appointment' => 'bg-red-100 text-red-800 border-red-200',
                                    ];
                                    $actionColor = $actionColors[$audit->action] ?? 'bg-teal-100 text-teal-800 border-teal-200';
                                    $actionIcons = [
                                        'Logged In' => '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>',
                                        'Logged Out' => '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>',
                                        'Create Appointment' => '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>',
                                        'Cancelled Appointment' => '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>',
                                    ];
                                    $actionIcon = $actionIcons[$audit->action] ?? '<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
                                @endphp
                                <span class="px-2 py-1 inline-flex items-center text-xs leading-5 font-semibold rounded-full border {{ $actionColor }}">
                                    {!! $actionIcon !!}
                                    {{ $audit->action }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 border-r border-teal-200">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                    </svg>
                                    {{ $audit->ip_address }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $audit->created_at->format('Y-m-d H:i:s') }}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center bg-white">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-teal-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-teal-800 font-medium text-lg">No audit trail records found</p>
                                    <p class="text-teal-600 text-sm mt-1">Try adjusting your search or filter criteria</p>
                                    <a href="{{ route('admin.log-history') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-teal-100 border border-teal-300 rounded-md font-medium text-teal-700 hover:bg-teal-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                        Reset Filters
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6 bg-white rounded-xl shadow-sm border border-teal-200 p-6">
    <h3 class="text-lg font-semibold text-teal-800 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
        </svg>
        Recent Activity Timeline
    </h3>
    <div class="relative overflow-y-auto" style="max-height: 400px;">
        <!-- Timeline items with icons instead of dots -->
        <div class="space-y-6 pr-2">
            @foreach($auditTrails->take(10) as $audit)
                <div class="relative pl-12">
                    <!-- Timeline icon  -->
                    @php
                        $iconColors = [
                            'Logged In' => 'bg-green-100 text-green-600 border-green-200',
                            'Logged Out' => 'bg-blue-100 text-blue-600 border-blue-200',
                            'Create Appointment' => 'bg-purple-100 text-purple-600 border-purple-200',
                            'Cancelled Appointment' => 'bg-red-100 text-red-600 border-red-200',
                        ];
                        $iconColor = $iconColors[$audit->action] ?? 'bg-teal-100 text-teal-600 border-teal-200';
                        
                        $icons = [
                            'Logged In' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>',
                            'Logged Out' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>',
                            'Create Appointment' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>',
                            'Cancelled Appointment' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>',
                        ];
                        $icon = $icons[$audit->action] ?? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
                    @endphp
                    
                    <div class="absolute left-0 top-0 w-8 h-8 rounded-full {{ $iconColor }} flex items-center justify-center border shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            {!! $icon !!}
                        </svg>
                    </div>
                        <!-- Timeline content -->
                        <div class="bg-gradient-to-r from-teal-50 to-white rounded-lg p-4 border border-teal-200 shadow-sm hover:shadow-md transition duration-300 transform hover:-translate-y-1">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                <div>
                                    <span class="text-sm text-teal-700 flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $audit->created_at->format('M d, Y') }} at {{ $audit->created_at->format('h:i A') }}
                                    </span>
                                    <h4 class="text-md font-medium text-teal-800 mt-1">
                                        {{ $audit->user->firstname ?? 'N/A' }}
                                        {{ $audit->user->middleinitial ?? '' }}
                                        {{ $audit->user->lastname ?? '' }}
                                    </h4>
                                </div>
                                <div class="mt-2 md:mt-0">
                                    <span class="px-2 py-1 inline-flex items-center text-xs leading-5 font-semibold rounded-full border {{ $actionColors[$audit->action] ?? 'bg-teal-100 text-teal-800 border-teal-200' }}">
                                        {!! $actionIcons[$audit->action] ?? '' !!}
                                        {{ $audit->action }}
                                    </span>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-teal-700 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                </svg>
                                <span class="font-medium">IP Address:</span> {{ $audit->ip_address }}
                            </p>
                        </div>
                    </div>
                @endforeach
                
                @if(count($auditTrails->take(10)) == 0)
                    <div class="py-8 text-center">
                        <svg class="w-12 h-12 text-teal-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-teal-800 font-medium">No recent activities found</p>
                        <p class="text-teal-600 text-sm mt-1">Activities will appear here as they occur</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Activity Summary -->
    <div class="mt-6 bg-white rounded-xl shadow-sm border border-teal-200 p-6 mb-6">
        <h3 class="text-lg font-semibold text-teal-800 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
            Activity Summary
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Activity by Type -->
            <div class="bg-teal-50 rounded-lg p-4 border border-teal-200">
                <h4 class="text-sm font-semibold text-teal-700 mb-3">Activity by Type</h4>
                
                @php
                    $activityTypes = [
                        'Logged In' => App\Models\AuditTrail::where('action', 'Logged In')->count(),
                        'Logged Out' => App\Models\AuditTrail::where('action', 'Logged Out')->count(),
                        'Create Appointment' => App\Models\AuditTrail::where('action', 'Create Appointment')->count(),
                        'Cancelled Appointment' => App\Models\AuditTrail::where('action', 'Cancelled Appointment')->count(),
                    ];
                    
                    $totalActivities = array_sum($activityTypes);
                @endphp
                
                @foreach($activityTypes as $type => $count)
                    @if($totalActivities > 0)
                        @php
                            $percentage = ($count / $totalActivities) * 100;
                            $barColor = match($type) {
                                'Logged In' => 'bg-green-500',
                                'Logged Out' => 'bg-blue-500',
                                'Create Appointment' => 'bg-purple-500',
                                'Cancelled Appointment' => 'bg-red-500',
                                default => 'bg-teal-500'
                            };
                        @endphp
                        <div class="mb-3">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-xs text-teal-700">{{ $type }}</span>
                                <span class="text-xs font-medium text-teal-800">{{ $count }} ({{ number_format($percentage, 1) }}%)</span>
                            </div>
                            <div class="w-full bg-teal-200 rounded-full h-2.5">
                                <div class="{{ $barColor }} h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            
            <!-- Recent Activity Stats -->
            <div class="bg-teal-50 rounded-lg p-4 border border-teal-200">
                <h4 class="text-sm font-semibold text-teal-700 mb-3">Recent Activity Stats</h4>
                
                @php
                    $today = App\Models\AuditTrail::whereDate('created_at', \Carbon\Carbon::today())->count();
                    $yesterday = App\Models\AuditTrail::whereDate('created_at', \Carbon\Carbon::yesterday())->count();
                    $thisWeek = App\Models\AuditTrail::whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()])->count();
                    $thisMonth = App\Models\AuditTrail::whereBetween('created_at', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()])->count();
                @endphp
                
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-white p-3 rounded-lg border border-teal-200 shadow-sm">
                        <p class="text-xs text-teal-600">Today</p>
                        <p class="text-xl font-bold text-teal-800">{{ $today }}</p>
                    </div>
                    <div class="bg-white p-3 rounded-lg border border-teal-200 shadow-sm">
                        <p class="text-xs text-teal-600">Yesterday</p>
                        <p class="text-xl font-bold text-teal-800">{{ $yesterday }}</p>
                    </div>
                    <div class="bg-white p-3 rounded-lg border border-teal-200 shadow-sm">
                        <p class="text-xs text-teal-600">This Week</p>
                        <p class="text-xl font-bold text-teal-800">{{ $thisWeek }}</p>
                    </div>
                    <div class="bg-white p-3 rounded-lg border border-teal-200 shadow-sm">
                        <p class="text-xs text-teal-600">This Month</p>
                        <p class="text-xl font-bold text-teal-800">{{ $thisMonth }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Animations and Scrollbar Styling -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate table rows
        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(10px)';
            row.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            setTimeout(() => {
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, 50 * index);
        });

        // Animate timeline items
        const timelineItems = document.querySelectorAll('.relative.pl-10');
        timelineItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(20px)';
            item.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateX(0)';
            }, 100 * index);
        });

        // Animate summary cards
        const summaryCards = document.querySelectorAll('.grid.grid-cols-1.sm\\:grid-cols-2.lg\\:grid-cols-4 > div');
        summaryCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100 * index);
        });

        // Custom scrollbar styling for scrollable containers
        const scrollableContainers = document.querySelectorAll('.overflow-y-auto');
        scrollableContainers.forEach(container => {
            container.style.scrollbarWidth = 'thin';
            container.style.scrollbarColor = '#0d9488 #e6fffa';
        });

        // For webkit browsers
        const style = document.createElement('style');
        style.textContent = `
            .overflow-y-auto::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }
            .overflow-y-auto::-webkit-scrollbar-track {
                background: #e6fffa;
                border-radius: 4px;
            }
            .overflow-y-auto::-webkit-scrollbar-thumb {
                background-color: #0d9488;
                border-radius: 4px;
                border: 2px solid #e6fffa;
            }
            .overflow-y-auto::-webkit-scrollbar-thumb:hover {
                background-color: #0f766e;
            }
        `;
        document.head.appendChild(style);

        const tableContainer = document.querySelector('.overflow-y-auto');
        if (tableContainer) {
            tableContainer.addEventListener('scroll', function() {
                const header = this.querySelector('thead');
                if (this.scrollTop > 0) {
                    header.classList.add('shadow-md');
                    header.style.backgroundColor = '#99f6e4'; 
                } else {
                    header.classList.remove('shadow-md');
                    header.style.backgroundColor = '#b2f5ea'; 
                }
            });
        }

        const filterSelect = document.getElementById('filter');
        const perPageSelect = document.getElementById('perPage');
        if (filterSelect) {
            filterSelect.addEventListener('change', function() {
                this.form.submit();
            });
        }
        if (perPageSelect) {
            perPageSelect.addEventListener('change', function() {
                this.form.submit();
            });
        }

        const searchInput = document.getElementById('search');
        if (searchInput) {
            let timeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    this.form.submit();
                }, 500);
            });
        }

        const cards = document.querySelectorAll('.bg-gradient-to-br');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('shadow-lg');
            });
            card.addEventListener('mouseleave', function() {
                this.classList.remove('shadow-lg');
            });
        });

        const timelineDots = document.querySelectorAll('.timeline-dot');
        timelineDots.forEach(dot => {
            dot.classList.add('animate-pulse');
        });

        document.querySelector('x-sidebar-layout').style.opacity = '0';
        document.querySelector('x-sidebar-layout').style.transition = 'opacity 0.5s ease';
        setTimeout(() => {
            document.querySelector('x-sidebar-layout').style.opacity = '1';
        }, 100);
    });
    </script>
</x-sidebar-layout>