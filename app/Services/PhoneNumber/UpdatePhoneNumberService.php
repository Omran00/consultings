<?php 

namespace App\Services\PhoneNumber; 

use Exception;
use App\Http\Requests\UpdatePhoneNumberRequest;

class UpdatePhoneNumberService
{
    public static function update(UpdatePhoneNumberRequest $request, int $phone_number_id) :void
    {
        $fields       = $request->validated();
        $phone_number = SearchPhoneNumberService::find($phone_number_id)?->update($fields);
        
        if(!isset($phone_number))
            throw new Exception('This phone number does not belongs to you');
    }
}