<?php 

namespace App\Services\Time; 

class EndFromStartTimeService
{
    public static function get(string $start_time, int $hours_number) :string
    {
        return ($start_time. '+'.$hours_number.' hour');
    }
}