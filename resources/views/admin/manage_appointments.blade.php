<x-sidebar-layout>
    <x-slot:heading>
        Manage Appointments
    </x-slot:heading>

    <div class="p-6">

        <form method="GET" class="mb-4 flex flex-wrap gap-2">
            <input type="text" name="search" placeholder="Search by name"
                value="{{ request('search') }}"
                class="p-2 border rounded w-full md:w-1/3">
            <select name="filter" class="p-2 border rounded w-full md:w-1/3">
                <option value="">All Status</option>
                <option value="Pending" {{ request('filter') === "Pending" ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ request('filter') === "Approved" ? 'selected' : '' }}>Approved</option>
                <option value="Attended" {{ request('filter') === "Attended" ? 'selected' : '' }}>Attended</option>
                <option value="Unattended" {{ request('filter') === "Unattended" ? 'selected' : '' }}>Unattended</option>
            </select>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Apply</button>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border text-sm px-4 py-2">ID</th>
                        <th class="border text-sm px-4 py-2">Patient Name</th>
                        <th class="border text-sm px-4 py-2">Email</th>
                        <th class="border text-sm px-4 py-2">Phone</th>
                        <th class="border text-sm px-4 py-2">Date</th>
                        <th class="border text-sm px-4 py-2">Time</th>
                        <th class="border text-sm px-4 py-2">Doctor</th>
                        <th class="border text-sm px-4 py-2">Reason</th>
                        <th class="border text-sm px-4 py-2">Status</th>
                        <th class="border text-sm px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr class="border">
                            <td class="border text-xs px-4 py-2">{{ $appointment->id }}</td>
                            <td class="border text-xs px-4 py-2">{{ $appointment->patient_name }}</td>
                            <td class="border text-xs text-xs px-4 py-2">{{ $appointment->email }}</td>
                            <td class="border text-xs px-4 py-2">{{ $appointment->phone }}</td>
                            <td class="border text-xs px-4 py-2">{{ $appointment->date }}</td>
                            <td class="border text-xs px-4 py-2">{{ $appointment->time }}</td>
                            <td class="border text-xs px-4 py-2">{{ $appointment->doctor }}</td>
                            <td class="border text-xs px-4 py-2">{{ $appointment->appointmentss }}</td>
                            <td class="border text-xs px-4 py-2">{{ $appointment->status }}</td>
                            <td class="border text-xs px-4 py-2 flex gap-2">
                                <a href="{{ route('appointments.updateStatus', ['id' => $appointment->id, 'action' => 'approve']) }}"
                                   class="bg-green-500 text-white px-2 py-1 rounded text-sm">Approve</a>
                                <a href="{{ route('appointments.updateStatus', ['id' => $appointment->id, 'action' => 'attended']) }}"
                                   class="bg-blue-500 text-white px-2 py-1 rounded text-sm">Mark Attended</a>
                                <a href="{{ route('appointments.updateStatus', ['id' => $appointment->id, 'action' => 'cancel']) }}"
                                   class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Cancel</a>
                                <a href="{{ route('appointments.updateStatus', ['id' => $appointment->id, 'action' => 'delete']) }}"
                                   class="bg-red-500 text-white px-2 py-1 rounded text-sm"
                                   onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $appointments->links() }}
        </div>
    </div>
</x-sidebar-layout>
