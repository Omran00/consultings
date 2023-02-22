<?php 

namespace App\Services\Chat;

use App\Models\Chat;
use App\Services\User\GetUserService;
use App\Http\Requests\StoreChatRequest;
use App\Services\User\ValidOtherUserService;

class StoreChatService
{
    public function create(StoreChatRequest $request): int
    {
        $data            = $request->validated();
        $data['user_id'] = $data['expert_id'];
        $user            = GetUserService::get_user();
        $user_id         = $user->user_id;
        $expert_id       = $data['expert_id'];
                
        ValidOtherUserService::valid_other_user($user_id, $expert_id);
        $chat = GetParticipantService::get_chat($user_id, $expert_id);
        if($chat)
        {
            $chat_id = GetChatService::get_chat_id($chat);
            return $chat_id;
        }
        $chat = Chat::create(['user_id' => $user->user_id]);
        AddParticipantService::add_participant_to_chat($chat, $user_id, $expert_id);
 
        return $chat->chat_id;
    }
}