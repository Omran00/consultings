<?php

namespace App\Http\Controllers\PhoneNumber;

use Exception;
use App\Http\Controllers\Controller;
use App\Services\PhoneNumber\DeletePhoneNumberService;
use App\Services\PhoneNumberService;

class DeletePhoneNumberController extends Controller
{
    public function destroy(int $phone_number_id, DeletePhoneNumberService $deletePhoneNumberService)
    {
       try
       {
            $deletePhoneNumberService->delete_phone_number($phone_number_id);
            return response([
                'message' => 'Phone number deleted successfully'
            ]);
       }

       catch(Exception $e)
        {
            return response([
                'message' => $e->getMessage()
            ], 422);
        }
    }
}
