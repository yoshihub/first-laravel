@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('a-link')
<a href="{{ route('register') }}" class="login-button">register</a>
@endsection

@section('content')

<p class="login-title">Login</p>
<div class="login-container">
    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" placeholder="例：test@example.com">
            @error('email')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input id="password" type="password" name="password" placeholder="例：coachtech123">
            @error('password')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="button">ログイン</button>
    </form>
</div>
@endsection
