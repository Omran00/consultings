<?php

namespace App\Http\Controllers\PhoneNumber;

use Exception;
use App\Http\Controllers\Controller;
use App\Services\PhoneNumberService;
use App\Http\Requests\UpdatePhoneNumberRequest;
use App\Services\PhoneNumber\UpdatePhoneNumberService;

class UpdatePhoneNumberController extends Controller
{
    public function update(UpdatePhoneNumberRequest $request, $phone_number_id, UpdatePhoneNumberService $updatePhoneNumberService)
    {
        try
        {
            $updatePhoneNumberService->update($request, $phone_number_id);

            return response([
                'message' => 'Phone number updated successfully'
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
