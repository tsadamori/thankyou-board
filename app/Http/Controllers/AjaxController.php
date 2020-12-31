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
            // ニックネームを取得
            $nickname = $message->user()->first()->nickname;
            // ニックネームを設定していない場合、名無しにする
            $message->nickname = is_null($nickname) ? '名無し' : $nickname;

            // 自分の投稿かどうか判定
            $message->me = $message->user_id == Auth::id();
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
