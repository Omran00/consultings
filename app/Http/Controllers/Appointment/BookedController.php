<?php

namespace App\Http\Controllers\Appointment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Appointment\ExpertBookedService;
use App\Services\Appointment\UserBookedService;
use App\Services\AppointmentService;

class BookedController extends Controller
{
    public function user_booked_appointments(UserBookedService $user_booked_appointments)
    {
        $user_booked_appointments = $user_booked_appointments->get();
        return response([
            'Booked appointments' => $user_booked_appointments
        ]);
    }

    public function expert_booked_appointments(ExpertBookedService $expert_booked_appointments)
    {
        $appointemnts = $expert_booked_appointments->get();

        return response([
            'Booked_appointments' => $appointemnts
        ]);
    }
}
