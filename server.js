import { WebSocketServer } from 'ws';

const wss = new WebSocketServer({ port: 8080 });

wss.on('connection', (ws) => {
    console.log('User connected');

    ws.on('message', (message) => {
        console.log('Received:', message);

        try {
            const parsedMessage = JSON.parse(message);

            wss.clients.forEach((client) => {
                if (client.readyState === ws.OPEN) {
                    client.send(JSON.stringify(parsedMessage));
                }
            });
        } catch (error) {
            console.error('Invalid message format:', error);
        }
    });

    ws.on('close', () => {
        console.log('User disconnected');
    });
});

console.log('WebSocket server running on ws://localhost:8080');
