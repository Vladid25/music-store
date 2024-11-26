import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'b940c89ad6c63b47673a',
    cluster: 'eu',
    forceTLS: true,
});
