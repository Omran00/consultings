<?php 

namespace App\Services\Day; 

use Exception;

class CheckWeekDaysService
{
    public static function check_week_days(array $start_times, array $end_times) :void
    {
        if((max(array_keys($start_times)) > 7) || (max(array_keys($end_times)) > 7))
            throw new Exception('Wrong day number');
    }
}