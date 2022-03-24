@extends('layouts.layout')
@section('title', 'Show')
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="top">

        <div class="top1">
            <h1 class="welcom" style="font-size:20px">{{ $user_name }} Quiz</h1>
        </div>

        <div class="form-wrapper2">
            @foreach ($posts as $post)
                <div class="form-wrapper3">

                    <div style="padding-top:30px">{{ $post->quiz }}</div>
                    <details>
                        <summary>Hint</summary>
                        {{ $post->hint }}
                    </details>
                    <details>
                        <summary>Answer</summary>
                        {{ $post->answer }}
                    </details>
                    <p class="time">{{ $post->created_at }}</p>
                    @if ($post->is_liked_by_auth_user())
                        <a href="{{ route('main.unlike', ['id' => $post->id]) }}" class="like">いいね!<span
                                class="badge">{{ $post->likes->count() }}</span></a>
                    @else
                        <a href="{{ route('main.like', ['id' => $post->id]) }}" class="like">いいね!<span
                                class="badge">{{ $post->likes->count() }}</span></a>
                    @endif


                </div>
            @endforeach
        </div>
    </div>
@endsection
@include('layouts.footer')
