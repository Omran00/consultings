<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\SignupService;
use App\Http\Requests\StoreUserRequest;

class SignupController extends Controller
{
    public function signup(StoreUserRequest $request, SignupService $signupService)
    {
        $data = $signupService->create($request);
        return response([
            'message' => 'Account created successfully',
            'user_id' => $data['user_id'],
            'token' => $data['token'],
        ]);
    }
}
