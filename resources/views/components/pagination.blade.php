@props(['paginator'])

@if ($paginator->hasPages())
    <nav class="flex justify-between bg-teal-500 p-2 items-center mt-2">
        @if ($paginator->onFirstPage())
            <span
                class="px-4 py-2 bg-teal-100 border-2 rounded-lg border-teal-500 text-gray-600 rounded cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="px-4 py-1 bg-teal-500 border-2 rounded-lg border-teal-500 text-white rounded hover:bg-teal-600">
                Previous
            </a>
        @endif
        <span class="px-4 py-2 text-white font-semibold">
            Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
        </span>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="px-4 py-1 bg-teal-100 border-2 rounded-lg border-teal-500 text-gray-600 rounded">
                Next
            </a>
        @else
            <span
                class="px-4 py-2 bg-teal-100 border-2 rounded-lg border-teal-500 text-gray-600 rounded cursor-not-allowed">Next</span>
        @endif
    </nav>
@endif
