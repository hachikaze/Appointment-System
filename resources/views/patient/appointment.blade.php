<x-patientnav-layout>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md mt-10 mb-10">
        <img src="{{ asset('images/logo.png') }}" alt="Clinic Logo" class="w-26 mx-auto mb-4">
        <h2 class="text-center text-xl font-bold mb-4">Make an Appointment</h2>

        @if ($errors->any())
            <div class="bg-red-500 border border-red-400 text-white px-4 py-3 mb-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-semibold">Phone Number:</label>
                <input type="text" name="phone" required class="w-full border p-2 rounded" maxlength="11">
            </div>
            <div>
                <label class="block font-semibold">Doctor:</label>
                <input type="text" name="doctor" value="Ana Fatima Barroso" readonly
                    class="w-full border p-2 rounded bg-gray-100">
            </div>
            <div>
                <label class="block font-semibold">Preferred Date:</label>
                <input type="date" name="date" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-semibold">Preferred Time:</label>
                <input type="time" name="time" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-semibold">Reason for Appointment:</label>
                <select name="appointments" required class="w-full border p-2 rounded">
                    <option value="">Select Reason</option>
                    <option value="Tooth Restoration">Tooth Restoration</option>
                    <option value="Extraction">Extraction</option>
                    <option value="Teeth Whitening">Teeth Whitening</option>
                    <option value="Oral Prophylaxis">Oral Prophylaxis</option>
                    <option value="Odontectomy">Odontectomy</option>
                    <option value="Orthodontics">Orthodontics</option>
                </select>
            </div>

            <button type="submit" class="bg-teal-500 text-white w-full py-2 rounded hover:bg-teal-700">Submit
                Appointment</button>
        </form>
    </div>
</x-patientnav-layout>
