<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserProfileService;

class ProfileController extends Controller
{
    public function user_profile(UserProfileService $userProfileService)
    {
        $data = $userProfileService->get();
        return response([
            'profile' => $data
        ]);
    }
}

