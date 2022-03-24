@extends('layouts.layout1')
@section('title', 'Login')
@include('layouts.head')
@include('layouts.header1')
@section('content')
<div class="top">
    <div class="top1">
        <h1 class="welcom">Quiz Share&Answer</h1>
    </div>
    <div class="form-wrapper">
        <h1>Sign In</h1>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-item">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="email"></label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address"></input>
            </div>
            <div class="form-item">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="password"></label>
                <input type="password" name="password"  placeholder="Password"></input>
            </div>
            <div class="button-panel">
                <input type="submit" class="button" title="Sign In" value="Sign In"></input>
            </div>
        </form>
        <div class="form-footer">
            <p><a href="/register">Create an account</a></p>
            <p><a href="/password/reset">Forgot password?</a></p>
        </div>
    </div>
</div>
@endsection
@include('layouts.footer')