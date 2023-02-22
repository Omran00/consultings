<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class MustBeExpert
{
    public function handle(Request $request, Closure $next)
    {
        $user_id = auth()->user()->user_id;
        $user = User::find($user_id);
        if(!$user['is_expert'])
        {
            return response([
               'message' => 'You are not an expert!'
            ], 401);
        }

        return $next($request);
    }
}
