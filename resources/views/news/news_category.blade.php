@extends('base')
@section('content')
    @foreach ($news as $new)
            @php
                $url = route('news::card', ['id' => $new->id]);
                $count ++;
            @endphp
            <div style="display: flex">
                <div style='border: #2d3748 1px solid; margin: 10px; padding: 5px'>
                    <h1><a href={{ $url }}>{{ $new->title }}</a></h1>
                </div>
            </div>
        @if ($loop->last && $count == 0)
            <p>Нет новостей по данной категории</p>
        @endif
    @endforeach
@endsection

