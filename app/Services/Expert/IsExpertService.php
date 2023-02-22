<?php 

namespace App\Services\Expert; 

use Exception;

class IsExpertService
{
    public static function check($expert) :void
    {
        if(!$expert)
            throw new Exception('Expert not found');
    }
}