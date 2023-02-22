<?php 

namespace App\Services\Appointment; 

use App\Models\Expert;
use Illuminate\Support\Collection;

class DayAppointmentService
{
    public static function get(Expert $expert, int $day) :Collection
    {
        return $expert->appointments()->Where('day', $day)->get();
    }
}