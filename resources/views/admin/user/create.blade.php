@extends('base')
@section('title')
    Пользователи
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h3>{{ $title}}</h3>
    {!! Form::open(['route' => 'admin::user::save']) !!}
    @csrf
    @if($user->id)
        <input type="hidden" name="id" value="{{$user->id}}">
    @endif
    <div class="mb-3">
        <label class="form-label">Имя пользователя</label>
        {!! Form::text('name', $user->name ?? old('name'), ['class' => "form-control"]) !!}
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Почта</label>
        {!! Form::text('mail', $user->email ?? old('mail'), ['class' => "form-control"]) !!}
        @error('mail')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Пароль</label>
        {!! Form::password('password', ['class' => "form-control"]) !!}
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Роль</label>
        {!! Form::select('role', ['1' => 'admin', '' => 'user'], ['class' => "form-control"]) !!}
        @error('role')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <div>
        {!! Form::submit(__('labels.button_save'), ['class' => "btn btn-primary"]) !!}
    </div>
    {!! Form::close() !!}
@endsection
