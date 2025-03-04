@props(['modalId', 'title', 'route', 'dateSelected', 'timeslot'])

<div id="{{ $modalId }}"
    class="fixed inset-0 z-50 hidden p-4 items-center justify-center bg-gray-600 bg-opacity-20 backdrop-blur-sm transition-opacity duration-300"
    aria-hidden="true">

    <div class="modal-content relative w-full max-w-lg mx-auto rounded-lg overflow-hidden shadow-lg bg-white">
        <form id="appointmentForm" action="{{ $route }}" method="POST" class="">
            @csrf

            <div class="flex items-center justify-center text-white h-24 bg-teal-500 rounded-t-md">
                <h3 class="text-2xl font-semibold">{{ $title}}</h3>
            </div>

            <div class="p-6 grid grid-cols-1 gap-4">
                <div>
                    <label for="date" class="block mb-2 text-lg font-medium text-teal-800">Date
                        Selected</label>
                    <input type="text" id="date" name="date" value="{{ old('date', $dateSelected) }}" readonly
                        class="w-full font-semibold border border-gray-800 rounded-md p-2.5 bg-gray-50 text-teal-700">
                </div>
                <div>
                    <label for="time" class="block mb-2 text-lg font-medium text-teal-800">Chosen
                        Timeslot</label>
                    <input type="text" id="time" name="time" value="{{ old('time', $timeslot) }}" readonly
                        class="w-full border font-semibold border-gray-800 rounded-md p-2.5 bg-gray-50 text-teal-700">
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-lg font-medium text-teal-800">Phone
                        Number</label>
                    <input type="text" id="phone" name="phone" maxlength="11" value="{{ old('phone') }}"
                        class="w-full border border-gray-800 rounded-md p-2.5 bg-gray-50 text-teal-800"
                        placeholder="Ex. 09123456789">
                </div>
                <div>
                    <label for="appointment_reason" class="block mb-2 text-lg font-medium text-teal-800">
                        Reason for Appointment
                    </label>
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
            <div class="flex p-2 justify-end space-x-2">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md"
                    data-modal-hide="{{ $modalId }}">
                    Cancel
                </button>
                <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                    Set Appointment
                </button>
            </div>
        </form>
    </div>
</div>