@props(['modalid', 'subject', 'route', 'title', 'userToEmail', 'userFromEmail'])

<!-- Reusable Message Modal -->
<div id="{{ $modalid }}"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-40 backdrop-blur-sm transition-opacity duration-300">
    <div class="modal-content relative w-full max-w-md mx-auto rounded-lg overflow-hidden shadow-lg bg-white">
        <!-- Form -->
        <form action="{{ $route }}" method="POST">
            @csrf
            <!-- Modal Header -->
            <div class="flex items-center justify-center text-white h-24 bg-teal-500 rounded-t-md">
                <h3 class="text-2xl"><i class="fa-solid fa-envelope px-2"></i>{{ $title }}</h3>
            </div>

            <!-- Modal Body -->
            <div class="flex flex-col gap-4 p-6">
                <!-- To -->
                <div class="w-full">
                    <label class="block mb-2 text-sm text-slate-700">To:</label>
                    <input type="email" name="user_to" readonly
                        class="w-full border border-slate-400 rounded-md px-3 py-2 text-sm text-slate-700 bg-transparent focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow transition duration-300 ease-in-out"
                        value="{{ $userToEmail }}">
                </div>

                <!-- From -->
                <div class="w-full">
                    <label class="block mb-2 text-sm text-slate-700">From:</label>
                    <input type="email" name="user_from" readonly
                        class="w-full border border-slate-400 rounded-md px-3 py-2 text-sm text-slate-700 bg-transparent focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow transition duration-300 ease-in-out"
                        value="{{ $userFromEmail }}">
                </div>

                <!-- Subject -->
                <div class="w-full">
                    <label class="block mb-2 text-sm text-slate-700">Subject:</label>
                    <input type="text" name="subject" placeholder="Please type your message here.."
                        class="w-full border border-slate-400 rounded-md px-3 py-2 text-sm text-slate-700 bg-transparent focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow transition duration-300 ease-in-out"
                        value="">
                </div>

                <!-- Message -->
                <textarea id="message" rows="4" name="message"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-slate-400 focus:ring-teal-500"
                    placeholder="Write your message here..."></textarea>
            </div>

            <!-- Modal Footer -->
            <div class="p-6 pt-0">
                <button type="submit"
                    class="w-full bg-teal-600 text-white py-2 px-4 rounded-md shadow-md transition-all hover:shadow-lg focus:bg-slate-700 active:bg-slate-700 disabled:pointer-events-none disabled:opacity-50">
                    <i class="fa-solid fa-arrow-right px-2"></i> Send Message
                </button>
            </div>
        </form>

        <!-- Close Button -->
        <a href="#"
            class=" bg-red-400 rounded-lg w-8 h-8 flex justify-center items-center absolute top-4 right-4 font-bold text-xl text-white hover:text-teal-100">
            X
        </a>
    </div>
</div>