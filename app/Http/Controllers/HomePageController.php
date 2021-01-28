<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    function index(){
        $articles = News::latest()->take(3)->get();

        return view('home',
            ['articles' => $articles]);
    }
}
