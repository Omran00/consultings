<?php

namespace App\Http\Controllers\Favorite;

use Exception;
use App\Services\FavoriteService;
use App\Http\Controllers\Controller;
use App\Services\Favorite\AddFavoriteService;

class AddToFavoriteController extends Controller
{
    public function add_to_favorite(int $expert_id, AddFavoriteService $addFavoriteService)
    {
        try
        {
            $addFavoriteService->create($expert_id);

            return response([
                'message' => 'Expert has been added to favorite successfully'
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
