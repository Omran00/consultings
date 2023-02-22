<?php

namespace App\Http\Controllers\User;

use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Services\User\UpdateUserService;

class UpdateUserController extends Controller
{
    public function update(UpdateUserRequest $request, UpdateUserService $updateUserService)
    {
        $updateUserService->update($request);
        return response(['message' => "Data updated successfully"]);
    }
}
