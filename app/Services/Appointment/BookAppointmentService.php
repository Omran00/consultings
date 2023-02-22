<?php 

namespace App\Services\Appointment;

use Exception;
use App\Services\Wallet\PayService;
use App\Services\Day\ValidDayService;
use App\Services\User\GetUserService;
use App\Services\Time\TimeRangeService;
use App\Services\Wallet\ReceiveService;
use App\Services\Time\GetFreeTimeService;
use App\Services\Expert\FindExpertService;
use App\Services\Time\FormatedTimeService;
use App\Services\User\ValidOtherUserService;
use App\Http\Requests\BookAppointmentRequest;
use App\Services\Wallet\CalculateCostService;
use App\Services\Appointment\BookAppointmentService as AppointmentBookAppointmentService;
use App\Services\Wallet\EnoughBalanceService;

class BookAppointmentService
{
    public function book(BookAppointmentRequest $request, int $expert_id): void
    {
        $data             = $request->validated();
        $user             = GetUserService::get_user();
        $expert           = FindExpertService::find_expert($expert_id);
        $appointment_cost = CalculateCostService::cost($expert->cost, $data['number_of_hours']);
        $time             = FormatedTimeService::get($data['start_time'], $data['number_of_hours']);

        ValidOtherUserService::  valid_other_user($user->user_id, $expert_id);
        TakenAppointmentService::delete_old($expert->appointments());
        EnoughBalanceService::     check_balance($user->wallet->balance, $appointment_cost);
        ValidDayService::        check($data['day']);
      
        $start_time = $time['start_time'];
        $end_time   = $time['end_time'];
        $free_times = GetFreeTimeService::get_free_times($expert->free_appointments(), $data['day']);
      
        TimeRangeService::check($expert, $data['day'], $start_time);
      
        foreach($free_times as $key => $free_time)
        {
            $curr_start_time = strtotime($free_time['start_time']);
            $curr_end_time   = strtotime($free_time['end_time']);
            
            if(($start_time >= $curr_start_time) && ($end_time <= $curr_end_time))
            {
                $taken_appointments = DayAppointmentService::get($expert, $data['day']);
                
                TakenAppointmentService::          check($taken_appointments, $start_time, $end_time);
                AppointmentBookAppointmentService::create($expert_id, $data['day'], $data['start_time'], $data['number_of_hours']);
                PayService::                       pay($user->wallet(), $appointment_cost);
                ReceiveService::                   receive($expert->user->wallet(), $appointment_cost);
                return;
            }
        }
            throw new Exception('Out of working times');
    }

    private static function create(int $expert_id, int $day, string $start_time, int $number_of_hours) :void
    {
        $user = GetUserService::get_user();
        $user->appointments()->attach([
            $expert_id => [
                'day'             => $day,
                'start_time'      => $start_time,
                'number_of_hours' => $number_of_hours]
        ]);
    }
}