<?php
namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user; // Opcional, mas útil

    public function __construct(Message $message)
    {
        $this->message = $message;
        $this->user = $message->user; // Assumindo relacionamento no Message Model
    }

    public function broadcastOn(): Channel
    {
        // Canal público. Para chat privado, seria PrivateChannel
        return new Channel('chat'); 
    }
}

