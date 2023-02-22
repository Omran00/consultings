<?php

namespace App\Http\Controllers\Expert;

use Exception;
use App\Services\ExpertService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpertRequest;
use App\Services\Expert\StoreExpertService;

class ExpertRegisterController extends Controller
{
    public function register(StoreExpertRequest $request, StoreExpertService $storeExpertService)
    {
        try
        {
            $storeExpertService->create($request);
            return response([
                'message' => 'Your expert account has been created successfully'
            ], 201);
        }
        catch(Exception $e)
        {
            return response([
                'message' => $e->getMessage()
            ], 422);
        }
    }
}
