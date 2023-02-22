<?php 

namespace App\Services\Time; 

use App\Models\Expert;
use App\Services\Appointment\CheckAppointmentService;
use App\Services\Appointment\DayAppointmentService;
use App\Services\Appointment\ExpertAppointmentService;
use App\Services\Appointment\ExpertFreeAppointmentService;
use App\Services\Appointment\TakenAppointmentService;

class AvailableTimeService
{
    public static function get(Expert $expert) :array
    {
        TakenAppointmentService::delete_old($expert->appointments());
        $days         = ExpertFreeAppointmentService::get_free_appointments($expert);
        $appointments = ExpertAppointmentService::get_appointments($expert)->get();
        $free_times   = [];
        $key          = 0;
        if(isset($appointments[0])) $appointment  = $appointments[0] ;
        foreach($days as $day)
        {
            $times = $day->free_times;
            foreach($times as $time)
            {
                $sub_start_time = strtotime($time->start_time);
                $sub_end_time = strtotime($time->end_time);
                for($i = $sub_start_time;$i<$sub_end_time;)
                {
                    if(CheckAppointmentService::has_appointments($appointments->toArray()) && $i != strtotime($appointment->pivot->start_time))
                    {
                        $free_times[$day->day][] = date('H:i',$i);
                        $i = strtotime(date('H:i',$i).'+ 1 hour');
                        continue;
                    }
                    if(CheckAppointmentService::has_appointments($appointments->toArray()))
                        $i = strtotime(date('H:i',$i).'+'.$appointment->pivot->number_of_hours.' hour');
                    else
                    {
                        $free_times[$day->day][] = date('H:i',$i);
                        $i = strtotime(date('H:i',$i).'+ 1 hour');
                    }
                    if($key+1<CheckAppointmentService::has_appointments($appointments->toArray()))
                        $appointment = $appointments[++$key];
                }
            }
        }
        return $free_times;
    }

}