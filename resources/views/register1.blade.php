<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/scss/style.scss','resources/js/app.js'])
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
      <h1 class="l-register__title">ユーザー登録</h1>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit">登録</button>
        </form>
    </div>
</body>

</html>
