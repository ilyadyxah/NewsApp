<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h1>Новостной канал "Пи.FM"</h1>
        <a href="{{ route('news::index') }}">Главная</a>
{{--        <a href='{{route('admin::user::аuthor')}}'>Авторизация</a>--}}
        <a href="{{ route('admin::index') }}">Админка</a>
        <hr>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        <hr>
        <p>Копирайт 2022</p>
    </div>
</body>
</html>
