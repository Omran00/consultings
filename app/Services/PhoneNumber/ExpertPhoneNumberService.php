<?php 

namespace App\Services\PhoneNumber;

use App\Services\User\GetUserService;

class ExpertPhoneNumberService
{
    public static function get() : array
    {
        $expert = GetUserService::get_user()->expert;
        return $expert->phone_numbers->toArray();
    }
}