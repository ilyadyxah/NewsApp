@extends('base')
@section('content')
    <div style='margin: 15px; width: 400px; text-align: center'>
        <h3>{{ $news->title }}</h3>
        <p>{{ $news->content }}</p>
    </div>
@endsection

