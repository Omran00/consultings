<?php

namespace App\Services\Appointment;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TakenAppointmentService
{
    public static function check(Collection $taken_appointments, int $start_time, int $end_time) :void
    {
        foreach($taken_appointments as $taken_appointment)
        {
            $taken_start_time = strtotime($taken_appointment['pivot']['start_time']);
            $taken_end_time   = strtotime($taken_appointment['pivot']['start_time']. '+'.$taken_appointment['pivot']['number_of_hours'].' hour');
            if((($start_time < $taken_end_time) && ($taken_start_time < $end_time)))
                throw new Exception('Appointment is already taken');
        }
    }

    public static function delete_old(BelongsToMany $appointments)
    {
        $current_date = date('Y-m-d');
        $days = [
            'Sat' => 1,
            'Sun' => 2,
            'Mon' => 3,
            'Tue' => 4,
            'Wed' => 5,
            'Thu' => 6,
            'Fri' => 7
        ];
        if(isset($appointments->get()[0]))
        {
            foreach($appointments->get() as $appointment)
            {
                $created_at_date   = $appointment->pivot->created_at->toDateTimeString();
                $taken_day         = $days[date('D', strtotime($created_at_date))];
                $diff_between_days = $appointment['day'] - $taken_day;
                if($diff_between_days < 0)
                    $diff_between_days += 7;

                $appointment['date'] = date('Y-m-d H:i:s', strtotime($created_at_date. '+'.$diff_between_days.' day'));
                if(strtotime($current_date) > strtotime($appointment['date']))
                    $appointments->newPivotStatement()->Where('day', $appointment['day'])->where('created_at', $created_at_date)->delete();
            }
        }
    }
}