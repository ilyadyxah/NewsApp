@extends('base')
@section('content')
<div>
    <h1>Приветственная страница</h1>
    <a href='{{route('news::categories')}}'>Категории новостей</a><br>
    <a href='{{route('admin::user::аuthor')}}'>Авторизация</a><br>
    <a href='{{route('admin')}}'>Админка</a>
</div>
@endsection
