<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\News;

class NewsController extends Controller
{
    function index(){
        $posts = News::where('published', 'published')->orderBy('created_at', 'DESC')->paginate(4);
        $tags = Tag::orderBy('tagName')->get();

        return view('news.news', [
            'news' => $posts,
            'tags' => $tags
        ]);
    }

    function show($id){
        $data = News::find($id);
        $random = News::all()->take(3);
        $latest = News::latest()->where('published', 'published')->take(5)->get();

        return view('news.newsDetail', [
            'news' => $data,
            'latest' => $latest,
            'random' => $random
        ]);
    }

    function listByTag(Tag $tag)
    {
        $posts = $tag->news();
        $tags = Tag::orderBy('tagName')->get();

        return view('news.news', [
           'news' => $posts,
            'tags' => $tags
        ]);

    }
}
