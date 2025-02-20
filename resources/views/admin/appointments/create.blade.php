<x-sidebar-layout>
    <x-slot:heading>
        Add Available Appointments
    </x-slot:heading>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Add Available Appointment</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.appointments.store') }}" class="bg-white p-4 rounded-lg shadow">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Date</label>
                <input type="date" name="date" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Time Slot</label>
                <input type="time" name="time_slot" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Max Slots</label>
                <input type="number" name="max_slots" class="w-full p-2 border rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Add Appointment</button>
        </form>
    </div>
</x-sidebar-layout>