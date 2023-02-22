<?php

namespace App\Http\Controllers\User;

use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Services\User\DeleteService;

class DeleteUserController extends Controller
{
    public function delete(DeleteService $deleteService)
    {
        $deleteService->delete();
        return response(['message' => "Account deleted successfully"]);
    }
}
