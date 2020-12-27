<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class AjaxController extends Controller
{
    public function getMessages()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return $messages;
    }

    public function postMessage(Request $request)
    {
        $message = new Message;
        $message->message = $request['message'];
        $message->save();

        return true;
    }
}
