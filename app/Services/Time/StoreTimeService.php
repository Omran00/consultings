<?php 

namespace App\Services\Time;

use App\Services\User\GetUserService;

class StoreTimeService
{
    public static function create(array $start_times, array $end_times) :void
    {
        $expert = GetUserService::get_user()->expert;
        foreach($start_times as $key => $days)
        {
            $free_appointement = $expert->free_appointments()->create([
                'expert_id' => $expert->expert_id,
                'day' => $key,
            ]);
            foreach($days as $sub_key => $time)
                $expert->free_appointments()->find($free_appointement->free_appointment_id)->free_times()->create([
                        'free_appointment_id' => $key,
                        'start_time' => $time,
                        'end_time' => $end_times[$key][$sub_key],
                ]);
        }
    }
}