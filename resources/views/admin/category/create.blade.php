@extends('base')
@section('title')
    Создать категорию
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'admin::category::save']) !!}
    @csrf
    <h2>Создание категории</h2>
    @if($category->id ?? false)
        <input type="hidden" name="id" value="{{$category->id}}">
    @endif
    <div class="mb-3">
        <label class="form-label" for="title">{{(__('labels.title'))}}</label>
        {!! Form::text('title', $category->name ?? "", ['placeholder' => 'Введите название', 'class'=>"form-control"]) !!}
    </div>
    <div>
        {!! Form::submit('Save', ['class' => "btn btn-primary"]) !!}
    </div>
    <br>
    @if (session('success'))
        <div class="alert alert-success">
            <p class="form-text">{{ session('success') }}</p>
        </div>
    @endif
    {!! Form::close() !!}
    <h2>Все категории</h2>
    @if($categories ?? false)
        @forelse($categories as $item)
            <div style='margin: 15px; padding: 5px; width: 400px; text-align: center; border: rgba(45,55,72,0.19) 1px solid'>
                <h1>{{ $item->name }}</h1>
                <a href="{{ route('admin::category::update', ['id' => $item->id]) }}">Редактировать</a>
                <a href="{{ route('admin::category::delete', ['id' => $item->id]) }}">Удалить</a>
            </div>
        @empty
            Категорий нет
        @endforelse
    @endif
    {!! Form::close() !!}
    @if($categories ?? false)
    <div class="row justify-content-center">
        {{$categories->links()}}
    </div>
    @endif
@endsection
