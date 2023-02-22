<?php 

namespace App\Services\PhoneNumber;

use App\Services\User\GetUserService;
use App\Http\Requests\PhoneNumberRequest;

class StorePhoneNumberService
{
    public static function validated_create(PhoneNumberRequest $request) :void
    {
        $fields = $request->validated();
        ValidPhoneNumberService::is_valid($fields['phone_number']);
        StorePhoneNumberService::create($fields['phone_number']);
    }

    public static function create($phone_numbers) :void
    {
        $expert = GetUserService::get_user()->expert;
        foreach($phone_numbers as $phone_number)
            $expert->phone_numbers()->create(['phone_number' => $phone_number]);
    }
}