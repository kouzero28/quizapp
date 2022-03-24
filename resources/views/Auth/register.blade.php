@extends('layouts.layout1')
@section('title', 'Signup')
@include('layouts.head')
@include('layouts.header1')
@section('content')
    <div class="top">
        <div class="top1">
            <h1 class="welcom">Quiz Share&Answer</h1>
        </div>
        <div class="form-wrapper">
            <h1>Sign Up</h1>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-item">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="name"></label>
                    <input type="name" name="name" value="{{ old('name') }}" placeholder="User Name"></input>
                </div>
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
                    <input type="password" name="password" placeholder="Password"></input>
                </div>
                <div class="form-item">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="password"></label>
                    <input type="password" name="password_confirmation" placeholder="Re Password"></input>
                </div>
                <div class="button-panel">
                    <input type="submit" class="button" title="Sign Up" value="Sign Up"></input>
                </div>
            </form>
            <div class="form-footer">
                <p><a href="/login">To Login Screen</a></p>
                <p><a href="/password/reset">Forgot password?</a></p>
            </div>
        </div>
    </div>
@endsection
@include('layouts.footer')
