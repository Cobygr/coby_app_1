<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/scss/style.scss', 'resources/js/app.js'])
</head>

<body>
    <header class="l-header">
        <div class="l-header__logo">
            <a href="#">WEBKATU MARKET</a>
        </div>
        <nav class="l-header__nav">
            <a href="#" class="l-header__nav__item">ログイン</a>
            <a href="#" class="l-header__nav__item">ユーザー登録</a>
        </nav>
    </header>
    <div class="l-register">
        <form action="{{ route('register.store') }}" method="POST">
            <h2 class="l-register__title">ユーザー登録</h2>
            @csrf
            <label for="email">Email</label>
            <!-- valueにold('email')とすることで、入力した値が保持される -->
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <p class="c-error__validate">{{ $message }}</p> {{-- controller側でvalidate関数の第２引数の内容が呼び出される --}}
            @enderror

            <br>
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <p class="c-error__validate">{{ $message }}</p>
            @enderror
            <br>
            <label for="password">パスワード（再入力）</label>
            <input type="password" name="password_confirmation" id="pass_re" required>
            <!-- validateを使う場合クラス名は「password_confirmation」でなければならない 。requiredはブラウザが側が自動でエラーメッセージの表示-->
            <br>
            <!--  ボタンを右端に寄せるためのコンテナ -->
            <div class="l-register__btn">
                <button type="submit">登録</button>
            </div>

        </form>
    </div>
</body>

</html>
