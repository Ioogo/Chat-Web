// resources/js/bootstrap.js

import Echo from 'laravel-echo';
import Pusher from 'pusher-js'; // Importe o Pusher

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY, // Puxa do .env
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    // ... outras configurações (criptografia, etc.)
    forceTLS: true // Recomendado para produção
});

// Exemplo de como escutar o canal 'chat'
window.Echo.channel('chat')
    .listen('MessageSent', (e) => {
        console.log('Nova mensagem recebida!', e.message.message);
        // Aqui você adicionará a mensagem à sua interface
    });