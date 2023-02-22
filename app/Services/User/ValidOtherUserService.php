<?php 

namespace App\Services\User; 

use Exception;

class ValidOtherUserService
{
    public static function valid_other_user(int $user_id, int $expert_id) :void
    {
        if($user_id == $expert_id)
            throw new Exception('You cannot use this API with yourself');
    }
}