@extends('layouts.app')

@section('content')
<div id="chat">
    <div id="messages" class="h-96 overflow-y-auto border p-4 bg-gray-50 mb-4"></div>

    <form id="chat-form">
        <input id="message" type="text" placeholder="Type a message..." class="border rounded p-2 w-full">
        <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2 mt-2">Send</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    const toUserId = {{ $toUserId }}; 
    const messagesContainer = document.getElementById('messages');

    const socket = new WebSocket('ws://localhost:8080');

    socket.onopen = () => {
        console.log('Connected to WebSocket');
    };

    socket.onmessage = function(event) {
        const message = JSON.parse(event.data); 
        appendMessage(message);
    };

    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const content = document.getElementById('message').value;
        const message = { to_user_id: toUserId, content };

        console.log('Sending message:', message);

        socket.send(JSON.stringify(message));

        document.getElementById('message').value = '';
    });

    function appendMessage(message) {
        const div = document.createElement('div');
        div.textContent = `[User ${message.to_user_id}]: ${message.content}`;
        div.classList.add('p-2', 'bg-gray-200', 'rounded', 'mb-2');
        messagesContainer.appendChild(div);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }


    socket.onerror = (error) => {
        console.error('WebSocket error:', error);
    };

    socket.onclose = () => {
        console.log('WebSocket connection closed');
    };
</script>
@endpush
