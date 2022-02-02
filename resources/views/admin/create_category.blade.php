@extends('base')

@section('content')
    {!! Form::open(['route' => 'admin::news::createCategory']) !!}
    @csrf
        <label for="title">Название категории</label>
    <div>
        {!! Form::text('title') !!}
    </div>
    <div>
        {!! Form::submit('Send') !!}
    </div>
    {!! Form::close() !!}
    @if (isset($category))
        <p>Категория '{{$category}}' успешно добавлена</p>
    @endif
@endsection
