<?php 

namespace App\Services\Auth;

use Exception;
use App\Services\User\GetUserService;
use App\Http\Requests\LoginUserRequest;

class LoginService
{
    public function login(LoginUserRequest $request) :array
    {
        $data  = $request->validated();
        $this->attempt($data);
        $user  = GetUserService::get_user();
        $token = TokenService::create_access_token($user);
        return ['token' => $token, 'user_id' => $user->user_id];
    }
    
    private function attempt(array $data) :void
    {
        if(!auth()->attempt($data))
            throw new Exception('Invalid credentials');
    }
}