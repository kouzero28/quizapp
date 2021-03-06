@extends('layouts.layout')
@section('title', 'Answer')
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="top">
        @if (session('message'))
            <div class="alert alert-success">
                <p class="alert-success">{{ session('message') }}</p>
            </div>
        @endif
        <div class="form-wrapper2">
            @foreach ($posts as $post)
                <div class="form-wrapper3">
                    <p style="padding-top:10px; font-size:30px; color:black;width:80px;height:auto;">
                        {{ $post->user_name }}</p>
                    <div style="padding-top:10px">{!! nl2br(e($post->quiz)) !!}</div>
                    <details>
                        <summary>Hint</summary>
                        {!! nl2br(e($post->hint)) !!}
                    </details>
                    <details>
                        <summary>Answer</summary>
                        {!! nl2br(e($post->answer)) !!}
                    </details>
                    <p class="time">{{ $post->created_at }}</p>
                    @if ($user_id == 5)
                        <div class="delete1">
                            <a class="delete" href="{{ $post->id }}/delete"
                                onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">Delete</a>
                        </div>
                    @endif
                    @if ($post->is_liked_by_auth_user())
                        <a href="{{ route('main.unlike', ['id' => $post->id]) }}" class="like">good!<span
                                class="badge">{{ $post->likes->count() }}</span></a>
                    @else
                        <a href="{{ route('main.like', ['id' => $post->id]) }}" class="like">good!<span
                                class="badge">{{ $post->likes->count() }}</span></a>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
@endsection
@include('layouts.footer')
