<?php 

namespace App\Services\Favorite; 

use Exception;
use Illuminate\Database\Eloquent\Collection;

class ExistInFavoriteService
{
    public static function check(Collection $favorite_experts, int $expert_id): void
    {
        if(($favorite_experts?->find($expert_id)))
            throw new Exception('This expert is already in favorites');
    }
}