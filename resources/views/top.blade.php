@extends('layouts.layout1')
@section('title', 'Quiz Share&Answer')
@include('layouts.head')
@include('layouts.header1')
@section('content')
<div class="top">
    <div class="top1">
        <h1 class="welcome">
            Quiz Share&Answerへようこそ！
        </h1>
        <p>
            会員登録をしてみんなのクイズを解いてあなたもクイズを投稿してみよう！
        </p>
    </div>
    <div class="top2">
        <a href="/register" class="btn-square">新規会員登録はこちら</a>
    </div>
    <div class="top2">
        <a href="/login" class="btn-square">既に会員の方はこちら</a>
    </div>
</div>
@endsection
@include('layouts.footer')