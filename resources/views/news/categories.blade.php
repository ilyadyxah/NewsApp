@extends('base')
@section('content')
<h1>Категории</h1>
<ul>
    @forelse ($categories as $id => $name)
        @php
            $url = route('news::category', ['id' => $id]);
        @endphp
        <li>
            <a href='{{ $url }}'>{{ $name }}</a>
        </li>
    @empty
        Нет категорий
    @endforelse
</ul>
@endsection
