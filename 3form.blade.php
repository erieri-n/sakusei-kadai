<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>'学年管理システム'</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
      
            <h1>学年入力</h1>
            <div>
                <span>年度：</span><span id="year">2025</span>
            </div>
            <div>
                <span>学年：</span><span id="grade">1年生</span>
                <button type="button" onclick="changeYear(-1)">前年</button>
                <button type="button" onclick="changeYear(1)">次年</button>
            </div>
            <div>
                <button type="button" onclick="sendGradeUpdate()">サーバーに送信</button>
                <span id="message" style="color: green;"></span>
            </div>
            <p><button type="button" onclick="location.href='{{ route('student.register') }}'">学生登録</button></p>
            <p><button type="button" onclick="location.href='{{ route('grade.show') }}'">学年表示</button></p>
        
            <script>
                let year = 2025;
                let baseGrade = 1;
        
                function display() {
                    document.getElementById('year').textContent = year;
                    document.getElementById('grade').textContent = baseGrade + "年生";
                }
        
                async function sendGradeUpdate() {
                    try {
                        const response = await fetch('/api/update_grade', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            body: JSON.stringify({ year: year, grade: baseGrade })
                        });
                        const result = await response.json();
                        if (result.success) {
                            document.getElementById('message').textContent = 'サーバーに学年情報を送信しました。';
                        } else {
                            document.getElementById('message').textContent = '送信失敗: ' + (result.message || '');
                        }
                    } catch (e) {
                        document.getElementById('message').textContent = '通信エラーが発生しました';
                    }
                }
        
                function changeYear(diff) {
                    year += diff;
                    baseGrade += diff;
                    if (baseGrade < 1) baseGrade = 1;
                    if (baseGrade > 3) baseGrade = 3;
                    display();
                }
        
                display();
            </script>
        @endsection
        

    </div>
</body>
</html>
