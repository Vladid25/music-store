@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-bold mb-4">Chat Room</h2>

    <div id="chat-container" class="border rounded-lg p-4 h-96 overflow-y-auto bg-gray-50 mb-4">
        <ul id="messages" class="space-y-2">
        </ul>
    </div>

    <form id="chat-form" class="flex space-x-2">
        <input 
            type="text" 
            id="message" 
            class="flex-1 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
            placeholder="Type your message..."
            autocomplete="off"
        >
        <button 
            type="submit" 
            class="bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-600">
            Send
        </button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const chatContainer = document.getElementById('chat-container');
        const messageList = document.getElementById('messages');
        const chatForm = document.getElementById('chat-form');
        const messageInput = document.getElementById('message');

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const message = messageInput.value.trim();
            if (message === '') return;

            try {
                await fetch('/send-message', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ message })
                });
            } catch (error) {
                console.error('Failed to send message:', error);
            }

            messageInput.value = '';
        });

        window.Echo.channel('chat')
            .listen('MessageSent', (e) => {
                const newMessage = document.createElement('li');
                newMessage.classList.add('p-2', 'bg-gray-200', 'rounded-lg', 'shadow');
                newMessage.textContent = e.message;

                messageList.appendChild(newMessage);
                chatContainer.scrollTop = chatContainer.scrollHeight;
            });
    });
</script>
@endpush
