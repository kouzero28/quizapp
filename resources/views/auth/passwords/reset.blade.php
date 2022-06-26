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
        <h1>Reset</h1>
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-item">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="email"></label>
                <input type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Email Address"></input>
            </div>
            <div class="form-item">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="password"></label>
                <input type="password" name="password"  placeholder="Password"></input>
            </div>
            <div class="form-item">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="password"></label>
                <input type="password" name="password_confirmation"  placeholder="Re Password"></input>
            </div>
            <div class="button-panel">
                <input type="submit" class="button" title="Sign In" value="{{ __('Reset Password') }}"></input>
            </div>
        </form>
        <div class="form-footer">
            <p><a href="/login">To Login Screen</a></p>
        </div>
    </div>
</div>
@endsection
@include('layouts.footer')