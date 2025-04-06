@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('a-link')
<a href="{{ route('login') }}" class="login-button">login</a>
@endsection


@section('content')

<p class="register-title">Register</p>
<div class="register-container">
    <form method="post" action="/register" class="register-form">
        @csrf
        <div class="form-group">
            <label for="name">お名前</label>
            <input id="name" type="text" name="name" placeholder="例：山田 太郎">
            @error('name')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input id="email" type="text" name="email" placeholder="例：test@example.com">
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

        <div class="form-group">
            <label for="password_confirmation">パスワード再入力</label>
            <input id="password_confirmation" type="password" name="password_confirmation">
        </div>

        <button type="submit" class="submit-button">登録</button>
    </form>
</div>
@endsection
