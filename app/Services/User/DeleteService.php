<?php

namespace App\Services\User;

class DeleteService
{
    public static function delete() :void
    {
        GetUserService::get_user()->delete();
    }
}