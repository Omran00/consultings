<?php 

namespace App\Services\PhoneNumber;

use Exception;

class ValidPhoneNumberService
{
    public static function is_duplicated(array $phone_numbers) :void
    {
        if(count($phone_numbers) != count(array_unique($phone_numbers)))
            throw new Exception('Phone numbers cannot be duplicated');
    }

    public static function is_valid($phone_numbers):void
    {
        ValidPhoneNumberService::is_duplicated($phone_numbers); 
        foreach($phone_numbers as $phone_number)
        {
            if(!is_numeric($phone_number))
                throw new Exception('The phone number can only include numbers');
            if(SearchPhoneNumberService::where($phone_number))
                throw new Exception('The phone number has already been taken');
        }
    }

    public static function at_least_one() : void
    {
        $phone_numbers = ExpertPhoneNumberService::get();
        if (count($phone_numbers) < 2)
                throw new Exception('You should have at least one phone number');
    }
}