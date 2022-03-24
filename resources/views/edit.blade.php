@extends('layouts.layout')
@section('title', 'Edit')
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="top">
        <div class="top1">
            <h1 class="welcom" style="font-size:20px">Quiz Edit</h1>
        </div>
        <div class="form-wrapper1">
            <form method="post" action="/update/{{ $posts->id }}">
                @csrf
                @error('quiz')
                    <div class="alert alert-danger" style="padding-top:1.5rem">{{ $message }}</div>
                @enderror
                <textarea name="quiz" class="feedback-input" placeholder="quiz">{{ $posts->quiz }}</textarea>
                @error('hint')
                    <div class="alert alert-danger" style="padding-top:1.5rem">{{ $message }}</div>
                @enderror
                <textarea name="hint" class="feedback-input1" placeholder="Hint">{{ $posts->hint }}</textarea>
                @error('answer')
                    <div class="alert alert-danger" style="padding-top:1.5rem">{{ $message }}</div>
                @enderror
                <textarea name="answer" class="feedback-input1" placeholder="Answer">{{ $posts->answer }}</textarea>
                <div class="button-panel1" style="margin-top:0">
                    <input type="submit" class="button" title="Edit" value="Edit" style="margin-top:30px"></input>
                </div>
            </form>
        </div>
    </div>
@endsection
@include('layouts.footer')
