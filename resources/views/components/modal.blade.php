@props(['method' => 'POST'])
@props(['data' => []])
@props(['modalId' => 'create'])

<div id="{{ $modalId }}"
    class="fixed inset-0 z-50 hidden p-4 items-center justify-center bg-gray-600 bg-opacity-20 backdrop-blur-sm transition-opacity duration-300">
    <div class="modal-content relative w-full max-w-lg mx-auto rounded-lg overflow-hidden shadow-lg bg-white">
        <form action="{{ $route }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}">
            @csrf
            @if ($method === 'PUT')
                @method('PUT')
            @elseif ($method === 'DELETE')
                @method('DELETE')
            @endif

            @php
                $buttonClass = match (strtolower($buttonText)) {
                    'confirm' => 'bg-green-600 hover:bg-green-700',
                    'delete' => 'bg-red-600 hover:bg-red-700',
                    'update' => 'bg-blue-600 hover:bg-blue-700',
                    'create' => 'bg-green-600 hover:bg-green-700',
                    'cancel' => 'bg-red-600 hover:bg-red-700',
                    'reschedule' => 'bg-orange-600 hover:bg-orange-700',
                    default => 'bg-gray-600 hover:bg-gray-700',
                };
                $bgClass = match (strtolower($buttonText)) {
                    'confirm' => 'bg-gradient-to-r from-green-500 to-green-700',
                    'delete' => 'bg-gradient-to-r from-red-500 to-red-700',
                    'update' => 'bg-gradient-to-r from-blue-500 to-blue-700',
                    'create' => 'bg-gradient-to-r from-green-500 to-green-700',
                    'cancel appointment' => 'bg-gradient-to-r from-red-500 to-red-700',
                    'reschedule' => 'bg-gradient-to-r from-orange-500 to-orange-700',
                    default => 'bg-gradient-to-r from-gray-500 to-gray-700',
                };
            @endphp

            <div class="flex items-center justify-center text-white h-24 {{ $bgClass }} rounded-t-md">
                <h3 class="text-2xl"><i class="fa-solid fa-envelope px-2"></i>{{ $title }}</h3>
            </div>
            <div class="flex flex-col gap-4 pt-6 px-2 pb-6 text-center">
                <p class="text-xl text-gray-900">{{ $message }}</p>
            </div>
            @if (strtolower($buttonText) === 'reschedule')
                <div class="grid grid-cols-1 gap-4 p-4">
                    @if (!empty($data) && is_iterable($data))
                        @php
                            $availableSlots = array_filter($data, fn($slot) => $slot['remaining_slots'] > 0);
                        @endphp

                        @if (!empty($availableSlots))
                            <div class="max-h-64  overflow-y-auto border border-gray-300 rounded-lg p-2">
                                @foreach ($availableSlots as $appointment)
                                    <div
                                        class="flex items-center space-x-3 p-2 border rounded-lg transition-all duration-200 
                                       hover:bg-gradient-to-r from-orange-500 to-orange-700 hover:text-white group">
                                        <input type="checkbox" id="appointment-{{ $appointment['id'] }}"
                                            name="reschedule_appointments" value="{{ $appointment['id'] }}"
                                            class="single-checkbox w-6 h-6 text-teal-600 bg-white border-2 border-gray-300 rounded-lg 
                                           focus:ring-2 focus:ring-teal-500 focus:ring-offset-1 cursor-pointer 
                                           hover:border-teal-500 transition-all duration-200">
                                        <label for="appointment-{{ $appointment['id'] }}"
                                            class="text-gray-700 font-medium transition-colors duration-200 group-hover:text-white">
                                            {{ \Carbon\Carbon::parse($appointment['date'])->format('F j, Y (l)') }} -
                                            {{ $appointment['time_slot'] }} ({{ $appointment['remaining_slots'] }}
                                            slots left)
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">No available appointments.</p>
                        @endif
                    @else
                        <p class="text-gray-500">No available appointments.</p>
                    @endif
                </div>
            @endif
            <div class=" pt-4  flex items-center justify-end gap-3">

                <div class="flex justify-between p-4 w-full  gap-4  bg-gray-100 rounded-lg">
                    <button type="submit"
                        class="text-white {{ $bgClass }} px-6 py-2 text-lg font-semibold shadow-md rounded-lg transition-all duration-300 ease-in-out {{ $buttonClass }}">
                        {{ $buttonText }}
                    </button>
                    <button type="button" data-modal-hide="{{ $modalId }}"
                        class="text-white bg-red-500 hover:bg-red-600 px-6 py-2 text-lg font-semibold shadow-md rounded-lg transition-all duration-300 ease-in-out">
                        Exit
                    </button>
                </div>
            </div>
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const checkboxes = document.querySelectorAll('.single-checkbox');

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        checkboxes.forEach(cb => {
                            if (cb !== this) cb.checked = false; // Uncheck others
                        });
                    });
                });
            });
        </script>
    </div>
</div>
