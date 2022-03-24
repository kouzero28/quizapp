@extends('layouts.layout1')
@section('title', 'reset')
@include('layouts.head')
@include('layouts.header1')

@section('content')
<div class="top">
    <div class="top1">
        <h1 class="welcom">Quiz Share&Answer</h1>
    </div>
    <div class="form-wrapper">
        <h1>Password Reset</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" action="{{ route('password.email') }}">
            @csrf
            <div class="form-item">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="email"></label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address"></input>
            </div>
            <div class="button-panel">
                <input type="submit" class="button" title="Send" value="Send"></input>
            </div>
        </form>
        <div class="form-footer">
            <p><a href="/register">Create an account</a></p>
            <p><a href="/login">To Login Screen</a></p>
        </div>
    </div>
</div>
@endsection
@include('layouts.footer')