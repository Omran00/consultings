<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class DataMustBeCompleted
{
    public function handle(Request $request, Closure $next)
    {

        $user = auth()->user();

        if($user->is_expert != 0 && !isset($user->expert->phone_numbers))
        {
            return response([
                'message' => 'Continue your information as an expert before using any API'
            ], 422);
        }


        return $next($request);
    }
}
