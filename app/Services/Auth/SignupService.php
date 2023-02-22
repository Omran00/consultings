<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Services\Wallet\SetDefaultBalanceService;

class SignupService
{
    public function create(StoreUserRequest $request) :array
    {
        $user_data             = $request->validated();
        $user_data['password'] = bcrypt($user_data['password']);
        $user                  = User::create($user_data);
        $token                 = TokenService::create_access_token($user);
        SetDefaultBalanceService::set($user->wallet());
        return [
            'token' => $token,
            'user_id' => $user->user_id
        ];
    }
}