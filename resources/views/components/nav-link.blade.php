@props(['active' => false])

<a class="{{ $active ? 'text-gray-700 bg-gray-100 rounded-md dark:bg-gray-800 dark:text-gray-200': 'text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400'}} flex items-center px-4 py-2 mt-5 hover:bg-teal-100 dark:hover:bg-teal-800 dark:hover:text-teal-200 hover:text-teal-700" aria-current="{{ $active ? 'page': 'false' }}" {{ $attributes }}>
                        {{ $slot }}
                    </a>