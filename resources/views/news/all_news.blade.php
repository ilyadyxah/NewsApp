@extends('base')
@section('content')
    @foreach ($news as $new)
        <div style="display: flex">
            <div style='border: #2d3748 1px solid; margin: 10px; padding: 5px; width: 400px'>
                <h1>{{ $new->title }}</h1>
                <p>{{ $new->content }}</p>
            </div>
        </div>
    @endforeach
@endsection
