<?php

namespace App\Http\Controllers\Chat;

use App\Events\Chat\MessageCreated;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Chat\StoreMessageRequest;
use App\Models\Chat\Message;
use App\Http\Controllers\Controller;

class ChatMessageController extends Controller
{
    public function index()
    {
        $message = Message::with(['user'])->latest()->limit(10)->get();
        return response()->json($message,200);
    }

    public function store(StoreMessageRequest $request)
    {
        $message = $request->user()->messages()->create([
           'body' => $request->body
        ]);

        $message = [
            'message' => array_merge($message->load(['user'])->toArray(), [
                'selfOwned' => false
            ])
        ];

        broadcast(new MessageCreated($message))->toOthers();

        return response()->json($message,200);
    }
}
