<?php

namespace App\Services\Time;

use Exception;

class FullTimeCheckService
{
    public static function check(array $start_times, array $end_times)
    {
        foreach($start_times as $key => $days)
        {
            foreach($days as $sub_key => $start_time)
            {
                if(!isset($end_times[$key][$sub_key]))
                {
                    throw new Exception('Start time must have end time');
                }
            }
        }

        foreach($end_times as $key => $times)
        {
            foreach($times as $sub_key => $end_time)
            {
                if(!isset($start_times[$key][$sub_key]))
                {
                        throw new Exception('End time must have start time');
                }
            }
        }

    }
}
