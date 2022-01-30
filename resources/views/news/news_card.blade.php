@extends('base')
@section('content')
    <div style='margin: 15px; width: 400px; text-align: center'>
        <h1>{{ $news[$id]['title'] }}</h1>
        <p>{{ $news[$id]['content' ]}}</p>
    </div>
@endsection

