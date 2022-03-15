@extends('base')
@section('title')
    Пользователи
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1>Пользователи</h1>
                <p>
                    <a class="btn btn-success" href='{{route('admin::user::create')}}'>Добавить</a>
                </p>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="list-group">
                @forelse($user as $item)
                    <div class="list-group-item">
                        <h1>{{ $item->name }}</h1>
                        <a class="btn btn-primary" href="{{ route('admin::user::update', ['user' => $item]) }}">
                            Редактировать
                        </a>
                        <a class="btn btn-danger" href="{{ route('admin::user::delete', ['id' => $item->id]) }}">
                            Удалить
                        </a>
                    </div>
                @empty
                    Пользователей нет
                @endforelse
                <hr>
            </div>
            <div class="row justify-content-center">
                {{$user->links()}}
            </div>
        </div>
    </div>
@endsection
