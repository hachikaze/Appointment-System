    <x-sidebar-layout>
            <!-- Header Section for Inventory -->
            <div class="mb-8 rounded-lg shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-teal-600 to-teal-700 p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center">
                            <div class="bg-white bg-opacity-20 p-3 rounded-lg mr-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Dental Supplies Inventory</h1>
                                <p class="text-teal-100">Track and manage your clinic's supplies and equipment efficiently</p>
                            </div>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-white text-teal-700 shadow-sm">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Inventory Management
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-teal-50 px-6 py-3 border-t border-teal-200">
                    <div class="flex items-center text-sm text-teal-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Manage your dental supplies, track stock levels, and get alerts for low inventory items.</span>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <!-- Total Items Card -->
                <div class="bg-gradient-to-br from-teal-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-teal-500 transition-all hover:shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Total Items</p>
                            <p class="text-xl sm:text-2xl font-bold text-teal-700 mt-1 group-hover:text-teal-800 transition-colors">{{ $totalItems ?? 0 }}</p>
                        </div>
                        <div class="bg-teal-100 p-1.5 sm:p-2 rounded-full text-teal-600 group-hover:bg-teal-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500">All inventory items</p>
                    </div>
                </div>

                <!-- Low Stock Card -->
                <div class="bg-gradient-to-br from-amber-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-amber-500 transition-all hover:shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Low Stock</p>
                            <p class="text-xl sm:text-2xl font-bold text-amber-700 mt-1 group-hover:text-amber-800 transition-colors">{{ $lowStockItems ?? 0 }}</p>
                        </div>
                        <div class="bg-amber-100 p-1.5 sm:p-2 rounded-full text-amber-600 group-hover:bg-amber-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500">Items below minimum stock level</p>
                    </div>
                </div>

                <!-- Out of Stock Card -->
                <div class="bg-gradient-to-br from-red-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-red-500 transition-all hover:shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Out of Stock</p>
                            <p class="text-xl sm:text-2xl font-bold text-red-700 mt-1 group-hover:text-red-800 transition-colors">{{ $outOfStockItems ?? 0 }}</p>
                        </div>
                        <div class="bg-red-100 p-1.5 sm:p-2 rounded-full text-red-600 group-hover:bg-red-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500">Items with zero quantity</p>
                    </div>
                </div>

                <!-- Categories Card -->
                <div class="bg-gradient-to-br from-blue-50 to-white p-4 sm:p-5 rounded-lg shadow-sm border border-gray-200 border-l-4 border-l-blue-500 transition-all hover:shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium uppercase tracking-wider">Categories</p>
                            <p class="text-xl sm:text-2xl font-bold text-blue-700 mt-1 group-hover:text-blue-800 transition-colors">{{ count($allCategories) ?? 0 }}</p>
                        </div>
                        <div class="bg-blue-100 p-1.5 sm:p-2 rounded-full text-blue-600 group-hover:bg-blue-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2 pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500">Total inventory categories</p>
                    </div>
                </div>
            </div>

            <!-- Inventory Table -->
            <div class="bg-white rounded-lg shadow-sm mb-8 border border-teal-200">
                <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-6 py-4 rounded-t-lg flex flex-col md:flex-row justify-between items-center gap-3">
                    <h2 class="text-lg font-semibold text-white">Inventory Items</h2>
                    <div class="flex flex-wrap gap-3">
                        <button type="button" onclick="openCategoryModal()"
                            class="px-4 py-2 bg-white text-teal-600 rounded-md hover:bg-teal-50 transition-colors duration-200 shadow-sm flex items-center text-sm md:text-base border border-teal-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Manage Categories
                        </button>
                        <button type="button" onclick="openAddModal()"
                            class="px-4 py-2 bg-white text-teal-600 rounded-md hover:bg-teal-50 transition-colors duration-200 shadow-sm flex items-center text-sm md:text-base border border-teal-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add New Item
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                    @endif
                    <!-- Search and Filter Controls -->
                    <div class="bg-teal-50 p-4 rounded-lg mb-6 border border-teal-200">
                        <div class="flex flex-col md:flex-row md:items-end md:justify-between space-y-4 md:space-y-0">
                            <div class="flex flex-col md:flex-row md:items-end space-y-4 md:space-y-0 md:space-x-4">
                                <!-- Category Filter -->
                                <div>
                                    <label for="categoryFilter" class="block text-sm font-medium text-teal-700 mb-1">Filter by Category</label>
                                    <select id="categoryFilter" onchange="filterTable()" class="w-full md:w-48 p-2 border border-teal-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 bg-white">
                                        <option value="">All Categories</option>
                                        @foreach($allCategories as $cat)
                                        <option value="{{ $cat }}">{{ $cat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Status Filter -->
                                <div>
                                    <label for="statusFilter" class="block text-sm font-medium text-teal-700 mb-1">Filter by Status</label>
                                    <select id="statusFilter" onchange="filterTable()" class="w-full md:w-40 p-2 border border-teal-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 bg-white">
                                        <option value="">All Status</option>
                                        <option value="In Stock">In Stock</option>
                                        <option value="Low Stock">Low Stock</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Search Box -->
                            <div class="w-full md:w-64">
                                <label for="searchInput" class="block text-sm font-medium text-teal-700 mb-1">Search Items</label>
                                <div class="relative">
                                    <input type="text" id="searchInput" placeholder="Search by name..."
                                        onkeyup="filterTable()" class="w-full p-2 pl-10 border border-teal-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 bg-white">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inventory Table -->
                    <div class="overflow-x-auto rounded-lg border border-teal-200">
                        <table id="inventoryTable" class="min-w-full divide-y divide-teal-200">
                            <thead>
                                <tr class="bg-teal-100">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider border-r border-teal-200">
                                        Item Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider border-r border-teal-200">
                                        Category
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider border-r border-teal-200">
                                        Quantity
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider border-r border-teal-200">
                                        Unit
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider border-r border-teal-200">
                                        Min Stock
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider border-r border-teal-200">
                                        Expiry Date
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider border-r border-teal-200">
                                        Status
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-teal-700 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-teal-100">
                                @forelse($inventoryItems as $item)
                                @if($item->status !== 'Hidden')
                                <tr class="hover:bg-teal-50 inventory-row"
                                    data-category="{{ $item->category }}"
                                    data-status="{{ $item->quantity <= 0 ? 'Out of Stock' : ($item->quantity <= $item->minimum_stock_level ? 'Low Stock' : 'In Stock') }}"
                                    data-name="{{ strtolower($item->item_name) }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-teal-900 border-r border-teal-100">
                                        {{ $item->item_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm border-r border-teal-100">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-100 text-teal-800">
                                            {{ $item->category }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 border-r border-teal-100">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 border-r border-teal-100">
                                        {{ $item->unit }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-900 border-r border-teal-100">
                                        {{ $item->minimum_stock_level }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-teal-700 border-r border-teal-100">
                                        {{ $item->expiry_date ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm border-r border-teal-100">
                                        @if($item->quantity <= 0)
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Out of Stock
                                        </span>
                                        @elseif($item->quantity <= $item->minimum_stock_level)
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                            Low Stock
                                        </span>
                                        @else
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            In Stock
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button type="button" onclick="openUseModal({{ $item->id }}, '{{ $item->item_name }}', {{ $item->quantity }}, '{{ $item->unit }}')"
                                                class="text-blue-600 hover:text-blue-900 transition-colors duration-200 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                                </svg>
                                                Use
                                            </button>
                                            <button type="button" onclick="openEditModal({{ $item->id }})"
                                                class="text-teal-600 hover:text-teal-900 transition-colors duration-200 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </button>
                                            <button type="button" onclick="openDeleteModal({{ $item->id }})"
                                                class="text-red-600 hover:text-red-900 transition-colors duration-200 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-8 text-center text-sm text-teal-500">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-teal-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                            </svg>
                                            <p>No inventory items found.</p>
                                            <button type="button" onclick="openAddModal()" class="mt-3 px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition-colors duration-200 border border-teal-700">
                                                Add New Item
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- No Results Message (Hidden by default) -->
                        <div id="noResultsMessage" class="hidden py-8 text-center text-teal-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-teal-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <p>No items match your search criteria.</p>
                                <p class="text-sm mt-1">Try adjusting your filters or search terms.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination Controls -->
                    <div class="mt-4 flex flex-col sm:flex-row justify-between items-center border-t border-teal-200 pt-4">
                        <div class="flex items-center mb-3 sm:mb-0">
                            <label for="itemsPerPage" class="text-sm text-teal-600 mr-2">Show:</label>
                            <select id="itemsPerPage" onchange="changeItemsPerPage()" class="border border-teal-300 rounded-md text-sm p-1 focus:ring-teal-500 focus:border-teal-500 bg-white text-teal-700">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="all">All</option>
                            </select>
                            <span class="text-sm text-teal-600 ml-2">entries</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-sm text-teal-600 mr-4">Showing <span id="showingStart">1</span> to <span id="showingEnd">10</span> of <span id="totalItems">{{ count($inventoryItems) }}</span> entries</span>
                            <div class="flex border border-teal-300 rounded-md overflow-hidden">
                                <button id="prevPageBtn" onclick="prevPage()" class="px-3 py-1 bg-white text-teal-600 hover:bg-teal-50 disabled:opacity-50 disabled:cursor-not-allowed border-r border-teal-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                <div id="paginationNumbers" class="flex">
                                    <!-- Pagination numbers will be inserted by JavaScript -->
                                </div>
                                <button id="nextPageBtn" onclick="nextPage()" class="px-3 py-1 bg-white text-teal-600 hover:bg-teal-50 disabled:opacity-50 disabled:cursor-not-allowed border-l border-teal-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                    
                        
            <!-- Expiring Items and Critical Items Section  -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Expiring Items (Left Side) -->
                <div class="bg-white rounded-lg shadow-sm border border-orange-200">
                    <div class="bg-gradient-to-r from-orange-600 to-orange-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Items Nearing Expiration
                        </h2>
                    </div>
                    <div class="p-6 bg-gradient-to-b from-orange-50 to-white">
                        <div class="overflow-x-auto max-h-72 rounded-lg border border-orange-200 shadow-inner">
                            <table class="min-w-full divide-y divide-orange-200">
                                <thead class="bg-orange-100 sticky top-0">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-orange-800 uppercase tracking-wider border-r border-orange-200">Item Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-orange-800 uppercase tracking-wider border-r border-orange-200">Category</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-orange-800 uppercase tracking-wider border-r border-orange-200">Expiry Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-orange-800 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-orange-100">
                                    @php
                                    $expiringItems = $inventoryItems
                                    ->filter(function($item) {
                                        if (!$item->expiry_date) return false;
                                        $expiryDate = \Carbon\Carbon::parse($item->expiry_date);
                                        $today = \Carbon\Carbon::today();
                                        // Include items that expired up to 30 days ago or will expire within 90 days
                                        $daysOverdue = $today->diffInDays($expiryDate, false);
                                        return $daysOverdue >= -30 && $daysOverdue <= 90;
                                    })
                                    ->sortBy('expiry_date')
                                    ->take(10); // Show top 10 items
                                    @endphp
                                    @forelse($expiringItems as $item)
                                    @php
                                    $expiryDate = \Carbon\Carbon::parse($item->expiry_date);
                                    $today = \Carbon\Carbon::today();
                                    $daysLeft = $today->diffInDays($expiryDate, false); // Use false to get signed difference
                                    @endphp
                                    <tr class="hover:bg-orange-50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-orange-900 border-r border-orange-100">
                                            {{ $item->item_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm border-r border-orange-100">
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-100 text-teal-800 border border-teal-200">
                                                {{ $item->category }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-orange-700 border-r border-orange-100">
                                            {{ $item->expiry_date }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if($daysLeft < 0)
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">
                                                Expired {{ abs($daysLeft) }} days ago
                                            </span>
                                            @elseif($daysLeft <= 30)
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">
                                                {{ $daysLeft }} days left
                                            </span>
                                            @elseif($daysLeft <= 60)
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800 border border-orange-200">
                                                {{ $daysLeft }} days left
                                            </span>
                                            @else
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-100 text-teal-800 border border-teal-200">
                                                {{ $daysLeft }} days left
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-sm text-orange-600">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-10 h-10 text-orange-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <p>No items are nearing expiration.</p>
                                                <p class="text-xs mt-1 text-orange-500">All your inventory items are within safe expiry periods.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- Footer with legend -->
                        <div class="mt-4 flex flex-wrap gap-3 justify-center text-xs text-orange-700">
                            <div class="flex items-center">
                                <span class="w-3 h-3 inline-block bg-red-100 border border-red-200 rounded-full mr-1"></span>
                                <span>Expired/Critical</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-3 h-3 inline-block bg-orange-100 border border-orange-200 rounded-full mr-1"></span>
                                <span>Warning</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-3 h-3 inline-block bg-teal-100 border border-teal-200 rounded-full mr-1"></span>
                                <span>Safe</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Critical Items (Right Side) -->
                <div class="bg-white rounded-lg shadow-sm border border-red-200">
                    <div class="bg-gradient-to-r from-red-600 to-red-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            Critical Items
                        </h2>
                    </div>
                    <div class="p-6 bg-gradient-to-b from-red-50 to-white">
                        <div class="overflow-x-auto max-h-72 rounded-lg border border-red-200 shadow-inner">
                            <table class="min-w-full divide-y divide-red-200">
                                <thead class="bg-red-100 sticky top-0">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-red-800 uppercase tracking-wider border-r border-red-200">Item Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-red-800 uppercase tracking-wider border-r border-red-200">Category</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-red-800 uppercase tracking-wider border-r border-red-200">Quantity</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-red-800 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-red-100">
                                @php
                                    $criticalItems = $inventoryItems
                                        ->filter(function($item) {
                                            // Include all items below minimum stock level
                                            return $item->quantity < $item->minimum_stock_level;
                                        })
                                        ->sortBy(function($item) {
                                            // Sort by how critical they are (lowest percentage first)
                                            if ($item->minimum_stock_level == 0) return 0;
                                            return $item->quantity / $item->minimum_stock_level;
                                        })
                                        ->take(10);
                                    @endphp
                                    @forelse($criticalItems as $item)
                                    <tr class="hover:bg-red-50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-900 border-r border-red-100">
                                            {{ $item->item_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm border-r border-red-100">
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-100 text-teal-800 border border-teal-200">
                                                {{ $item->category }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-900 border-r border-red-100">
                                            {{ $item->quantity }} {{ $item->unit }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @php
                                                // Calculate percentage of minimum stock
                                                $percentage = ($item->minimum_stock_level > 0) 
                                                    ? ($item->quantity / $item->minimum_stock_level) * 100 
                                                    : 0;
                                                $percentage = round($percentage);
                                            @endphp

                                            @if($item->quantity <= 0)
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">
                                                    Out of Stock
                                                </span>
                                            @elseif($percentage <= 20)
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">
                                                    Severe ({{ $percentage }}%)
                                                </span>
                                            @elseif($percentage <= 50)
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800 border border-amber-200">
                                                    Critical ({{ $percentage }}%)
                                                </span>
                                            @elseif($percentage < 100)
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200">
                                                    Low ({{ $percentage }}%)
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-sm text-red-600">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-10 h-10 text-red-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <p>No critical items found.</p>
                                                <p class="text-xs mt-1 text-red-500">All inventory items are at healthy stock levels.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Footer with legend and action button -->
                        <div class="mt-4 flex flex-col sm:flex-row justify-between items-center">
                            <div class="flex flex-wrap gap-3 justify-center text-xs text-red-700 mb-3 sm:mb-0">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 inline-block bg-red-100 border border-red-200 rounded-full mr-1"></span>
                                    <span>Out of Stock</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-3 h-3 inline-block bg-amber-100 border border-amber-200 rounded-full mr-1"></span>
                                    <span>Critical Level</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-3 h-3 inline-block bg-teal-100 border border-teal-200 rounded-full mr-1"></span>
                                    <span>Category</span>
                                </div>
                            </div>
                            
                            <button type="button" onclick="openOrderCriticalItemsModal()"
                                class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-500 text-white rounded-md hover:from-red-700 hover:to-red-600 transition-colors duration-200 shadow-sm flex items-center border border-red-700">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Order Critical Items
                            </button>
                        </div>
                    </div>
                </div>
                </div>

                <!-- Recent Activities Section -->
                <div class="bg-white rounded-lg shadow-md mb-8 border border-teal-200 transition-all duration-300 hover:shadow-lg">
                    <div class="bg-gradient-to-r from-teal-700 to-teal-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Recent Activities
                        </h2>
                        <!-- Search Input -->
                        <div class="relative hidden md:block">
                            <input type="text" id="activity-search" placeholder="Search activities..."
                                class="pl-10 pr-4 py-2 rounded-lg text-sm border border-teal-300 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-teal-50 text-teal-700 placeholder-teal-300">
                            <svg class="w-5 h-5 text-teal-300 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <!-- Search Indicator -->
                            <div id="search-indicator" class="hidden absolute right-3 top-2.5 flex items-center space-x-1">
                                <span class="inline-flex h-2 w-2 rounded-full bg-teal-400 animate-pulse"></span>
                                <span class="text-xs text-teal-600 font-medium">Filtering</span>
                            </div>
                        </div>
                    </div>
                    <!-- Controls Bar -->
                    <div class="bg-teal-50 px-6 py-3 border-b border-teal-200 flex flex-col md:flex-row justify-between items-center gap-3">
                        <!-- Filter Controls -->
                        <div class="flex flex-wrap items-center gap-2 w-full md:w-auto">
                            <div class="flex items-center">
                                <label for="activity-type" class="text-sm text-teal-700 mr-2">Filter by:</label>
                                <select id="activity-type" class="text-sm border border-teal-300 rounded-md px-3 py-1.5 bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                                    <option value="all">All Activities</option>
                                    <option value="use">Usage</option>
                                    <option value="add">Additions</option>
                                    <option value="edit">Edits</option>
                                    <option value="delete">Deletions</option>
                                    <option value="order">Orders</option>
                                    <option value="category">Categories</option>
                                </select>
                            </div>
                            <div class="flex items-center ml-0 md:ml-3">
                                <label for="date-range" class="text-sm text-teal-700 mr-2">Date:</label>
                                <select id="date-range" class="text-sm border border-teal-300 rounded-md px-3 py-1.5 bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                                    <option value="all">All Time</option>
                                    <option value="today">Today</option>
                                    <option value="yesterday">Yesterday</option>
                                    <option value="week">This Week</option>
                                    <option value="month">This Month</option>
                                    <option value="custom">Custom Range</option>
                                </select>
                            </div>
                            <!-- Custom Date Range (hidden by default) -->
                            <div id="custom-date-range" class="hidden flex items-center gap-2">
                                <input type="date" id="date-from" class="text-sm border border-teal-300 rounded-md px-3 py-1.5 bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                                <span class="text-teal-500">to</span>
                                <input type="date" id="date-to" class="text-sm border border-teal-300 rounded-md px-3 py-1.5 bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                                <button id="apply-date-range" class="bg-teal-600 text-white px-3 py-1.5 rounded-md text-sm hover:bg-teal-700 transition-colors border border-teal-700 shadow-sm">Apply</button>
                            </div>
                        </div>
                        <!-- Search for mobile -->
                        <div class="relative w-full md:hidden mb-2">
                            <input type="text" id="activity-search-mobile" placeholder="Search activities..."
                                class="w-full pl-10 pr-4 py-2 rounded-lg text-sm border border-teal-300 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 bg-teal-50">
                            <svg class="w-5 h-5 text-teal-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <!-- Mobile Search Indicator -->
                            <div id="search-indicator-mobile" class="hidden absolute right-3 top-2.5 flex items-center space-x-1">
                                <span class="inline-flex h-2 w-2 rounded-full bg-teal-400 animate-pulse"></span>
                                <span class="text-xs text-teal-600 font-medium">Filtering</span>
                            </div>
                        </div>
                        <!-- Entries per page selector -->
                        <div class="flex items-center w-full md:w-auto justify-end">
                            <label for="entries-per-page" class="text-sm text-teal-700 mr-2">Show:</label>
                            <select id="entries-per-page" class="text-sm border border-teal-300 rounded-md px-3 py-1.5 bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                                <option value="10">10 entries</option>
                                <option value="20">20 entries</option>
                                <option value="25">25 entries</option>
                                <option value="50">50 entries</option>
                                <option value="100">100 entries</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto max-h-96 rounded-lg border border-teal-200">
                            <div class="min-w-full divide-y divide-teal-100">
                                <!-- Activity Timeline -->
                                <div class="relative">
                                    <!-- Timeline Line -->
                                    <div class="absolute left-5 top-0 bottom-0 w-0.5 bg-teal-200"></div>
                                    <!-- Activity Items -->
                                    <div id="activity-list" class="activity-list space-y-0">
                                        @forelse($recentActivities as $activity)
                                        <div class="relative pl-12 py-4 hover:bg-teal-50 transition-colors duration-150 activity-item"
                                            data-type="{{ $activity->type }}"
                                            data-date="{{ $activity->created_at->format('Y-m-d') }}">
                                            <!-- Timeline Dot - Color based on activity type -->
                                            <div class="absolute left-5 top-5 -ml-1 h-2 w-2 rounded-full
                                                {{ $activity->type == 'use' ? 'bg-blue-500' : '' }}
                                                {{ $activity->type == 'add' ? 'bg-green-500' : '' }}
                                                {{ $activity->type == 'edit' ? 'bg-amber-500' : '' }}
                                                {{ $activity->type == 'delete' ? 'bg-red-500' : '' }}
                                                {{ $activity->type == 'order' ? 'bg-purple-500' : '' }}
                                                {{ $activity->type == 'category' ? 'bg-teal-500' : '' }}
                                                ring-4 ring-white"></div>
                                            <!-- Activity Content -->
                                            <div class="flex flex-col sm:flex-row sm:items-start">
                                                <div class="mb-1 sm:mb-0 sm:mr-4 flex-shrink-0">
                                                    <span class="text-xs text-teal-600">{{ $activity->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div>
                                                    <p class="text-sm text-teal-800">
                                                        {!! $activity->description !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <!-- This will be handled by our empty states below -->
                                        @endforelse
                                    </div>
                                    <!-- Empty States -->
                                    <div id="empty-state-container" class="py-8 text-center text-teal-500 hidden">
                                        <!-- No Activities State -->
                                        <div id="no-activities-state" class="flex flex-col items-center">
                                            <svg class="w-16 h-16 text-teal-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <p class="text-lg font-medium">No recent activities found</p>
                                            <p class="text-sm mt-1">Activities will appear here as you manage your inventory.</p>
                                        </div>
                                        <!-- No Search Results State -->
                                        <div id="no-search-results-state" class="flex flex-col items-center hidden">
                                            <svg class="w-16 h-16 text-teal-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                            <p class="text-lg font-medium">No matching activities found</p>
                                            <p class="text-sm mt-1">Try adjusting your search or filter criteria.</p>
                                            <button id="clear-filters" class="mt-4 px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors border border-teal-700 shadow-sm">
                                                Clear All Filters
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Loading State -->
                                    <div id="loading-state" class="py-8 text-center text-teal-500 hidden">
                                        <div class="flex flex-col items-center">
                                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-teal-500 mb-3"></div>
                                            <p>Loading activities...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pagination -->
                        <div class="mt-6 flex flex-col sm:flex-row justify-between items-center">
                            <div class="text-sm text-teal-600 mb-3 sm:mb-0">
                                Showing <span id="showing-start">1</span> to <span id="showing-end">{{ min(count($recentActivities), 10) }}</span> of <span id="total-entries">{{ count($recentActivities) }}</span> entries
                            </div>
                            <div class="flex justify-center">
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                    <button id="prev-page" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-teal-300 bg-white text-sm font-medium text-teal-500 hover:bg-teal-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                        <span class="sr-only">Previous</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="pagination-numbers" class="pagination-numbers">
                                        <!-- Pagination numbers will be inserted here via JavaScript hehe-->
                                    </div>
                                    <button id="next-page" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-teal-300 bg-white text-sm font-medium text-teal-500 hover:bg-teal-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                        <span class="sr-only">Next</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Add Item Modal -->
            <div id="addModal" class="fixed inset-0 bg-gray-900 bg-opacity-60 hidden items-center justify-center z-50 backdrop-blur-sm overflow-y-auto">
            <div class="bg-white rounded-xl shadow-2xl max-w-2xl mx-auto w-full my-8 transition-all duration-300 transform">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-8 py-5 rounded-t-xl flex justify-between items-center">
                <h3 class="text-xl font-semibold text-white flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Inventory Item
                </h3>
                <button onclick="closeAddModal()" class="text-white hover:text-gray-200 transition-colors duration-200 p-1 rounded-full hover:bg-teal-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                </div>
        
                <!-- Form Content -->
                <form action="{{ route('admin.inventory.store') }}" method="POST" class="p-8">
                @csrf
                
                <!-- Main Form Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Left Column -->
                    <div>
                    <!-- Item Name -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="item_name">
                        Item Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="text" id="item_name" name="item_name" required
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors"
                            placeholder="Enter item name">
                        </div>
                    </div>
            
                    <!-- Category -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="category">
                        Category <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <select id="category" name="category" required 
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 appearance-none bg-white transition-colors">
                            <option value="">Select a category</option>
                            @foreach($allCategories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        </div>
                    </div>
                    
                    <!-- Quantity and Unit -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="quantity">
                            Quantity <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                            </div>
                            <input type="number" id="quantity" name="quantity" required min="0" value="1"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors">
                        </div>
                        </div>
                        <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="unit">
                            Unit <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                            </div>
                            <select id="unit" name="unit" required 
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 appearance-none bg-white transition-colors">
                            <option value="Piece">Piece</option>
                            <option value="Box">Box</option>
                            <option value="Pack">Pack</option>
                            <option value="Bottle">Bottle</option>
                            <option value="Tube">Tube</option>
                            <option value="Set">Set</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
            
                    <!-- Right Column -->
                    <div>
                    <!-- Minimum Stock Level -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="minimum_stock_level">
                        Minimum Stock Level <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                            </svg>
                        </div>
                        <input type="number" id="minimum_stock_level" name="minimum_stock_level" required min="0" value="5"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors">
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Alert will be triggered when stock falls below this level</p>
                    </div>
                    
                    <!-- Expiry Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="expiry_date">
                        Expiry Date (if applicable)
                        </label>
                        <div class="flex items-center">
                        <div class="relative flex-grow">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            </div>
                            <input type="date" id="expiry_date" name="expiry_date"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors">
                        </div>
                        <button type="button" onclick="clearExpiryDate('expiry_date')"
                            class="ml-2 px-3 py-3 text-sm text-gray-600 hover:text-gray-800 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                            Clear
                        </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Leave empty for items with no expiry date</p>
                    </div>
                    </div>
                </div>
                
                <!-- Notes Section (Full Width) -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="notes">
                    Notes
                    </label>
                    <div class="relative">
                    <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <textarea id="notes" name="notes" rows="3" placeholder="Additional information about this item (storage location, supplier details, etc.)"
                        class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors"></textarea>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 mt-6 border-t border-gray-200 pt-6">
                    <button type="button" onclick="closeAddModal()"
                    class="px-5 py-3 bg-white text-gray-700 rounded-lg border border-gray-300 hover:bg-gray-50 font-medium transition-colors duration-200 shadow-sm">
                    Cancel
                    </button>
                    <button type="submit"
                    class="px-5 py-3 bg-gradient-to-r from-teal-600 to-teal-500 text-white rounded-lg hover:from-teal-700 hover:to-teal-600 transition-colors duration-200 font-medium shadow-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Item
                    </button>
                </div>
                </form>
        
                <!-- Form Tips Section -->
                <div class="bg-gray-50 px-8 py-4 rounded-b-xl border-t border-gray-200">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    </div>
                    <div class="ml-3">
                    <p class="text-sm text-gray-600">
                        Fields marked with <span class="text-red-500">*</span> are required. You can edit item details later if needed.
                    </p>
                    </div>
                </div>
                </div>
            </div>
            </div>
            
            <!-- Use Item Modal Without Form Field Icons -->
            <div id="useModal" class="fixed inset-0 bg-gray-900 bg-opacity-60 hidden items-center justify-center z-50 backdrop-blur-sm overflow-y-auto">
            <div class="bg-white rounded-xl shadow-2xl max-w-2xl mx-auto w-full my-8 md:my-12 transform transition-all duration-300 relative">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-teal-700 to-teal-500 px-4 sm:px-6 md:px-8 py-4 md:py-5 rounded-t-xl flex justify-between items-center">
                <h3 class="text-lg md:text-xl font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 md:w-6 md:h-6 mr-2 md:mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span class="truncate">Use Inventory Item</span>
                </h3>
                <button type="button" onclick="closeUseModal()" class="text-white hover:text-gray-200 transition-colors duration-200 p-1 rounded-full hover:bg-teal-600 flex-shrink-0">
                    <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                </div>
                
                <!-- <form id="useForm" action="route('admin.inventory.use', ['id' => $item->id])" method="POST" class="p-4 sm:p-6 md:p-8 overflow-y-auto max-h-[calc(100vh-10rem)]"> -->
                <form id="useForm" action="{{ route('admin.inventory.record-usage') }}" method="POST" class="p-4 sm:p-6 md:p-8 overflow-y-auto max-h-[calc(100vh-10rem)]">
                @csrf
                <input type="hidden" id="use_inventory_id" name="inventory_id">
                
                <!-- Item Information Section -->
                <div class="bg-gradient-to-r from-teal-50 to-teal-100 p-4 sm:p-5 md:p-6 rounded-xl border border-teal-200 mb-5 md:mb-6 shadow-sm">
                    <h4 class="text-sm font-semibold text-teal-800 mb-3 md:mb-4 flex items-center">
                    <svg class="w-4 h-4 md:w-5 md:h-5 mr-1.5 md:mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Item Information
                    </h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-5">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5" for="use_item_name">Item Name</label>
                        <input type="text" id="use_item_name" class="w-full p-2.5 md:p-3 border border-teal-300 rounded-lg shadow-sm bg-white font-medium text-gray-800" readonly>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5" for="use_available">Available Quantity</label>
                        <input type="text" id="use_available" class="w-full p-2.5 md:p-3 border border-teal-300 rounded-lg shadow-sm bg-white font-medium text-teal-600" readonly>
                    </div>
                    
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5" for="use_quantity">
                        Quantity to Use <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                        <input type="number" id="use_quantity" name="quantity" min="1" required
                            class="w-full p-2.5 md:p-3 pr-14 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                            <span id="unit_display" class="text-sm text-gray-500"></span>
                        </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Enter the quantity you want to use from inventory</p>
                    </div>
                    </div>
                </div>
                
                <!-- Appointment Selection Section -->
                <div class="mb-5 md:mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="appointment_selection">
                    Select Appointment
                    </label>
                    <div class="relative">
                    <select id="appointment_selection" name="appointment_id" 
                        class="w-full p-2.5 md:p-3 pr-10 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 appearance-none bg-white transition-colors">
                        <option value="">-- Select an appointment --</option>
                        
                        <!-- Today's Appointments -->
                        @if(isset($todaysAppointments) && $todaysAppointments->count() > 0)
                        <optgroup label="Today's Appointments">
                        @foreach($todaysAppointments as $appointment)
                        <option value="{{ $appointment->id }}">
                            {{ $appointment->time }} - {{ $appointment->patient_name }} ({{ $appointment->appointments }})
                        </option>
                        @endforeach
                        </optgroup>
                        @endif
                        
                        <!-- Upcoming Appointments -->
                        @if(isset($upcomingAppointments) && $upcomingAppointments->count() > 0)
                        <optgroup label="Upcoming Appointments">
                        @foreach($upcomingAppointments as $appointment)
                        <option value="{{ $appointment->id }}">
                            {{ date('M d', strtotime($appointment->date)) }} - {{ $appointment->time }} - {{ $appointment->patient_name }} ({{ $appointment->appointments }})
                        </option>
                        @endforeach
                        </optgroup>
                        @endif
                        
                        <!-- No Appointment Option -->
                        <option value="no_appointment">No Specific Appointment</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Link this usage to a specific appointment or select "No Specific Appointment"</p>
                </div>
                
                <!-- Appointment Details Section -->
                <div id="appointment_details" class="mb-5 md:mb-6 p-4 sm:p-5 md:p-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200 hidden shadow-sm">
                    <h4 class="text-sm font-semibold text-blue-800 mb-3 md:mb-4 flex items-center">
                    <svg class="w-4 h-4 md:w-5 md:h-5 mr-1.5 md:mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Appointment Details
                    </h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 text-sm">
                    <div class="bg-white p-3 rounded-lg border border-blue-100 shadow-sm">
                        <span class="font-medium text-gray-500 block text-xs mb-1">Patient</span>
                        <span id="patient_name" class="text-gray-800 font-semibold break-words">-</span>
                    </div>
                    <div class="bg-white p-3 rounded-lg border border-blue-100 shadow-sm">
                        <span class="font-medium text-gray-500 block text-xs mb-1">Date</span>
                        <span id="appointment_date" class="text-gray-800 font-semibold break-words">-</span>
                    </div>
                    <div class="bg-white p-3 rounded-lg border border-blue-100 shadow-sm">
                        <span class="font-medium text-gray-500 block text-xs mb-1">Time</span>
                        <span id="appointment_time" class="text-gray-800 font-semibold break-words">-</span>
                    </div>
                    <div class="bg-white p-3 rounded-lg border border-blue-100 shadow-sm">
                        <span class="font-medium text-gray-500 block text-xs mb-1">Procedure</span>
                        <span id="appointment_procedure" class="text-gray-800 font-semibold break-words">-</span>
                    </div>
                    </div>
                </div>
                
                <!-- Additional Notes -->
                <div class="mb-5 md:mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="use_notes">
                    Additional Notes (Optional)
                    </label>
                    <textarea id="use_notes" name="notes" rows="3" placeholder="e.g., Used for specific procedure, special circumstances, etc."
                    class="w-full p-2.5 md:p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors"></textarea>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-wrap justify-end gap-3 mt-6 pt-5 border-t border-gray-200">
                    <button type="button" onclick="closeUseModal()"
                    class="px-4 py-2.5 md:px-5 md:py-3 bg-white text-gray-700 rounded-lg border border-gray-300 hover:bg-gray-50 font-medium transition-colors duration-200 shadow-sm">
                    Cancel
                    </button>
                    <button type="submit"
                    class="px-5 py-2.5 md:px-6 md:py-3 bg-gradient-to-r from-teal-600 to-teal-500 text-white rounded-lg hover:from-teal-700 hover:to-teal-600 transition-colors duration-200 font-medium shadow-sm flex items-center">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Confirm Usage
                    </button>
                </div>
                </form>
                
                <!-- Form Tips Section -->
                <div class="bg-gray-50 px-4 sm:px-6 md:px-8 py-3 md:py-4 rounded-b-xl border-t border-gray-200">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    </div>
                    <div class="ml-3">
                    <p class="text-xs md:text-sm text-gray-600">
                        Using an item will reduce its quantity in inventory. This action will be recorded in the activity log.
                    </p>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <!-- Restock Critical Items Modal -->
            <div id="orderCriticalModal" class="fixed inset-0 bg-gray-900 bg-opacity-60 hidden items-center justify-center z-50 backdrop-blur-sm overflow-y-auto">
            <div class="bg-white rounded-xl shadow-2xl max-w-lg mx-auto w-full my-8 md:my-12 transform transition-all duration-300">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-red-700 to-red-500 px-5 py-4 rounded-t-xl flex justify-between items-center">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Restock Critical Items
                </h3>
                <button onclick="closeOrderCriticalModal()" class="text-white hover:text-gray-200 transition-colors duration-200 p-1 rounded-full hover:bg-red-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                </div>
                
                <form action="{{ route('admin.inventory.order-critical') }}" method="POST" class="p-5 md:p-6">
                @csrf
                <input type="hidden" id="critical_item_id" name="item_id">
                
                <!-- Item Selection -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="critical_item_select">Select Critical Item</label>
                    <div class="relative">
                    <select id="critical_item_select" onchange="populateCriticalItemFields()" 
                        class="w-full p-2.5 pr-10 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-red-500 focus:border-red-500 appearance-none bg-white">
                        <option value="">-- Select an item --</option>
                        @foreach($criticalItems as $item)
                        <option value="{{ $item->id }}"
                        data-name="{{ $item->item_name }}"
                        data-category="{{ $item->category }}"
                        data-unit="{{ $item->unit }}"
                        data-min-stock="{{ $item->minimum_stock_level }}"
                        data-current-stock="{{ $item->quantity }}">
                        {{ $item->item_name }} ({{ $item->quantity }} {{ $item->unit }})
                        </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    </div>
                </div>
                
                <!-- Item Information Card -->
                <div class="bg-gradient-to-r from-red-50 to-orange-50 p-5 rounded-xl mb-5 border border-red-100 shadow-sm">
                    <h4 class="text-sm font-semibold text-red-800 mb-4 flex items-center">
                    <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Item Information
                    </h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1" for="critical_item_name">Item Name</label>
                        <input type="text" id="critical_item_name" readonly
                        class="w-full p-2.5 border border-red-200 rounded-lg shadow-sm bg-white font-medium text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1" for="critical_category">Category</label>
                        <input type="text" id="critical_category" readonly
                        class="w-full p-2.5 border border-red-200 rounded-lg shadow-sm bg-white font-medium text-gray-800">
                    </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1" for="critical_minimum_stock_level">Minimum Stock Level</label>
                        <input type="text" id="critical_minimum_stock_level" readonly
                        class="w-full p-2.5 border border-red-200 rounded-lg shadow-sm bg-white font-medium text-gray-800">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1" for="critical_current_stock">Current Stock</label>
                        <input type="text" id="critical_current_stock" readonly
                        class="w-full p-2.5 border border-red-200 rounded-lg shadow-sm bg-white text-red-600 font-bold">
                    </div>
                    </div>
                </div>
                
                <!-- Restock Details -->
                <div class="mb-5">
                    <h4 class="text-sm font-semibold text-gray-700 mb-4 flex items-center">
                    <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Restock Details
                    </h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5" for="critical_quantity">
                        Restock Quantity <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="critical_quantity" name="quantity" required min="1"
                        class="w-full p-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5" for="critical_unit">Unit</label>
                        <input type="text" id="critical_unit" name="unit" readonly
                        class="w-full p-2.5 border border-gray-300 rounded-lg shadow-sm bg-gray-50 font-medium text-gray-700">
                    </div>
                    </div>
                    
                    <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5" for="critical_notes">Restock Notes</label>
                    <textarea id="critical_notes" name="notes" rows="3"
                        class="w-full p-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-red-500 focus:border-red-500"
                        placeholder="Add any special instructions or supplier information"></textarea>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <button type="button" onclick="closeOrderCriticalModal()"
                    class="px-4 py-2.5 bg-white text-gray-700 rounded-lg border border-gray-300 hover:bg-gray-50 font-medium transition-colors duration-200 shadow-sm">
                    Cancel
                    </button>
                    <button type="submit"
                    class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-500 text-white rounded-lg hover:from-red-700 hover:to-red-600 transition-colors duration-200 font-medium shadow-sm flex items-center">
                    <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Confirm Restock
                    </button>
                </div>
                </form>
            </div>
            </div>


            <!-- Category Modal -->
            <div id="categoryModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm overflow-y-auto">
                <div class="bg-white rounded-lg shadow-xl max-w-md mx-4 w-full my-8">
                    <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Manage Categories
                        </h3>
                        <button onclick="closeCategoryModal()" class="text-white hover:text-gray-200 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('admin.inventory.categories.store') }}" method="POST" class="mb-6">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="new_category">Add New Category</label>
                                <div class="flex">
                                    <input type="text" id="new_category" name="category_name" required
                                        class="flex-1 p-2 border border-gray-300 rounded-l-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                                    <button type="submit"
                                        class="px-4 py-2 bg-gradient-to-r from-teal-600 to-teal-500 text-white rounded-r-md hover:from-teal-700 hover:to-teal-600 transition-colors duration-200">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Current Categories</h4>
                            <div class="max-h-60 overflow-y-auto border border-gray-200 rounded-md">
                                <ul class="divide-y divide-gray-200">
                                    @forelse($allCategories as $cat)
                                    <li class="p-3 flex justify-between items-center hover:bg-gray-50">
                                        <div class="flex items-center">
                                            <span class="text-sm text-gray-800">{{ $cat }}</span>
                                            @if(in_array($cat, ['Instruments', 'Disposables', 'Medications', 'Cleaning Supplies', 'Office Supplies', 'Equipment', 'PPE']))
                                            <span class="ml-2 px-2 py-0.5 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">Default</span>
                                            @endif
                                            
                                            @php
                                                $hasItems = false;
                                                foreach($inventoryItems as $item) {
                                                    if ($item->category === $cat) {
                                                        $hasItems = true;
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            
                                            @if($hasItems)
                                            <span class="ml-2 px-2 py-0.5 text-xs font-medium bg-amber-100 text-amber-800 rounded-full">Has Items</span>
                                            @endif
                                        </div>
                                        <div class="flex space-x-2">
                                            <button type="button" onclick="openEditCategoryModal('{{ $cat }}')" class="text-teal-600 hover:text-teal-900 transition-colors duration-200">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </button>
                                            
                                            @if(!in_array($cat, ['Instruments', 'Disposables', 'Medications', 'Cleaning Supplies', 'Office Supplies', 'Equipment', 'PPE']))
                                                @if($hasItems)
                                                <button type="button" disabled title="Cannot delete category with items" 
                                                    class="text-gray-400 cursor-not-allowed">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                                @else
                                                <form action="{{ route('admin.inventory.categories.destroy', ['category' => $cat]) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this category? This will not delete items in this category.')"
                                                        class="text-red-600 hover:text-red-900 transition-colors duration-200">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                                @endif
                                            @else
                                            <button type="button" disabled title="Cannot delete default category" 
                                                class="text-gray-400 cursor-not-allowed">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                            @endif
                                        </div>
                                    </li>
                                    @empty
                                    <li class="p-4 text-center text-sm text-gray-500">
                                        No categories found. Add your first category above.
                                    </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" onclick="closeCategoryModal()"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-60 hidden items-center justify-center z-50 backdrop-blur-sm overflow-y-auto">
            <div class="bg-white rounded-xl shadow-2xl max-w-2xl mx-auto w-full my-8 transition-all duration-300 transform">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-8 py-5 rounded-t-xl flex justify-between items-center">
                <h3 class="text-xl font-semibold text-white flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Inventory Item
                </h3>
                <button onclick="closeEditModal()" class="text-white hover:text-gray-200 transition-colors duration-200 p-1 rounded-full hover:bg-teal-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                </div>
                
                <!-- Form Content -->
                <form id="editForm" action="" method="POST" class="p-8">
                @csrf
                @method('PUT')
                
                <!-- Main Form Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Left Column -->
                    <div>
                    <!-- Item Name -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="edit_item_name">
                        Item Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="text" id="edit_item_name" name="item_name" required
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors">
                        </div>
                    </div>
                    
                    <!-- Category -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="edit_category">
                        Category <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <select id="edit_category" name="category" required 
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 appearance-none bg-white transition-colors">
                            @foreach($allCategories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        </div>
                    </div>
                    
                    <!-- Quantity and Unit -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="edit_quantity">
                            Quantity <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                            </div>
                            <input type="number" id="edit_quantity" name="quantity" required min="0"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors">
                        </div>
                        </div>
                        <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="edit_unit">
                            Unit <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                            </div>
                            <select id="edit_unit" name="unit" required 
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 appearance-none bg-white transition-colors">
                            <option value="Piece">Piece</option>
                            <option value="Box">Box</option>
                            <option value="Pack">Pack</option>
                            <option value="Bottle">Bottle</option>
                            <option value="Tube">Tube</option>
                            <option value="Set">Set</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div>
                    <!-- Minimum Stock Level -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="edit_minimum_stock_level">
                        Minimum Stock Level <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                            </svg>
                        </div>
                        <input type="number" id="edit_minimum_stock_level" name="minimum_stock_level" required min="0"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors">
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Alert will be triggered when stock falls below this level</p>
                    </div>
                    
                    <!-- Expiry Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="edit_expiry_date">
                        Expiry Date (if applicable)
                        </label>
                        <div class="flex items-center">
                        <div class="relative flex-grow">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            </div>
                            <input type="date" id="edit_expiry_date" name="expiry_date"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors">
                        </div>
                        <button type="button" onclick="clearExpiryDate('edit_expiry_date')"
                            class="ml-2 px-3 py-3 text-sm text-gray-600 hover:text-gray-800 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                            Clear
                        </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Leave empty for items with no expiry date</p>
                    </div>
                    </div>
                </div>
                
                <!-- Notes Section (Full Width) -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="edit_notes">
                    Notes
                    </label>
                    <div class="relative">
                    <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <textarea id="edit_notes" name="notes" rows="3"
                        class="w-full pl-10 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors"></textarea>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 mt-6 border-t border-gray-200 pt-6">
                    <button type="button" onclick="closeEditModal()"
                    class="px-5 py-3 bg-white text-gray-700 rounded-lg border border-gray-300 hover:bg-gray-50 font-medium transition-colors duration-200 shadow-sm">
                    Cancel
                    </button>
                    <button type="submit"
                    class="px-5 py-3 bg-gradient-to-r from-teal-600 to-teal-500 text-white rounded-lg hover:from-teal-700 hover:to-teal-600 transition-colors duration-200 font-medium shadow-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Item
                    </button>
                </div>
                </form>
                
                <!-- Form Tips Section -->
                <div class="bg-gray-50 px-8 py-4 rounded-b-xl border-t border-gray-200">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-amber-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    </div>
                    <div class="ml-3">
                    <p class="text-sm text-gray-600">
                        Editing this item will update its information across the entire inventory system.
                    </p>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <!-- Edit Category Modal -->
            <div id="editCategoryModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm overflow-y-auto">
                <div class="bg-white rounded-lg shadow-xl max-w-md mx-4 w-full my-8">
                    <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Category
                        </h3>
                        <button onclick="closeEditCategoryModal()" class="text-white hover:text-gray-200 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form id="editCategoryForm" action="" method="POST" class="p-6">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="original_category_name" name="original_category_name">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="edit_category_name">Category Name</label>
                            <input type="text" id="edit_category_name" name="category_name" required
                                class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeEditCategoryModal()"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-gradient-to-r from-teal-600 to-teal-500 text-white rounded-md hover:from-teal-700 hover:to-teal-600 transition-colors duration-200">
                                Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Confirmation Modal -->
            <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm overflow-y-auto">
                <div class="bg-white rounded-lg shadow-xl max-w-md mx-4 w-full my-8">
                    <div class="bg-gradient-to-r from-red-600 to-red-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete Item
                        </h3>
                        <button onclick="closeDeleteModal()" class="text-white hover:text-gray-200 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="mb-6">
                            <div class="flex items-center justify-center mb-4 text-red-500">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <p class="text-center text-gray-700 mb-2">Are you sure you want to delete this item?</p>
                            <p class="text-center text-gray-500 text-sm">This action cannot be undone.</p>
                        </div>
                        <form id="deleteForm" action="" method="POST" class="flex justify-center space-x-4">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="closeDeleteModal()"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-500 text-white rounded-md hover:from-red-700 hover:to-red-600 transition-colors duration-200">
                                Delete Item
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        <script> 
            // Add Item Modal functions
            function openAddModal() {
                const modal = document.getElementById('addModal');
                if (modal) {
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.classList.add('overflow-hidden'); // Prevent background scrolling
                    // Focus on the first input field
                    setTimeout(() => {
                        const firstInput = document.getElementById('item_name');
                        if (firstInput) firstInput.focus();
                    }, 100);
                } else {
                    console.error('Add modal not found');
                }
            }

            function closeAddModal() {
                const modal = document.getElementById('addModal');
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
                    // Reset form
                    const form = modal.querySelector('form');
                    if (form) form.reset();
                }
            }

            // Use Item Modal functions
            function openUseModal(itemId, itemName, quantity, unit) {
                const modal = document.getElementById('useModal');
                if (modal) {
                    // Set form values
                    document.getElementById('use_inventory_id').value = itemId;
                    document.getElementById('use_item_name').value = itemName;
                    document.getElementById('use_available').value = quantity + ' ' + unit;
                    
                    // Set default quantity to 1
                    const quantityInput = document.getElementById('use_quantity');
                    quantityInput.value = 1;
                    quantityInput.max = quantity; // Set max to available quantity
                    
                    // Reset appointment selection
                    const appointmentSelect = document.getElementById('appointment_selection');
                    if (appointmentSelect) {
                        appointmentSelect.value = '';
                    }
                    
                    // Hide appointment details
                    const appointmentDetails = document.getElementById('appointment_details');
                    if (appointmentDetails) {
                        appointmentDetails.classList.add('hidden');
                    }
                    
                    // Clear notes field
                    const notesField = document.getElementById('use_notes');
                    if (notesField) {
                        notesField.value = '';
                    }
                    
                    // Show modal
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.classList.add('overflow-hidden'); // Prevent background scrolling
                    
                    // Focus on the quantity input
                    setTimeout(() => {
                        quantityInput.focus();
                        quantityInput.select();
                    }, 100);
                } else {
                    console.error('Use modal not found');
                }
            }

            function closeUseModal() {
                const modal = document.getElementById('useModal');
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
                    
                    // Reset form
                    const form = document.getElementById('useForm');
                    if (form) {
                        form.reset();
                    }
                    
                    // Hide appointment details
                    const appointmentDetails = document.getElementById('appointment_details');
                    if (appointmentDetails) {
                        appointmentDetails.classList.add('hidden');
                    }
                }
            }

            function handleAppointmentSelection() {
                const appointmentSelect = document.getElementById('appointment_selection');
                const appointmentDetails = document.getElementById('appointment_details');
                
                if (!appointmentSelect || !appointmentDetails) {
                    return; // Exit if elements don't exist
                }
                
                // Add event listener to the appointment selection dropdown
                appointmentSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const selectedValue = this.value;
                    
                    if (selectedValue && selectedValue !== 'no_appointment') {
                        // Show appointment details section
                        appointmentDetails.classList.remove('hidden');
                        
                        // Get the text content of the selected option
                        const optionText = selectedOption.textContent.trim();
                        console.log("Selected option text:", optionText);
                        
                        // Parse the option text to extract details
                        let patient, time, procedure, date;
                        
                        // First, check if this is an upcoming appointment with a date
                        if (optionText.match(/^[A-Za-z]{3} \d{1,2} - /)) {
                            // This is an upcoming appointment with date format: "Mar 01 - 08:00 - 09:00 - John Doe (Tooth Restoration)"
                            const dateEndIndex = optionText.indexOf(' - ');
                            date = optionText.substring(0, dateEndIndex).trim();
                            
                            // Extract the rest after the date
                            const afterDate = optionText.substring(dateEndIndex + 3);
                            
                            // Find the patient part which comes after the time range
                            // The time range has format "08:00 - 09:00"
                            const timeRangeEndIndex = afterDate.indexOf(' - ', afterDate.indexOf(' - ') + 1);
                            
                            if (timeRangeEndIndex !== -1) {
                                // Extract the full time range
                                time = afterDate.substring(0, timeRangeEndIndex).trim();
                                
                                // Extract patient and procedure
                                const patientPart = afterDate.substring(timeRangeEndIndex + 3).trim();
                                const procedureMatch = patientPart.match(/\(([^)]+)\)/);
                                procedure = procedureMatch ? procedureMatch[1] : 'General';
                                patient = patientPart.replace(/\([^)]+\)/, '').trim();
                            } else {
                                // Fallback
                                time = afterDate.substring(0, afterDate.lastIndexOf(' - ')).trim();
                                const patientPart = afterDate.substring(afterDate.lastIndexOf(' - ') + 3).trim();
                                const procedureMatch = patientPart.match(/\(([^)]+)\)/);
                                procedure = procedureMatch ? procedureMatch[1] : 'General';
                                patient = patientPart.replace(/\([^)]+\)/, '').trim();
                            }
                        } else {
                            // This is today's appointment format: "08:00 - 09:00 - John Doe (Tooth Restoration)"
                            date = 'Today';
                            
                            // Find the patient part which comes after the time range
                            const timeRangeEndIndex = optionText.indexOf(' - ', optionText.indexOf(' - ') + 1);
                            
                            if (timeRangeEndIndex !== -1) {
                                // Extract the full time range
                                time = optionText.substring(0, timeRangeEndIndex).trim();
                                
                                // Extract patient and procedure
                                const patientPart = optionText.substring(timeRangeEndIndex + 3).trim();
                                const procedureMatch = patientPart.match(/\(([^)]+)\)/);
                                procedure = procedureMatch ? procedureMatch[1] : 'General';
                                patient = patientPart.replace(/\([^)]+\)/, '').trim();
                            } else {
                                // Fallback if format doesn't match expected pattern
                                const parts = optionText.split(' - ');
                                if (parts.length >= 2) {
                                    time = parts[0].trim();
                                    const lastPart = parts[parts.length - 1].trim();
                                    const procedureMatch = lastPart.match(/\(([^)]+)\)/);
                                    procedure = procedureMatch ? procedureMatch[1] : 'General';
                                    patient = lastPart.replace(/\([^)]+\)/, '').trim();
                                } else {
                                    patient = optionText;
                                    time = 'Unknown';
                                    procedure = 'Unknown';
                                }
                            }
                        }
                        
                        console.log("Parsed data:", { patient, date, time, procedure });
                        
                        // Update the details in the UI
                        document.getElementById('patient_name').textContent = patient;
                        document.getElementById('appointment_date').textContent = date;
                        document.getElementById('appointment_time').textContent = time;
                        document.getElementById('appointment_procedure').textContent = procedure;
                    } else {
                        // Hide appointment details section
                        appointmentDetails.classList.add('hidden');
                    }
                });
            }

            // Validate the use form before submission
            function validateUseForm(event) {
                const form = event.target;
                const quantityInput = form.querySelector('#use_quantity');
                const availableText = document.getElementById('use_available').value;
                const availableQuantity = parseInt(availableText.split(' ')[0]);
                
                if (parseInt(quantityInput.value) > availableQuantity) {
                    event.preventDefault();
                    alert('You cannot use more than the available quantity.');
                    return false;
                }
                
                if (parseInt(quantityInput.value) <= 0) {
                    event.preventDefault();
                    alert('Quantity must be greater than zero.');
                    return false;
                }
                
                return true;
            }

            // Order Critical Items Modal functions
            function openOrderCriticalItemsModal() {
                const modal = document.getElementById('orderCriticalModal');
                if (modal) {
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.classList.add('overflow-hidden'); // Prevent background scrolling
                    // Focus on the dropdown
                    setTimeout(() => {
                        const dropdown = document.getElementById('critical_item_select');
                        if (dropdown) dropdown.focus();
                    }, 100);
                } else {
                    console.error('Order Critical Items modal not found');
                }
            }

            function closeOrderCriticalModal() {
                const modal = document.getElementById('orderCriticalModal');
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
                    // Reset form
                    const form = modal.querySelector('form');
                    if (form) form.reset();
                    // Clear all fields
                    document.getElementById('critical_item_id').value = ''; // Clear the hidden item ID
                    document.getElementById('critical_item_name').value = '';
                    document.getElementById('critical_category').value = '';
                    document.getElementById('critical_quantity').value = '';
                    document.getElementById('critical_unit').value = '';
                    document.getElementById('critical_minimum_stock_level').value = '';
                    document.getElementById('critical_current_stock').value = '';
                    document.getElementById('critical_notes').value = '';
                }
            }

            function populateCriticalItemFields() {
                const select = document.getElementById('critical_item_select');
                const selectedOption = select.options[select.selectedIndex];
                if (select.value) {
                    // Get data from the selected option
                    const itemId = select.value; // This should be the item ID
                    const itemName = selectedOption.getAttribute('data-name');
                    const category = selectedOption.getAttribute('data-category');
                    const unit = selectedOption.getAttribute('data-unit');
                    const minStock = selectedOption.getAttribute('data-min-stock');
                    const currentStock = selectedOption.getAttribute('data-current-stock');
                    
                    // Populate the form fields
                    document.getElementById('critical_item_id').value = itemId; // Set the hidden item ID
                    document.getElementById('critical_item_name').value = itemName;
                    document.getElementById('critical_category').value = category;
                    document.getElementById('critical_unit').value = unit;
                    document.getElementById('critical_minimum_stock_level').value = minStock;
                    document.getElementById('critical_current_stock').value = currentStock + ' ' + unit;
                    
                    // Calculate suggested order quantity (minimum stock level - current stock)
                    const suggestedQuantity = Math.max(minStock - currentStock, 1);
                    document.getElementById('critical_quantity').value = suggestedQuantity;
                    
                    // Set focus to the quantity field for easy adjustment
                    document.getElementById('critical_quantity').focus();
                    document.getElementById('critical_quantity').select();
                } else {
                    // Clear all fields if no item is selected
                    document.getElementById('critical_item_id').value = '';
                    document.getElementById('critical_item_name').value = '';
                    document.getElementById('critical_category').value = '';
                    document.getElementById('critical_quantity').value = '';
                    document.getElementById('critical_unit').value = '';
                    document.getElementById('critical_minimum_stock_level').value = '';
                    document.getElementById('critical_current_stock').value = '';
                }
            }

            // Category Modal functions
            function openCategoryModal() {
                const modal = document.getElementById('categoryModal');
                if (modal) {
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.classList.add('overflow-hidden'); // Prevent background scrolling
                    // Focus on the input field
                    setTimeout(() => {
                        const input = document.getElementById('new_category');
                        if (input) input.focus();
                    }, 100);
                } else {
                    console.error('Category modal not found');
                }
            }

            function closeCategoryModal() {
                const modal = document.getElementById('categoryModal');
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
                    // Reset form
                    const form = modal.querySelector('form');
                    if (form) form.reset();
                }
            }

            // Edit Category Modal functions
            function openEditCategoryModal(categoryName) {
                const modal = document.getElementById('editCategoryModal');
                if (modal) {
                    // Set form values
                    document.getElementById('edit_category_name').value = categoryName;
                    document.getElementById('original_category_name').value = categoryName;
                    
                    // Set form action URL
                    document.getElementById('editCategoryForm').action = `/admin/inventory/categories/${encodeURIComponent(categoryName)}`;
                    
                    // Show modal without closing the category modal
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    
                    // Focus on the input field
                    setTimeout(() => {
                        const input = document.getElementById('edit_category_name');
                        if (input) {
                            input.focus();
                            input.select(); // Select all text for easy editing
                        }
                    }, 100);
                } else {
                    console.error('Edit Category modal not found');
                }
            }

            function closeEditCategoryModal() {
                const modal = document.getElementById('editCategoryModal');
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
                    // Reset form
                    const form = document.getElementById('editCategoryForm');
                    if (form) form.reset();
                }
            }

            // Edit Modal functions
            function openEditModal(itemId) {
                // Fetch item data via AJAX
                fetch(`/admin/inventory/${itemId}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.item) {
                            // Populate form with item data
                            document.getElementById('edit_item_name').value = data.item.item_name;
                            document.getElementById('edit_category').value = data.item.category;
                            document.getElementById('edit_quantity').value = data.item.quantity;
                            document.getElementById('edit_unit').value = data.item.unit;
                            document.getElementById('edit_minimum_stock_level').value = data.item.minimum_stock_level;
                            document.getElementById('edit_expiry_date').value = data.item.expiry_date || '';
                            document.getElementById('edit_notes').value = data.item.notes || '';
                            
                            // Set form action URL
                            document.getElementById('editForm').action = `/admin/inventory/${itemId}`;
                            
                            // Show modal
                            const modal = document.getElementById('editModal');
                            modal.classList.remove('hidden');
                            modal.classList.add('flex');
                            document.body.classList.add('overflow-hidden'); // Prevent background scrolling
                            
                            // Focus on the first input field
                            setTimeout(() => {
                                const firstInput = document.getElementById('edit_item_name');
                                if (firstInput) firstInput.focus();
                            }, 100);
                        } else {
                            console.error('Item data not found');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching item data:', error);
                    });
            }

            function closeEditModal() {
                const modal = document.getElementById('editModal');
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
                    // Reset form
                    const form = document.getElementById('editForm');
                    if (form) form.reset();
                }
            }

            // Delete Modal functions
            function openDeleteModal(itemId) {
                const modal = document.getElementById('deleteModal');
                if (modal) {
                    // Set form action URL
                    document.getElementById('deleteForm').action = `/admin/inventory/${itemId}`;
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.classList.add('overflow-hidden'); // Prevent background scrolling
                } else {
                    console.error('Delete modal not found');
                }
            }

            function closeDeleteModal() {
                const modal = document.getElementById('deleteModal');
                if (modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
                }
            }

            // Utility function to clear expiry date fields
            function clearExpiryDate(fieldId) {
                document.getElementById(fieldId).value = '';
            }

            // Table filtering function (continued)
            function filterTable() {
                const searchInput = document.getElementById('searchInput').value.toLowerCase();
                const categoryFilter = document.getElementById('categoryFilter').value;
                const statusFilter = document.getElementById('statusFilter').value;
                const rows = document.querySelectorAll('.inventory-row');
                let visibleCount = 0;
                
                rows.forEach(row => {
                    const itemName = row.getAttribute('data-name').toLowerCase();
                    const category = row.getAttribute('data-category');
                    const status = row.getAttribute('data-status');
                    
                    const matchesSearch = itemName.includes(searchInput);
                    const matchesCategory = categoryFilter === '' || category === categoryFilter;
                    const matchesStatus = statusFilter === '' || status === statusFilter;
                    
                    if (matchesSearch && matchesCategory && matchesStatus) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });
                
                // Show/hide "No results" message
                const noResultsMessage = document.getElementById('noResultsMessage');
                if (visibleCount === 0 && rows.length > 0) {
                    noResultsMessage.classList.remove('hidden');
                } else {
                    noResultsMessage.classList.add('hidden');
                }
                
                // Update pagination after filtering
                updatePagination();
            }

            // Pagination variables
            let currentPage = 1;
            let itemsPerPage = 10;

            // Initialize pagination
            function initPagination() {
                updatePagination();
                document.getElementById('itemsPerPage').value = itemsPerPage;
            }

            // Change items per page
            function changeItemsPerPage() {
                const select = document.getElementById('itemsPerPage');
                itemsPerPage = select.value === 'all' ? 1000 : parseInt(select.value);
                currentPage = 1; // Reset to first page
                updatePagination();
            }

            // Update pagination display and controls
            function updatePagination() {
                const rows = Array.from(document.querySelectorAll('.inventory-row')).filter(row => row.style.display !== 'none');
                const totalItems = rows.length;
                const totalPages = itemsPerPage === 'all' ? 1 : Math.ceil(totalItems / itemsPerPage);
                
                // Adjust current page if needed
                if (currentPage > totalPages) {
                    currentPage = totalPages > 0 ? totalPages : 1;
                }
                
                // Show/hide rows based on current page
                rows.forEach((row, index) => {
                    if (itemsPerPage === 'all' || (index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage)) {
                        row.classList.remove('hidden');
                    } else {
                        row.classList.add('hidden');
                    }
                });
                
                // Update showing text
                const start = totalItems === 0 ? 0 : (currentPage - 1) * itemsPerPage + 1;
                const end = Math.min(currentPage * itemsPerPage, totalItems);
                document.getElementById('showingStart').textContent = start;
                document.getElementById('showingEnd').textContent = end;
                document.getElementById('totalItems').textContent = totalItems;
                
                // Update pagination buttons
                const prevBtn = document.getElementById('prevPageBtn');
                const nextBtn = document.getElementById('nextPageBtn');
                prevBtn.disabled = currentPage <= 1;
                nextBtn.disabled = currentPage >= totalPages;
                
                // Generate page numbers
                const paginationNumbers = document.getElementById('paginationNumbers');
                paginationNumbers.innerHTML = '';
                
                // Determine range of page numbers to show
                let startPage = Math.max(1, currentPage - 2);
                let endPage = Math.min(totalPages, startPage + 4);
                if (endPage - startPage < 4 && totalPages > 4) {
                    startPage = Math.max(1, endPage - 4);
                }
                
                // Add first page button if not in range
                if (startPage > 1) {
                    const pageBtn = document.createElement('button');
                    pageBtn.className = 'px-3 py-1 border-r border-gray-300 bg-white text-gray-600 hover:bg-gray-100';
                    pageBtn.textContent = '1';
                    pageBtn.onclick = () => goToPage(1);
                    paginationNumbers.appendChild(pageBtn);
                    
                    if (startPage > 2) {
                        const ellipsis = document.createElement('span');
                        ellipsis.className = 'px-3 py-1 border-r border-gray-300 bg-white text-gray-600';
                        ellipsis.textContent = '...';
                        paginationNumbers.appendChild(ellipsis);
                    }
                }
                
                // Add page numbers
                for (let i = startPage; i <= endPage; i++) {
                    const pageBtn = document.createElement('button');
                    pageBtn.className = `px-3 py-1 border-r border-gray-300 ${i === currentPage ? 'bg-teal-500 text-white' : 'bg-white text-gray-600 hover:bg-gray-100'}`;
                    pageBtn.textContent = i;
                    pageBtn.onclick = () => goToPage(i);
                    paginationNumbers.appendChild(pageBtn);
                }
                
                // Add last page button if not in range
                if (endPage < totalPages) {
                    if (endPage < totalPages - 1) {
                        const ellipsis = document.createElement('span');
                        ellipsis.className = 'px-3 py-1 border-r border-gray-300 bg-white text-gray-600';
                        ellipsis.textContent = '...';
                        paginationNumbers.appendChild(ellipsis);
                    }
                    
                    const pageBtn = document.createElement('button');
                    pageBtn.className = 'px-3 py-1 border-r border-gray-300 bg-white text-gray-600 hover:bg-gray-100';
                    pageBtn.textContent = totalPages;
                    pageBtn.onclick = () => goToPage(totalPages);
                    paginationNumbers.appendChild(pageBtn);
                }
            }

            // Go to specific page
            function goToPage(page) {
                currentPage = page;
                updatePagination();
            }

            // Previous page
            function prevPage() {
                if (currentPage > 1) {
                    currentPage--;
                    updatePagination();
                }
            }

            // Next page
            function nextPage() {
                const rows = Array.from(document.querySelectorAll('.inventory-row')).filter(row => row.style.display !== 'none');
                const totalPages = Math.ceil(rows.length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    updatePagination();
                }
            }

            // Close modals when clicking outside
            document.addEventListener('click', function(event) {
                const addModal = document.getElementById('addModal');
                if (addModal && !addModal.classList.contains('hidden')) {
                    const addModalContent = addModal.querySelector('.bg-white');
                    if (event.target === addModal && !addModalContent.contains(event.target)) {
                        closeAddModal();
                    }
                }
                
                const categoryModal = document.getElementById('categoryModal');
                if (categoryModal && !categoryModal.classList.contains('hidden')) {
                    const categoryModalContent = categoryModal.querySelector('.bg-white');
                    if (event.target === categoryModal && !categoryModalContent.contains(event.target)) {
                        closeCategoryModal();
                    }
                }
                
                const editModal = document.getElementById('editModal');
                if (editModal && !editModal.classList.contains('hidden')) {
                    const editModalContent = editModal.querySelector('.bg-white');
                    if (event.target === editModal && !editModalContent.contains(event.target)) {
                        closeEditModal();
                    }
                }
                
                const deleteModal = document.getElementById('deleteModal');
                if (deleteModal && !deleteModal.classList.contains('hidden')) {
                    const deleteModalContent = deleteModal.querySelector('.bg-white');
                    if (event.target === deleteModal && !deleteModalContent.contains(event.target)) {
                        closeDeleteModal();
                    }
                }
                
                // For Order Critical Items Modal
                const orderCriticalModal = document.getElementById('orderCriticalModal');
                if (orderCriticalModal && !orderCriticalModal.classList.contains('hidden')) {
                    const orderCriticalModalContent = orderCriticalModal.querySelector('.bg-white');
                    if (event.target === orderCriticalModal && !orderCriticalModalContent.contains(event.target)) {
                        closeOrderCriticalModal();
                    }
                }
                
                // For Edit Category Modal
                const editCategoryModal = document.getElementById('editCategoryModal');
                if (editCategoryModal && !editCategoryModal.classList.contains('hidden')) {
                    const editCategoryModalContent = editCategoryModal.querySelector('.bg-white');
                    if (event.target === editCategoryModal && !editCategoryModalContent.contains(event.target)) {
                        closeEditCategoryModal();
                    }
                }
                
                // For Use Modal
                const useModal = document.getElementById('useModal');
                if (useModal && !useModal.classList.contains('hidden')) {
                    const useModalContent = useModal.querySelector('.bg-white');
                    if (event.target === useModal && !useModalContent.contains(event.target)) {
                        closeUseModal();
                    }
                }
            });

            // Close modals with Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeAddModal();
                    closeCategoryModal();
                    closeEditModal();
                    closeDeleteModal();
                    closeOrderCriticalModal();
                    closeEditCategoryModal();
                    closeUseModal();
                }
            });

            // Add responsive behavior for modals
            function adjustModalPositions() {
                const modals = document.querySelectorAll('#addModal, #categoryModal, #editModal, #deleteModal, #orderCriticalModal, #editCategoryModal, #useModal');
                modals.forEach(modal => {
                    if (!modal.classList.contains('hidden')) {
                        const modalContent = modal.querySelector('.bg-white');
                        if (modalContent) {
                            // Check if modal content is taller than viewport
                            if (modalContent.offsetHeight > window.innerHeight - 40) {
                                modal.classList.add('items-start');
                                modal.classList.remove('items-center');
                                modalContent.style.margin = '20px auto';
                            } else {
                                modal.classList.add('items-center');
                                modal.classList.remove('items-start');
                                modalContent.style.margin = '';
                            }
                        }
                    }
                });
            }

            // Quick restock function for critical items
            function quickRestock(itemId, amount, reason) {
                // Create a form and submit it programmatically
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/inventory/${itemId}/adjust`;
                form.style.display = 'none';
                
                // Add CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);
                
                // Add adjustment amount
                const adjustmentInput = document.createElement('input');
                adjustmentInput.type = 'hidden';
                adjustmentInput.name = 'adjustment';
                adjustmentInput.value = amount;
                form.appendChild(adjustmentInput);
                
                // Add reason
                const reasonInput = document.createElement('input');
                reasonInput.type = 'hidden';
                reasonInput.name = 'adjustment_reason';
                reasonInput.value = reason || 'Quick restock';
                form.appendChild(reasonInput);
                
                // Add form to document and submit
                document.body.appendChild(form);
                form.submit();
            }

            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                initPagination();
                
                // Initialize appointment selection handler
                handleAppointmentSelection();
                
                // Add form validation for use form
                const useForm = document.getElementById('useForm');
                if (useForm) {
                    useForm.addEventListener('submit', validateUseForm);
                }
                
                // Add resize listener for responsive modals
                window.addEventListener('resize', adjustModalPositions);
                
                // Check for success message and auto-hide after 5 seconds
                const successMessage = document.querySelector('.bg-green-50');
                if (successMessage) {
                    setTimeout(() => {
                        successMessage.style.transition = 'opacity 1s ease-out';
                        successMessage.style.opacity = '0';
                        setTimeout(() => {
                            successMessage.style.display = 'none';
                        }, 1000);
                    }, 5000);
                }
                
                // Check for error message and auto-hide after 8 seconds
                const errorMessage = document.querySelector('.bg-red-50');
                if (errorMessage) {
                    setTimeout(() => {
                        errorMessage.style.transition = 'opacity 1s ease-out';
                        errorMessage.style.opacity = '0';
                        setTimeout(() => {
                            errorMessage.style.display = 'none';
                        }, 1000);
                    }, 8000);
                }
            });

        // JavaScript for Activity List functionality 
                    document.addEventListener('DOMContentLoaded', function() {
                    // State management
                    const state = {
                        currentPage: 1,
                        entriesPerPage: 10,
                        totalEntries: 0,
                        filteredActivities: [],
                        allActivities: [],
                        filter: {
                        type: 'all',
                        dateRange: 'all',
                        search: '',
                        customDateFrom: null,
                        customDateTo: null
                        }
                    };

                    // DOM Elements
                    const activityList = document.getElementById('activity-list');
                    const entriesPerPageSelect = document.getElementById('entries-per-page');
                    const activityTypeSelect = document.getElementById('activity-type');
                    const dateRangeSelect = document.getElementById('date-range');
                    const customDateRange = document.getElementById('custom-date-range');
                    const dateFromInput = document.getElementById('date-from');
                    const dateToInput = document.getElementById('date-to');
                    const applyDateRangeBtn = document.getElementById('apply-date-range');
                    const searchInput = document.getElementById('activity-search');
                    const searchInputMobile = document.getElementById('activity-search-mobile');
                    const prevPageBtn = document.getElementById('prev-page');
                    const nextPageBtn = document.getElementById('next-page');
                    const paginationNumbers = document.getElementById('pagination-numbers');
                    const showingStart = document.getElementById('showing-start');
                    const showingEnd = document.getElementById('showing-end');
                    const totalEntriesSpan = document.getElementById('total-entries');
                    const emptyStateContainer = document.getElementById('empty-state-container');
                    const noActivitiesState = document.getElementById('no-activities-state');
                    const noSearchResultsState = document.getElementById('no-search-results-state');
                    const loadingState = document.getElementById('loading-state');
                    const searchIndicator = document.getElementById('search-indicator');
                    const searchIndicatorMobile = document.getElementById('search-indicator-mobile');
                    const clearFiltersBtn = document.getElementById('clear-filters');

                    // Initialize by loading all activities
                    function initializeActivities() {
                        // Get all activities from the DOM initially
                        const activityItems = document.querySelectorAll('.activity-item');
                        state.allActivities = Array.from(activityItems).map(item => {
                        return {
                            element: item,
                            type: item.dataset.type,
                            date: item.dataset.date,
                            text: item.textContent.toLowerCase()
                        };
                        });
                        
                        state.filteredActivities = [...state.allActivities];
                        state.totalEntries = state.allActivities.length;
                        
                        // Update the total entries display
                        totalEntriesSpan.textContent = state.totalEntries;
                        
                        // Check if we need to show empty state
                        if (state.allActivities.length === 0) {
                        emptyStateContainer.classList.remove('hidden');
                        noActivitiesState.classList.remove('hidden');
                        noSearchResultsState.classList.add('hidden');
                        }
                        
                        // Initial render
                        renderActivities();
                        renderPagination();
                    }

                    // Apply filters and search
                    function applyFilters() {
                        state.filteredActivities = state.allActivities.filter(activity => {
                        // Type filter
                        if (state.filter.type !== 'all' && activity.type !== state.filter.type) {
                            return false;
                        }
                        
                        // Date filter
                        if (state.filter.dateRange !== 'all') {
                            const activityDate = new Date(activity.date);
                            const today = new Date();
                            today.setHours(0, 0, 0, 0);
                            
                            const yesterday = new Date(today);
                            yesterday.setDate(yesterday.getDate() - 1);
                            
                            const weekStart = new Date(today);
                            weekStart.setDate(today.getDate() - today.getDay());
                            
                            const monthStart = new Date(today.getFullYear(), today.getMonth(), 1);
                            
                            switch(state.filter.dateRange) {
                            case 'today':
                                if (activityDate < today) return false;
                                break;
                            case 'yesterday':
                                if (activityDate < yesterday || activityDate >= today) return false;
                                break;
                            case 'week':
                                if (activityDate < weekStart) return false;
                                break;
                            case 'month':
                                if (activityDate < monthStart) return false;
                                break;
                            case 'custom':
                                const fromDate = state.filter.customDateFrom ? new Date(state.filter.customDateFrom) : null;
                                const toDate = state.filter.customDateTo ? new Date(state.filter.customDateTo) : null;
                                
                                if (fromDate && activityDate < fromDate) return false;
                                if (toDate) {
                                // Set to end of day for inclusive comparison
                                toDate.setHours(23, 59, 59, 999);
                                if (activityDate > toDate) return false;
                                }
                                break;
                            }
                        }
                        
                        // Search filter
                        if (state.filter.search && !activity.text.includes(state.filter.search.toLowerCase())) {
                            return false;
                        }
                        
                        return true;
                        });
                        
                        // Reset to first page when filters change
                        state.currentPage = 1;
                        
                        // Update total entries
                        state.totalEntries = state.filteredActivities.length;
                        totalEntriesSpan.textContent = state.totalEntries;
                        
                        // Render the filtered activities
                        renderActivities();
                        renderPagination();
                    }

                    // Render activities based on current page and filters
                    function renderActivities() {
                        // Hide all activities first
                        state.allActivities.forEach(activity => {
                        activity.element.style.display = 'none';
                        });
                        
                        // Calculate start and end indices for current page
                        const startIndex = (state.currentPage - 1) * state.entriesPerPage;
                        const endIndex = Math.min(startIndex + state.entriesPerPage, state.filteredActivities.length);
                        
                        // Show only the activities for the current page
                        for (let i = startIndex; i < endIndex; i++) {
                        if (state.filteredActivities[i]) {
                            state.filteredActivities[i].element.style.display = 'block';
                        }
                        }
                        
                        // Update the showing X to Y of Z text
                        showingStart.textContent = state.filteredActivities.length > 0 ? startIndex + 1 : 0;
                        showingEnd.textContent = endIndex;
                        
                        // Handle empty states
                        if (state.filteredActivities.length === 0) {
                        emptyStateContainer.classList.remove('hidden');
                        
                        // Determine which empty state to show
                        if (state.allActivities.length === 0) {
                            // No activities at all
                            noActivitiesState.classList.remove('hidden');
                            noSearchResultsState.classList.add('hidden');
                        } else {
                            // No search results
                            noActivitiesState.classList.add('hidden');
                            noSearchResultsState.classList.remove('hidden');
                        }
                        } else {
                        // Hide empty states when we have results
                        emptyStateContainer.classList.add('hidden');
                        }
                    }

                    // Render pagination controls
                    function renderPagination() {
                        const totalPages = Math.ceil(state.totalEntries / state.entriesPerPage);
                        
                        // Enable/disable prev/next buttons
                        prevPageBtn.disabled = state.currentPage <= 1;
                        nextPageBtn.disabled = state.currentPage >= totalPages;
                        
                        // Generate pagination numbers
                        paginationNumbers.innerHTML = '';
                        
                        // Determine range of page numbers to show
                        let startPage = Math.max(1, state.currentPage - 2);
                        let endPage = Math.min(totalPages, startPage + 4);
                        
                        // Adjust if we're near the end
                        if (endPage - startPage < 4) {
                        startPage = Math.max(1, endPage - 4);
                        }
                        
                        // Add first page and ellipsis if needed
                        if (startPage > 1) {
                        addPageButton(1);
                        if (startPage > 2) {
                            addEllipsis();
                        }
                        }
                        
                        // Add page numbers
                        for (let i = startPage; i <= endPage; i++) {
                        addPageButton(i);
                        }
                        
                        // Add ellipsis and last page if needed
                        if (endPage < totalPages) {
                        if (endPage < totalPages - 1) {
                            addEllipsis();
                        }
                        addPageButton(totalPages);
                        }
                        
                        function addPageButton(pageNum) {
                        const button = document.createElement('button');
                        button.className = `relative inline-flex items-center px-4 py-2 border text-sm font-medium ${
                            pageNum === state.currentPage 
                            ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600' 
                            : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'
                        }`;
                        button.textContent = pageNum;
                        button.addEventListener('click', () => {
                            state.currentPage = pageNum;
                            renderActivities();
                            renderPagination();
                        });
                        paginationNumbers.appendChild(button);
                        }
                        
                        function addEllipsis() {
                        const span = document.createElement('span');
                        span.className = 'relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700';
                        span.textContent = '...';
                        paginationNumbers.appendChild(span);
                        }
                    }

                    // Load more activities via AJAX
                    function loadMoreActivities() {
                        const currentCount = state.allActivities.length;
                        
                        // Show loading state
                        loadingState.classList.remove('hidden');
                        
                        fetch(`/activities/load-more?skip=${currentCount}&take=50`)
                        .then(response => response.json())
                        .then(data => {
                            // Hide loading state
                            loadingState.classList.add('hidden');
                            
                            if (data.activities && data.activities.length > 0) {
                            // Process and add new activities
                            data.activities.forEach(activity => {
                                const activityItem = createActivityElement(activity);
                                activityList.appendChild(activityItem);
                                
                                // Add to our state
                                state.allActivities.push({
                                element: activityItem,
                                type: activity.type,
                                date: activity.created_at.split('T')[0], // Extract YYYY-MM-DD
                                text: activityItem.textContent.toLowerCase()
                                });
                            });
                            
                            // Re-apply filters with new activities
                            applyFilters();
                            }
                        })
                        .catch(error => {
                            // Hide loading state and show error
                            loadingState.classList.add('hidden');
                            console.error('Error loading more activities:', error);
                        });
                    }

                    // Create a new activity DOM element
                    function createActivityElement(activity) {
                        const dotColorClass =
                        activity.type === 'use' ? 'bg-blue-500' :
                        activity.type === 'add' ? 'bg-green-500' :
                        activity.type === 'edit' ? 'bg-amber-500' :
                        activity.type === 'delete' ? 'bg-red-500' :
                        activity.type === 'order' ? 'bg-purple-500' : 'bg-indigo-500';
                        
                        const timeAgo = timeSince(new Date(activity.created_at));
                        
                        const activityItem = document.createElement('div');
                        activityItem.className = 'relative pl-12 py-4 hover:bg-gray-50 transition-colors duration-150 activity-item';
                        activityItem.dataset.type = activity.type;
                        activityItem.dataset.date = activity.created_at.split('T')[0]; // Extract YYYY-MM-DD
                        
                        activityItem.innerHTML = `
                        <div class="absolute left-5 top-5 -ml-1 h-2 w-2 rounded-full ${dotColorClass} ring-4 ring-white"></div>
                        <div class="flex flex-col sm:flex-row sm:items-start">
                            <div class="mb-1 sm:mb-0 sm:mr-4 flex-shrink-0">
                            <span class="text-xs text-gray-500">${timeAgo}</span>
                            </div>
                            <div>
                            <p class="text-sm text-gray-800">${activity.description}</p>
                            </div>
                        </div>
                        `;
                        
                        return activityItem;
                    }

                    // Helper function to format time ago
                    function timeSince(date) {
                        const seconds = Math.floor((new Date() - date) / 1000);
                        let interval = seconds / 31536000;
                        if (interval > 1) {
                        return Math.floor(interval) + " years ago";
                        }
                        interval = seconds / 2592000;
                        if (interval > 1) {
                        return Math.floor(interval) + " months ago";
                        }
                        interval = seconds / 86400;
                        if (interval > 1) {
                        return Math.floor(interval) + " days ago";
                        }
                        interval = seconds / 3600;
                        if (interval > 1) {
                        return Math.floor(interval) + " hours ago";
                        }
                        interval = seconds / 60;
                        if (interval > 1) {
                        return Math.floor(interval) + " minutes ago";
                        }
                        return Math.floor(seconds) + " seconds ago";
                    }

                    // Event Listeners
                    entriesPerPageSelect.addEventListener('change', function() {
                        state.entriesPerPage = parseInt(this.value);
                        state.currentPage = 1; // Reset to first page
                        renderActivities();
                        renderPagination();
                    });

                    activityTypeSelect.addEventListener('change', function() {
                        state.filter.type = this.value;
                        applyFilters();
                    });

                    dateRangeSelect.addEventListener('change', function() {
                        state.filter.dateRange = this.value;
                        
                        // Show/hide custom date range inputs
                        if (this.value === 'custom') {
                        customDateRange.classList.remove('hidden');
                        } else {
                        customDateRange.classList.add('hidden');
                        applyFilters();
                        }
                    });

                    applyDateRangeBtn.addEventListener('click', function() {
                        state.filter.customDateFrom = dateFromInput.value;
                        state.filter.customDateTo = dateToInput.value;
                        applyFilters();
                    });

                    // Search functionality
                    function handleSearch(e) {
                        state.filter.search = e.target.value;
                        
                        // Show/hide search indicator
                        if (e.target.value) {
                        searchIndicator.classList.remove('hidden');
                        searchIndicatorMobile.classList.remove('hidden');
                        } else {
                        searchIndicator.classList.add('hidden');
                        searchIndicatorMobile.classList.add('hidden');
                        }
                        
                        applyFilters();
                    }

                    searchInput.addEventListener('input', handleSearch);
                    searchInputMobile.addEventListener('input', handleSearch);

                    // Clear filters button
                    clearFiltersBtn.addEventListener('click', function() {
                        // Reset all filters
                        state.filter = {
                        type: 'all',
                        dateRange: 'all',
                        search: '',
                        customDateFrom: null,
                        customDateTo: null
                        };
                        
                        // Reset UI elements
                        activityTypeSelect.value = 'all';
                        dateRangeSelect.value = 'all';
                        searchInput.value = '';
                        searchInputMobile.value = '';
                        customDateRange.classList.add('hidden');
                        searchIndicator.classList.add('hidden');
                        searchIndicatorMobile.classList.add('hidden');
                        
                        // Re-apply filters (which will now show all)
                        applyFilters();
                    });

                    // Pagination navigation
                    prevPageBtn.addEventListener('click', function() {
                        if (state.currentPage > 1) {
                        state.currentPage--;
                        renderActivities();
                        renderPagination();
                        }
                    });

                    nextPageBtn.addEventListener('click', function() {
                        const totalPages = Math.ceil(state.totalEntries / state.entriesPerPage);
                        if (state.currentPage < totalPages) {
                        state.currentPage++;
                        renderActivities();
                        renderPagination();
                        }
                    });

                    // Auto-load more activities when scrolling near bottom
                    const activityContainer = document.querySelector('.overflow-x-auto');
                    activityContainer.addEventListener('scroll', function() {
                        const { scrollTop, scrollHeight, clientHeight } = activityContainer;
                        
                        // If scrolled to bottom and we have activities visible
                        if (scrollTop + clientHeight >= scrollHeight - 100 && state.filteredActivities.length > 0) {
                        // Check if we're showing the last page
                        const totalPages = Math.ceil(state.totalEntries / state.entriesPerPage);
                        if (state.currentPage === totalPages) {
                            loadMoreActivities();
                        }
                        }
                    });

                    // Initialize the component
                    initializeActivities();
                    });
        </script>

    </x-sidebar-layout>