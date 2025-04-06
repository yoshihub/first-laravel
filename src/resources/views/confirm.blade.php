@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-wrapper">
    <h1 class="confirm-title">Confirm</h1>

    <form method="POST" action="{{ route('contact.thanks') }}">
        @csrf

        <table class="confirm-table">
            <tr>
                <th>お名前</th>
                <td>{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    @if($inputs['gender'] == 1) 男性
                    @elseif($inputs['gender'] == 2) 女性
                    @else その他
                    @endif
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>{{ $inputs['email'] }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $inputs['tel1'] }}{{ $inputs['tel2'] }}{{ $inputs['tel3'] }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $inputs['address'] }}</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{ $inputs['building'] }}</td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ $category_name }}</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>{!! nl2br(e($inputs['detail'])) !!}</td>
            </tr>
        </table>

        {{-- hiddenでデータを保持 --}}
        @foreach($inputs as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        {{-- 下部のボタン --}}
        <div class="confirm-buttons">
            <button type="submit" class="submit-button">送信</button>
            <a href="#" class="back-button" onclick="history.back(); return false;">修正</a>
        </div>
    </form>
</div>
@endsection
