<?php

namespace App\Http\Controllers\Favorite;

use Exception;
use Illuminate\Http\Request;
use App\Services\FavoriteService;
use App\Http\Controllers\Controller;
use App\Services\Favorite\DeleteFavoriteService;

class DeleteFavoriteController extends Controller
{
    public function delete_favorite_expert($expert_id, DeleteFavoriteService $deleteFavoriteService)
    {
        try
        {
            $deleteFavoriteService->delete($expert_id);

            return response([
                'message' => 'Expert was removed from favorites successfully'
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
