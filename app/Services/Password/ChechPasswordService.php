<?php 

namespace App\Services\Password;

use Exception;
use Illuminate\Support\Facades\Hash;
use App\Services\User\GetUserService;

class CheckPasswordService
{
    public static function check_password(string $password) :void
    {
        $user_password = GetUserService::get_user()->password;
        if(!Hash::check($password, $user_password))
            throw new Exception('Wrong password');
    }
}