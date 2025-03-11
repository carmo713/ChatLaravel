<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue';
import axios from 'axios';

const props = defineProps({
    friend: {
        type: Object,
        required: true
    },
    currentUser: {
        type: Object,
        required: true
    }
});

const messages = ref([]);
const newMessage = ref('');
const isFriendTyping = ref(false);
let typingTimeout = null;
let userChannel = null;
let friendChannel = null;
const chatContainer = ref(null);

const scrollToBottom = () => {
    nextTick(() => {
        if (chatContainer.value) {
            chatContainer.value.scrollTop = chatContainer.value.scrollHeight;
        }
    });
};

const sendMessage = async () => {
    if (newMessage.value.trim() === '') return;
    
    try {
        const response = await axios.post(`/messages/${props.friend.id}`, {
            message: newMessage.value
        });
        messages.value.push(response.data);
        newMessage.value = '';
        scrollToBottom();
    } catch (error) {
        console.error('Error sending message:', error);
    }
};

const handleTyping = () => {
    // Send typing indicator to friend's channel
    friendChannel.whisper('typing', {
        user: props.currentUser
    });
};

onMounted(() => {
    console.log('Chat component mounted');
    
    // Load initial messages
    axios.get(`/messages/${props.friend.id}`)
        .then(response => {
            console.log('Initial messages loaded:', response.data);
            messages.value = response.data;
            scrollToBottom();
        })
        .catch(error => {
            console.error('Error loading messages:', error);
        });

    // Set up channels for both users
    userChannel = window.Echo.private(`chat.${props.currentUser.id}`);
    friendChannel = window.Echo.private(`chat.${props.friend.id}`);
    
    console.log('Channels established:', {
        userChannel: `chat.${props.currentUser.id}`,
        friendChannel: `chat.${props.friend.id}`
    });

    // Listen for new messages on user's channel
    userChannel.listen('MessageSent', (e) => {
        console.log('New message received:', e);
        messages.value.push(e.message);
        scrollToBottom();
    });

    // Listen for typing events on user's channel
    userChannel.listenForWhisper('typing', (e) => {
        console.log('Typing event received:', e);
        if (e.user.id === props.friend.id) {
            isFriendTyping.value = true;
            clearTimeout(typingTimeout);
            typingTimeout = setTimeout(() => {
                isFriendTyping.value = false;
            }, 3000);
        }
    });
});

onUnmounted(() => {
    // Clean up listeners
    if (userChannel) {
        userChannel.stopListening('MessageSent');
        userChannel.stopListeningForWhisper('typing');
    }
    if (friendChannel) {
        friendChannel.stopListeningForWhisper('typing');
    }
    clearTimeout(typingTimeout);
    console.log('Chat component unmounted');
});
</script>

<template>
    <div class="flex items-center justify-center h-full">
        <div class="w-full max-w-[450px] h-[600px] glass-effect rounded-3xl shadow-2xl overflow-hidden flex flex-col border border-indigo-100/50 transition-all duration-300 hover:shadow-3xl">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 p-5 text-center text-white">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4 shadow-lg">
                        <span class="text-white font-bold text-lg">
                            {{ friend.name.charAt(0).toUpperCase() }}
                        </span>
                    </div>
                    <div class="text-left">
                        <h2 class="text-xl font-bold">
                            {{ friend.name }}
                        </h2>
                        <p class="text-xs text-indigo-100 opacity-80">
                            {{ isFriendTyping ? 'Digitando...' : 'Online' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Chat Messages -->
            <div ref="chatContainer" class="flex-1 overflow-y-auto p-6 space-y-4 bg-gradient-to-br from-white to-indigo-50/30">
                <div v-for="(msg, index) in messages" 
                     :key="index" 
                     class="flex"
                     :class="{
                        'justify-end': msg.sender_id === currentUser.id,
                        'justify-start': msg.sender_id !== currentUser.id
                     }">
                    <div :class="{
                        'bg-gradient-to-r from-indigo-600 to-indigo-500 text-white': msg.sender_id === currentUser.id,
                        'bg-white shadow-md': msg.sender_id !== currentUser.id
                    }" class="p-3.5 rounded-2xl max-w-[280px] break-words shadow-sm transition-all duration-300 hover:shadow-md">
                        <p class="text-sm">{{ msg.text }}</p>
                        <small :class="{
                            'text-indigo-100': msg.sender_id === currentUser.id,
                            'text-gray-500': msg.sender_id !== currentUser.id
                        }" class="text-xs block text-right mt-1.5">
                            {{ new Date(msg.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) }}
                        </small>
                    </div>
                </div>
            </div>

            <!-- Typing Indicator -->
            <div v-if="isFriendTyping" class="px-6 py-2 bg-gradient-to-br from-white to-indigo-50/30">
                <div class="flex justify-start">
                    <div class="bg-white shadow-sm p-2 rounded-2xl max-w-[250px] animate-pulse">
                        <div class="flex space-x-1 items-center px-2">
                            <div class="w-2 h-2 bg-indigo-400 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                            <div class="w-2 h-2 bg-indigo-500 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                            <div class="w-2 h-2 bg-indigo-600 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="p-4 bg-white border-t border-indigo-100">
                <div class="flex items-center space-x-2">
                    <input
                        v-model="newMessage"
                        @input="handleTyping"
                        @keyup.enter="sendMessage"
                        type="text"
                        placeholder="Digite sua mensagem..."
                        class="w-full p-3.5 bg-indigo-50 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-400/50 transition duration-300 placeholder-indigo-300"
                    />
                    <button 
                        @click="sendMessage"
                        class="bg-indigo-600 text-white p-3.5 rounded-full hover:bg-indigo-700 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-400/50 shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.glass-effect {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

/* Custom scrollbar */
div::-webkit-scrollbar {
    width: 6px;
}

div::-webkit-scrollbar-track {
    background: rgba(243, 244, 246, 0.5);
}

div::-webkit-scrollbar-thumb {
    background: rgba(99, 102, 241, 0.3);
    border-radius: 3px;
}

div::-webkit-scrollbar-thumb:hover {
    background: rgba(99, 102, 241, 0.5);
}

/* Hide scrollbar for Firefox */
div {
    scrollbar-width: thin;
    scrollbar-color: rgba(99, 102, 241, 0.3) rgba(243, 244, 246, 0.5);
}

/* Animation for typing indicator */
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-4px);
    }
}

.animate-bounce {
    animation: bounce 1s infinite;
}
</style>