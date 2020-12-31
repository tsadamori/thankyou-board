@extends('layouts.app')

@section('content')

    <div class="text-center mb-3">
        <a href="google/login"><input type="button" class="btn btn-dark" value="Googleでログイン"></a>
    </div>
    <div class="text-center">
        <a href="twitter/login"><input type="button" class="btn btn-primary" value="Twitterでログイン"></a>
    </div>

@endsection