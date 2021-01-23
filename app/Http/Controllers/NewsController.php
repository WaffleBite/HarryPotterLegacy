<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    function index(){
        $data = News::all();
        return view('news.news',
            ['news' => $data]);
    }

    function show($id){
        $data = News::find($id);
        return view('news.newsDetail',
            ['news' => $data]);
    }
}
