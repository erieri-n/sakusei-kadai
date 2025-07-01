<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>学年管理システム</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
      
            <h1>学生登録</h1>
            <form method="POST" action="{{ route('student.register.post') }}">
                @csrf
                <div>
                    <label>名前：</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label>メールアドレス：</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label>学年：</label>
                    <select name="grade" required>
                        <option value="1">1年生</option>
                        <option value="2">2年生</option>
                        <option value="3">3年生</option>
                    </select>
                </div>
                <button type="submit">登録</button>
            </form>
           
                <div style="color:red;">
                
                </div>
      
            <p><button type="button" onclick="location.href='{{ route('grade.form') }}'">学年入力へ戻る</button></p>
     
        

    </div>
</body>
</html>
