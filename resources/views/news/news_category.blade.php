@extends('base')
@section('content')
    @foreach ($news as $key => $item)
        @if ($item['category'] == $id)
            @php
                $url = route('news::card', ['id' => $key]);
                $count ++;
            @endphp
            <div style="display: flex">
                <div style='border: #2d3748 1px solid; margin: 10px; padding: 5px'>
                    <h1><a href={{ $url }}>{{ $item['title'] }}</a></h1>
                    <p>{{ $item['brief_content'] }}</p>
                </div>
            </div>
        @endif
        @if ($loop->last && $count == 0)
            <p>Нет новостей по данной категории</p>
        @endif
    @endforeach
@endsection

