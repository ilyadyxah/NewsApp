@extends('base')
@section('content')
    <div class="col-md-8">
        <div class="card" style="width: 40rem;">
            <ul class="list-group list-group-flush">
        @foreach ($news as $new)
            @php
                $url = route('news::card', ['id' => $new->id]);
                $count ++;
            @endphp
            <div>
                <li class="list-group-item">
                    <a class="btn btn-outline-primary" href={{ $url }}>{{ $new->title }}</a>
                </li>
            </div>
            @if ($loop->last && $count == 0)
                <div>
                    <li class="list-group-item">
                        <p>Нет новостей по данной категории</p>
                    </li>
                </div>
            @endif
        @endforeach
            </ul>
        </div>
    </div>
@endsection

