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
        $this->validate($request, [
            'title'  => 'required',
            'content' => 'required',
            'writtenBy' => 'required',
            'description' => 'required'
        ]);

        $post = new News();

        $post -> title = $request->input('title');
        $post -> content = $request->input('content');
        $post -> writtenBy = $request->input('writtenBy');
        $post -> description = $request->input('description');
        $post -> smallPic = $request->input('smallPic');
        $post -> picture = $request->input('picture');
        $post -> published = $request->input('published');
        $post -> save();
        $post -> tags()->sync($request->tags);

        return redirect('/dashboard/posts') -> with('mssg', 'Post published!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = News::with('tags')->findOrFail($id);
        $tags = Tag::all();

        return view('admin.blog.edit', [
            'news' => $data,
            'tags' => $tags
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'  => 'required',
            'content' => 'required',
            'writtenBy' => 'required',
            'description' => 'required'
        ]);

        $post = News::find($id);

        $post -> title = $request->input('title');
        $post -> content = $request->input('content');
        $post -> writtenBy = $request->input('writtenBy');
        $post -> description = $request->input('description');
        $post -> smallPic = $request->input('smallPic');
        $post -> picture = $request->input('picture');
        $post -> published = $request->input('published');
        $post -> tags()->sync($request->tags);

        $post -> save();

        return redirect('/dashboard/posts') -> with('mssg', 'Post updated!');

    }


    public function destroy($id)
    {
        $post = News::findOrFail($id);
        $post->delete();

        return redirect('/dashboard/posts') -> with('mssg', 'Post deleted!');
    }
}
