@extends('layouts.welcome')

@section('content')
    <div id="news-header"></div>
    <div id="news" class="max-width mx-auto sm:px-6 lg:px-8">
        <div class="news-container">
            <div class="articles-container">
                @foreach($news as $item)
                    <div class="newsArticle">
                        <div class="newsImage"><img src="{{$item->picture}}" alt="{{$item->title}}"></div>
                        <div>
                            <a href="/news/{{$item['id']}}"><h2>{{$item['title']}}</h2></a>
                            <p>{{$item->description}}</p>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="tags-container">
                    <p>store</p>
                    <p>membership</p>
                    <p>patronus</p>
                    <p>update</p>
            </div>
        </div>
    </div>
@endsection
