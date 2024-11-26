<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('chat.index', compact('users'));
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'to_user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $message = Message::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $validated['to_user_id'],
            'content' => $validated['content'],
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message, 201);
    }

    public function fetchMessages($userId)
    {
        $messages = Message::where(function ($query) use ($userId) {
            $query->where('from_user_id', Auth::id())
                  ->where('to_user_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('from_user_id', $userId)
                  ->where('to_user_id', Auth::id());
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }
    public function showChat($toUserId)
    {
        return view('chat.chat', ['toUserId' => $toUserId]);
    }

}
