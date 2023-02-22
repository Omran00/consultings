<?php 

namespace App\Services\Favorite; 

use Exception;
use Illuminate\Database\Eloquent\Collection;

class FavoriteIsNotEmptyService
{
    public static function check(Collection $favorite_experts) :void
    {
        if(!isset($favorite_experts[0]))
            throw new Exception('You do not have any favorite experts');
    }
}