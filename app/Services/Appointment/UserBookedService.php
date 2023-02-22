<?php

namespace App\Services\Appointment;

use App\Services\User\GetUserService;

class UserBookedService
{
    public function get() :array
    {
        $user = GetUserService::get_user();
        return $user->appointments->load('user')->toArray();
    }
}