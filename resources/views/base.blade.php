<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="header">
                @include('blocks.navigate')
            </div>
            <div class="content">
                @yield('content')
            </div>
            <div class="footer">
                @include('blocks.footer')
            </div>
        </div>
    </div>
</body>
</html>
