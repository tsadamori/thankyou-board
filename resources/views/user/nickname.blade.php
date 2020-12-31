@extends('layouts.app')

@section('content')

    <div class="w-75 mx-auto">
        <form action="update_nickname" method="post" class="form-group">
            @csrf
            <label for="nickname">ニックネーム</label>
            <input id="nickname" class="form-control mb-3" type="text" name="nickname" placeholder="ニックネームを入力してください" value="{{ $user->nickname }}">
            <input type="submit" class="form-control btn btn-block btn-success" value="ニックネームを設定">
        </form>
    </div>

@endsection