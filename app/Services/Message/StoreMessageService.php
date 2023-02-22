<?php

namespace App\Services\Message;

use App\Models\ChatMessage;
use App\Events\NewMessageSent;
use App\Models\ChatParticipant;
use App\Services\User\GetUserService;
use App\Http\Requests\StoreMessageRequest;
use App\Services\Chat\AddParticipantService;
use App\Services\Chat\GetParticipantService;
use App\Services\Message\StoreMessageService as MessageStoreMessageService;

class StoreMessageService
{
    public function create(StoreMessageRequest $request) :void
    {
        $data = $request->validated();
        AddParticipantService::is_valid($data['chat_id']);
        $chat_message = ChatMessage::create(['user_id' => GetUserService::get_user()->user_id, 'chat_id' => $data['chat_id'], 'message' => $data['message']]);
        $this->send_notification_to_other($chat_message);
    }
    private function send_notification_to_other(ChatMessage $chat_message) :void
    {
        broadcast(new NewMessageSent($chat_message))->toOthers();
    }
}