@php
    use Carbon\Carbon;
@endphp
<x-patientnav-layout>
    <div class="py-12">

        <div class="max-w-8xl mx-auto  lg:px-8 grid lg:gap-8 gap-4 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1">
            <div
                class="bg-teal-500 overflow-hidden mx-12 sm:rounded-t-lg shadow-lg xl:col-span-1 md:col-span-2 sm:col-span-2 col-span-2 relative">
                <div class="flex flex-col sm:flex-row items-center justify-between py-4 gap-4 text-center">
                    <!-- Back Button -->
                    <form action="{{ route('patient.dashboard') }}" method="GET">
                        @csrf
                        <button
                            class="w-full sm:w-auto mx-4  bg-white text-teal-500 px-4 py-2 rounded-md shadow-md hover:bg-gray-100 transition">
                            <i class="fa-solid fa-arrow-left"></i> Back
                        </button>
                    </form>
                    <!-- Centered Title -->
                    <div
                        class="flex items-center justify-center text-lg sm:text-2xl lg:text-3xl font-bold text-white mx-4">
                        <i class="fa-solid fa-history px-2"></i> BROWSE APPOINTMENTS
                    </div>
                </div>

                <div class="bg-gray-200">
                    <div class="relative overflow-x-auto shadow-md ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <caption
                                class="p-5  text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white ">
                                <div
                                    class="flex items-center justify-center text-lg sm:text-2xl lg:text-3xl font-bold text-teal-500 my-4 mx-4">
                                    <i class="fa-solid fa-history px-2"></i> APPOINTMENT HISTORY
                                </div>
                                <div class="flex flex-col items-center justify-center w-full space-y-4">


                                    <!-- Filters Section -->
                                    <form method="GET" action="{{ route('history') }}"
                                        class="w-full flex flex-wrap items-center justify-center gap-10">
                                        <p
                                            class="mt-1 text-lg text-teal-700 font-normal border-teal-500 border-2 rounded-lg bg-teal-100 w-fit p-2">
                                            Browse a list of appointments of patients. Kindly Click the "View" button to
                                            show the message.
                                        </p>
                                        <!-- Date Filter -->
                                        <div class="flex items-center space-x-2">
                                            <label for="date" class="text-teal-700 font-semibold">Date:</label>
                                            <input type="date" name="date"
                                                class="p-2 border border-teal-500 rounded-lg bg-white text-gray-700"
                                                value="{{ request('date') }}">
                                        </div>

                                        <!-- Status Filter -->
                                        <div class="flex items-center space-x-2">
                                            <label for="status" class="text-teal-700 font-semibold">Status:</label>
                                            <select name="status"
                                                class="p-2 border border-teal-500 rounded-lg bg-white text-gray-700">
                                                <option value="">All</option>
                                                <option value="Pending"
                                                    {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="Attended"
                                                    {{ request('status') == 'Attended' ? 'selected' : '' }}>Attended
                                                </option>
                                                <option value="Approved"
                                                    {{ request('status') == 'Approved' ? 'selected' : '' }}>Approved
                                                </option>
                                                <option value="Cancelled"
                                                    {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled
                                                </option>
                                                <option value="Unattended"
                                                    {{ request('status') == 'Unattended' ? 'selected' : '' }}>Unattended
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="flex items-center space-x-2">
                                            <button type="submit"
                                                class="px-4 py-2 bg-teal-500 text-white rounded-lg shadow-md hover:bg-teal-700 transition">
                                                Apply Filters
                                            </button>
                                            <a href="{{ route('history') }}"
                                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg shadow-md hover:bg-gray-400 transition">
                                                Reset
                                            </a>
                                        </div>
                                    </form>

                                    <!-- Display Errors -->
                                    @if ($errors->any())
                                        <div class="bg-red-500 text-white text-md p-6 w-full rounded-lg my-5">
                                            @foreach ($errors->all() as $error)
                                                <p><i class="fas fa-exclamation-circle text-white"></i>
                                                    {{ $error }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>


                            </caption>
                            <thead class="text-lg text-center text-gray-700 uppercase bg-gray-50  ">
                                <tr>
                                    <th scope="col " class="bg-teal-100 border-2 border-teal-500 px-6 py-3">
                                        Patient Name
                                    </th>
                                    <th scope="col" class="bg-teal-100 border-2 border-teal-500 px-6 py-3">
                                        Phone Number
                                    </th>
                                    <th scope="col" class="bg-teal-100 border-2 border-teal-500 px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="bg-teal-100 border-2 border-teal-500 px-6 py-3">
                                        Time
                                    </th>
                                    <th scope="col" class="bg-teal-100 border-2 border-teal-500 px-6 py-3">
                                        Status
                                    </th>

                                    <th scope="col" class="bg-teal-100 border-2 border-teal-500 px-6 py-3">
                                        Action
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
                                    @php
                                        $bgClass = match ($appointment->status) {
                                            'Approved' => 'bg-green-100 text-green-700 border-green-500',
                                            'Cancelled' => 'bg-red-100 text-red-700 border-red-500',
                                            'Attended' => 'bg-blue-100 text-blue-700 border-blue-500',
                                            'Unattended' => 'bg-red-100 text-red-700 border-red-500',
                                            'Pending' => 'bg-orange-100 text-orange-700 border-orange-500',
                                            default => 'bg-gray-100 text-gray-700 border-gray-500',
                                        };
                                        $statusClass = match ($appointment->status) {
                                            'Approved' => 'bg-green-200 text-green-700 border-green-500',
                                            'Cancelled' => 'bg-red-200 text-red-700 border-red-500',
                                            'Attended' => 'bg-blue-200 text-blue-700 border-blue-500',
                                            'Unattended' => 'bg-red-200 text-red-700 border-red-500',
                                            'Pending' => 'bg-orange-200 text-orange-700 border-orange-500',
                                            default => 'bg-gray-200 text-gray-700 border-gray-500',
                                        };
                                    @endphp
                                    <tr class="{{ $bgClass }} text-center border-teal-500 rounded-lg">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $appointment->patient_name }}
                                        </th>
                                        <td class="px-6 py-4 text-black">
                                            {{ $appointment->phone }}
                                        </td>
                                        <td class="px-6 py-4 text-black">
                                            {{ Carbon::parse($appointment->date)->format('F j, Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-black">
                                            {{ $appointment->time }}
                                        </td>
                                        <td class="px-6 py-4 text-black">

                                            <span
                                                class="p-4  py-3 text-md font-medium border rounded-lg {{ $statusClass }}">
                                                {{ $appointment->status }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-center">
                                            <div class="flex flex-col p-6 md:flex-row justify-start gap-2">
                                                <button onclick="openModal('{{ $appointment->id }}')"
                                                    class="bg-blue-500  font-medium text-white p-2 rounded-lg px-6 shadow-lg hover:bg-blue-600 transition w-full md:w-auto">
                                                    <i class="fa-solid fa-eye pr-2"></i> View
                                                </button>

                                                @if (in_array($appointment->status, ['Unattended']))
                                                    <button data-modal-target="reschedule-appointment-modal-{{ $appointment->id }}"
                                                        data-modal-toggle="reschedule-appointment-modal-{{ $appointment->id }}"
                                                        class="bg-yellow-500 w-full font-medium text-white p-2 rounded-lg px-6 shadow-lg hover:bg-yellow-600 transition w-full md:w-auto">
                                                        <i class="fa-solid fa-calendar-alt pr-2"></i> Reschedule
                                                    </button>
                                                @endif

                                                @if ($appointment->status === 'Attended')
                                                    <button data-modal-target="review-appointment-modal-{{ $appointment->id }}"
                                                        data-modal-toggle="review-appointment-modal-{{ $appointment->id }}"
                                                        class="bg-blue-500 font-medium text-white p-2 rounded-lg px-6 shadow-lg hover:bg-blue-600 transition w-full md:w-auto">
                                                        <i class="fa-solid fa-star pr-2"></i> Leave a Review
                                                    </button>

                                             <!-- Review Modal Component -->
                                                <x-review-modal 
                                                    :modalId="'review-appointment-modal-' . $appointment->id"
                                                    :route="route('appointments.review', ['id' => $appointment->id])"
                                                    :services="$appointment->appointments" 
                                                    />


                                                @endif

                                                                                                

                                                @if (in_array($appointment->status, ['Approved', 'Pending']))
                                                    <button data-modal-target="cancel-appointment-modal-{{ $appointment->id }}"
                                                        data-modal-toggle="cancel-appointment-modal-{{ $appointment->id }}"
                                                        class="bg-red-500 font-medium text-white p-2 rounded-lg px-6 shadow-lg hover:bg-red-600 transition w-full md:w-auto">
                                                        <i class="fa-solid fa-calendar-alt pr-2"></i> Cancel
                                                    </button>
                                                @endif






                                                {{-- @if ($appointment->status === 'Cancelled')
                                                    <button disabled
                                                        class="bg-red-500 font-medium text-white p-2 rounded-lg px-6 shadow-lg hover:bg-red-600 transition w-full md:w-auto">
                                                        Cancelle
                                                    </button>
                                                @endif --}}

                                            </div>

                                            <!-- Cancel Modal -->

                                            <x-modal modalId="cancel-appointment-modal-{{ $appointment->id }}"
                                                title="Cancel this Appointment?"
                                                message="Are you sure you want to cancel this appointment?"
                                                route="{{ route('appointments.cancel', ['id' => $appointment->id]) }}"
                                                method="PUT" buttonText="Cancel Appointment" />

                                            <x-modal modalId="reschedule-appointment-modal-{{ $appointment->id }}"
                                                title="Reschedule this Appointment?"
                                                :data="$availableAppointments"
                                                message="Are you sure you want to reschedule this appointment?"
                                                route="{{ route('appointments.update', ['id' => $appointment->id]) }}"
                                                method="PUT" buttonText="Reschedule" />
    
                                        </td>


                                        <div id="modal"
                                            class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-40 backdrop-blur-sm transition-opacity duration-300">
                                            <div
                                                class="modal-content  relative w-full max-w-md mx-auto rounded-lg overflow-hidden shadow-lg bg-white">
                                                <div
                                                    class="relative flex flex-col items-center justify-center text-white h-20 sm:h-24 bg-gradient-to-r from-teal-500 to-teal-700 rounded-t-md px-4 sm:px-6">
                                                    <h3 class="text-lg sm:text-2xl text-center break-words">
                                                        <i class="fa-solid fa-calendar px-2"></i> Appointment Details
                                                    </h3>
                                                </div>

                                                <!-- Responsive Close "X" Button -->
                                                <a href="#" onclick="closeModal()"
                                                    class="bg-red-400 rounded-lg w-8 h-8 flex justify-center items-center 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    absolute top-2 sm:top-4 right-2 sm:right-4 text-white text-base sm:text-lg font-bold 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          transition hover:bg-red-500">
                                                    X
                                                </a>



                                                <div class="flex flex-col gap-4 p-6">
                                                    <p class="text-gray-700 text-md"><strong>Patient Name:</strong>
                                                        <span id="patientName">Loading...</span>
                                                    </p>
                                                    <p class="text-gray-700 text-md"><strong>Phone Number:</strong>
                                                        <span id="phoneNumber">Loading...</span>
                                                    </p>
                                                    <p class="text-gray-700 text-md"><strong>Reason:</strong> <span
                                                            id="appointmentReason">Loading...</span></p>
                                                    <p class="text-gray-700 text-md"><strong>Appointment Date:</strong>
                                                        <span id="appointmentDate">Loading...</span>
                                                    </p>
                                                    <p class="text-gray-700 text-md"><strong>Time:</strong> <span
                                                            id="appointmentTime">Loading...</span></p>
                                                    <p class="text-gray-700 text-md"><strong>Status:</strong> <span
                                                            id="appointmentStatus">Loading...</span></p>

                                                    <label for="messageContent"
                                                        class="block text-md font-medium text-teal-600">Additional
                                                        Notes:</label>
                                                    <textarea id="messageContent" name="notes" rows="4"
                                                        class="w-full border border-slate-400 rounded-md px-3 py-2 text-sm text-slate-700 bg-transparent focus:outline-none focus:border-teal-500 hover:border-teal-400 shadow-sm focus:shadow transition duration-300 ease-in-out"></textarea>
                                                </div>

                                                <div
                                                    class="p-6 pt-0 flex flex-wrap gap-2 justify-center sm:justify-end">
                                                    <!-- Full-width on small screens, auto on larger screens -->
                                                    <button onclick="closeModal()"
                                                        class="w-full sm:w-auto bg-red-500 text-white py-2 px-4 rounded-md shadow-md transition-all 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        hover:shadow-lg focus:bg-red-600 active:bg-red-700">
                                                        <i class="fa-solid fa-times px-2"></i> Close
                                                    </button>
                                                </div>


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
                                    <tr class="bg-teal-50 border-2 border-teal-500 rounded-lg">
                                        <td colspan="6" class="text-center text-teal-700  p-6 font-bold ">
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
