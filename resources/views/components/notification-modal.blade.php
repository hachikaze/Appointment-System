<div x-data="{ showModal: false }"
    x-init="@if (!session()->has('hide_modal') && $approvedApplications > 0) showModal = true; @endif">
    @if ($approvedApplications > 0 && !session()->has('hide_modal'))
        <div id="notificationModal" x-show="showModal" x-transition.opacity
            class="fixed inset-0 overflow-y-auto h-full w-full z-50 flex items-center justify-center"
            style="background-color: rgba(0, 0, 0, 0.4);">
            <div class="relative p-8 w-11/12 max-w-2xl rounded-lg shadow-2xl bg-white  border border-gray-200 ">
                <div class="mt-3 text-center">
                    <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-teal-100">
                        <i class="fas fa-calendar text-3xl text-teal-600 "></i>
                    </div>
                    <h3 class="text-2xl leading-6 font-bold text-gray-900  mt-6 mb-4">
                        Approved Appointments
                    </h3>
                    <div class="mt-4 px-7 py-3">
                        <p class="text-lg text-gray-600">
                            You have <span
                                class="font-bold text-xl text-teal-800 se mx-2">{{ $approvedApplications }}</span>
                            approved dental reservation. Please Click the button below to review.
                        </p>
                    </div>
                    <div class="items-center px-4 py-5">
                        <a href=""
                            class="px-6 py-3 bg-teal-500  text-white text-lg font-medium rounded-md w-full inline-block hover:bg-blue-600  focus:outline-none focus:ring-2 focus:ring-blue-300  transition duration-300 ease-in-out transform hover:scale-105">
                            Review Appointments
                        </a>
                    </div>
                    <form action="{{ route('hide.modal') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="mt-4 text-lg text-gray-600  hover:text-gray-800 transition duration-300 ease-in-out">
                            I'll review later
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>