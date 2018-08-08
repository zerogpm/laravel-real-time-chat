<?php

namespace App\Http\Controllers\Chat;

use App\Http\Requests\Chat\StoreMessageRequest;
use App\Models\Chat\Message;
use Illuminate\Http\Request;
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

        return $message;
    }
}
