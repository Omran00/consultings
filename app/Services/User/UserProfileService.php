<?php 

namespace App\Services\User; 

use App\Models\User;

class UserProfileService
{
    public static function get() :User
    {
        return GetUserService::get_user()->MakeVisible('email')->load('wallet');
    }
}