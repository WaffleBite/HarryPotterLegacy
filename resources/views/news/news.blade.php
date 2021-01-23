@extends('layouts.welcome')

@section('content')
    <div>
        <div class="news-container">
            @foreach($news as $item)
                <a href="/news/{{$item['id']}}">
                    <h2>{{$item['title']}}</h2>
                </a>

            @endforeach
        </div>
    </div>
@endsection
