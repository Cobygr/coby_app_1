<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
<body>
  {{-- route()はヘルパ関数でrouteに名前（->name）がついていた場合に使える関数なので、routeには名前をつける --}}
  <a href="{{ route('login1') }}" class="">ログイン</a>
  <a href="{{ route('register1') }}" class="">登録</a>
</body>
</html>