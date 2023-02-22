<?php 

namespace App\Services\User; 

use App\Models\User;

class FindUserService
{
    public static function find(int $user_id) :User
    {
        return User::find($user_id);
    }

}