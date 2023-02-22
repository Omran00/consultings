<?php

namespace App\Http\Controllers\Chat;

use Exception;
use App\Services\ChatService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChatRequest;
use App\Services\Chat\GetChatService;
use App\Services\Chat\StoreChatService;

class ChatController extends Controller
{
    public function index(GetChatService $getChatService)
    {
        $chats = $getChatService->get();
        return response($chats);
    }

    public function store(StoreChatRequest $request, StoreChatService $storeChatService)
    {
        try
        {
            $chat_id = $storeChatService->create($request);
            return response([
                'message' => 'Chat with participants are created successfully',
                'chat_id' => $chat_id,
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
