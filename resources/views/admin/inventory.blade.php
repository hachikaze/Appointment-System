<x-sidebar-layout>
    <div class="max-w-8xl mx-auto px-4 py-6">
        <!-- Header Section  -->
        <div class="mb-8 border border-gray-200 rounded-lg p-4 sm:p-6 bg-white shadow-sm bg-gradient-to-r from-white to-gray-50">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Dental Supplies Inventory</h1>
                    <p class="text-gray-600 text-sm sm:text-base">Track and manage your clinic's supplies and equipment efficiently</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-teal-100 text-teal-800">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Inventory Management
                    </span>
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
            <div class="bg-white rounded-lg shadow-sm mb-8 border border-gray-200">
                <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-6 py-4 rounded-t-lg flex flex-col md:flex-row justify-between items-center gap-3">
                    <h2 class="text-lg font-semibold text-white">Inventory Items</h2>
                    <div class="flex flex-wrap gap-3">
                        <button type="button" onclick="openCategoryModal()"
                            class="px-4 py-2 bg-white text-teal-600 rounded-md hover:bg-teal-50 transition-colors duration-200 shadow-sm flex items-center text-sm md:text-base">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Manage Categories
                        </button>
                        <button type="button" onclick="openAddModal()"
                            class="px-4 py-2 bg-white text-teal-600 rounded-md hover:bg-teal-50 transition-colors duration-200 shadow-sm flex items-center text-sm md:text-base">
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
                    <div class="bg-gray-50 p-4 rounded-lg mb-6 border border-gray-200">
                        <div class="flex flex-col md:flex-row md:items-end md:justify-between space-y-4 md:space-y-0">
                            <div class="flex flex-col md:flex-row md:items-end space-y-4 md:space-y-0 md:space-x-4">
                                <!-- Category Filter -->
                                <div>
                                    <label for="categoryFilter" class="block text-sm font-medium text-gray-700 mb-1">Filter by Category</label>
                                    <select id="categoryFilter" onchange="filterTable()" class="w-full md:w-48 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                                        <option value="">All Categories</option>
                                        @foreach($allCategories as $cat)
                                        <option value="{{ $cat }}">{{ $cat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Status Filter -->
                                <div>
                                    <label for="statusFilter" class="block text-sm font-medium text-gray-700 mb-1">Filter by Status</label>
                                    <select id="statusFilter" onchange="filterTable()" class="w-full md:w-40 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                                        <option value="">All Status</option>
                                        <option value="In Stock">In Stock</option>
                                        <option value="Low Stock">Low Stock</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Search Box -->
                            <div class="w-full md:w-64">
                                <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-1">Search Items</label>
                                <div class="relative">
                                    <input type="text" id="searchInput" placeholder="Search by name..."
                                        onkeyup="filterTable()" class="w-full p-2 pl-10 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inventory Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table id="inventoryTable" class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Item Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Category
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Unit
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Min Stock
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Expiry Date
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($inventoryItems as $item)
                                @if($item->status !== 'Hidden') 
                                <tr class="hover:bg-gray-50 inventory-row"
                                    data-category="{{ $item->category }}"
                                    data-status="{{ $item->quantity <= 0 ? 'Out of Stock' : ($item->quantity <= $item->minimum_stock_level ? 'Low Stock' : 'In Stock') }}"
                                    data-name="{{ strtolower($item->item_name) }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item->item_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-100 text-teal-800">
                                            {{ $item->category }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->unit }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->minimum_stock_level }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $item->expiry_date ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
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
                                    <td colspan="8" class="px-6 py-8 text-center text-sm text-gray-500">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                            </svg>
                                            <p>No inventory items found.</p>
                                            <button type="button" onclick="openAddModal()" class="mt-3 px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700 transition-colors duration-200">
                                                Add New Item
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- No Results Message (Hidden by default) -->
                        <div id="noResultsMessage" class="hidden py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <p>No items match your search criteria.</p>
                                <p class="text-sm mt-1">Try adjusting your filters or search terms.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination Controls -->
                    <div class="mt-4 flex flex-col sm:flex-row justify-between items-center border-t border-gray-200 pt-4">
                        <div class="flex items-center mb-3 sm:mb-0">
                            <label for="itemsPerPage" class="text-sm text-gray-600 mr-2">Show:</label>
                            <select id="itemsPerPage" onchange="changeItemsPerPage()" class="border border-gray-300 rounded-md text-sm p-1 focus:ring-teal-500 focus:border-teal-500">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="all">All</option>
                            </select>
                            <span class="text-sm text-gray-600 ml-2">entries</span>
                        </div>
                        
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600 mr-4">Showing <span id="showingStart">1</span> to <span id="showingEnd">10</span> of <span id="totalItems">{{ count($inventoryItems) }}</span> entries</span>
                            <div class="flex border border-gray-300 rounded-md overflow-hidden">
                                <button id="prevPageBtn" onclick="prevPage()" class="px-3 py-1 bg-white text-gray-600 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed border-r border-gray-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                <div id="paginationNumbers" class="flex">
                                    <!-- Pagination numbers nasa JavaScript hehe -->
                                </div>
                                <button id="nextPageBtn" onclick="nextPage()" class="px-3 py-1 bg-white text-gray-600 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed border-l border-gray-300">
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
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="bg-gradient-to-r from-amber-600 to-amber-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Items Nearing Expiration
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto max-h-72 rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 sticky top-0">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiry Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
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
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $item->item_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-100 text-teal-800">
                                                    {{ $item->category }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $item->expiry_date }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @if($daysLeft < 0)
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Expired {{ abs($daysLeft) }} days ago
                                                    </span>
                                                @elseif($daysLeft <= 30)
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{ $daysLeft }} days left
                                                    </span>
                                                @elseif($daysLeft <= 60)
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                                        {{ $daysLeft }} days left
                                                    </span>
                                                @else
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $daysLeft }} days left
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500">
                                                <div class="flex flex-col items-center">
                                                    <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <p>No items are nearing expiration.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Critical Items (Right Side) -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="bg-gradient-to-r from-red-600 to-red-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            Critical Items
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto max-h-72 rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 sticky top-0">
                                    <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php
                                        $criticalItems = $inventoryItems
                                            ->filter(function($item) {
                                                // Define critical items as those that are out of stock or below 50% of minimum level
                                                return $item->quantity <= 0 || $item->quantity <= ($item->minimum_stock_level * 0.5);
                                            })
                                            ->sortBy(function($item) {
                                                // Sort by how far below minimum they are (as a percentage)
                                                if ($item->minimum_stock_level == 0) return 0;
                                                return $item->quantity / $item->minimum_stock_level;
                                            })
                                            ->take(10); // Show top 10 critical items
                                    @endphp
                                    
                                    @forelse($criticalItems as $item)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $item->item_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-100 text-teal-800">
                                                    {{ $item->category }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $item->quantity }} {{ $item->unit }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @if($item->quantity <= 0)
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Out of Stock
                                                    </span>
                                                @else
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                                        Critical ({{ round(($item->quantity / $item->minimum_stock_level) * 100) }}%)
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500">
                                                <div class="flex flex-col items-center">
                                                <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <p>No critical items found.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="button" onclick="openOrderCriticalItemsModal()" 
                                class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-500 text-white rounded-md hover:from-red-700 hover:to-red-600 transition-colors duration-200 shadow-sm flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Order Critical Items
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Item Modal -->
    <div id="addModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm overflow-y-auto">
        <div class="bg-white rounded-lg shadow-xl max-w-md mx-4 w-full my-8">
            <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Item
                </h3>
                <button onclick="closeAddModal()" class="text-white hover:text-gray-200 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.inventory.store') }}" method="POST" class="p-6">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="item_name">Item Name</label>
                    <input type="text" id="item_name" name="item_name" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="category">Category</label>
                    <select id="category" name="category" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                        <option value="">Select a category</option>
                        @foreach($allCategories as $cat)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" required
                            class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500" min="0" value="1">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="unit">Unit</label>
                        <select id="unit" name="unit" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                            <option value="Piece">Piece</option>
                            <option value="Box">Box</option>
                            <option value="Pack">Pack</option>
                            <option value="Bottle">Bottle</option>
                            <option value="Tube">Tube</option>
                            <option value="Set">Set</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="minimum_stock_level">Minimum Stock Level</label>
                    <input type="number" id="minimum_stock_level" name="minimum_stock_level" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500" min="0" value="5">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="expiry_date">Expiry Date (if applicable)</label>
                    <div class="flex items-center">
                        <input type="date" id="expiry_date" name="expiry_date"
                            class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                        <button type="button" onclick="clearExpiryDate('expiry_date')"
                            class="ml-2 px-2 py-1 text-xs text-gray-600 hover:text-gray-800 border border-gray-300 rounded-md">
                            Clear
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Leave empty for items with no expiry date</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="notes">Notes</label>
                    <textarea id="notes" name="notes" rows="2"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500"></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAddModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-gradient-to-r from-teal-600 to-teal-500 text-white rounded-md hover:from-teal-700 hover:to-teal-600 transition-colors duration-200">
                        Add Item
                    </button>
                </div>
            </form>
        </div>
    </div>

<!-- Order Critical Items Modal -->
<div id="orderCriticalModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm overflow-y-auto">
    <div class="bg-white rounded-lg shadow-xl max-w-md mx-4 w-full my-8">
        <div class="bg-gradient-to-r from-red-600 to-red-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
            <h3 class="text-lg font-semibold text-white flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                Order Critical Items
            </h3>
            <button onclick="closeOrderCriticalModal()" class="text-white hover:text-gray-200 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="orderCriticalForm" action="{{ route('admin.inventory.order-critical') }}" method="POST" class="p-6">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1" for="critical_item_select">Select Critical Item</label>
                <select id="critical_item_select" onchange="populateCriticalItemFields()" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                    <option value="">Select an item to order</option>
                    @foreach($inventoryItems as $item)
                        @if($item->quantity <= $item->minimum_stock_level)
                            <option value="{{ $item->id }}" 
                                data-name="{{ $item->item_name }}"
                                data-category="{{ $item->category }}"
                                data-unit="{{ $item->unit }}"
                                data-min-stock="{{ $item->minimum_stock_level }}"
                                data-current-stock="{{ $item->quantity }}">
                                {{ $item->item_name }} ({{ $item->quantity <= 0 ? 'Out of Stock' : round(($item->quantity / $item->minimum_stock_level) * 100) . '% of min' }})
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            
            <!-- Hidden item ID field -->
            <input type="hidden" id="critical_item_id" name="item_id">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="critical_item_name">Item Name</label>
                    <input type="text" id="critical_item_name" class="w-full p-2 border border-gray-300 rounded-md shadow-sm bg-gray-50" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="critical_category">Category</label>
                    <input type="text" id="critical_category" class="w-full p-2 border border-gray-300 rounded-md shadow-sm bg-gray-50" readonly>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="critical_quantity">Order Quantity</label>
                    <input type="number" id="critical_quantity" name="quantity" min="1" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="critical_unit">Unit</label>
                    <input type="text" id="critical_unit" class="w-full p-2 border border-gray-300 rounded-md shadow-sm bg-gray-50" readonly>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="critical_minimum_stock_level">Minimum Stock Level</label>
                    <input type="text" id="critical_minimum_stock_level" class="w-full p-2 border border-gray-300 rounded-md shadow-sm bg-gray-50" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="critical_current_stock">Current Stock</label>
                    <input type="text" id="critical_current_stock" class="w-full p-2 border border-gray-300 rounded-md shadow-sm bg-gray-50" readonly>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1" for="critical_notes">Order Notes</label>
                <textarea id="critical_notes" name="notes" rows="2" class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" placeholder="Optional notes about this order"></textarea>
            </div>
            
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeOrderCriticalModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-500 text-white rounded-md hover:from-red-700 hover:to-red-600 transition-colors duration-200">
                    Place Order
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editCategoryModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-[60] backdrop-blur-sm">
    <div class="bg-white rounded-lg shadow-xl max-w-md mx-4 w-full">
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
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1" for="edit_category_name">Category Name</label>
                <input type="text" id="edit_category_name" name="category_name" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                <input type="hidden" id="original_category_name" name="original_category_name">
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeEditCategoryModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-teal-600 to-teal-500 text-white rounded-md hover:from-teal-700 hover:to-teal-600 transition-colors duration-200">
                    Update Category
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

    <!-- Edit Modal  -->
    <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm overflow-y-auto">
        <div class="bg-white rounded-lg shadow-xl max-w-md mx-4 w-full my-8">
            <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-6 py-4 rounded-t-lg flex justify-between items-center">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Item
                </h3>
                <button onclick="closeEditModal()" class="text-white hover:text-gray-200 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form id="editForm" action="" method="POST" class="p-6">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="edit_item_name">Item Name</label>
                    <input type="text" id="edit_item_name" name="item_name" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="edit_category">Category</label>
                    <select id="edit_category" name="category" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach($allCategories as $cat)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="edit_quantity">Quantity</label>
                        <input type="number" id="edit_quantity" name="quantity" required
                            class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="edit_unit">Unit</label>
                        <select id="edit_unit" name="unit" required class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="Piece">Piece</option>
                            <option value="Box">Box</option>
                            <option value="Pack">Pack</option>
                            <option value="Bottle">Bottle</option>
                            <option value="Tube">Tube</option>
                            <option value="Set">Set</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="edit_minimum_stock_level">Minimum Stock Level</label>
                    <input type="number" id="edit_minimum_stock_level" name="minimum_stock_level" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="edit_expiry_date">Expiry Date (if applicable)</label>
                    <div class="flex items-center">
                        <input type="date" id="edit_expiry_date" name="expiry_date"
                            class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <button type="button" onclick="clearExpiryDate('edit_expiry_date')"
                            class="ml-2 px-2 py-1 text-xs text-gray-600 hover:text-gray-800 border border-gray-300 rounded-md">
                            Clear
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Leave empty for items with no expiry date</p>
                </div>
                <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1" for="edit_notes">Notes</label>
                    <textarea id="edit_notes" name="notes" rows="2"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-gradient-to-r from-teal-600 to-teal-500 text-white rounded-md hover:from-blue-700 hover:to-blue-600 transition-colors duration-200">
                        Update Item
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

        // Table filtering function
        function filterTable() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const categoryFilter = document.getElementById('categoryFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            const rows = document.querySelectorAll('.inventory-row');
            let visibleCount = 0;
            
            rows.forEach(row => {
                const itemName = row.getAttribute('data-name');
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
            }
        });

        // Add responsive behavior for modals
        function adjustModalPositions() {
            const modals = document.querySelectorAll('#addModal, #categoryModal, #editModal, #deleteModal, #orderCriticalModal, #editCategoryModal');
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
    </script>

</x-sidebar-layout>