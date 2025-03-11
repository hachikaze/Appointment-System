<x-patientnav-layout>
    <div class="min-h-screen p-6 backdrop-blur-sm flex  items-center justify-center">
        <div class="container max-w-screen-xl mx-auto">
            <div>
                <div class="text-start bg-gradient-to-r from-teal-600 to-teal-400 rounded-lg p-4 border-t-4 shadow-md border-gray-200 mb-6">
                    <h2 class="font-semibold text-xl text-white">Create an Appointment</h2>
                    <p class="text-white mb-6">Please fill up the following forms to book an appointment.</p>
                </div>

                <div class="bg-white  border-teal-500 border-t-4 border-b-4 rounded-lg shadow-lg p-4 px-4  mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div
                            class="  bg-gradient-to-r from-teal-50  to-blue-50 p-4  rounded-lg text-gray-600 flex flex-col  h-full">
                            <p class="font-medium text-lg">Appointment Details</p>
                            <p class="mt-4">Please fill out all the <span
                                    class="bg-red-100 text-red-400   rounded-lg p-1 ">
                                    required</span> fields.
                            </p>

                            <!-- Centered Image -->
                            <div class="flex flex-col justify-center items-center flex-grow">
                                <div class="w-40 h-40 mt-4 lg:mt-0 rounded-full bg-gradient-to-r from-teal-100  to-blue-100 p-1">
                                    <img src="/images/logo.png" alt="Profile Image"
                                        class="w-full h-full object-cover rounded-full">
                                </div>
                                <div>
                                <p class="font-semibold text-teal-700 mt-2 sm:mt-4 p-2 ">Opening Hours: 9:00pm - 6:00pm</p>
                                </div>
                            </div>
                           

                            <div class="mt-auto">
                                <a href="{{ route('calendar') }}"
                                    class=" w-fit hidden lg:block bg-red-500 text-md hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg">
                                    Cancel
                                </a>
                            </div>
                        </div>

                    <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST" class="lg:col-span-2">
                        @csrf
                        <div class="lg:col-span-2 ">
                            <div class="grid gap-4 space-y-6 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="name" readonly
                                        class="h-10  mt-1 rounded px-4 w-full bg-teal-50 border-2 border-teal-100"
                                        value="{{ $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname  }}" />
                                </div>
                                <div class="md:col-span-5">
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" id="email" readonly
                                        class="h-10  mt-1 rounded px-4 w-full bg-teal-50 border-2 border-teal-100" value="{{ $user->email }}"
                                     placeholder="email@domain.com"/>
                                     @error('email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                     @enderror
                                </div>
                                <div class="md:col-span-3">
                                    <label for="date">Date Selected</label>
                                    <input type="text" name="date" id="date"readonly
                                        class="h-10 mt-1 rounded px-4 w-full bg-teal-50 border-2 border-teal-100" value="{{ $appointment->date }}"
                                        placeholder="No Date Selected" />
                                    @error('date')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                     @enderror
                                </div>
                                <div class="md:col-span-2">
                                    <label for="time">Time Slot</label>
                                    <input type="text" name="time" id="time"readonly
                                        class="h-10  mt-1 rounded px-4 w-full bg-teal-50 border-2 border-teal-100" value="{{ $appointment->time_slot }}"
                                        placeholder="" />
                                    @error('time')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="md:col-span-6">
                                    <label for="phone">Phone Number</label>
                                    <div class="h-10 bg-blue-50 border-2 border-blue-100 flex  rounded items-center mt-1">
                                        <input name="phone" id="phone" placeholder="Phone Number" maxlength="11"
                                            class="px-4 appearance-none outline-none text-gray-800  w-full bg-transparent "
                                            value="" />
                                    </div>
                                    @error('phone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="md:col-span-6">
                                    <label for="services">Select Services <span onclick="window.location.href='{{ route('pricing') }}'" class="cursor-pointer mx-4 font-semibold text-teal-600 underline">Click here to view the Price list.</span></label>
                                    <div class="h-80 overflow-y-auto  space-y-4 bg-blue-50 flex flex-col border border-blue-100 rounded mt-1 p-3">
                                        @foreach($services as $category => $items)
                                            <p class="font-semibold text-teal-800 text-md bg-teal-300 rounded-lg p-2 border-l-4 border-teal-600">{{ $category }}</p>
                                            @foreach($items as $key => $value)
                                                @if(is_array($value))
                                                    <p class="ml-3 font-medium text-gray-600 ">{{ $key }}</p>
                                                    @foreach($value as $subkey => $subvalue)
                                                        @if(is_array($subvalue))
                                                            <p class="ml-6 font-medium text-gray-500">{{ $subkey }}</p>
                                                            @foreach($subvalue as $item)
                                                                <label class="flex items-center ml-10">
                                                                    <input type="checkbox" name="appointments[]" value="{{ $item }}" class="mr-2">
                                                                    <span>{{ $item }}</span>
                                                                </label>
                                                            @endforeach
                                                        @else
                                                            <label class="flex items-center ml-6">
                                                                <input type="checkbox" name="appointments[]" value="{{ $subvalue }}" class="mr-2">
                                                                <span>{{ $subvalue }}</span>
                                                            </label>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <label class="flex items-center ml-3">
                                                        <input type="checkbox" name="appointments[]" value="{{ $value }}" class="mr-2">
                                                        <span>{{ $value }}</span>
                                                    </label>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                    @error('appointments')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            const checkboxes = document.querySelectorAll('input[name="appointments[]"]');

                                            checkboxes.forEach(checkbox => {
                                                checkbox.addEventListener('change', function () {
                                                    let checkedCount = document.querySelectorAll('input[name="appointments[]"]:checked').length;
                                                    
                                                    if (checkedCount > 3) {
                                                        this.checked = false; 
                                                        alert("You can only select up to 3 services.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                      <a href="{{ route('calendar') }}"
                                            class=" mx-4 w-fit block lg:hidden bg-red-500 text-md hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg">
                                            Cancel
                                        </a>
                                        <button
                                            class="bg-teal-500 text-md hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded-lg">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-patientnav-layout>