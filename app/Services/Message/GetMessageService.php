<?php

namespace App\Services\Message;

use App\Models\ChatMessage;
use App\Events\NewMessageSent;
use App\Http\Requests\GetChatRequest;

class GetMessageService
{
    public static function get(GetChatRequest $request) :array
    {
        $data = $request->validated();

        $chat_id      = $data['chat_id'];
        $current_page = $data['page'];
        $page_size    = $data['page_size'] ?? 10;
        $messages     = GetMessageService::get_messages($chat_id, $page_size, $current_page);
        return $messages;
    }



    private function get_messages(int $chat_id, int $page_size, int $current_page) :array
    {
        return ChatMessage::where('chat_id', $chat_id)
            ->with('user')
            ->latest('created_at')
            ->simplePaginate($page_size, ['*'], 'page', $current_page)->toArray();
    }

}