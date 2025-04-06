@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
@endsection

@section('content')
<div class="admin-wrapper">
    <h1 class="admin-title">Admin</h1>

    <form method="GET" action="{{ route('admin.index') }}" class="search-form">
        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
        <select name="gender">
            <option value="" {{ request('gender') === null || request('gender') === '' ? 'selected' : '' }}>性別</option>
            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
        </select>
        <select name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->content }}
            </option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}">

        <button type="submit" class="btn search">検索</button>
        <a href="{{ route('admin.index') }}" class="btn reset">リセット</a>
    </form>

    <div class="export-pagination-wrapper">
        <div>
            <button type="submit" class="btn export">エクスポート</button>
        </div>

        <div class="pagination">
            {{ $contacts->links() }}
        </div>
    </div>

    <table class="contact-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>
                    @if($contact->gender == 1) 男性
                    @elseif($contact->gender == 2) 女性
                    @else その他
                    @endif
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td>
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                        data-bs-toggle="modal" data-bs-target="#modal-{{ $contact->id }}">
                        詳細
                    </button>
                </td>
            </tr>
            <!-- モーダル本体 -->
            <div class="modal fade" id="modal-{{ $contact->id }}" tabindex="-1"
                aria-labelledby="modalLabel{{ $contact->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{ $contact->id }}">お問い合わせ詳細</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                        </div>
                        <div class="modal-body text-start">
                            <p><strong>お名前：</strong>{{ $contact->last_name }} {{ $contact->first_name }}</p>
                            <p><strong>性別：</strong>
                                @if($contact->gender == 1) 男性
                                @elseif($contact->gender == 2) 女性
                                @else その他
                                @endif
                            </p>
                            <p><strong>メールアドレス：</strong>{{ $contact->email }}</p>
                            <p><strong>電話番号：</strong>{{ $contact->tel }}</p>
                            <p><strong>住所：</strong>{{ $contact->address }}</p>
                            <p><strong>建物名：</strong>{{ $contact->building }}</p>
                            <p><strong>お問い合わせの種類：</strong>{{ $contact->category->content }}</p>
                            <p><strong>お問い合わせ内容：</strong><br>{!! nl2br(e($contact->detail)) !!}</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <form method="POST" action="{{ route('admin.destroy', $contact->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
