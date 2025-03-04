{{-- @props(['modalId', 'title', 'route'])

<!-- Reusable Appointment Modal -->
<div id="{{ $modalId }}"
    class="fixed inset-0 z-50 hidden p-4 items-center justify-center bg-gray-600 bg-opacity-20 backdrop-blur-sm transition-opacity duration-300">
    <div class="modal-content relative w-full max-w-lg mx-auto rounded-lg overflow-hidden shadow-lg bg-white">
        <!-- Form -->
        <form id="appointmentForm" action="{{ $route }}" method="POST" class="space-y-4 p-6">
            @csrf

            <!-- Modal Header -->
            <div class="flex items-center justify-center text-white h-24 bg-teal-500 rounded-t-md">
                <h3 class="text-2xl font-semibold">{{ $title }}</h3>
            </div>

            <!-- Modal Body -->
            <div class="grid grid-cols-1 gap-4">
                <!-- Date Selected -->
                <div>
                    <label for="date" data-modal-hide="{{ $modalId }}"
                        class="block mb-2 text-lg font-medium text-teal-800">Date
                        Selected</label>
                    <input type="text" id="date" name="date" value="{{ old('date') }}" readonly
                        class="w-full border border-gray-800 rounded-md p-2.5 bg-gray-50 text-gray-500">
                </div>

                <!-- Chosen Timeslot -->
                <div>
                    <label for="time" class="block mb-2 text-lg font-medium text-teal-800">Chosen Timeslot</label>
                    <input type="text" id="time" name="time" value="{{ old('time') }}" readonly
                        class="w-full border border-gray-800 rounded-md p-2.5 bg-gray-50 text-teal-800">
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone" class="block mb-2 text-lg font-medium text-teal-800">Phone Number</label>
                    <input type="text" id="phone" name="phone" maxlength="11" value="{{ old('phone') }}"
                        class="w-full border border-gray-800 rounded-md p-2.5 bg-gray-50 text-teal-800"
                        placeholder="Ex. 09123456789">
                </div>

                <!-- Reason for Appointment -->
                <div>
                    <label for="appointment_reason" class="block mb-2 text-lg font-medium text-teal-800">Reason for
                        Appointment</label>
                    <select id="appointment_reason" name="appointment_reason"
                        class="w-full border border-gray-800 rounded-md p-2.5 bg-gray-50 text-gray-900">
                        <option value="">Select Reason</option>
                        <option value="Tooth Restoration">Tooth Restoration</option>
                        <option value="Extraction">Extraction</option>
                        <option value="Teeth Whitening">Teeth Whitening</option>
                        <option value="Oral Prophylaxis">Oral Prophylaxis</option>
                        <option value="Odontectomy">Odontectomy</option>
                        <option value="Orthodontics">Orthodontics</option>
                    </select>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end space-x-2">
                <button type="button" data
                    onclick="document.getElementById('{{ $modalId }}').classList.add('hidden')"
                    class="bg-gray-500  text-white px-4 py-2 rounded-md">Cancel</button>
                <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Set
                    Appointment</button>
            </div>
        </form>
    </div>
</div> --}}
