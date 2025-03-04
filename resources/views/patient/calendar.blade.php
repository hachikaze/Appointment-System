    @php
        use Carbon\Carbon;
    @endphp
    <x-patientnav-layout>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Custom Calendar</title>
        </head>

        <body class="bg-gray-100 min-h-screen flex items-center justify-center">
            <div class=" mx-5 p-4 pr-0 pl-0">

                <div
                    class="mb-4 flex flex-col sm:flex-row bg-teal-50 p-5 shadow-lg rounded-lg border-2 border-teal-400 justify-between my-12 items-center space-y-4 sm:space-y-0">
                    <a href="{{ route('patient.dashboard') }}"
                        class="flex items-center sm:w-auto w-full bg-red-500 rounded-lg text-white p-2 text-lg shadow-lg font-semibold 
                        hover:bg-red-600 transition duration-200">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Go Back
                    </a>
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 w-full sm:w-auto">
                        <div class="flex flex-col">
                            <label for="monthSelect" class="text-teal-700 font-semibold mb-1">Month</label>
                            <select id="monthSelect"
                                class="border-2 border-teal-400 text-teal-700 font-bold p-2 rounded bg-white shadow w-full sm:w-auto">
                                <option value="0">January</option>
                                <option value="1">February</option>
                                <option value="2">March</option>
                                <option value="3">April</option>
                                <option value="4">May</option>
                                <option value="5">June</option>
                                <option value="6">July</option>
                                <option value="7">August</option>
                                <option value="8">September</option>
                                <option value="9">October</option>
                                <option value="10">November</option>
                                <option value="11">December</option>
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <label for="yearSelect" class="text-teal-700 font-semibold mb-1">Year</label>
                            <select id="yearSelect"
                                class="border-2 border-teal-400 text-teal-700 font-bold p-2 rounded bg-white shadow w-full sm:w-auto">
                            </select>
                        </div>
                    </div>

                </div>

                @if ($errors->any())
                    <div class=" bg-red-500  text-white text-md p-6 w-full rounded-lg my-5">
                        @foreach ($errors->all() as $error)
                            <p><i class="fas fa-exclamation-circle text-white"></i> {{ $error }}</p>
                        @endforeach
                    </div>
                @endif


                <div
                    class="relative flex bg-white flex-col w-full h-full text-gray-700 shadow-md rounded-xl bg-clip-border">

                    <div
                        class="flex-1 bg-teal-50 shadow-lg rounded-lg border-l-4 border-t-2  border-r-2 border-b-2 border-teal-400 p-6  mb-6">

                        <div class="flex grid-cols-2 justify-between">
                            <div class="space-y-3 text-gray-600">
                                <h3 class="text-lg font-semibold text-teal-700 mb-2">
                                    Important Disclaimer
                                </h3>
                                <p class="text-base">
                                    Please note the following appointment booking guidelines:
                                </p>
                                <ul class="list-disc ml-5 space-y-2">
                                    <li>Users can only have one active approved appointment at a time.</li>
                                    <li>If an approved appointment is not attended, it will be marked as unattended.
                                    </li>
                                    <li>Users can reschedule an appointment if it is marked as unattended.</li>
                                    <li>Approved appointments can be canceled, and users may reschedule afterward.</li>
                                </ul>
                                <div class="mt-4 flex items-center">
                                    <p class="text-sm bg-teal-100 rounded-lg p-2">
                                        <span class="font-semibold">💡 Note:</span>
                                        Ensure you attend or manage your appointments promptly to avoid scheduling
                                        conflicts.
                                    </p>
                                </div>
                            </div>


                            <div
                                class="bg-teal-100 border-teal-500 border-b-4 border-l-2 border-r-2 rounded-lg shadow-lg">
                                <div
                                    class="p-2 flex items-center bg-teal-500 text-lg text-teal-50 font-semibold rounded-t-lg">
                                    <i class="fa-solid fa-thumbtack text-teal-50"></i>
                                    <h2 class="text-xl mx-2">Legend</h2>
                                </div>

                                <div class="p-2 space-y-5">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-4 h-4 bg-blue-300 border-2 border-blue-500 rounded"></div>
                                        <span class="text-sm text-gray-700"><span
                                                class="font-bold text-blue-500">Attended</span> - The participant has
                                            successfully attended
                                            the event.</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-4 h-4 bg-gray-300 border-2 border-gray-500 rounded"></div>
                                        <span class="text-sm text-gray-700"><span
                                                class="font-bold text-gray-500">Unattended</span> - The participant was
                                            expected
                                            but did
                                            not attend.</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-4 h-4 bg-orange-300 border-2 border-orange-500 rounded"></div>
                                        <span class="text-sm text-gray-700"><span
                                                class="font-bold text-orange-500">Pending</span> - Attendance status is
                                            not
                                            yet
                                            confirmed.</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-4 h-4 bg-red-300 border-2 border-red-500  rounded"></div>
                                        <span class="text-sm text-gray-700"><span
                                                class="font-bold text-red-500">Cancelled</span>- The event or attendance
                                            was
                                            canceled.</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-4 h-4 bg-teal-300 border-2 border-teal-500  rounded"></div>
                                        <span class="text-sm text-gray-700"><span
                                                class="font-bold text-teal-500">Approved</span> - Attendance has been
                                            approved or
                                            confirmed.</span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>



                    <div class="justify-center ">
                        <div class="border-2 border-teal-500 p-2 rounded-lg relative animate-border" id="divborder">
                            <div class="bg-teal-500 w-full text-center text-3xl text-white p-4 font-bold rounded-t-lg">
                                APPOINTMENT CALENDAR
                            </div>
                            <div class="bg-teal-200 p-4 content-center rounded-b-lg shadow-lg flex flex-wrap gap-1 sm:grid sm:grid-cols-7"
                                id="calendar">
                                <div
                                    class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                                    Sun</div>
                                <div
                                    class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                                    Mon</div>
                                <div
                                    class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                                    Tue</div>
                                <div
                                    class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                                    Wed</div>
                                <div
                                    class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                                    Thu</div>
                                <div
                                    class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                                    Fri</div>
                                <div
                                    class="text-center font-bold text-base text-gray-700 uppercase tracking-wide bg-gray-200 p-2 rounded">
                                    Sat</div>
                            </div>
                        </div>
                    </div>
                </div>


                <div
                    class="relative flex my-10 flex-col w-full h-full  text-gray-700 bg-teal-50 border-2 border-teal-500 shadow-md rounded-xl bg-clip-border">
                    <div
                        class="relative mx-4 mt-4 overflow-hidden shadow-lg text-gray-700 p-4 bg-teal-100 rounded-lg border-2 border-teal-500 bg-clip-border">
                        <div class="flex items-center justify-between gap-8 mb-8">
                            <div>
                                <h5
                                    class="block text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                    Appointments List
                                </h5>
                                <p class="block mt-1 text-base antialiased font-normal leading-relaxed text-gray-700">
                                    See information about all appointments
                                </p>
                            </div>
                            {{-- <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                                <button
                                    class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button">
                                    view all
                                </button>
                                <button
                                    class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" stroke-width="2" class="w-4 h-4">
                                        <path
                                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                        </path>
                                    </svg>
                                    Add member
                                </button>
                            </div> --}}
                        </div>
                        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                            <div class="block w-full  overflow-hidden md:w-max">
                                <nav>
                                    <ul role="tablist"
                                        class="relative flex space-x-4 flex-row p-1 rounded-lg bg-blue-gray-50 bg-opacity-60">
                                        <li role="tab"
                                            class="relative flex items-center justify-center w-full h-full px-2 py-1 text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                                            data-value="all">
                                            <div class="z-20 text-inherit">
                                                &nbsp;&nbsp;Approved&nbsp;&nbsp;
                                            </div>
                                            <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow"></div>
                                        </li>

                                        <li role="tab"
                                            class="relative flex items-center justify-center w-full h-full px-2 py-1 text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                                            data-value="all">
                                            <div class="z-20 text-inherit">
                                                &nbsp;&nbsp;Cancelled&nbsp;&nbsp;
                                            </div>
                                            <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow"></div>
                                        </li>

                                        <li role="tab"
                                            class="relative flex items-center justify-center w-full h-full px-2 py-1 text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                                            data-value="all">
                                            <div class="z-20 text-inherit">
                                                &nbsp;&nbsp;Pending&nbsp;&nbsp;
                                            </div>
                                            <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow"></div>
                                        </li>
                                        <li role="tab"
                                            class="relative flex items-center justify-center w-full h-full px-2 py-1 text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                                            data-value="all">
                                            <div class="z-20 text-inherit">
                                                &nbsp;&nbsp;Unattended&nbsp;&nbsp;
                                            </div>
                                            <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow"></div>
                                        </li>
                                        <li role="tab"
                                            class="relative flex items-center justify-center w-full h-full px-2 py-1 text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                                            data-value="all">
                                            <div class="z-20 text-inherit">
                                                &nbsp;&nbsp;Attended&nbsp;&nbsp;
                                            </div>
                                            <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow"></div>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                            <div class="w-full md:w-72">
                                <div class="relative h-10 w-full min-w-[200px]">
                                    <div
                                        class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                            </path>
                                        </svg>
                                    </div>
                                    <input
                                        class="peer h-full w-full rounded-[7px] border border-teal-600 border-4 bg-teal-50 px-3 py-2.5 !pr-9 text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                        placeholder=" " />
                                    <label
                                        class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                        Search
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 px-0  overflow-x-auto">

                        <table class="w-full mt-4  text-left table-auto min-w-max">
                            <thead>
                                <tr>
                                    <th
                                        class="p-4 border-r-0 border-l-0 bg-teal-100 border-2 border-teal-600 bg-blue-gray-50/50">
                                        <p
                                            class="flex text-lg justify-center font-semibold text-teal-600 leading-none ">
                                            Date
                                        </p>
                                    </th>
                                    <th
                                        class="p-4 border-r-0 border-l-0 bg-teal-100 border-2 border-teal-600 bg-blue-gray-50/50">
                                        <p class="block text-lg  font-semibold text-teal-600 leading-none ">
                                            Time Slot
                                        </p>
                                    </th>
                                    <th
                                        class="p-4 border-r-0 border-l-0 bg-teal-100 border-2 border-teal-600 bg-blue-gray-50/50">
                                        <p class="block text-lg  font-semibold text-teal-600 leading-none ">
                                            Max Slot
                                        </p>
                                    </th>
                                    <th
                                        class="p-4 border-r-0 border-l-0 bg-teal-500 border-2 border-teal-600 bg-blue-gray-50/50">
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($allData as $slots)
                                <tbody>
                                    <tr>
                                        <td class="p-4 border-b border-teal-100">
                                            <div class="flex items-center justify-center gap-3">
                                                <img src="{{ Auth::user()->image_path ? asset('storage/' . Auth::user()->image_path) : asset('images/default-avatar.png') }}"
                                                    alt="Avatar"
                                                    class="relative shadow-lg inline-block h-9 w-9 !rounded-full object-cover object-center" />
                                                <div class="flex flex-col">
                                                    <p
                                                        class="block text-md antialiased font-normal leading-normal text-blue-gray-900">
                                                        {{ \Carbon\Carbon::parse($slots->date)->format('F j, Y') }}
                                                    </p>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 border-b border-teal-100">
                                            <div class="flex flex-col">
                                                <p
                                                    class="block text-md antialiased font-normal leading-normal text-blue-gray-900">
                                                    {{ $slots->time_slot }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="p-4 border-b border-teal-100">
                                            <div class="w-max">
                                                <div
                                                    class="relative grid items-center px-2 py-1 text-md font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                                                    <span class="">
                                                        {{ $slots->remaining_slots ??
                                                            $slots->max_slots -
                                                                App\Models\Appointment::where('date', $slots->date)->where('time', $slots->time_slot)->where('status', 'Pending')->count() }}
                                                        Slots Remaining
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 border-b w-full flex justify-center border-teal-100">
                                            <button
                                                class="relative flex p-2 flex-row space-x-2 items-center justify-center h-12 w-44 select-none rounded-lg text-center align-middle text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                type="button" data-modal-target="appointmentModal"
                                                data-modal-toggle="appointmentModal">
                                                <i class="fa-solid fa-pen fa-lg text-teal-600"></i>
                                                <span class="mt-1 text-lg font-semibold text-gray-900">CREATE</span>
                                            </button>


                                            {{-- <x-modal-appointment-modal modalId="appointmentModal"
                                                title="Set Your Appointment"
                                                route="{{ route('appointment.store') }}" /> --}}

                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div id="appointmentModal"
                        class="fixed inset-0 z-50 hidden p-4 items-center justify-center bg-gray-600 bg-opacity-20 backdrop-blur-sm transition-opacity duration-300">
                        <div
                            class="modal-content relative w-full max-w-lg mx-auto rounded-lg overflow-hidden shadow-lg bg-white">
                            <!-- Form -->
                            <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST"
                                class="space-y-4 p-6">
                                @csrf

                                <!-- Modal Header -->
                                <div class="flex items-center justify-center text-white h-24 bg-teal-500 rounded-t-md">
                                    <h3 class="text-2xl font-semibold">dadaddaddda</h3>
                                </div>

                                <!-- Modal Body -->
                                <div class="grid grid-cols-1 gap-4">
                                    <!-- Date Selected -->
                                    <div>
                                        <label for="date" data-modal-hide="appointmentModal"
                                            class="block mb-2 text-lg font-medium text-teal-800">Date
                                            Selected</label>
                                        <input type="text" id="date" name="date"
                                            value="{{ old('date') }}" readonly
                                            class="w-full border border-gray-800 rounded-md p-2.5 bg-gray-50 text-gray-500">
                                    </div>

                                    <!-- Chosen Timeslot -->
                                    <div>
                                        <label for="time"
                                            class="block mb-2 text-lg font-medium text-teal-800">Chosen
                                            Timeslot</label>
                                        <input type="text" id="time" name="time"
                                            value="{{ old('time') }}" readonly
                                            class="w-full border border-gray-800 rounded-md p-2.5 bg-gray-50 text-teal-800">
                                    </div>

                                    <!-- Phone Number -->
                                    <div>
                                        <label for="phone"
                                            class="block mb-2 text-lg font-medium text-teal-800">Phone Number</label>
                                        <input type="text" id="phone" name="phone" maxlength="11"
                                            value="{{ old('phone') }}"
                                            class="w-full border border-gray-800 rounded-md p-2.5 bg-gray-50 text-teal-800"
                                            placeholder="Ex. 09123456789">
                                    </div>

                                    <!-- Reason for Appointment -->
                                    <div>
                                        <label for="appointment_reason"
                                            class="block mb-2 text-lg font-medium text-teal-800">Reason for
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
                                    <button type="button" onclick="closeModal()"
                                        class="bg-gray-500 text-white px-4 py-2 rounded-md">Cancel
                                    </button>
                                    <button type="submit"
                                        class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Set
                                        Appointment</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <script>
                        function closeModal() {
                            let modal = document.getElementById('appointmentModal');
                            modal.style.display = 'none'; // Completely hides the modal including background
                        }
                    </script>
                    <div
                        class="flex items-center bg-teal-500 rounded-b-lg justify-between p-4 border-t border-teal-100">
                        <p class="block text-md antialiased font-normal leading-normal text-white">
                            Page 1 of 10
                        </p>
                        <div class="flex gap-2">
                            <button
                                class="select-none rounded-lg border bg-teal-600 border-gray-900 py-2 px-6 text-center align-middle text-md font-bold uppercase text-white transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                Previous
                            </button>
                            <button
                                class="select-none rounded-lg border bg-teal-600 border-gray-900 py-2 px-6 text-center align-middle text-md font-bold uppercase text-white transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 flex items-start">
                {{-- <div class="flex items-center  justify-center m-4" id="dateformSection">
                    <form id="dateForm" class="w-full">
                        <h2 id="selectedDate" class="text-lg font-bold hidden"></h2>
                        <input type="hidden" id="hiddenselectedDate" name="hiddenselectedDate" value="">

                        <div
                            class="bg-teal-100 relative overflow-x-auto border-2 border-l-4 border-teal-500   shadow-lg sm:rounded-lg  p-5 w-full">
                            <div class="flex flex-wrap gap-4">
                                <!-- Choose a Time Slot Header -->
                                <div class="bg-teal-500 rounded-lg w-full md:w-auto ">
                                    <h2 class="text-xl font-bold text-white p-6 shadow-lg " id="modal-title">
                                        <i class="fa-solid fa-clock text-white px-2"></i> Choose a Time Slot
                                    </h2>
                                </div>

                                <!-- Available Slots Counter -->
                                <div
                                    class="bg-teal-50 border-2 border-teal-500 w-full md:w-auto rounded-lg px-6 py-4 flex items-center shadow-lg">
                                    <i class="fa-solid fa-user-clock text-teal-600 text-2xl mr-2"></i>
                                    <span class="text-lg font-bold text-gray-900">
                                        Slots Available: {{ $availableslots }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mt-4">
                                @if ($selectedDate && count($availableappointments) > 0)
                                    @foreach ($availableappointments as $appointment)
                                        @if ($appointment->remaining_slots > 0)
                                            <button type="button"
                                                class="appointment-button md:w-auto w-full px-4 py-2 text-md shadow-lg font-medium text-gray-900 bg-gray-100 border border-gray-800 rounded-lg hover:bg-teal-600 hover:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                                data-time="{{ $appointment->time_slot }}"
                                                onclick="selectAppointmentTime(this)">
                                                {{ $appointment->time_slot }}
                                                ({{ $appointment->remaining_slots }}
                                                slots left)
                                            </button>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="flex items-center space-x-2 ">
                                        <i class="fa-solid fa-xmark text-red-500 text-2xl"></i>
                                        <p class="text-lg font-bold text-teal-600">
                                            No available time slots for
                                            @if (!empty($selectedDate))
                                                {{ date('F j, Y', strtotime($selectedDate)) }}
                                            @else
                                                {{ 'Choose a date in the Calendar.' }}
                                            @endif
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div> --}}
                {{-- @if (!empty($selectedDate))
                    <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST"
                        class="space-y-4">
                        @csrf
                        <div class="flex items-center border-teal-400 justify-center mx-4 mt-10">
                            <div
                                class="bg-teal-100 border-teal-500 border-2  relative overflow-x-auto w-full  mb-12 shadow-lg sm:rounded-lg ">
                                <div class="bg-teal-600    rounded-t-lg text-white p-3">
                                    <p class="text-xl font-semibold">
                                        Please fill in the details to set your dental appointment.
                                    </p>
                                </div>

                                <!-- Two-Column Input Fields -->
                                <div class="grid p-6 grid-cols-1 md:grid-cols-2 gap-4 ">

                                    <div>
                                        <label for="date"
                                            class="block mb-2 text-lg font-medium text-teal-800">Date
                                            Selected</label>
                                        <div class="flex">
                                            <span
                                                class="inline-flex items-center px-3 text-md text-gray-900 bg-teal-200 border rounded-e-0 border-gray-800 border-e-0 rounded-s-md">
                                                <i class="fa-solid fa-calendar text-teal-700 shadow-lg"></i>
                                            </span>
                                            <input type="text" id="date" name="date"
                                                value="{{ $selectedDate }}" readonly
                                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-500 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500"
                                                placeholder="2025-02-20">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="time"
                                            class="block mb-2 text-lg font-medium text-teal-800">Chosen
                                            Timeslot</label>
                                        <div class="flex">
                                            <span
                                                class="inline-flex items-center px-3 text-md text-teal-800 bg-teal-200 border rounded-b-0 border-gray-800 border-e-0 rounded-s-md">
                                                <i class="fa-solid fa-calendar text-teal-700 shadow-lg"></i>
                                            </span>
                                            <input type="text" id="time" name="time" value=""
                                                readonly
                                                class="rounded-none rounded-e-lg bg-gray-50 border text-teal-800 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500"
                                                placeholder="Select a Time.">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="phone"
                                            class="block mb-2 text-lg font-medium text-teal-800">Phone
                                            Number</label>
                                        <div class="flex">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-teal-800 bg-teal-200 border rounded-e-0 border-gray-800 border-e-0 rounded-s-md">
                                                <i class="fa-solid fa-phone text-teal-700 shadow-lg"></i>
                                            </span>
                                            <input type="text" id="phone" name="phone" maxlength="11"
                                                class="rounded-none rounded-e-lg bg-gray-50 border text-teal-800 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500"
                                                placeholder="Ex. 09123456789">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="appointment-reason"
                                            class="block mb-2 text-teal-800 text-lg font-medium text-gray-900">
                                            Reason for Appointment
                                        </label>
                                        <div class="flex">
                                            <span
                                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-teal-200 border rounded-e-0 border-gray-800 border-e-0 rounded-s-md">
                                                <i class="fa-solid fa-calendar text-teal-700 shadow-lg"></i>
                                            </span>
                                            <select id="appointment_reason" name="appointment_reason"
                                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-md border-gray-800 p-2.5 placeholder-gray-500">
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

                                </div>
                                <div class=" p-4 sm:mt-2 flex flex-col sm:flex-row-reverse gap-3 sm:gap-2">
                                    <button type="button" data-modal-target="create-appointment-modal"
                                        data-modal-toggle="create-appointment-modal"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent px-4 py-2 bg-teal-600 font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none transition ease-in-out duration-150 text-md">
                                        <i class="fa-solid fa-check-circle mr-2"></i>
                                        Set Appointment
                                    </button>

                                    <x-modal modalId="create-appointment-modal" title="Create this Appointment"
                                        message="Are you sure you want to create this appointment?"
                                        route="{{ route('appointments.store') }}" method="POST"
                                        buttonText="Create" />
                                </div> 
                                </div>
                            </div>
                        @else
                            <div class="flex items-center border-teal-400 justify-center mx-4 mt-4">
                                <div
                                    class="bg-teal-100 border-2 border-teal-500 flex justify-center items-start relative mb-10  p-6 text-teal-600 overflow-x-auto container shadow-lg sm:rounded-lg mx-auto">
                                    <p class="text-xl font-bold">
                                        <i class="fa-solid fa-calendar-check"></i> No Date Selected
                                    </p>
                                </div>
                            </div>
                @endif
                </form> --}}
            </div>

            </div>
            </div>
        </body>

        </html>

        <script>
            function selectAppointmentTime(button) {
                const selectedTime = button.getAttribute('data-time');
                document.getElementById('time').value = selectedTime;

                document.querySelectorAll('.appointment-button').forEach(btn => {
                    btn.classList.remove('bg-teal-600', 'text-white');
                    btn.classList.add('bg-gray-100', 'text-gray-900');
                });

                button.classList.remove('bg-gray-100', 'text-gray-900');
                button.classList.add('bg-teal-600', 'text-white');
            }

            document.addEventListener("DOMContentLoaded", function() {
                const appointments = @json($appointments);
                var remainingSlotsByDate = @json($remainingSlotsByDate);
                const calendar = document.querySelector('#calendar');
                const monthSelect = document.getElementById('monthSelect');
                const yearSelect = document.getElementById('yearSelect');
                const currentDate = new Date();
                const currentMonth = currentDate.getMonth();
                const currentYear = currentDate.getFullYear();

                for (let year = currentYear - 10; year <= currentYear + 10; year++) {
                    const option = document.createElement('option');
                    option.value = year;
                    option.innerText = year;
                    if (year === currentYear) {
                        option.selected = true;
                    }
                    yearSelect.appendChild(option);
                }

                monthSelect.value = currentMonth;

                function renderCalendar(month, year) {

                    const firstDayOfMonth = new Date(year, month, 1).getDay();
                    const daysInMonth = new Date(year, month + 1, 0).getDate();
                    const today = new Date();

                    const isSmallScreen = window.matchMedia("(max-width: 640px)").matches;

                    calendar.innerHTML = ""; // This removes previous months if the function is run multiple times

                    if (isSmallScreen) {
                        const listContainer = document.createElement("ul"); // List for better structure
                        listContainer.className = "space-y-2 w-full";

                        for (let day = 1; day <= daysInMonth; day++) {
                            const currentDate = new Date(year, month, day);

                            const dayOfWeek = currentDate.getDay();
                            const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",
                                "Saturday"
                            ];
                            const dayName = daysOfWeek[dayOfWeek]; // Convert index to day name

                            const listItem = document.createElement("li");
                            listItem.className =
                                "flex justify-between items-center bg-white shadow-md border-l-4 border-teal-500 rounded-lg p-3 cursor-pointer hover:bg-teal-100 transition-all";

                            const dayNumber = document.createElement("span");
                            dayNumber.className = "text-lg font-bold text-teal-700";
                            dayNumber.innerText = day;

                            // Formatted date + day name
                            const formattedDate = currentDate.toLocaleDateString("en-US", {
                                year: "numeric",
                                month: "long",
                                day: "numeric",
                            });

                            const dateText = document.createElement("span");
                            dateText.className = "text-sm text-gray-600";
                            dateText.innerText = `${dayName}, ${formattedDate}`;


                            listItem.appendChild(dayNumber);
                            listItem.appendChild(dateText);

                            listItem.addEventListener("click", () => {
                                // const modal = document.getElementById("modal");
                                const modalDate = document.getElementById("selectedDate");
                                const hiddenmodalDate = document.getElementById("hiddenselectedDate");

                                if (!hiddenmodalDate) {
                                    console.error("Hidden input field 'hiddenselectedDate' not found.");
                                    return;
                                }

                                modalDate.innerText = `Selected Date: ${dayName}, ${formattedDate}`;
                                hiddenmodalDate.value = formattedDate;
                                document.getElementById("dateForm").submit();

                                // modal.classList.remove("hidden");
                                // modal.classList.add("block");
                            });

                            listContainer.appendChild(listItem);
                        }

                        calendar.appendChild(listContainer);
                    } else {
                        calendar.innerHTML = `
                        
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Sun</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Mon</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Tue</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Wed</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Thu</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Fri</div>
                        <div class="hidden sm:block mb-4 text-center font-bold text-lg text-white uppercase tracking-wide bg-teal-500 p-2 rounded-md">Sat</div>
                    `;


                        const scrollWrapper = document.createElement("div");
                        scrollWrapper.className =
                            "sm:grid sm:grid-cols-7 gap-2 overflow-x-auto flex flex-row sm:flex-wrap w-full";

                        const daysInPrevMonth = new Date(year, month, 0).getDate();

                        for (let i = 0; i < firstDayOfMonth; i++) {
                            const prevDate = daysInPrevMonth - (firstDayOfMonth - 1) +
                                i; // Calculate previous month's last dates
                            const emptySlot = document.createElement('div');
                            emptySlot.className =
                                "hidden sm:flex flex-col items-center justify-center bg-teal-700 opacity-60 shadow-lg border-l-4 border-teal-500 rounded-lg text-2xl font-semibold text-white transition-all duration-300 hover:bg-teal-300 hover:text-gray-700 cursor-pointer shadow-md w-full h-16 sm:h-20 md:h-18 lg:h-28 xl:h-24 2xl:h-28"; // Style previous dates
                            emptySlot.innerText = prevDate;
                            calendar.appendChild(emptySlot);
                        }


                        for (let day = 1; day <= daysInMonth; day++) {
                            const daySlot = document.createElement('div');
                            const currentDate = new Date(Date.UTC(year, month, day));
                            const dateString = currentDate.toISOString().split("T")[0];

                            // Get remaining slots from PHP-generated array
                            const totalSlots = remainingSlotsByDate[dateString] || 0;

                            // Find appointments for the current date
                            const appointment = appointments.find(app => app.date === dateString);

                            // Default styling
                            var bgColor = "bg-white";
                            var borderColor = "border-teal-500";
                            var textColor = "text-teal-700";
                            var tooltipText = "No appointment";
                            // If appointment does not exist, modify daySlot classlist


                            daySlot.className =
                                `hidden sm:flex flex-col items-center justify-center shadow-lg border-l-4 rounded-lg text-xl font-semibold transition-all duration-300 hover:bg-teal-100 hover:text-gray-700 cursor-pointer shadow-md w-full h-16 sm:h-20 md:h-18 lg:h-28 xl:h-24 2xl:h-28 ${bgColor} ${borderColor} ${textColor}`;
                            daySlot.title = tooltipText;

                            // Day number element
                            const dayNumber = document.createElement('span');
                            dayNumber.className = "text-center xl:text-3xl lg:text-2xl font-bold";
                            dayNumber.innerText = day;

                            const slotsContainer = document.createElement('div');
                            slotsContainer.className = "text-sm text-black font-light flex flex-col items-center";

                            // Display total available slots
                            if (totalSlots > 0) {
                                const slotsDropdownContainer = document.createElement('div');
                                slotsDropdownContainer.className = "relative inline-block";

                                const toggleButton = document.createElement('button');
                                toggleButton.type = "button";
                                toggleButton.className =
                                    "bg-teal-600 text-white shadow-lg mt-2 font-semibold px-4 py-2 rounded-lg focus:outline-none";
                                toggleButton.innerHTML = "Slots Availability <i class='fas fa-chevron-down ml-2'></i>";

                                const slotsInfoContainer = document.createElement('div');
                                slotsInfoContainer.className =
                                    "absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-lg p-4 hidden";

                                const icon = document.createElement('i');
                                icon.className = "fas fa-circle-check text-lg text-teal-600 mr-2";

                                // Create text span
                                const totalSlotsInfo = document.createElement('span');
                                totalSlotsInfo.className = "font-semibold text-lg text-teal-800";
                                totalSlotsInfo.innerText = `Available: ${totalSlots}`;

                                slotsInfoContainer.appendChild(icon);
                                slotsInfoContainer.appendChild(totalSlotsInfo);

                                slotsDropdownContainer.appendChild(toggleButton);
                                slotsDropdownContainer.appendChild(slotsInfoContainer);

                                slotsContainer.appendChild(slotsDropdownContainer);

                                toggleButton.addEventListener('click', (event) => {
                                    event.stopPropagation();
                                    event.preventDefault();
                                    const isHidden = slotsInfoContainer.classList.contains('hidden');
                                    slotsInfoContainer.classList.toggle('hidden', !isHidden);
                                    toggleButton.innerHTML = isHidden ?
                                        "Hide Slot <i class='fas fa-chevron-up ml-2'></i>" :
                                        "Slots Availability <i class='fas fa-chevron-down ml-2'></i>";
                                });
                            } else {
                                const noSlotText = document.createElement('span');
                                noSlotText.className = "font-semibold text-red-700"
                                const icon = document.createElement('i');
                                icon.className = "fas fa-exclamation-circle text-red-400 mx-2"; // Change icon as needed
                                noSlotText.innerText = "No Slots Available";
                                noSlotText.prepend(icon);
                                slotsContainer.appendChild(noSlotText);
                                bgColor = "bg-gray-100";
                                borderColor = "border-teal-600";
                                textColor = "text-teal-700";
                                tooltipText = "No appointment";
                            }


                            if (appointment) {
                                switch (appointment.status) {
                                    case "Attended":
                                        bgColor = "bg-blue-300";
                                        borderColor = "border-blue-700 border-2";
                                        textColor = "text-blue-700";
                                        tooltipText = "Attended";
                                        break;
                                    case "Unattended":
                                        bgColor = "bg-gray-300";
                                        borderColor = "border-gray-700 border-2";
                                        textColor = "text-gray-600";
                                        tooltipText = "Unattended";
                                        break;
                                    case "Pending":
                                        bgColor = "bg-orange-300 text-white";
                                        borderColor = "border-orange-700 border-2";
                                        textColor = "text-white";
                                        tooltipText = "Pending";
                                        break;
                                    case "Cancelled":
                                        bgColor = "bg-red-300";
                                        borderColor = "border-red-600 border-2";
                                        textColor = "text-red-600";
                                        tooltipText = "Cancelled";
                                        break;
                                    case "Approved":
                                        bgColor = "bg-teal-200";
                                        borderColor = "border-teal-600 border-2";
                                        textColor = "text-teal-600";
                                        tooltipText = "Approved";
                                        break;
                                    default:
                                        bgColor = "bg-gray-200";
                                        borderColor = "border-teal-600";
                                        textColor = "text-teal-700";
                                        tooltipText = "No appointment";
                                        break;
                                }
                            }

                            daySlot.className =
                                `hidden sm:flex flex-col items-center justify-center shadow-lg border-l-4 rounded-lg text-xl font-semibold transition-all duration-300 hover:bg-teal-100 hover:text-gray-700 cursor-pointer shadow-md w-full h-16 sm:h-20 md:h-18 lg:h-28 xl:h-24 2xl:h-28 ${bgColor} ${borderColor} ${textColor}`;

                            daySlot.appendChild(dayNumber);
                            dayNumber.appendChild(slotsContainer);
                            calendar.appendChild(daySlot);

                            daySlot.addEventListener('click', (event) => {
                                event.preventDefault();
                                const modalDate = document.getElementById('selectedDate');
                                const hiddenmodalDate = document.getElementById('hiddenselectedDate');
                                const targetSection = document.getElementById("dateformSection");

                                // Check if the hidden input exists before updating it
                                if (!hiddenmodalDate) {
                                    console.error("Hidden input field 'hiddenselectedDate' not found.");
                                    return;
                                }

                                const formattedDate = currentDate.toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric'
                                });

                                modalDate.innerText = `Selected Date: ${formattedDate}`;
                                document.getElementById('hiddenselectedDate').value = formattedDate;
                                document.getElementById('dateForm').submit();

                            });
                            window.onload = () => {
                                const targetSection = document.getElementById("dateformSection");
                                if (targetSection) {
                                    targetSection.scrollIntoView({
                                        behavior: "smooth",
                                        block: "start"
                                    });

                                    targetSection.classList.add("highlight");

                                    setTimeout(() => {
                                        targetSection.classList.remove("highlight");
                                    }, 1500);
                                }
                            };


                            if (currentDate < today.setHours(0, 0, 0, 0)) {
                                daySlot.classList.remove("border-teal-500", "text-teal-700");
                                daySlot.classList =
                                    "hidden sm:flex flex-col items-center justify-center shadow-lg border-l-4 rounded-lg text-xl font-semibold transition-all duration-300 hover:bg-teal-100 hover:text-gray-700 cursor-pointer shadow-md w-full h-16 sm:h-20 md:h-18 lg:h-28 xl:h-24 2xl:h-28 ${bgColor} ${borderColor} ${textColor}";
                                daySlot.classList.add("border-red-500", "bg-gray-300", "text-red-500", "relative",
                                    "cursor-not-allowed", "border-l-4");

                                daySlot.style.position = "relative";

                                const lineStyles = `
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    width: 60%;
                                    height: 2px;
                                    opacity:40%;
                                    background-color: red;
                                    transform-origin: center;
                                `;
                                // Create the first diagonal line (/)
                                let line1 = document.createElement("div");
                                line1.style.cssText = lineStyles;
                                line1.style.transform = "translate(-50%, -50%) rotate(45deg)";

                                // Create the second diagonal line (\)
                                let line2 = document.createElement("div");
                                line2.style.cssText = lineStyles;
                                line2.style.transform = "translate(-50%, -50%) rotate(-45deg)";
                                daySlot.appendChild(line1);
                                daySlot.appendChild(line2);
                                daySlot.style.pointerEvents = "none";

                            }
                            daySlot.appendChild(dayNumber);

                            function formatTimeTo12Hour(time) {
                                const [hour, minute] = time.split(':');
                                const formattedTime = new Date();
                                formattedTime.setHours(parseInt(hour));
                                formattedTime.setMinutes(parseInt(minute));
                                const options = {
                                    hour: 'numeric',
                                    minute: 'numeric',
                                    hour12: true
                                };
                                return formattedTime.toLocaleString('en-US', options);
                            }

                            const dailyAppointments = appointments.filter(app => {
                                const appDate = new Date(app.date);
                                return appDate.getDate() === day && appDate.getMonth() === month && appDate
                                    .getFullYear() === year;
                            });
                            calendar.appendChild(daySlot);
                        }
                    }



                }
                window.addEventListener("resize", () => renderCalendar(new Date().getMonth(), new Date()
                    .getFullYear()));
                renderCalendar(new Date().getMonth(), new Date().getFullYear());

                monthSelect.addEventListener('change', function() {
                    renderCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
                });

                yearSelect.addEventListener('change', function() {
                    renderCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value));
                });
                renderCalendar(currentMonth, currentYear);
            });
        </script>

        <style>
            @keyframes modalFadeIn {
                from {
                    opacity: 0;
                    transform: scale(0.9) translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: scale(1) translateY(0);
                }
            }

            #create-appointment-modal:target {
                display: flex;
                opacity: 1;
                pointer-events: auto;
            }

            #create-appointment-modal:target .modal-content {
                animation: modalFadeIn 2s ease-in;
            }

            @keyframes borderAnimation {
                0% {
                    box-shadow: 0 0 5px rgba(20, 184, 166, 0.5);
                    border-color: rgba(20, 184, 166, 0.5);
                }

                50% {
                    box-shadow: 0 0 15px rgba(20, 184, 166, 1);
                    border-color: rgba(20, 184, 166, 1);
                }

                100% {
                    box-shadow: 0 0 5px rgba(20, 184, 166, 0.5);
                    border-color: rgba(20, 184, 166, 0.5);
                }
            }

            .highlight {
                transition: background-color s ease-in-out;
            }

            .animate-border {
                animation: borderAnimation 2s infinite ease-in-out;
            }
        </style>
    </x-patientnav-layout>
