<?php 

namespace App\Services\PhoneNumber;

use Exception;
use App\Services\User\GetUserService;

class DeletePhoneNumberService
{
    public function delete_phone_number(int $phone_number_id) :void
    {
        $expert = GetUserService::get_user()->expert;
        ValidPhoneNumberService::at_least_one();
        $phone_number = $expert->phone_numbers()->find($phone_number_id)?->delete();
        if(!isset($phone_number))
            throw new Exception('This phone number does not belongs to you');
    }

}