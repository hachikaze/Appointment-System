<x-sidebar-layout>

    <!-- Header Section for Appointments -->
    <div class="mb-8 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
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
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Audit Trail
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
            <div class="flex items-center text-sm text-teal-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Track, review, and manage all activities and changes within the clinic from this dashboard.</span>
            </div>
        </div>
    </div>

    <!-- Filters  -->
    <div class="bg-gradient-to-r from-teal-50 to-white rounded-xl shadow-sm p-5 mb-6 border border-teal-100">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <!-- Search by name -->
            <div class="flex-1 min-w-[200px]">
                <label for="search" class="block text-sm font-medium text-teal-700 mb-1">Search User</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="search"
                        name="search"
                        placeholder="Search by name"
                        value="{{ request('search') }}"
                        class="pl-10 w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white"
                    />
                </div>
            </div>
            
            <!-- Action filter -->
            <div class="flex-1 min-w-[200px]">
                <label for="filter" class="block text-sm font-medium text-teal-700 mb-1">Action</label>
                <div class="relative">
                    <select
                        id="filter"
                        name="filter"
                        class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none"
                        onchange="this.form.submit()"
                    >
                        <option value="">All Actions</option>
                        <option value="Logged In" {{ request('filter') === 'Logged In' ? 'selected' : '' }}>Logged In</option>
                        <option value="Logged Out" {{ request('filter') === 'Logged Out' ? 'selected' : '' }}>Logged Out</option>
                        <option value="Create Appointment" {{ request('filter') === 'Create Appointment' ? 'selected' : '' }}>Create Appointment</option>
                        <option value="Cancelled Appointment" {{ request('filter') === 'Cancelled Appointment' ? 'selected' : '' }}>Cancelled Appointment</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Per page -->
            <div class="flex-1 min-w-[200px]">
                <label for="perPage" class="block text-sm font-medium text-teal-700 mb-1">Show entries</label>
                <div class="relative">
                    <select
                        id="perPage"
                        name="perPage"
                        class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none"
                    >
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10 entries</option>
                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25 entries</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50 entries</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100 entries</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
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
                    class="bg-teal-600 text-white px-5 py-2.5 rounded-lg hover:bg-teal-700 transition shadow-sm font-medium flex items-center gap-2"
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
                    class="bg-white text-teal-700 border border-teal-200 px-5 py-2.5 rounded-lg hover:bg-teal-50 transition shadow-sm font-medium inline-block"
                >
                    Reset
                </a>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-teal-100 p-4">
        <!-- <h1 class="text-2xl font-bold text-teal-700 mb-4">Audit Trail</h1> -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gradient-to-r from-teal-50 to-teal-100 text-left">
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">User</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">Action</th>                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider border-r border-teal-200">IP Address</th>
                        <th class="px-6 py-3.5 text-xs font-semibold text-teal-700 uppercase tracking-wider">Timestamp</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-teal-100">
                    @forelse($auditTrails as $audit)
                        <tr class="hover:bg-teal-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-50">
                            {{ $audit->user->firstname ?? 'N/A' }} 
                    {{ $audit->user->middleinitial ?? '' }} 
                    {{ $audit->user->lastname ?? '' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-50">
                                {{ $audit->action }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-50">
                                {{ $audit->ip_address }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium">
                                {{ $audit->created_at->format('Y-m-d H:i:s') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-sm text-teal-500">
                                No audit trail records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-sidebar-layout>