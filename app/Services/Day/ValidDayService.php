<?php 

namespace App\Services\Day; 

use Exception;

class ValidDayService
{
    public static function check(int $day) :void
    {
        if($day > 7 || $day < 1)
            throw new Exception('Wrong day number');
    }
}