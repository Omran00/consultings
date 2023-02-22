<?php

namespace App\Services\Appointment;

use App\Services\User\GetUserService;

class ExpertBookedService
{
    public function get() :array
    {
        $expert       = GetUserService::get_user()->expert;
        $appointments = $expert->appointments();
        TakenAppointmentService::delete_old($appointments);
        return $appointments->get()->toArray();
    } 
}