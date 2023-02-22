<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateExpertRequest;
use App\Services\Expert\UpdateExpertService;
use App\Services\ExpertService;

class UpdateExpertController extends Controller
{
    public function update(UpdateExpertRequest $request, UpdateExpertService $updateExpertService)
    {
        $updateExpertService->update($request);
        return response([
            'message' => 'Data updated successfully'
        ]);
    }
}
