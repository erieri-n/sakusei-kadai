<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>作成課題</title>
    <!-- スタイルシートは必要に応じて -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <form id="register-form" method="POST" action="{{ route('register.post') }}">
        @csrf
        <p>ユーザー名:
            <input type="text" id="username" name="username" pattern="^[a-zA-Z0-9\uFF01-\uFF5E\u3000-\u303F\u3040-\u309F\u30A0-\u30FF\u4E00-\u9FFF]+$" inputmode="text" style="ime-mode:auto;" title="半角英数字または全角文字のみ入力してください">
        </p>
        <p>メールアドレス:
            <input type="text" id="mailaddress" name="mailaddress" pattern="^[a-zA-Z0-9@._-]+$" title="半角英数字と@._-のみ入力してください">
        </p>
        <p>パスワード:
            <input type="password" id="password" name="password" pattern="^[a-zA-Z0-9]+$" title="半角英数字のみ入力してください">
        </p>
        <p>パスワード（確認用）:
            <input type="password" id="password_confirm" name="password_confirm" pattern="^[a-zA-Z0-9]+$" title="半角英数字のみ入力してください">
        </p>
        <span id="error-message" style="color:red;"></span>
        <button type="submit">登録</button>
        <p>
            <button type="button" onclick="location.href='{{ route('login') }}'">戻る</button>
        </p>
    </form>

    <script>
        document.getElementById('register-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const username = document.getElementById('username').value.trim();
            const mail = document.getElementById('mailaddress').value.trim();
            const pass = document.getElementById('password').value;
            const pass2 = document.getElementById('password_confirm').value;
            const errorMsg = document.getElementById('error-message');
            errorMsg.textContent = '';

            if (!username || !mail || !pass || !pass2) {
                errorMsg.textContent = '全ての項目を入力してください';
                return;
            }
            if (pass !== pass2) {
                errorMsg.textContent = 'パスワードが一致しません';
                return;
            }

            try {
                const res = await fetch('/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({
                        username: username,
                        mailaddress: mail,
                        password: pass
                    })
                });
                const data = await res.json();
                if (data.success) {
                    errorMsg.style.color = 'green';
                    errorMsg.textContent = '登録に成功しました！ログイン画面に移動します。';
                    setTimeout(() => {
                        window.location.href = '{{ route('login') }}';
                    }, 1500);
                } else {
                    errorMsg.style.color = 'red';
                    errorMsg.textContent = data.message || '登録に失敗しました';
                }
            } catch (err) {
                errorMsg.style.color = 'red';
                errorMsg.textContent = '通信エラーが発生しました';
            }
        });
    </script>
</body>
</html>
