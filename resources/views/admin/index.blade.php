@extends('base')
@section('content')
    <div>
        <h1>Админка</h1>
        <a href='{{route('admin::news::add')}}'>Добавить новость</a><br>
{{--        <a href='{{route('admin::news::addCategory')}}'>Добавить категорию</a><br>--}}
        <a href='{{route('admin::news::findNews')}}'>Найти новость</a><br>
    </div>
@endsection
