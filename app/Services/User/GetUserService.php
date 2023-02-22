<?php

namespace App\Services\User;

use App\Models\User;

class GetUserService
{
    public static function get_user() :User
    {
        return auth()->user();
    }
}