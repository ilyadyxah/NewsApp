@extends('base')
@section('content')
<h1>Категории</h1>
<ul>
    @forelse ($categories as $category)
        @php
            $url = route('news::category', ['id' => $category->id]);
        @endphp
        <li>
            <a href='{{ $url }}'>{{ $category->name }}</a>
        </li>
    @empty
        Нет категорий
    @endforelse
</ul>
@endsection
