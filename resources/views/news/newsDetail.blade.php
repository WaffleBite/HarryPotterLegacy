@extends('layouts.welcome')

@section('content')
    <div class="max-width mx-auto sm:px-6 lg:px-8">
        <div class="news-container">
            <div class="news-title">
                <h2 class="news-article-title">{{$news['title']}}</h2>
                <small>{{$news->created_at->format('Y-m-d')}}</small>
            </div>
            <div class="news-image">
                <img src="{{Storage::disk('local')->url($news->picture)}}" alt="">
            </div>
            <div class="news-content"><p>{!! $news->content !!}}</p>
                <small style="color: #fff7ef;">Written By: {{$news->writtenBy}}</small></div>
        </div>

        <div id="news">
            <h2 style="text-align: center; font-size: 2rem">Keep Reading</h2>
            <div class="random-news">
                @foreach($random as $random)
                    <div class="newsArticle article-center">
                        <div class="newsImage"><img class="img-hover" src="{{Storage::disk('local')->url($random->smallPic)}}" alt="{{$random->title}}"></div>
                        <div>
                            <a href="/news/{{$random['id']}}"><h2 class="news-article-title">{{$random['title']}}</h2></a>
                            <p>{{$random->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div style="text-align: -webkit-center" id="news">
            <h2 style="text-align: center; font-size: 2rem">Recent News</h2>
            <div class="latest-news">
                @foreach($latest as $latest)
                    <a href="/news/{{$latest['id']}}">
                         <h2 style="margin: 0;" class="news-article-title">{{$latest->title}}</h2>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
