<?php 

namespace App\Services\Favorite;

use App\Services\Expert\FindExpertService;
use App\Services\User\GetUserService;
use App\Services\User\ValidOtherUserService;

class AddFavoriteService
{
    public static function create(int $expert_id) :void
    {
        $expert = FindExpertService::find_expert($expert_id);
        $user   = GetUserService::get_user();

        ValidOtherUserService:: valid_other_user($user->user_id, $expert->expert_id);
        ExistInFavoriteService::check($user->favorite_experts, $expert_id);

        $user->favorite_experts()->syncWithoutDetaching($expert->expert_id);
    }
}