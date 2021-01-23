@extends('layouts.welcome')

@section('content')
    <div>
        <div class="news-container">
            <h2>{{$news['title']}}</h2>
            <p>{{$news['content']}}</p>
        </div>
    </div>
@endsection
