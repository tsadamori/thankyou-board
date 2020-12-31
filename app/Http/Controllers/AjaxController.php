<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Message;
use Auth;

class AjaxController extends Controller
{
    public function getMessages()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        foreach ($messages as $message) {
            $message->nickname = $message
                ->user()
                ->first()
                ->nickname;
        }
        echo json_encode($messages);
    }

    public function postMessage(Request $request)
    {
        $message = new Message;
        $message->message = $request->message;
        $message->user_id = Auth::id();
        $message->save();

        echo json_encode(true);
    }

    public function getNickname()
    {
        $user = User::where('id', Auth::id())->first();

        if (!is_null($user->nickname)) {
            $nickname = $user->nickname;
        } else {
            $nickname = $user->name;
        }

        echo json_encode(['nickname' => $nickname]);
    }
}
