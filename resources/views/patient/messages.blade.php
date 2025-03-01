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
                        <i class="fa-solid fa-history px-2"></i>MESSAGING SYSTEM
                    </div>
                </div>

                <div class="bg-white grid grid-cols-1 p-4 text-xl">
                    <div class="flex gap-4">
                        <div class="w-96 p-5 bg-blue-500 rounded-lg text-white text-center p-4">
                            <div class="mb-12">
                                1
                            </div>
                        </div>
                        <div class="w-full bg-green-500 rounded-lg text-white text-center ">
                            <div class="rounded-t-lg bg-red-500  p-5">
                                Hello there
                            </div>

                            <div class="mt-10">
                                dadadadada
                                adadadada
                                adadaddad
                                adadadad
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>

    </div>

</x-patientnav-layout>
