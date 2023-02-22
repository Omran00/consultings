<?php

namespace App\Events;

use App\Models\ChatMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(private ChatMessage $chatMessage)
    {

    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat'.$this->chatMessage->chat_id);
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }
    public function broadcastWith()
    {
        return [
            // 'chat_id' => $this->chatMessage->chat_id,
            'user_id' => $this->chatMessage->user_id,
            'message' => $this->chatMessage->toArray()
        ];
    }
}
