@extends('layouts.layout')
@section('title', 'User Edit')
@include('layouts.head')
@include('layouts.header')
@section('content')
<div class="top">
    <div class="top1">
        <h1 class="welcom">Quiz Share&Answer</h1>
    </div>
    <div class="form-wrapper">
        <h1>User Edit</h1>
        <form method="post" action="/user_update/{{ $user->id }}">
            @csrf
            <div class="form-item">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="name"></label>
                <input type="name" name="name"  placeholder="New User Name"></input>
            </div>
            <div class="form-item">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="password"></label>
                <input type="password" name="password"  placeholder="Password"></input>
            </div>
            <div class="button-panel">
                <input type="submit" class="button" title="User Edit" value="User Edit" style="margin-bottom:30px"></input>
            </div>
        </form>
    </div>
</div>
@endsection
@include('layouts.footer')