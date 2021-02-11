<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function showUserMessages(Request $request, $id) {
        $allMessages = Message::with('chatUser:id,username,')->where('chat_user_id', $id)->get();

        return $allMessages;
    }

    public function createMessage(Request $request, $id) {
        $message = new Message;
        $message->message = $request->message;
        $message->chat_user_id = $id;
        $message->save();

        return ["yes" => "woow"];
    }
}
