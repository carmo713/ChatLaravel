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
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-[#f0f4f8] to-[#e6f2ff]">
        <div class="w-[400px] h-[600px] bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col border border-gray-100">
            <!-- Header -->
            <div class="bg-gradient-to-r from-[#3498db] to-[#2980b9] p-4 text-center text-white">
                <div class="flex items-center justify-center">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold">
                        {{ friend.name }}
                    </h2>
                </div>
            </div>

            <!-- Chat Messages -->
            <div ref="chatContainer" class="flex-1 overflow-y-auto p-4 space-y-3 bg-gray-50">
                <!-- Mensagens regulares -->
                <div v-for="(msg, index) in messages" 
                     :key="index" 
                     class="flex"
                     :class="{
                        'justify-end': msg.sender_id === currentUser.id,
                        'justify-start': msg.sender_id !== currentUser.id
                     }">
                    <div :class="{
                        'bg-[#3498db] text-white': msg.sender_id === currentUser.id,
                        'bg-white shadow-sm': msg.sender_id !== currentUser.id
                    }" class="p-3 rounded-2xl max-w-[250px] break-words">
                        <p class="text-sm">{{ msg.text }}</p>
                        <small :class="{
                            'text-blue-100': msg.sender_id === currentUser.id,
                            'text-gray-500': msg.sender_id !== currentUser.id
                        }" class="text-xs block text-right mt-1">
                            {{ new Date(msg.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) }}
                        </small>
                    </div>
                </div>
            </div>

            <!-- Indicador "Digitando..." acima da barra de escrita -->
            <div v-if="isFriendTyping" class="p-2 bg-gray-50 border-t border-gray-100">
                <div class="flex justify-start">
                    <div class="bg-white shadow-sm p-2 rounded-2xl max-w-[250px]">
                        <small class="text-xs text-gray-500 animate-pulse">Digitando...</small>
                    </div>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="p-4 bg-white border-t border-gray-100">
                <div class="flex items-center space-x-2">
                    <input
                        v-model="newMessage"
                        @input="handleTyping"
                        @keyup.enter="sendMessage"
                        type="text"
                        placeholder="Digite sua mensagem..."
                        class="w-full p-3 bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-[#3498db]/50 transition duration-300"
                    />
                    <button 
                        @click="sendMessage"
                        class="bg-[#3498db] text-white p-3 rounded-full hover:bg-[#2980b9] transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#3498db]/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.font-poppins {
    font-family: 'Poppins', sans-serif;
}
</style>