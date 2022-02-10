@extends('base')

@section('content')
    {!! Form::open(['route' => 'admin::news::find']) !!}
    @csrf
    <div class="mv-3">
        <label for="title">Название новости</label>
        {!! Form::text('title') !!}
    </div>
        {!! Form::submit('Найти', ['class' => "btn btn-primary"]) !!}
    {!! Form::close() !!}
    @if ($success)
        <div>
            {{$success}}
        </div>
    @endif
    @if($news)
        <div style='margin: 15px; width: 400px; text-align: center'>
            <h1>{{ $news->title }}</h1>
            <p>{{ $news->content }}</p>
        </div>
        <a href="{{ route('admin::news::update', ['news' => $news->id]) }}">Редактировать</a>
        <a href="{{ route('admin::news::delete', ['id' => $news->id]) }}">Удалить</a>
    @endif
@endsection
