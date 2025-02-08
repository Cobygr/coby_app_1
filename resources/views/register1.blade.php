<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
<body>
  <form action="{{ route('register.store') }}" method="POST">
    @csrf
    <label for="email">メールアドレスあ</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">パスワード</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">登録</button>
  </form>
</body>
</html>