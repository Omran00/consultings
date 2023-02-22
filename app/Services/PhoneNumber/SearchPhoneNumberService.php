<?php 

namespace App\Services\PhoneNumber; 

use App\Models\PhoneNumber;
use App\Services\User\GetUserService;

class SearchPhoneNumberService
{
    public static function where(int $phone_number) :mixed
    {
        return PhoneNumber::where('phone_number', $phone_number)->first();
    }

    public static function find(int $phone_number_id) :mixed
    {
        $expert = GetUserService::get_user()->expert;
        return $expert->phone_numbers()->find($phone_number_id);
    }

}