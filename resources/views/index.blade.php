@extends('layouts.app')

@section('content')

<div class="my-5 text-center">
    <h1>Thank You Board</h1>
    <p>〜身近な人に、感謝を伝えよう！〜</p>
</div>
<div id="app">
    @guest
        <div class="text-center">
            <a href="login"><input type="button" class="btn btn-primary" value="ログインして投稿する"></a>
        </div>
    @else
        <div class="text-center mb-5">
            @if (is_null($user->nickname))
                <a href="nickname"><input type="button" class="btn btn-primary" value="ニックネームを設定する"></a>
            @else
                <a href="nickname"><input type="button" class="btn btn-primary" value="ニックネームを変更する"></a>
            @endif

            <a href="logout"><input type="button" class="btn btn-secondary" value="ログアウト"></a>
        </div>
        <!-- ボタンエリア -->
        <div class="row m-0 m-lg-5 mb-5 px-2 py-5 px-lg-5 bg-dark">
            <div class="col-12 col-lg-9 mb-3 mb-lg-0">
                <input id="message" type="text" class="form-control">
            </div>
            <div class="col-12 col-lg-3">
                <input @click="addItem" type="button" class="form-control btn btn-success" value="メッセージを送信">
            </div>
        </div>
    @endguest
    <ul id="message-list" class="list-unstyled">
        <li v-for="message in messages" class="my-4 p-4 bg-light w-75 mx-auto">
            <div class="row align-items-end justify-content-between message-content">
                <p class="col-12 col-lg-10">@{{ message.body }}</p>
                <p class="col-12 col-lg-2 text-right">@{{ message.created_at }}<br>posted by @{{ message.nickname }}</p>
                
            </div>
        </li>
    </ul>
</div>

@endsection