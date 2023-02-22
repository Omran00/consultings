<?php 

namespace App\Services\Time; 

use Exception;
use App\Models\Expert;

class TimeRangeService
{
    public static function check(Expert $expert, int $day, string $start_time) :void
    {
        foreach((AvailableTimeService::get($expert))[$day] as $key => $free_time)
        {
            $curr_start_time = strtotime($free_time);
            if((date('H', $start_time)) == (date('H', $curr_start_time)))
                if((date('i', $start_time)) != (date('i', $curr_start_time)))
                    throw new Exception('Start time must start at minute: '. date('i', $curr_start_time));
        }
    }
}