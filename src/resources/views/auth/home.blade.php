<p>ホーム画面</p>
@if (Auth::check())
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">ログアウト</button>
</form>
@endif
