<x-sidebar-layout>
    <!-- Header Section -->
    <div class="mb-8 rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Sentiment Analysis</h1>
                        <p class="text-teal-100">Monitor and analyze patient feedback and reviews</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Feedback Analytics
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
            <div class="flex items-center text-sm text-teal-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Analyze patient sentiment and feedback trends from this dashboard.</span>
            </div>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Positive Sentiment Card -->
        <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl shadow-sm border border-teal-200 p-4">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-teal-500/20 text-teal-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-teal-900">Positive Reviews</h2>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-semibold text-teal-800">78%</p>
                        <span class="ml-2 text-xs text-teal-600">+5% from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Neutral Sentiment Card -->
        <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl shadow-sm border border-teal-200 p-4">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-teal-500/20 text-teal-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-teal-900">Neutral Reviews</h2>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-semibold text-teal-800">15%</p>
                        <span class="ml-2 text-xs text-teal-600">-2% from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Negative Sentiment Card -->
        <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl shadow-sm border border-teal-200 p-4">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-teal-500/20 text-teal-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-teal-900">Negative Reviews</h2>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-semibold text-teal-800">7%</p>
                        <span class="ml-2 text-xs text-teal-600">-3% from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Average Rating Card -->
        <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl shadow-sm border border-teal-200 p-4">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-teal-500/20 text-teal-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-teal-900">Average Rating</h2>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-semibold text-teal-800">4.6/5</p>
                        <span class="ml-2 text-xs text-teal-600">+0.2 from last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sentiment Trend Chart -->
    <div class="bg-white rounded-xl shadow-sm border border-teal-200 p-4 mb-6">
        <h2 class="text-lg font-semibold text-teal-800 mb-4">Sentiment Trends</h2>
        <div class="h-64">
            <canvas id="sentimentTrendChart"></canvas>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="bg-gradient-to-r from-teal-50 to-white rounded-xl shadow-sm p-5 mb-6 border border-teal-100">
        <form class="flex flex-wrap gap-4 items-end">
            <!-- Date Range Filter -->
            <div class="flex-1 min-w-[200px]">
                <label for="dateRange" class="block text-sm font-medium text-teal-700 mb-1">Date Range</label>
                <div class="relative">
                    <select id="dateRange" class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none">
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last 90 days</option>
                        <option>This year</option>
                        <option>All time</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Sentiment Filter -->
            <div class="flex-1 min-w-[200px]">
                <label for="sentiment" class="block text-sm font-medium text-teal-700 mb-1">Sentiment</label>
                <div class="relative">
                    <select id="sentiment" class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none">
                        <option>All Sentiments</option>
                        <option>Positive</option>
                        <option>Neutral</option>
                        <option>Negative</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Service Filter -->
            <div class="flex-1 min-w-[200px]">
                <label for="service" class="block text-sm font-medium text-teal-700 mb-1">Service</label>
                <div class="relative">
                    <select id="service" class="w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white appearance-none">
                        <option>All Services</option>
                        <option>Dental Cleaning</option>
                        <option>Root Canal</option>
                        <option>Tooth Extraction</option>
                        <option>Dental Implants</option>
                        <option>Orthodontics</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-teal-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Search -->
            <div class="flex-1 min-w-[200px]">
                <label for="search" class="block text-sm font-medium text-teal-700 mb-1">Search Reviews</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="search" placeholder="Search reviews..." 
                           class="pl-10 w-full p-2.5 border border-teal-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-white" />
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="bg-teal-600 text-white px-5 py-2.5 rounded-lg hover:bg-teal-700 transition shadow-sm font-medium flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Apply Filters
                </button>
            </div>

            <!-- Reset Filters -->
            <div>
                <button type="button" 
                        class="bg-white text-teal-700 border border-teal-200 px-5 py-2.5 rounded-lg hover:bg-teal-50 transition shadow-sm font-medium inline-block">
                    Reset
                </button>
            </div>
        </form>
    </div>

    <!-- Reviews Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden border border-teal-100">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gradient-to-r from-teal-50 to-teal-100">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Appointment ID</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Patient</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Rating</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Service</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Review</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap border-r border-teal-200">Sentiment</th>
                        <th class="px-6 py-3 text-xs font-semibold text-teal-700 uppercase tracking-wider whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                    <tbody class="divide-y divide-teal-100">
                        @forelse ($reviews as $review)
                            <tr class="hover:bg-teal-50 transition">
                                <!-- Appointment ID -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 font-medium border-r border-teal-50">
                                    {{ $review->appointment_id }}
                                </td>

                                <!-- Patient -->
                                <td class="px-6 py-4 whitespace-nowrap border-r border-teal-50">
                                    <div class="flex items-center">
                                        <!-- Optionally create initials from the user's name -->
                                        @php
                                            $initials = $review->user && $review->user->name 
                                                        ? collect(explode(' ', $review->user->name))->map(fn($n) => strtoupper(substr($n, 0, 1)))->join('')
                                                        : 'NA';
                                        @endphp
                                        <div class="h-8 w-8 rounded-full bg-teal-100 flex items-center justify-center text-teal-800 font-medium">
                                            {{ $initials }}
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">
                                                <!-- Show user name, or fallback text -->
                                                {{ $review->user->name ?? 'Unknown' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Rating (Stars) -->
                                <td class="px-6 py-4 whitespace-nowrap border-r border-teal-50">
                                    @php
                                        $rating = $review->rating; // e.g. 3, 4, 5, etc.
                                    @endphp
                                    <div class="flex text-yellow-400">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-5 h-5 {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}" 
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 
                                                    3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 
                                                    1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-
                                                    .755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 
                                                    0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07
                                                    -3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38
                                                    -1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07
                                                    -3.292z"></path>
                                            </svg>
                                        @endfor
                                    </div>
                                </td>

                                <!-- Service -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-600 border-r border-teal-50">
                                    {{ $review->service }}
                                </td>

                                <!-- Review Text -->
                                <td class="px-6 py-4 border-r border-teal-50">
                                    <p class="text-sm text-teal-600 max-w-xs">
                                        {{ $review->review }}
                                    </p>
                                </td>

                                <!-- Sentiment -->
                                <td class="px-6 py-4 whitespace-nowrap border-r border-teal-50">
                                    @if ($review->sentiment === 'Positive')
                                        <span class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                            {{ $review->sentiment }}
                                        </span>
                                    @elseif ($review->sentiment === 'Neutral')
                                        <span class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                            {{ $review->sentiment }}
                                        </span>
                                    @elseif ($review->sentiment === 'Negative')
                                        <span class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full bg-red-100 text-red-800">
                                            {{ $review->sentiment }}
                                        </span>
                                    @else
                                        <span class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                            Not Analyzed
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                                                onclick="openViewModal()">
                                            View
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-teal-600">
                                    No reviews found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

            </table>
        </div>
        <!-- Pagination -->
        <div class="p-4">
            <nav class="flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-teal-300 text-sm font-medium rounded-md text-teal-700 bg-white hover:bg-teal-50">
                        Previous
                    </a>
                    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-teal-300 text-sm font-medium rounded-md text-teal-700 bg-white hover:bg-teal-50">
                        Next
                    </a>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-teal-700">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">12</span> results
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-teal-300 bg-white text-sm font-medium text-teal-500 hover:bg-teal-50">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" aria-current="page" class="z-10 bg-teal-50 border-teal-500 text-teal-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                1
                            </a>
                            <a href="#" class="bg-white border-teal-300 text-teal-500 hover:bg-teal-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                2
                            </a>
                            <a href="#" class="bg-white border-teal-300 text-teal-500 hover:bg-teal-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                3
                            </a>
                            <span class="relative inline-flex items-center px-4 py-2 border border-teal-300 bg-white text-sm font-medium text-teal-700">
                                ...
                            </span>
                            <a href="#" class="bg-white border-teal-300 text-teal-500 hover:bg-teal-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                8
                            </a>
                            <a href="#" class="bg-white border-teal-300 text-teal-500 hover:bg-teal-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                9
                            </a>
                            <a href="#" class="bg-white border-teal-300 text-teal-500 hover:bg-teal-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                10
                            </a>
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-teal-300 bg-white text-sm font-medium text-teal-500 hover:bg-teal-50">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </nav>
    <!-- Summary Section at the Bottom -->
    <div class="mt-6 bg-white rounded-lg shadow overflow-hidden border border-teal-100">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4">
            <h2 class="text-lg font-medium text-white">Sentiment Analysis Summary</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Summary Stats -->
                <div>
                    <h3 class="text-md font-semibold text-teal-800 mb-3">Key Metrics</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-2 border-b border-teal-100">
                            <span class="text-sm text-teal-700">Total Reviews</span>
                            <span class="text-sm font-medium text-teal-900">124</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b border-teal-100">
                            <span class="text-sm text-teal-700">Average Rating</span>
                            <span class="text-sm font-medium text-teal-900">4.6/5.0</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b border-teal-100">
                            <span class="text-sm text-teal-700">Positive Sentiment</span>
                            <span class="text-sm font-medium text-teal-900">78% (97 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b border-teal-100">
                            <span class="text-sm text-teal-700">Neutral Sentiment</span>
                            <span class="text-sm font-medium text-teal-900">15% (18 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b border-teal-100">
                            <span class="text-sm text-teal-700">Negative Sentiment</span>
                            <span class="text-sm font-medium text-teal-900">7% (9 reviews)</span>
                        </div>
                    </div>
                </div>
                
                <!-- Common Themes -->
                <div>
                    <h3 class="text-md font-semibold text-teal-800 mb-3">Common Themes</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-sm font-medium text-teal-700 mb-2">Positive Feedback</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Friendly staff (42)</span>
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Professional service (38)</span>
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Clean facility (35)</span>
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Painless procedures (29)</span>
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Thorough explanations (24)</span>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-teal-700 mb-2">Areas for Improvement</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Wait times (15)</span>
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Billing issues (8)</span>
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Appointment scheduling (7)</span>
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Pain management (5)</span>
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Follow-up communication (4)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View Review Modal -->
    <div id="viewModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
            <div class="px-6 py-4 border-b rounded-sm bg-gradient-to-r from-teal-600 to-teal-700 p-6">
                <h3 class="text-lg font-medium text-white">Review Details</h3>
            </div>
            <div class="px-6 py-4">
                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <div class="h-10 w-10 rounded-full bg-teal-100 flex items-center justify-center text-teal-800 font-medium mr-3">
                            JD
                        </div>
                        <div>
                            <h4 class="text-lg font-medium text-gray-900">John Doe</h4>
                            <p class="text-sm text-gray-500">Appointment ID: APT-2023-052</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Service</label>
                    <p class="text-sm text-gray-900 bg-gray-100 p-2 rounded">Dental Cleaning</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Review</label>
                    <p class="text-sm text-gray-900 bg-gray-100 p-3 rounded">
                        Great experience with Dr. Smith. The cleaning was thorough and the staff was very friendly. I appreciate the attention to detail and how they explained everything they were doing.
                    </p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sentiment Analysis</label>
                    <div class="flex items-center">
                        <span class="px-3 py-1.5 inline-flex items-center gap-1.5 text-xs font-medium rounded-full bg-green-100 text-green-800 mr-2">
                            Positive
                        </span>
                        <span class="text-sm text-gray-500">Confidence: 92%</span>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Key Phrases</label>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2 py-1 text-xs bg-teal-100 text-teal-800 rounded">great experience</span>
                        <span class="px-2 py-1 text-xs bg-teal-100 text-teal-800 rounded">thorough</span>
                        <span class="px-2 py-1 text-xs bg-teal-100 text-teal-800 rounded">friendly staff</span>
                        <span class="px-2 py-1 text-xs bg-teal-100 text-teal-800 rounded">attention to detail</span>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeViewModal()" class="px-4 py-2 text-lg mb-4 mt-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Initialize sentiment trend chart
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('sentimentTrendChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: 'Positive',
                            data: [65, 68, 70, 72, 74, 75, 78, 77, 76, 78, 80, 82],
                            borderColor: '#10B981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Neutral',
                            data: [25, 22, 20, 18, 16, 15, 15, 16, 17, 15, 14, 12],
                            borderColor: '#F59E0B',
                            backgroundColor: 'rgba(245, 158, 11, 0.1)',
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Negative',
                            data: [10, 10, 10, 10, 10, 10, 7, 7, 7, 7, 6, 6],
                            borderColor: '#EF4444',
                            backgroundColor: 'rgba(239, 68, 68, 0.1)',
                            tension: 0.3,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Sentiment Trends'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        }
                    }
                }
            });
        });

        // View modal functions
        function openViewModal() {
            document.getElementById('viewModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeViewModal() {
            document.getElementById('viewModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Add event listeners to view buttons
        document.addEventListener('DOMContentLoaded', function() {
            const viewButtons = document.querySelectorAll('button.bg-blue-600');
            viewButtons.forEach(button => {
                button.addEventListener('click', openViewModal);
            });

            // Close modal when clicking outside
            document.getElementById('viewModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeViewModal();
                }
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !document.getElementById('viewModal').classList.contains('hidden')) {
                    closeViewModal();
                }
            });
        });
    </script>
    @endpush
</x-sidebar-layout>