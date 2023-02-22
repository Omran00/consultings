<?php

namespace App\Http\Controllers\PhoneNumber;

use Exception;
use App\Http\Controllers\Controller;
use App\Services\PhoneNumberService;
use App\Http\Requests\PhoneNumberRequest;
use App\Services\PhoneNumber\StorePhoneNumberService;

class CreatePhoneNumberController extends Controller
{
    public function create(PhoneNumberRequest $request, StorePhoneNumberService $storePhoneNumberService)
    {
        try
        {
            $storePhoneNumberService->validated_create($request);

            return response([
                'message' => 'Phone number created successfully'
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
