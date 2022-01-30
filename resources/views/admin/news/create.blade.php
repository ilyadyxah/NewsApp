@extends('base')

@section('content')
    {!! Form::open(['route' => 'admin::news::create']) !!}
    @csrf
    <label for="title">Название новости</label>
    <div>
        {!! Form::text('title') !!}
    </div>
    <label for="title">Контент</label>
    <div>
        {!! Form::textarea('content') !!}
    </div>
    <div>
        {!! Form::submit('Send') !!}
    </div>
    {!! Form::close() !!}
@endsection
