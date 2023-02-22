<?php 

namespace App\Services\Day; 

use Exception;

class ValidWorkDayService
{
    public static function check($free_times) :void
    {
        if(!isset($free_times))
            throw new Exception('Out of working days');
    }
}