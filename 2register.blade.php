<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
</head>
<body>
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <p>ユーザー名:
            <input type="text" name="username" required>
        </p>
        <p>メールアドレス:
            <input type="email" name="mailaddress" required>
        </p>
        <p>パスワード:
            <input type="password" name="password" required>
        </p>
        <p>パスワード（確認用）:
            <input type="password" name="password_confirmation" required>
        </p>
        <span style="color:red;">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            @endif
        </span>
        <button type="submit">登録</button>
        <button type="button" onclick="location.href='{{ url("/") }}'">戻る</button>
    </form>
</body>
</html>
