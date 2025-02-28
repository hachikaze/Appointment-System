@php
    use Carbon\Carbon;
@endphp
<x-patientnav-layout>
    <div class="py-12">

        <div class="max-w-8xl mx-auto  lg:px-8 grid lg:gap-8 gap-4 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1">
            <!-- First Column: Avatar and Buttons (1/4 of the width) -->

            <div
                class="bg-teal-500 overflow-hidden mx-12 sm:rounded-t-lg shadow-lg xl:col-span-1 md:col-span-2 sm:col-span-2 col-span-2 relative">
                <div class="flex items-center justify-center py-4 relative">
                    <!-- Back Button -->
                    <form action="{{ route('patient.dashboard') }}" method="GET" class="absolute left-4">
                        @csrf
                        <button
                            class="bg-white text-teal-500 px-4 py-2 rounded-md shadow-md hover:bg-gray-100 transition sm:px-3 sm:py-1 sm:text-md">
                            <i class="fa-solid fa-arrow-left"></i> Back
                        </button>
                    </form>

                    <!-- Centered Title -->
                    <div class="text-center font-bold text-3xl text-white sm:text-xl">
                        <i class="fa-solid fa-history"></i> APPOINTMENT HISTORY
                    </div>
                </div>







                <div class="bg-gray-200">
                    <div class="relative overflow-x-auto shadow-md ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white ">
                                <h3 class="text-xl">Your Appointments</h3>
                                <p class="mt-1 text-lg font-normal text-gray-500 ">Browse a list of
                                    appointments of
                                    patients. Kindly Click the "View" button to show the message.</p>
                            </caption>
                            <thead class="text-lg text-gray-700 uppercase bg-gray-50  ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Patient Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">
                                            <button class="bg-blue-500">
                                                Edit
                                            </button>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-lg">
                                @forelse ($appointments as $appointment)
                                    <tr class="bg-white border-b  border-gray-200">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $appointment->patient_name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $appointment->phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ Carbon::parse($appointment->date)->format('F j, Y') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $appointment->time }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @php
                                                $statusClass = match ($appointment->status) {
                                                    'Approved' => 'bg-green-100 text-green-700 border-green-500',
                                                    'Cancelled' => 'bg-red-100 text-red-700 border-red-500',
                                                    'Attended' => 'bg-blue-100 text-blue-700 border-blue-500',
                                                    'Unattended' => 'bg-red-100 text-red-700 border-red-500',
                                                    'Pending' => 'bg-orange-100 text-orange-700 border-orange-500',
                                                    default => 'bg-gray-100 text-gray-700 border-gray-500',
                                                };
                                            @endphp

                                            <span
                                                class="p-4  py-3 text-md font-medium border rounded-lg {{ $statusClass }}">
                                                {{ $appointment->status }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-center">
                                            <button onclick="openModal('{{ $appointment->id }}')"
                                                class="bg-blue-500 font-medium text-white p-2 rounded-lg px-6 shadow-lg hover:bg-blue-600 transition">
                                                <i class="fa-solid fa-eye pr-2"></i> View
                                            </button>

                                        </td>

                                        <div id="modal"
                                            class="hidden fixed z-50 inset-0 overflow-y-auto flex items-center justify-center">
                                            <div class="fixed inset-0 bg-gray-800 opacity-75" onclick="closeModal()">
                                            </div>

                                            <div
                                                class="bg-white rounded-lg shadow-xl transform transition-all sm:max-w-lg w-full mx-4 p-6 relative">
                                                <button onclick="closeModal()"
                                                    class="absolute top-3 right-3 bg-red-500 text-white h-8 w-8 flex items-center justify-center rounded-full hover:bg-red-600 transition">
                                                    <i class="fa-solid fa-times"></i>
                                                </button>
                                                <h2 class="text-2xl font-semibold text-teal-600 mb-4">
                                                    <i class="fa-solid fa-calendar"></i> Appointment Details
                                                </h2>

                                                <hr class="border-b-2 border-t-0 border-teal-500 mb-4">

                                                <p class="text-gray-700 text-md mb-2"><strong>Patient Name:</strong>
                                                    <span id="patientName">Loading...</span>
                                                </p>
                                                <p class="text-gray-700 text-md mb-2"><strong>Phone Number:</strong>
                                                    <span id="phoneNumber">Loading...</span>
                                                </p>
                                                <p class="text-gray-700 text-md mb-2"><strong>Reason:</strong> <span
                                                        id="appointmentReason">Loading...</span></p>
                                                <p class="text-gray-700 text-md mb-2"><strong>Appointment
                                                        Date:</strong>
                                                    <span id="appointmentDate">Loading...</span>
                                                </p>
                                                <p class="text-gray-700 text-md mb-2"><strong>Time:</strong> <span
                                                        id="appointmentTime">Loading...</span></p>
                                                <p class="text-gray-700 text-md mb-4"><strong>Status:</strong> <span
                                                        id="appointmentStatus">Loading...</span></p>

                                                <label for="notes"
                                                    class="block text-md font-medium font-bold text-teal-600 mb-2">Additional
                                                    Notes:</label>
                                                <textarea id="messageContent" name="notes" rows="6"
                                                    class="w-full border border-teal-500 rounded-md shadow-sm p-2"></textarea>
                                            </div>
                                        </div>


                                        <script>
                                            function openModal(appointmentId) {
                                                document.getElementById('messageContent').value = "Loading...";
                                                fetch(`/view-history/${appointmentId}`)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        document.getElementById('patientName').innerText = data.appointment.patient_name;
                                                        document.getElementById('phoneNumber').innerText = data.appointment.phone;
                                                        document.getElementById('appointmentReason').innerText = data.appointment.appointments;
                                                        document.getElementById('appointmentDate').innerText = new Date(data.appointment.date)
                                                            .toLocaleDateString();
                                                        document.getElementById('appointmentTime').innerText = data.appointment.time;
                                                        document.getElementById('appointmentStatus').innerText = data.appointment.status;

                                                        document.getElementById('messageContent').value = data.message ? data.message :
                                                            'No message available.';

                                                        document.getElementById('modal').classList.remove('hidden');
                                                    })
                                                    .catch(error => {
                                                        console.error('Error fetching data:', error);
                                                        document.getElementById('messageContent').value = "Error loading message.";
                                                    });
                                            }

                                            function closeModal() {
                                                document.getElementById('modal').classList.add('hidden');
                                            }
                                        </script>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-teal-700  p-6 font-bold">
                                            <div class="flex items-center justify-center">
                                                <div
                                                    class="rounded-full bg-teal-200  p-4 flex items-center justify-center">
                                                    <i class="fa-solid fa-face-frown text-4xl text-teal-600"></i>
                                                </div>
                                            </div>
                                            <br>
                                            No appointment history available.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-patientnav-layout>
