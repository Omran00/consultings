<?php 

namespace App\Services\Time; 

class FormatedTimeService
{

    public static function get(string $start_time, int $hours_number) :array
    {
        $formated_start_time = strtotime($start_time);
        $end_time            = strtotime(EndFromStartTimeService::get($start_time, $hours_number));
        return [
            'start_time' => $formated_start_time,
            'end_time' => $end_time
        ];
    }
}