<?php

namespace App\Services\User;

use App\Http\Requests\UpdateUserRequest;

class UpdateUserService
{
    public static function update(UpdateUserRequest $request) :void
    {
        $user_data = $request->validated();
        if(isset($user_data['password']))
            $user_data['password'] = bcrypt($user_data['password']);
        $user = GetUserService::get_user();
        $user->update($user_data);   
    }
}