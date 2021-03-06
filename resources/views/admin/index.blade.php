@extends('base')
@section('title')
    Главная страница
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <h1>Админка</h1>
                <p>
                    <a class="btn btn-success" href='{{route('admin::user::index')}}'>Пользователи</a>
                    <a class="btn btn-success" href='{{route('admin::news::create')}}'>Добавить новость</a>
                    <a class="btn btn-success" href='{{route('admin::category::create')}}'>Добавить категорию</a>
                    <a class="btn btn-success" href='{{route('admin::news::find')}}'>Найти новость</a>
                    <a class="btn btn-success" href='{{route('parser')}}'>Спарсить новости</a>
                </p>
            </div>
        </div>
            <h2>Все новости</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <div class="list-group">
                @forelse($news as $item)
                    <div class="list-group-item">
                        <h3>{{ $item->title }}</h3>
                        <a class="btn btn-primary" href="{{ route('admin::news::update', ['news' => $item->id]) }}">
                            Редактировать
                        </a>
                        <a class="btn btn-danger" href="{{ route('admin::news::delete', ['id' => $item->id]) }}">
                            Удалить
                        </a>
                    </div>
                @empty
                    Новостей нет
                @endforelse
                <hr>
            </div>
            <div class="row justify-content-center">
                {{$news->links()}}
            </div>
        </div>
    </div>
@endsection
