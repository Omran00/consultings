<?php

namespace App\Http\Controllers\Favorite;

use Exception;
use Illuminate\Http\Request;
use App\Services\FavoriteService;
use App\Http\Controllers\Controller;
use App\Services\Favorite\GetFavoriteService;

class GetFavoriteController extends Controller
{
    public function get_favorite_experts(GetFavoriteService $getFavoriteService)
    {
        try
        {
            $favorite_experts = $getFavoriteService->get();
            return response([
                'Favorite experts' => $favorite_experts
            ]);
        }
        catch(Exception $e)
        {
            return response([
                'message' => $e->getMessage()
            ], 401);
        }
    }
}
