<?php

namespace App\Http\Controllers\Auth;

use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Services\Auth\LogoutService;

class LogoutController extends Controller
{
    public function logout(LogoutService $logoutService)
    {
        $logoutService->logout();
        return response(['message'=>'Logged out successfuly']);
    }
}
