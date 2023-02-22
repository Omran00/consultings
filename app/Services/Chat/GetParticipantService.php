<?php 

namespace App\Services\Chat;

use App\Models\Chat;
use App\Services\User\GetUserService;

class GetParticipantService
{
    public static function get_chat(int $user_id, int $expert_id) :?Chat
    {
        return Chat::whereHas('participants', function($query) use ($user_id){
            $query->where('user_id', $user_id);})
            ->whereHas('participants', function($query) use ($expert_id){
            $query->where('user_id', $expert_id);})->first();
    }

    public static function get_participant_chat(int $chat_id) :?Chat
    {
        return (Chat::hasParticipant(GetUserService::get_user()->user_id)->where('chat_id', $chat_id)->first());
    }


    public static function get_other_user(Chat $chat, int $other) : void
    {
        $chat['other_user'] = $chat['participants'][$other]['user'];
        $chat['other_user']['image'] = null;
        if($chat['other_user']->expert?->image)
            $chat['other_user']['image'] = $chat['other_user']->expert->image;
    }
}
