<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <p>
            メールアドレス: <input type="text" name="email" required>
        </p>
        <p>
            パスワード: <input type="password" name="password" required>
        </p>
        <button type="submit">ログイン</button>
        <button type="button" onclick="location.href='{{ route('register') }}'">新規登録</button>
    </form>
    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif
</body>
</html>
