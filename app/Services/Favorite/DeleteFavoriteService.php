<?php 

namespace App\Services\Favorite;

use App\Services\Expert\IsExpertService;
use App\Services\User\GetUserService;

class DeleteFavoriteService
{
    public static function delete(int $expert_id) :void
    {
        $user   = GetUserService::get_user();
        $expert = FindFavoriteService::find($user->favorite_experts(), $expert_id);
        IsExpertService::check($expert->first());
        $expert->delete();
    }
}