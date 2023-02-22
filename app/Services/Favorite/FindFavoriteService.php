<?php 

namespace App\Services\Favorite; 

class FindFavoriteService
{

    public static function find($favorite_experts, int $expert_id) :mixed
    {
        return $favorite_experts->newPivotStatement()->where('expert_id', $expert_id);
    }

}