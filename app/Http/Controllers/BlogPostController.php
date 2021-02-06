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
            'description' => 'required',
            'picture' => 'required',
            'smallPic' => 'required'
        ]);

        if ($request->hasFile('picture')) {
            $pictureName = $request->picture->store('public');
        }

        if ($request->hasFile('smallPic')) {
            $smallPicName = $request->smallPic->store('public');
        }

        $post = new News();

        $post -> picture = $pictureName;
        $post -> smallPic = $smallPicName;
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

        if($request->hasFile('picture'))
        {
            $pictureName = $request->picture->store('public');
            $post -> picture = $pictureName;
        }else{
            $request->except(['picture']);
        }
        if($request->hasFile('smallPic'))
        {
            $smallPicName = $request->smallPic->store('public');
            $post -> smallPic = $smallPicName;
        }else{
            $request->except(['smallPic']);
        }

        $post -> title = $request->input('title');
        $post -> content = $request->input('content');
        $post -> writtenBy = $request->input('writtenBy');
        $post -> description = $request->input('description');
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
