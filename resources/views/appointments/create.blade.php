<x-patientnav-layout>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Book an Appointment</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-500 text-white p-2 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('appointments.store') }}" class="bg-white p-4 rounded-lg shadow">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Patient Name</label>
                <input type="text" name="patient_name" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="text" name="email" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Phone</label>
                <input type="text" name="phone" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Doctor</label>
                <input type="text" name="doctor" value="Ana Fatima Barroso" readonly class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Reason for Appointment</label>
                <select name="appointments" required class="w-full p-2 border rounded">
                <option value="">Select Reason</option>
                    <option value="Tooth Restoration">Tooth Restoration</option>
                    <option value="Extraction">Extraction</option>
                    <option value="Teeth Whitening">Teeth Whitening</option>
                    <option value="Oral Prophylaxis">Oral Prophylaxis</option>
                    <option value="Odontectomy">Odontectomy</option>
                    <option value="Orthodontics">Orthodontics</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Date</label>
                <select name="date" class="w-full p-2 border rounded">
                    @foreach($availableAppointments->groupBy('date') as $date => $slots)
                        <option value="{{ $date }}">{{ $date }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Time Slot</label>
                <select name="time" class="w-full p-2 border rounded">
                    @foreach($availableAppointments as $slot)
                        <option value="{{ $slot->time_slot }}">{{ $slot->time_slot }} ({{ $slot->remainingSlots() }} slots left)</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Book Appointment</button>
        </form>
    </div>

</x-patientnav-layout>