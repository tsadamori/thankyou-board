<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Auth;

class MessageController extends Controller
{
    public function index()
    {
        // ログインしていれば、user情報を渡す
        if (Auth::check()) {
            $user = User::where('id', Auth::id())->first();
        } else {
            $user = [];
        }

        return view('index', ['user' => $user]);
    }
}
