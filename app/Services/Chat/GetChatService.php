<?php 

namespace App\Services\Chat;

use App\Models\Chat;
use App\Services\User\GetUserService;

class GetChatService
{
    public static function get() :?array
    {
        $user  = GetUserService::get_user();
        $chats = Chat::hasParticipant($user->user_id)->with('last_message.user')->get();
        foreach($chats as $chat)
        {
            if($chat['participants'][0]->user_id != $user->user_id)
                GetParticipantService::get_other_user($chat, 0);
            else
                GetParticipantService::get_other_user($chat, 1);
        }
        return $chats->toArray();
    }

    public static function get_chat_id(Chat $chat): int
    {
            return $chat?->chat_id;
    }
}