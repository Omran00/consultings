<?php

namespace App\Http\Controllers\Appointment;

use Exception;
use App\Services\BookingService;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookAppointmentRequest;
use App\Services\Appointment\BookAppointmentService;

class BookingController extends Controller
{
    public function book_appointment(BookAppointmentRequest $request, int $expert_id, BookAppointmentService $bookAppointmentService)
    {
        try
        {
            $bookAppointmentService->book($request, $expert_id);
            return response([
                'message' => 'Appointment booked successfully'
            ]);
        }
        catch(Exception $e)
        {
            return response([
                'message' => $e->getMessage()
            ], 401);
        }
    }
}
