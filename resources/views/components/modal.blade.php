@props(['method' => 'POST'])
@props(['modalId' => 'create'])

<div id="{{ $modalId }}"
    class="fixed inset-0 z-50 hidden p-4 items-center justify-center bg-gray-600 bg-opacity-20 backdrop-blur-sm transition-opacity duration-300">
    <div class="modal-content relative w-full max-w-lg mx-auto rounded-lg overflow-hidden shadow-lg bg-white">
        <!-- Form -->
        <form action="{{ $route }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}">
            @csrf
            @if ($method === 'PUT')
                @method('PUT')
            @elseif ($method === 'DELETE')
                @method('DELETE')
            @endif

            <div class="flex items-center justify-center text-white h-24 bg-teal-500 rounded-t-md">
                <h3 class="text-2xl"><i class="fa-solid fa-envelope px-2"></i>{{ $title }}</h3>
            </div>
            <div class="flex flex-col gap-4 p-8 text-center">
                <p class="text-xl text-gray-900">{{ $message }}</p>
            </div>
            <div class="p-6 pt-0 flex items-center justify-end gap-3">
                @php
                    $buttonClass = match (strtolower($buttonText)) {
                        'confirm' => 'bg-green-600 hover:bg-green-700',
                        'delete' => 'bg-red-600 hover:bg-red-700',
                        'update' => 'bg-blue-600 hover:bg-blue-700',
                        'create' => 'bg-green-600 hover:bg-green-700',
                        'cancel' => 'bg-red-600 hover:bg-red-700',
                        default => 'bg-gray-600 hover:bg-gray-700',
                    };
                @endphp
                <button type="submit" class="text-white p-2 font-bold shadow-lg rounded-lg {{ $buttonClass }}">
                    {{ $buttonText }}
                </button>
                <button type="button" data-modal-hide="{{ $modalId }}"
                    class="text-gray-100 bg-red-500 hover:bg-red-600 p-2 px-6 font-bold shadow-lg rounded-lg">
                    Exit
                </button>
            </div>
<<<<<<< HEAD
        </form>
=======
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

                        <button type="button" data-modal-hide="{{ $modalId }}"
                            class="text-gray-700 bg-gray-300 hover:bg-gray-400 p-2 font-bold shadow-lg rounded-lg">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
>>>>>>> 1e88ce5f60dd61ae04db4d0f05e39ba117182ffd
    </div>
</div>
