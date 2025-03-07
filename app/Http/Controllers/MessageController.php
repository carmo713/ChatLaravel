<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\ChatMessage;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validate the request data
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|exists:users,id',
        ]);

        // Save the message to the database
        $message = $this->createMessage($request->receiver_id, $request->message);

        // Get the sender user
        $user = auth()->user();

        // Broadcast the event
        broadcast(new MessageSent($message, $user))->toOthers();

        return response()->json(['status' => 'Message sent!']);
    }

    public function store(Request $request, $receiverId)
    {
        // Validate the request data
        $request->validate([
            'message' => 'required|string',
        ]);

        // Save the message to the database
        $message = $this->createMessage($receiverId, $request->message);

        // Broadcast the event
        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message);
    }

    private function createMessage($receiverId, $messageText)
    {
        return ChatMessage::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiverId,
            'message' => $messageText,
        ]);
    }
}