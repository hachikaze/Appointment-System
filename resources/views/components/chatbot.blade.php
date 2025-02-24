<div id="chatbot-container" class="fixed bottom-6 right-6 z-50">
    <!-- Chat Button -->
    <button id="chat-button" class="bg-teal-500 text-white rounded-full p-4 shadow-lg hover:bg-teal-600 transition-all duration-300 flex items-center justify-center group">
        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
        </svg>
        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center" id="message-badge">1</span>
    </button>

    <!-- Chat Window -->
    <div id="chat-window" class="hidden absolute bottom-20 right-0 w-96 bg-white rounded-xl shadow-2xl border border-gray-200">
        <!-- Chat Header -->
        <div class="bg-teal-500 text-white p-4 rounded-t-xl flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold">Dental Assistant</h3>
                    <p class="text-xs text-teal-100">Online • Ready to help</p>
                </div>
            </div>
            <button id="close-chat" class="text-teal-100 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Chat Messages -->
        <div id="chat-messages" class="p-4 h-72 overflow-y-auto">
            <!-- Messages will be loaded here -->
        </div>

        <!-- Predefined Questions -->
        <div id="predefined-questions" class="border-t border-b p-4 bg-gray-50">
            <div class="text-sm text-gray-600 mb-2">Common Questions:</div>
            <div class="grid grid-cols-2 gap-2">
                <button class="predefined-question text-left text-sm bg-white p-2 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors truncate">
                    📅 Book Appointment
                </button>
                <button class="predefined-question text-left text-sm bg-white p-2 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors truncate">
                    ⏰ Clinic Hours
                </button>
                <button class="predefined-question text-left text-sm bg-white p-2 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors truncate">
                    💰 Service Prices
                </button>
                <button class="predefined-question text-left text-sm bg-white p-2 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors truncate">
                    📍 Clinic Location
                </button>
                <button class="predefined-question text-left text-sm bg-white p-2 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors truncate">
                    🦷 Available Services
                </button>
                <button class="predefined-question text-left text-sm bg-white p-2 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors truncate">
                    🏥 Emergency Care
                </button>
            </div>
            <button id="show-more-questions" class="text-teal-500 hover:text-teal-600 text-sm mt-2 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                More Questions
            </button>
        </div>

        <!-- Chat Input -->
        <div class="p-4">
            <div class="flex items-center">
                <input type="text" id="chat-input" 
                    class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                    placeholder="Type your message...">
                <button id="send-message" class="ml-2 bg-teal-500 text-white rounded-lg p-2 hover:bg-teal-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- More Questions Modal -->
    <div id="more-questions-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">More Questions</h3>
                <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="grid grid-cols-1 gap-2 max-h-96 overflow-y-auto">
                <button class="predefined-question text-left text-sm bg-white p-3 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors">
                    🦷 What dental services do you offer?
                </button>
                <button class="predefined-question text-left text-sm bg-white p-3 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors">
                    💳 Do you accept insurance?
                </button>
                <button class="predefined-question text-left text-sm bg-white p-3 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors">
                    👨‍⚕️ Can I choose my dentist?
                </button>
                <button class="predefined-question text-left text-sm bg-white p-3 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors">
                    ⚡ What is considered a dental emergency?
                </button>
                <button class="predefined-question text-left text-sm bg-white p-3 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors">
                    ⏰ How long does a typical appointment take?
                </button>
                <button class="predefined-question text-left text-sm bg-white p-3 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors">
                    🦷 Do you offer teeth whitening?
                </button>
                <button class="predefined-question text-left text-sm bg-white p-3 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors">
                    👶 Do you treat children?
                </button>
                <button class="predefined-question text-left text-sm bg-white p-3 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors">
                    💉 Is sedation available?
                </button>
                <button class="predefined-question text-left text-sm bg-white p-3 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors">
                    🦿 Do you offer dental implants?
                </button>
                <button class="predefined-question text-left text-sm bg-white p-3 rounded border hover:bg-teal-50 hover:border-teal-500 transition-colors">
                    💵 Payment options available?
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatButton = document.getElementById('chat-button');
    const chatWindow = document.getElementById('chat-window');
    const closeChat = document.getElementById('close-chat');
    const messageBadge = document.getElementById('message-badge');
    const chatInput = document.getElementById('chat-input');
    const sendMessage = document.getElementById('send-message');
    const showMoreQuestions = document.getElementById('show-more-questions');
    const moreQuestionsModal = document.getElementById('more-questions-modal');
    const closeModal = document.getElementById('close-modal');
    const chatMessages = document.getElementById('chat-messages');

    // Chat state management
    let chatState = {
        isOpen: false,
        unreadCount: 1
    };

    // Predefined questions and responses
    const predefinedResponses = {
        "📅 Book Appointment": {
            response: "I can help you book an appointment. Please choose your preferred option:",
            options: ["Schedule for this week", "Schedule for next week", "Emergency appointment"]
        },
        "⏰ Clinic Hours": {
            response: "Our clinic is open:\n• Monday - Saturday: 9AM - 6PM\n• Sunday: Closed\n\nWould you like to schedule a visit?",
            options: ["Book appointment", "Get directions"]
        },
        "💰 Service Prices": {
            response: "Here are our common treatment prices:\n• Consultation: ₱500\n• Cleaning: ₱1,500\n• Filling: Starting at ₱2,000\n\nWould you like more details about a specific service?",
            options: ["More services", "Book consultation"]
        },
        "📍 Clinic Location": {
            response: "We're located at [Your Clinic Address]. We're near [Landmark].\n\nWould you like directions or contact information?",
            options: ["Get directions", "Contact us"]
        },
        "🦷 Available Services": {
            response: "We offer comprehensive dental services including:\n• General Dentistry\n• Cosmetic Dentistry\n• Orthodontics\n• Emergency Care\n\nWhich service would you like to know more about?",
            options: ["General Dentistry", "Cosmetic Dentistry", "Orthodontics", "Emergency Care"]
        },
        "🏥 Emergency Care": {
            response: "For dental emergencies, we provide immediate care. Call us at 8715-5170 for 24/7 emergency support.\n\nCommon emergencies we handle:\n• Severe tooth pain\n• Broken teeth\n• Dental infections",
            options: ["Call now", "Emergency appointment"]
        },
        // Additional responses for modal questions
        "DDS What dental services do you offer?": {
            response: "Our comprehensive dental services include:\n• Preventive Care\n• Restorative Dentistry\n• Cosmetic Procedures\n• Orthodontics\n• Oral Surgery\n• Emergency Care",
            options: ["Learn more about services", "Book consultation"]
        },
        "💳 Do you accept insurance?": {
            response: "Yes, we accept most major insurance plans! We also offer flexible payment options and financing plans.",
            options: ["Payment plans", "Insurance details"]
        },
        "👨‍⚕️ Can I choose my dentist?": {
            response: "Yes, you can request a specific dentist. Would you like to know more about our dental team?",
            options: ["Meet our dentists", "Book with specific dentist"]
        },
        "⚡ What is considered a dental emergency?": {
            response: "Dental emergencies include:\n• Severe tooth pain\n• Knocked-out tooth\n• Broken or chipped tooth\n• Swelling\n• Bleeding\n\nCall us immediately at 8715-5170 for emergency care.",
            options: ["Call now", "Learn more"]
        },
        "⏰ How long does a typical appointment take?": {
            response: "Appointment duration varies by procedure:\n• Check-up: 30-45 mins\n• Cleaning: 45-60 mins\n• Fillings: 30-60 mins\n• Complex procedures: 1-2 hours",
            options: ["Book appointment", "Learn more"]
        },
        "DDS Do you offer teeth whitening?": {
            response: "Yes, we offer professional teeth whitening services! We have both in-office and take-home options available.",
            options: ["View whitening options", "Book consultation"]
        },
        "DDS Do you treat children?": {
            response: "Yes, we provide pediatric dental services! We make sure your child's visit is comfortable and fun.",
            options: ["Children's services", "Book appointment"]
        },
        "DDS Is sedation available?": {
            response: "Yes, we offer various sedation options for anxious patients or complex procedures.",
            options: ["Learn about sedation", "Book consultation"]
        },
        "DDS Do you offer dental implants?": {
            response: "Yes, we provide dental implant services. Our experienced team uses the latest technology for optimal results.",
            options: ["Implant information", "Book consultation"]
        },
        "DDS Payment options available?": {
            response: "We offer multiple payment options:\n• Cash\n• Credit/Debit cards\n• Insurance\n• Payment plans\n• Financing options",
            options: ["Payment details", "Contact us"]
        }
    };

    // Core functions
    function loadChatState() {
        const savedState = localStorage.getItem('chatState');
        if (savedState) {
            chatState = JSON.parse(savedState);
            updateChatUI();
        }
    }

    function saveChatState() {
        localStorage.setItem('chatState', JSON.stringify(chatState));
        updateChatUI();
    }

    function updateChatUI() {
        chatWindow.classList.toggle('hidden', !chatState.isOpen);
        messageBadge.textContent = chatState.unreadCount;
        messageBadge.classList.toggle('hidden', chatState.unreadCount === 0);
    }

    function loadMessages() {
        const savedMessages = JSON.parse(localStorage.getItem('chatMessages') || '[]');
        chatMessages.innerHTML = '';
        
        if (savedMessages.length === 0) {
            addMessage("👋 Hello! Welcome to Ana Fatima Barroso Dental Clinic. How can I assist you today?", false);
        } else {
            savedMessages.forEach(msg => {
                addMessage(msg.text, msg.isUser, false);
            });
        }
    }

    function showTypingIndicator() {
        const typingDiv = document.createElement('div');
        typingDiv.id = 'typing-indicator';
        typingDiv.className = 'flex items-start mb-4';
        typingDiv.innerHTML = `
            <div class="flex-shrink-0">
                <div class="w-8 h-8 rounded-full bg-teal-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
            </div>
            <div class="ml-3 bg-gray-100 rounded-lg p-3">
                <div class="typing-dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        `;
        chatMessages.appendChild(typingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function hideTypingIndicator() {
        const typingIndicator = document.getElementById('typing-indicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
    }

    function addMessage(message, isUser = false, shouldSave = true) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex items-start mb-4 ${isUser ? 'justify-end' : ''} animate-fade-in`;
        
        if (isUser) {
            messageDiv.innerHTML = `
                <div class="mr-3 bg-teal-500 text-white rounded-lg p-3 max-w-[80%]">
                    <p class="text-sm">${message}</p>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-teal-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-3 bg-gray-100 rounded-lg p-3 max-w-[80%]">
                    <p class="text-sm text-gray-800 whitespace-pre-line">${message}</p>
                </div>
            `;
        }

        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        if (shouldSave) {
            const savedMessages = JSON.parse(localStorage.getItem('chatMessages') || '[]');
            savedMessages.push({
                text: message,
                isUser: isUser,
                timestamp: new Date().getTime()
            });
            localStorage.setItem('chatMessages', JSON.stringify(savedMessages));

            if (!chatState.isOpen && !isUser) {
                chatState.unreadCount++;
                saveChatState();
            }
        }
    }

    function addQuickReplies(options) {
        const quickRepliesDiv = document.createElement('div');
        quickRepliesDiv.className = 'flex flex-wrap gap-2 mt-2 animate-fade-in';
        
        options.forEach(option => {
            const button = document.createElement('button');
            button.className = 'text-sm bg-gray-100 hover:bg-teal-50 text-gray-700 hover:text-teal-600 px-3 py-1 rounded-full transition-colors';
            button.textContent = option;
            button.onclick = () => {
                addMessage(option, true);
                quickRepliesDiv.remove();
                handleQuickReply(option);
            };
            quickRepliesDiv.appendChild(button);
        });

        chatMessages.appendChild(quickRepliesDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function handleQuickReply(option) {
        showTypingIndicator();
        setTimeout(() => {
            hideTypingIndicator();
            let response = "I'll help you with that request. ";
            switch(option) {
                case "Schedule for this week":
                case "Schedule for next week":
                    response += "Please call us at (8715) 5170 or use our online booking system to schedule your appointment.";
                    break;
                case "Get directions":
                    response += "You can find us at  Clinic Address]. Would you like a map link?";
                    break;
                case "Call now":
                    response += "Calling our emergency line: (8715) 5170";
                    break;
                default:
                    response += "How else can I assist you?";
            }
            addMessage(response, false);
        }, 1000);
    }

    function getBotResponse(message) {
        const lowerMessage = message.toLowerCase();
        
        // Check for exact match in predefinedResponses
        const exactMatch = Object.keys(predefinedResponses).find(key => key.toLowerCase() === lowerMessage);
        if (exactMatch) {
            const response = predefinedResponses[exactMatch];
            return { response: response.response, options: response.options };
        }

        // Check for keyword matches
        const responses = {
            'appointment': {
                keywords: ['appointment', 'book', 'schedule', 'visit'],
                response: "Would you like to schedule an appointment? You can:\n1. Call us at (8715) 5170\n2. Use our online booking system\n3. Visit our clinic",
                options: ["Schedule now", "Call clinic", "Learn more"]
            },
            'services': {
                keywords: ['service', 'treatment', 'procedure', 'dental'],
                response: "We offer various dental services including:\n• General Dentistry\n• Cosmetic Dentistry\n• Orthodontics\n• Emergency Care",
                options: ["View all services", "Book consultation"]
            },
            'emergency': {
                keywords: ['emergency', 'urgent', 'pain', 'hurt'],
                response: "For dental emergencies, please call us immediately at (8715) 5170. We provide 24/7 emergency services.",
                options: ["Call now", "Emergency info"]
            },
            'location': {
                keywords: ['location', 'address', 'where', 'find'],
                response: "We're located at [Your Clinic Address]. Would you like directions?",
                options: ["Get directions", "Contact us"]
            },
            'hours': {
                keywords: ['hours', 'time', 'open', 'schedule'],
                response: "Our clinic hours are:\nMonday - Saturday: 9AM - 6PM\nSunday: Closed",
                options: ["Book appointment", "Contact us"]
            },
            'price': {
                keywords: ['price', 'cost', 'fee', 'payment'],
                response: "Our prices vary by treatment. Basic services start at:\n• Consultation: ₱500\n• Cleaning: ₱1,500\n• Filling: from ₱2,000",
                options: ["Full price list", "Book consultation"]
            },
            'greeting': {
                keywords: ['hi', 'hello', 'hey', 'good'],
                response: "Hello! How can I assist you today?",
                options: ["Book appointment", "View services", "Contact us"]
            }
        };

        // Check for matching keywords
        for (const category in responses) {
            const matchedKeyword = responses[category].keywords.find(keyword => 
                lowerMessage.includes(keyword)
            );
            
            if (matchedKeyword) {
                const response = responses[category];
                return { response: response.response, options: response.options };
            }
        }

        // Default response if no match found
        const defaultResponse = "I'm here to help! Would you like to:\n1. Book an appointment\n2. Learn about our services\n3. Get clinic information\n4. Speak with our staff";
        return { response: defaultResponse, options: ["Book an appointment", "Learn about services", "Contact us"] };
    }

    // Event Listeners
    chatButton.addEventListener('click', () => {
        chatState.isOpen = !chatState.isOpen;
        chatState.unreadCount = 0;
        saveChatState();
        if (chatState.isOpen) {
            chatInput.focus();
        }
    });

    closeChat.addEventListener('click', () => {
        chatState.isOpen = false;
        saveChatState();
    });

    // Handle predefined question clicks
    document.querySelectorAll('.predefined-question').forEach(button => {
        button.addEventListener('click', function() {
            const question = this.textContent.trim();
            addMessage(question, true);
            
            showTypingIndicator();
            
            setTimeout(() => {
                hideTypingIndicator();
                const response = predefinedResponses[question];
                if (response) {
                    addMessage(response.response, false);
                    if (response.options) {
                        addQuickReplies(response.options);
                    }
                } else {
                    addMessage("I'm sorry, I don't have specific information about that. Please call us at (8715) 5170 for assistance.", false);
                }
            }, 1000);

            moreQuestionsModal.classList.add('hidden');
        });
    });

    // More questions modal handlers
    showMoreQuestions.addEventListener('click', () => {
        moreQuestionsModal.classList.remove('hidden');
    });

    closeModal.addEventListener('click', () => {
        moreQuestionsModal.classList.add('hidden');
    });

    moreQuestionsModal.addEventListener('click', (e) => {
        if (e.target === moreQuestionsModal) {
            moreQuestionsModal.classList.add('hidden');
        }
    });

    // Send message handlers
    function sendUserMessage() {
        const message = chatInput.value.trim();
        if (message) {
            addMessage(message, true);
            chatInput.value = '';
            
            showTypingIndicator();

            setTimeout(() => {
                hideTypingIndicator();
                const botResponse = getBotResponse(message);
                addMessage(botResponse.response, false);
                if (botResponse.options && botResponse.options.length) {
                    addQuickReplies(botResponse.options);
                }
            }, 1000);
        }
    }

    sendMessage.addEventListener('click', sendUserMessage);
    
    chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendUserMessage();
        }
    });

    // Initialize chat
    loadChatState();
    loadMessages();
});
</script>

<style>
.animate-fade-in {
    animation: fadeIn 0.3s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.typing-dots {
    display: flex;
    gap: 4px;
}

.typing-dots span {
    width: 8px;
    height: 8px;
    background-color: #4B5563;
    border-radius: 50%;
    animation: typing 1.4s infinite ease-in-out;
}

.typing-dots span:nth-child(1) { animation-delay: -0.32s; }
.typing-dots span:nth-child(2) { animation-delay: -0.16s; }

@keyframes typing {
    0%, 80%, 100% { transform: scale(0); }
    40% { transform: scale(1); }
}

#chat-messages::-webkit-scrollbar {
    width: 6px;
}

#chat-messages::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

#chat-messages::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
}

#chat-messages::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.predefined-question {
    transition: all 0.2s ease-in-out;
}

.predefined-question:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#more-questions-modal {
    transition: opacity 0.3s ease-in-out;
}

#more-questions-modal.hidden {
    opacity: 0;
    pointer-events: none;
}

.quick-reply {
    transition: all 0.2s ease-in-out;
}

.quick-reply:hover {
    transform: scale(1.05);
}

@media (max-width: 640px) {
    #chat-window {
        width: calc(100vw - 2rem);
        right: 1rem;
    }

    #more-questions-modal .bg-white {
        margin: 1rem;
        max-height: calc(100vh - 2rem);
    }
}
</style>