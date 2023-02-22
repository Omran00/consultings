<?php

namespace App\Http\Controllers\Chat;

use Exception;
use App\Http\Controllers\Controller;
use App\Services\ChatMessageService;
use App\Http\Requests\GetChatRequest;
use App\Http\Requests\StoreMessageRequest;
use App\Services\Chat\GetChatService;
use App\Services\Message\StoreMessageService;

class ChatMessageController extends Controller
{
    public function index(GetChatRequest $request, GetChatService $getChatService)
    {
        try
        {
            $messages = $getChatService->get($request);
            return response($messages);    
        }    
        catch(Exception $e)
        {
            return response([
                'message' => $e->getMessage()
            ], 422);
        }
    }

    public function store(StoreMessageRequest $request, StoreMessageService $storeMessageService)
    {
        try
        {
            $storeMessageService->create($request);

            return response([
                'message' => 'Message created successfully',
            ]);
        }
        catch(Exception $e)
        {
            return response([
                'message' => $e->getMessage()
            ], 422);
        }
    }


}
