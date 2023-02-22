<?php

namespace App\Services\Auth;

use App\Services\User\GetUserService;

class LogoutService
{
    public function logout() :void
    {
        GetUserService::get_user()->token()->revoke();
    }
}