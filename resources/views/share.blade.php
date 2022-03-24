@extends('layouts.layout')
@section('title', 'Share')
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="top">
        <div class="top1">
            <h1 class="welcom" style="font-size:20px">Quiz Share</h1>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
                <p class="alert-success">{{ session('message') }}</p>
            </div>
        @endif
        <div class="form-wrapper1">
            <form action="{{ url('share') }}" method="post">
                @csrf
                @error('quiz')
                    <div class="alert alert-danger" style="padding-top:1.5rem">{{ $message }}</div>
                @enderror
                <textarea name="quiz" class="feedback-input" placeholder="Quiz"></textarea>
                @error('hint')
                    <div class="alert alert-danger" style="padding-top:1.5rem">{{ $message }}</div>
                @enderror
                <textarea name="hint" class="feedback-input1" placeholder="Hint"></textarea>
                @error('answer')
                    <div class="alert alert-danger" style="padding-top:1.5rem">{{ $message }}</div>
                @enderror
                <textarea name="answer" class="feedback-input1" placeholder="Answer"></textarea>
                <div class="button-panel1" style="margin-top:0">
                    <input type="submit" class="button" title="Share" value="Share" style="margin-top:30px"></input>
                </div>
            </form>
        </div>
    </div>
@endsection
@include('layouts.footer')
