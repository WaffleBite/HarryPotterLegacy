@extends('layouts.welcome')

@section('content')
    <div id="news-header"></div>
    <div id="news" class="max-width mx-auto sm:px-6 lg:px-8">
        <div class="news-container">
            <div class="articles-container">
                @foreach($news as $item)
                    <div class="newsArticle">
                        <div class="newsImage"><img src="{{Storage::disk('local')->url($item->smallPic)}}" alt="{{$item->title}}"></div>
                        <div>
                            <a href="/news/{{$item['id']}}"><h2 class="news-article-title">{{$item['title']}}</h2></a>
                            <p>{{$item->description}}</p>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="tags-container">
                @foreach($tags as $tag)
                        <a href="{{route('tag', $tag->tagSlug)}}">
                            <div class="tag-item">
                                <p>{{$tag->tagName}}</p>
                            </div>
                        </a>
                @endforeach
            </div>
        </div>
        <div class="pagination">
            {{ $news->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection
