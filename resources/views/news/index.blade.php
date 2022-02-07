@extends('base')
@section('content')
<div>
    <h1>Приветственная страница</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href='{{route('news::index')}}'>Все новости</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href='{{route('news::categories')}}'>Категории новостей</a>
        </li>
    </ul>
@if($news ?? false)
    @forelse ($news as $new)
            <div class="col-md-8">
                <div class="card" style="width: 40rem; padding: 10px">
                    <h1>{{ $new->title }}</h1>
                    <p>{{ $new->content }}</p>
                </div>
            </div>
    @empty
        Нет новостей
    @endforelse
    <div class="row justify-content-center">
        {{$news->links()}}
    </div>
@endif
@endsection


