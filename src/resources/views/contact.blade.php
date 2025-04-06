@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-wrapper">
    <h1 class="contact-title">Contact</h1>

    <form method="POST" action="{{ route('contact.confirm') }}" class="contact-form">
        @csrf

        {{-- お名前（姓・名） --}}
        <div class="form-row">
            <label>お名前 <span class="required">※</span></label>
            <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
            <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
        </div>
        @error('last_name') <p class="error-message">{{ $message }}</p> @enderror
        @error('first_name') <p class="error-message">{{ $message }}</p> @enderror

        {{-- 性別 --}}
        <div class="form-row">
            <label>性別 <span class="required">※</span></label>
            <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}> 男性</label>
            <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}> 女性</label>
            <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}> その他</label>
        </div>
        @error('gender') <p class="error-message">{{ $message }}</p> @enderror

        {{-- メールアドレス --}}
        <div class="form-row">
            <label>メールアドレス <span class="required">※</span></label>
            <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
        </div>
        @error('email') <p class="error-message">{{ $message }}</p> @enderror

        {{-- 電話番号 --}}
        <div class="form-row">
            <div class="form-row">
                <label>電話番号 <span class="required">※</span></label>
                <input type="text" name="tel1" class="tel" value="{{ old('tel1') }}"> -
                <input type="text" name="tel2" class="tel" value="{{ old('tel2') }}"> -
                <input type="text" name="tel3" class="tel" value="{{ old('tel3') }}">
            </div>
        </div>
        @error('tel1') <p class="error-message">{{ $message }}</p> @enderror
        @error('tel2') <p class="error-message">{{ $message }}</p> @enderror
        @error('tel3') <p class="error-message">{{ $message }}</p> @enderror

        {{-- 住所 --}}
        <div class="form-row">
            <label>住所 <span class="required">※</span></label>
            <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
        </div>
        @error('address') <p class="error-message">{{ $message }}</p> @enderror

        {{-- 建物名 --}}
        <div class="form-row">
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building') }}">
        </div>

        {{-- お問い合わせの種類 --}}
        <div class="form-row">
            <label>お問い合わせの種類 <span class="required">※</span></label>
            <select name="category_id">
                <option value="">選択してください</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
                @endforeach
            </select>
        </div>
        @error('category_id') <p class="error-message">{{ $message }}</p> @enderror

        {{-- お問い合わせ内容 --}}
        <div class="form-row">
            <label>お問い合わせ内容 <span class="required">※</span></label>
            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        </div>
        @error('detail') <p class="error-message">{{ $message }}</p> @enderror

        {{-- 送信ボタン --}}
        <div class="form-row center">
            <button type="submit" class="submit-button">確認画面</button>
        </div>
    </form>
</div>
@endsection
