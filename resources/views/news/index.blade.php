@extends('base')
@section('content')
<div>
    <h1>Приветственная страница</h1>
    <a href='{{route('news::allNews')}}'>Все новости</a><br>
    <a href='{{route('news::categories')}}'>Категории новостей</a><br>
</div>
@endsection
