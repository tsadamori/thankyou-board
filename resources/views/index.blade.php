@extends('layouts.app')

@section('content')

<div class="mt-5 text-center">
    <h1>Thank You Board</h1>
    <p>身近な人に、１日１回感謝を伝えよう！</p>
</div>
<div id="app">
    <!-- ボタンエリア -->
    <div class="row m-0 m-lg-2 mb-5 px-2 py-5 p-lg-5 bg-dark">
        <div class="col-12 col-lg-9 mb-3 mb-lg-0">
            <input id="message" type="text" class="form-control">
        </div>
        <div class="col-12 col-lg-3">
            <input @click="addItem" type="button" class="form-control btn btn-success" value="メッセージを送信">
        </div>
    </div>
    <ul id="message-list" class="list-unstyled">
        <li v-for="message in messages" class="my-4 p-4 bg-light">
            <div class="d-flex justify-content-between message-content">
                <p>@{{ message.body }}</p>
                <p class="mr-5">@{{ message.created_at }}</p>
            </div>
        </li>
    </ul>
</div>

@endsection