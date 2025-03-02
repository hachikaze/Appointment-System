<x-patientnav-layout>

    <div class="py-12">

        <div class="max-w-8xl mx-auto lg:px-8 grid lg:gap-8 gap-4 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1">
            <div
                class="bg-teal-500 overflow-hidden mx-12 sm:rounded-t-lg border-b-4 rounded-b-lg border-teal-600 shadow-lg xl:col-span-1 md:col-span-2 sm:col-span-2 col-span-2 relative">
                <div class="flex flex-col sm:flex-row items-center justify-center py-4 relative">
                    <!-- Back Button -->
                    <div class="sm:absolute sm:left-4 mb-2 sm:mb-0">
                        <form action="{{ route('patient.dashboard') }}" method="GET">
                            @csrf
                            <button
                                class="bg-white text-teal-500 px-4 py-2 rounded-md shadow-md hover:bg-gray-100 transition sm:px-3 sm:py-1 sm:text-md">
                                <i class="fa-solid fa-arrow-left"></i> Back
                            </button>
                        </form>
                    </div>
                    <!-- Centered Title -->
                    <div class="text-center font-bold text-3xl text-white sm:flex-1">
                        <i class="fa-solid fa-history px-2"></i>MESSAGING SYSTEM
                    </div>

                </div>
                <div class="bg-white max-h-full overflow-y-auto  p-4 text-xl">

                    @if(session('success'))
                        <div class="bg-green-500 text-white rounded-lg shadow-lg text-md p-3 w-full mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @error('message')
                        <div class="bg-red-400 text-white rounded-lg shadow-lg text-md p-3 w-full mb-4"><i
                                class="fa-solid fa-info-circle px-2"></i>{{ $message }}</div>
                    @enderror

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Messages Section -->
                        <div class="bg-gray-100 border-r-4 border-teal-600 rounded-lg  lg:w-1/3 md:w-full ">
                            <div
                                class="bg-teal-500 p-2 rounded-t-lg border-2 border-teal-500 font-bold text-md text-white">
                                <h1 class="mx-4">INBOX</h1>
                            </div>

                            <div class=" p-4">
                                <div class="my-4 relative">
                                    <input id="message-search" type="text text-md" placeholder="Search messages..."
                                        class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                                    <i
                                        class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                                </div>
                                <div class="flex items-center justify-center ">
                                    <a href="#createmodal"
                                        class="w-full rounded-lg text-left bg-red-400 p-2 text-white shadow-lg">
                                        <i class="fa-solid fa-plus px-2"></i>Compose Message
                                    </a>

                                </div>

                                <div class="flex flex-col sm:flex-row gap-2 mt-4">
                                    <button id="sent-btn"
                                        class="w-auto sm:w-full px-6 py-2 bg-teal-600 text-white font-semibold rounded-lg shadow-md 
                                         hover:bg-teal-500 transition-all duration-300 ease-in-out text-center flex items-center justify-center gap-2"
                                        onclick="window.location.href='{{ route('messages', ['status' => 'sent']) }}'">
                                        <i class="fa-solid fa-paper-plane"></i> Sent
                                    </button>

                                    <button id="received-btn"
                                        class="w-auto sm:w-full px-6 py-2 bg-gray-600 text-white font-semibold rounded-lg shadow-md 
                                    hover:bg-gray-500 transition-all duration-300 ease-in-out text-center flex items-center justify-center gap-2"
                                        onclick="window.location.href='{{ route('messages', ['status' => 'received']) }}'">
                                        <i class="fa-solid fa-inbox"></i> Received
                                    </button>

                                </div>


                                <!-- Messages Container -->
                                <div
                                    class="mt-4 space-y-2 h-full max-h-[800px] overflow-y-auto p-5 pr-0 pl-0  flex flex-col min-h-0">
                                    @foreach ($messages as $message)
                                        <div class="message-item border-1 rounded-lg shadow-lg p-4 bg-teal-50 border-l-4 border-teal-500 hover:bg-teal-100 transition-all duration-300 ease-in-out cursor-pointer"
                                            data-message-id="{{ $message->id }}" data-message="{{ $message->message }}"
                                            data-subject="{{ $message->subject }}"
                                            data-sender="{{ $message->sender->email }}"
                                            data-time="{{ $message->created_at->format('F j, Y') }}"
                                            data-receiver={{$message->receiver->email}}>
                                            <div class="flex items-center gap-3">
                                                <img src="{{ $message->sender->profile_image ?? '/images/default-avatar.png' }}"
                                                    alt="Avatar"
                                                    class="w-14 h-14 rounded-full shadow-xl border-2 border-teal-500">
                                                <div>
                                                    <p class="search-subject font-semibold truncate text-md">
                                                        {{ $message->subject }}
                                                    </p>
                                                    <div class="flex flex-row space-x-2 items-center">
                                                        <p class="text-sm">
                                                            {{ $message->created_at->format('F j, Y h:i A') }}
                                                        </p>
                                                        <i class="fa-solid fa-eye text-teal-700 text-sm"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="search-content  text-gray-600 line-clamp-2 text-sm my-4 ">
                                                <i class="fa-solid fa-arrow-up-right-from-square text-teal-500 mx-2"></i>
                                                {{ $message->message }}
                                            </p>
                                            <x-message-modal :modalid="'replymodal'" :route="route('messages.replies.post', $message->id)" title="Reply Message" :userToEmail="'iconnelly@example.net'"
                                                :userFromEmail="Auth::user()->email" />

                                            <x-message-modal :modalid="'createmodal'" :route="route('messages.create.post', $message->id)" title="Compose Message"
                                                :userToEmail="'iconnelly@example.net'"
                                                :userFromEmail="Auth::user()->email" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Message Details Section -->
                        <div
                            class="md:w-2/2 w-full shadow-lg bg-gray-100 rounded-lg max-h-screen text-white text-center ">
                            <div class="rounded-t-lg  bg-gradient-to-r from-emerald-500 to-teal-300 p-5 text-white">
                                <div class="flex flex-wrap gap-4 sm:flex-nowrap justify-between items-center">
                                    <!-- Subject -->
                                    <h1 class="font-semibold text-2xl" id="message-subject">
                                        <i class="fa-solid fa-envelope px-1"></i> Subject: [Example Text]
                                    </h1>

                                    <!-- Message Time -->
                                    <div class="rounded-lg shadow-lg bg-white p-2 w-full sm:w-auto">
                                        <p class="text-sm font-semibold text-teal-600 w-full" id="message-time">
                                            M/D/Y
                                        </p>
                                    </div>
                                </div>


                                <div
                                    class="mt-2 flex flex-wrap gap-4 sm:flex-nowrap sm:space-x-6 justify-start items-center">
                                    <div
                                        class="rounded-lg p-2 bg-teal-100 text-teal-700 font-semibold shadow-lg w-full sm:w-auto">
                                        <p class="text-md" id="message-sender">
                                            <span class="font-semibold"><i
                                                    class="fa-solid fa-user mx-2"></i>From:</span> John Doe
                                        </p>
                                    </div>
                                    <div
                                        class="rounded-lg p-2 bg-teal-100 text-teal-700 font-semibold shadow-lg w-full sm:w-auto">
                                        <p class="text-md" id="message-receiver">
                                            <span class="font-semibold"><i class="fa-solid fa-user mx-2"></i>To:</span>
                                            Jane Smith
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <div
                                class="h-[400px] overflow-y-auto items-center space-y-2 p-4 text-md bg-teal-50 m-4 text-start rounded-lg border shadow-sm shadow-lg pt-2 text-black">
                                <p id="message-container">
                                    Click
                                    the
                                    <span
                                        class="text-sm p-2 font-bold shadow-lg text-teal-500 rounded-lg bg-white border-2 border-l-4 border-teal-500 mx-2">
                                        CARDS</span>
                                    on the left to view messages
                                    <br>
                                    <br>
                                    Then, click <span
                                        class="text-sm p-2 font-bold shadow-lg text-white rounded-lg bg-teal-600 mx-2">
                                        Reply <i class="fa-solid fa-reply"></i>
                                    </span> below to compose a reply message.

                                </p>
                            </div>

                            <!-- REPLIES -->
                            <div class="mt-10">
                                <div
                                    class="bg-slate-500 p-2 flex items-center justify-between text-white border-l-6 border-blue-600 bg-gradient-to-r from-emerald-600 to-teal-400">
                                    <div class="mx-4 font-semibold">
                                        <h1>REPLIES</h1>
                                    </div>
                                    <a href="#replymodal"
                                        class="btn p-2 shadow-lg font-semibold text-sm bg-teal-600 rounded-lg hover:bg-teal-200 hover:text-black transition-all duration-300 ease-in-out m-2">
                                        Reply
                                        <i class="fa-solid fa-reply"></i>
                                    </a>
                                </div>
                                <div id="replies-container"
                                    class="p-4 bg-teal-50 max-h-80 overflow-y-auto rounded-lg shadow mt-4 ">
                                    <div id="replies-list" class="space-y-4">
                                        <div
                                            class="bg-white flex flex-row space-x-4 items-center shadow-md border-l-4 border-teal-500 p-4 rounded-lg">
                                            <img src="/images/default-avatar.png" alt="Avatar"
                                                class="w-14 h-14 rounded-full shadow-xl border-2 border-teal-500">
                                            <div>
                                                <h2 class="text-start text-md text-teal-600">
                                                    Hello, This is a reply message.
                                                </h2>
                                                <p class="text-sm text-start text-black truncate"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        //SEARCH JS
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById("message-search");
            const messageItems = document.querySelectorAll(".message-item");

            searchInput.addEventListener("input", function () {
                const searchTerm = searchInput.value.toLowerCase();

                messageItems.forEach(element => {
                    const subject = element.querySelector(".search-subject").textContent.toLowerCase();
                    const content = element.querySelector(".search-content").textContent.toLowerCase();
                    const sender = element.getAttribute("data-sender").toLowerCase();

                    if (subject.includes(searchTerm) || content.includes(searchTerm) || sender.includes(searchTerm)) {
                        element.style.display = "block";
                    } else {
                        element.style.display = "none";
                    }
                });
            })
        });


        //GET MESSAGE CONTENT JS
        document.addEventListener("DOMContentLoaded", function () {
            const messageItems = document.querySelectorAll(".message-item");
            const messageContent = document.getElementById("message-container");
            const messageSender = document.getElementById("message-sender");
            const messageReceiver = document.getElementById("message-receiver");
            const messageSubject = document.getElementById("message-subject");
            const messageTime = document.getElementById("message-time");
            const repliesContainer = document.getElementById('replies-container');
            const repliesList = document.getElementById('replies-list');

            messageItems.forEach(item => {
                item.addEventListener("click", function () {
                    const message = this.getAttribute("data-message");
                    const sender = this.getAttribute("data-sender");
                    const receiver = this.getAttribute("data-receiver");
                    const time = this.getAttribute("data-time");
                    const subject = this.getAttribute("data-subject");

                    const messageId = this.getAttribute('data-message-id');

                    //MESSAGE CONTENT
                    messageContent.textContent = `${message}`;
                    messageSender.innerHTML = `<i class="fa-solid fa-user text-teal-600 mr-2"></i> From: ${sender}`;
                    messageReceiver.innerHTML = `<i class="fa-solid fa-user text-teal-600 mr-2"></i> To: ${receiver}`;
                    messageSubject.innerHTML = `<i class="fa-solid fa-envelope text-white mr-2"></i> Subject: ${subject}`;
                    messageTime.textContent = `${time}`;

                    //REPLIES
                    fetch(`/patient/messages/${messageId}/replies`)
                        .then(response => response.json())
                        .then(data => {
                            repliesList.innerHTML = '';
                            repliesContainer.classList.remove('hidden');
                            if (data.length === 0) {
                                repliesList.innerHTML = `<p class="text-gray-500">No replies yet.</p>`;
                            } else {
                                data.forEach(reply => {
                                    repliesList.innerHTML += `
                                        <div class="bg-white flex flex-row space-x-4 items-center shadow-md border-l-4 border-teal-500 p-4 rounded-lg">
                                            <img src="${reply.sender_image || '/images/default-avatar.png'}" alt="Avatar"
                                                class="w-14 h-14 rounded-full shadow-xl border-2 border-teal-500">
                                            <div>
                                                <h2 class="text-start text-md text-teal-600">
                                                    <strong>Reply From:</strong> ${reply.from_user_name}
                                                </h2>
                                                <p class="text-sm text-start text-black truncate">${reply.message}</p>
                                            </div>
                                        </div>
                                    `;
                                });
                            }
                        })
                        .catch(error => console.error('Error fetching replies:', error));
                });
            });
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

        #replymodal:target {
            display: flex;
            opacity: 1;
            pointer-events: auto;
        }

        #replymodal:target .modal-content {
            animation: modalFadeIn 0.3s ease-out forwards;
        }


        #createmodal:target {
            display: flex;
            opacity: 1;
            pointer-events: auto;
        }

        #createmodal:target .modal-content {
            animation: modalFadeIn 0.3s ease-out forwards;
        }
    </style>
</x-patientnav-layout>