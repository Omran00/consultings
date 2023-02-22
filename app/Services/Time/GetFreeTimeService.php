<?php 

namespace App\Services\Time;

use App\Services\Day\GetFreeDayService;
use App\Services\Day\ValidWorkDayService;

class GetFreeTimeService
{
    public static function get_free_times($free_appointments, int $day) :mixed
    {
        $free_times = GetFreeDayService::get($free_appointments, $day)?->free_times;
        ValidWorkDayService::check($free_times);
        return $free_times;
    }
}