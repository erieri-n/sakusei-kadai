<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
</head>
<body>
    <h1>新規登録</h1>
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <p>
            メールアドレス: <input type="text" name="email" required>
        </p>
        <p>
            パスワード: <input type="password" name="password" required>
        </p>
        <p>
            パスワード（確認）: <input type="password" name="password_confirmation" required>
        </p>
        <button type="submit">登録</button>
        <button type="button" onclick="location.href='{{ route('login') }}'">ログイン画面へ</button>
    </form>
    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
