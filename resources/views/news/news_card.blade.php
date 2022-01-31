@extends('base')
@section('content')
    <div style='margin: 15px; width: 400px; text-align: center'>
        <h1>{{ $new->title }}</h1>
        <p>{{ $new->content }}</p>
    </div>
@endsection

