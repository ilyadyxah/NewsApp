@extends('base')
@section('content')
<h1>Категории</h1>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href='{{route('news::index')}}'>Все новости</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href='{{route('news::categories')}}'>Категории новостей</a>
    </li>
</ul>
<ul class="list-group">
    @forelse ($categories as $category)
        @php
            $url = route('news::category', ['id' => $category->id]);
        @endphp
        <li class="list-group-item">
            <a class="btn-group btn" href='{{ $url }}'>{{ $category->name }}</a>
        </li>
    @empty
        Нет категорий
    @endforelse
</ul>

@endsection
