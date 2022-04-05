@extends('layouts.layout')
@section('title', 'User')
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="top">
        <div class="top1">
            <h1 class="welcom" style="font-size:20px">This is {{ $users->name }} page</h1>
            <a class="editt" href="user_edit/{{ $users->id }}">User Edit</a>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
                <p class="alert-success">{{ session('message') }}</p>
            </div>
        @endif
        <div class="form-wrapper2">
            @foreach ($posts as $post)
                <div class="form-wrapper3">
                    <div style="padding-top:30px">{!! nl2br(e($post->quiz)) !!}</div>
                    <details>
                        <summary>Hint</summary>
                        {!! nl2br(e($post->hint)) !!}
                    </details>
                    <details>
                        <summary>Answer</summary>
                        {!! nl2br(e($post->answer)) !!}
                    </details>
                    <p class="time">{{ $post->created_at }}</p>
                    <div class="delete1" style="display:flex">
                        <a class="delete2" href="edit/{{ $post->id }}">Edit</a>
                        <a class="delete" href="{{ $post->id }}/delete"
                            onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">Delete</a>
                    </div>
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
