<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = News::all();

        return view('admin.blog.posts')->with([
            'news' => $data
        ]);
    }

    public function create()
    {
        $data = Tag::all();

        return view('admin.blog.create')->with([
            'tags' => $data
        ]);
    }

    public function store(Request $request)
    {
        $post = new News();

        $post -> title = $request->input('title');
        $post -> postDescription = $request->input('postDescription');
        $post -> content = $request->input('content');
        $post -> writtenBy = $request->input('writtenBy');
        $post -> tag = $request->input('tag');
        $post -> image = $request->input('image');

        $post -> save();

        return redirect('/dashboard') -> with('mssg', 'Post published!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
