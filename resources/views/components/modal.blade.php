@props(['method' => 'POST'])
@props(['modalId' => 'create'])

<div id="{{ $modalId }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full max-h-full bg-black bg-opacity-50">
    <div class="relative p-2 w-full max-w-2xl max-h-full">
        <div class="relative bg-gray-100 rounded-lg shadow-sm">
            <div
                class="flex bg-teal-500 items-center border-b-4 border-teal-600 rounded-t-lg  justify-between p-2 md:p-5 ">
                <h3 class="text-xl font-semibold  text-white">
                    {{ $title }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-teal-600 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="{{ $modalId }}">
                    <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 my-5 md:p-5 space-y-4">
                <p class="text-xl text-center text-black">
                    {{ $message }}
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end p-4 md:p-5 rounded-b">
                <form action="{{ $route }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}">
                    @csrf
                    @if ($method === 'PUT')
                        @method('PUT')
                    @elseif ($method === 'DELETE')
                        @method('DELETE')
                    @endif
                    @php
                        $buttonClass = match (strtolower($buttonText)) {
                            'confirm', 'delete' => 'bg-red-600 hover:bg-red-700', // Red for Delete/Confirm
                            'update' => 'bg-blue-600 hover:bg-blue-700', // Blue for Update
                            'create' => 'bg-green-600 hover:bg-green-700', // Green for Create
                            'cancel' => 'bg-red-600 hover:bg-red-700', // Red for Cancel
                            default => 'bg-gray-600 hover:bg-gray-700', // Default Gray
                        };
                    @endphp
                    <div class="flex items-center justify-end gap-3">
                        <!-- <button data-modal-hide="default-modal" type="submit"
                            class="text-white p-2 font-bold shadow-lg rounded-lg {{ $buttonClass }}">
                            {{ $buttonText }}
                        </button> -->

                        <button data-modal-hide="{{ $modalId }}" type="submit"
                            class="text-white p-2 font-bold shadow-lg rounded-lg {{ $buttonClass }}">
                            {{ $buttonText }}
                        </button>

                        <!-- <button type="button" data-modal-hide="{{ $modalId }}"
                            class="text-gray-700 bg-gray-300 hover:bg-gray-400 p-2 font-bold shadow-lg rounded-lg">
                            Cancel
                        </button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
