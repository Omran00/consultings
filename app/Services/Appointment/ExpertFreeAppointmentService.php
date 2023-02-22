<?php 

namespace App\Services\Appointment; 

use App\Models\Expert;

class ExpertFreeAppointmentService
{
    public static function get_free_appointments(Expert $expert) :mixed
    {
        return $expert->free_appointments;
    }
}