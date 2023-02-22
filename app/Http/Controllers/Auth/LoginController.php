<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Services\AuthService;
use App\Services\Auth\LoginService;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;

class LoginController extends Controller
{
    public function login(LoginUserRequest $request, LoginService $loginService)
    {
        try
        {
            $data = $loginService->login($request);   
            
            return response([
                'message' => 'Logged in successfully',
                'user_id' => $data['user_id'],
                'token' => $data['token'],
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
