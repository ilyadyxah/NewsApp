@extends('base')

@section('content')
    {!! Form::open(['route' => 'admin::news::create']) !!}
    @csrf
    <label for="title">Название новости</label>
    <div>
        {!! Form::text('title') !!}
    </div>
    <label for="title">Автор</label>
    <div>
        {!! Form::text('author') !!}
    </div>
    <label for="title">Категория</label>
    <div>
        {!! Form::text('category') !!}
    </div>
    <label for="title">Текст</label>
    <div>
        {!! Form::textarea('content') !!}
    </div>
    <div>
        {!! Form::submit('Send') !!}
    </div>
    {!! Form::close() !!}
    <div>
        <p> {{ $response }}</p>
    </div>
@endsection
