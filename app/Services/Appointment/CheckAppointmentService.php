<?php 

namespace App\Services\Appointment; 

class CheckAppointmentService
{
    public static function has_appointments(array $appointments) :bool
    {
        return (count($appointments) > 0);
    }

}