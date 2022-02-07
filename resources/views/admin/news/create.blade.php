@extends('base')
@section('title')
    Создать новость
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1> {{ __('labels.title_create_news') }} </h1>
    {!! Form::open(['route' => 'admin::news::save']) !!}
    @csrf
    @if($model->id)
        <input type="hidden" name="id" value="{{$model->id}}">
    @endif
    <div class="mb-3">
        <label class="form-label">{{__('labels.title')}}</label>
        {!! Form::text('title', $model->title ?? old('title'), ['class' => "form-control"]) !!}
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{__('labels.author')}}</label>
        {!! Form::text('author', $author->name ?? "", ['class' => "form-control"]) !!}
        @error('author')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{__('labels.category')}}</label>
        {!! Form::select('category', $categories, $model->category_id, ['class' => "form-control"]) !!}
        @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{__('labels.content')}}</label>
        {!! Form::textarea('content', $model->content ?? old('content') ?? "", ['class' => "form-control"])  !!}
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        {!! Form::submit(__('labels.button_save'), ['class' => "btn btn-primary"]) !!}
    </div>
    {!! Form::close() !!}
@endsection
