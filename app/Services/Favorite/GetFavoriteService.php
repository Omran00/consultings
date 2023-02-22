<?php 

namespace App\Services\Favorite;

use App\Services\User\GetUserService;

class GetFavoriteService
{
    public function get() :array
    {
        $user             = GetUserService::get_user();
        $favorite_experts = $user->favorite_experts?->makeHidden(['country', 'city', 'street', 'cost', 'user']);

        FavoriteIsNotEmptyService::check($favorite_experts);
        $this->get_names($favorite_experts);

        return $favorite_experts->toArray();
    }

    private function get_names($favorite_experts) :void
    {
        foreach($favorite_experts as $favorite_expert)
        {
            $favorite_expert['fitst_name'] = $favorite_expert->user['first_name'];
            $favorite_expert['last_name']  = $favorite_expert->user['last_name'];
        }
    }
}