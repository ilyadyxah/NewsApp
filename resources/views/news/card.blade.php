@extends('base')
@section('content')
    <div style='margin: 15px; width: 400px; text-align: center'>
        <h1>{{ $news->title }}</h1>
        <p>{{ $news->content }}</p>
    </div>
@endsection

