<?php 

namespace App\Services\Time; 

use Exception;

class ValidTimeService
{
    public static function is_valid(array $start_times, array $end_times) :void
    {
        CheckTimeOrderService::check($start_times);
        CheckTimeOrderService::check($end_times);
        FullTimeCheckService ::check($start_times, $end_times);
        foreach($start_times as $key => $days)
        {
            $end_time = $end_times[$key];
            for($i = 0; $i < count($days) - 1; $i++)
                if(strtotime($days[$i]) >= strtotime($days[$i + 1]) || strtotime($days[$i + 1]) <= strtotime($end_time[$i]))
                    throw new Exception('Times should be inserted in order');
        }
    }

}