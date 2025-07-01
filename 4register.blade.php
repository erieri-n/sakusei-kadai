<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel Auth')</title>
    <link href="" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Laravel Auth</a>
        </div>
    </nav>
    <div class="container">
       
    </div>
    <script src=""></script>

    
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">ユーザー登録</div>
            <div class="card-body">
                <form action="{{ route('register.post') }}" method="post">
                  
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">名前</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">メールアドレス</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">パスワード</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">パスワード（確認用）</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control"
                                   id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="登録">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>
