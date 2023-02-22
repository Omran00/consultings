<?php 

namespace App\Services\Chat; 

use Exception;
use App\Models\Chat;

class AddParticipantService
{
    public static function add_participant_to_chat(Chat $chat, int $user_id, int $expert_id) :void
    {
        $chat->participants()->createMany([
            [
                'user_id' => $expert_id
            ],
            [
                'user_id' => $user_id
            ]
        ]);
    }


    public static function is_valid(int $chat_id) :void
    {
        if(!GetParticipantService::get_participant_chat($chat_id))
            throw new Exception('This chat id does not belong to you');
    }
}