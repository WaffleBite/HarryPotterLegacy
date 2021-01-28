<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Tag::all();

        return view('admin.blog.tags')->with([
            'tags' => $data
        ]);
    }


    public function create()
    {
        return view('admin.blog.createTag');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'tagName'  => 'required',
            'tagSlug' => 'required'
        ]);

        $tag = new Tag();

        $tag -> tagName = $request->input('tagName');
        $tag -> tagSlug = $request->input('tagSlug');

        $tag -> save();

        return redirect('/dashboard/tags') -> with('mssg', 'Tag created!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('admin.blog.editTags', [
            'tag' => $tag
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'tagName'  => 'required',
            'tagSlug' => 'required'
        ]);

        $tag = Tag::find($id);

        $tag -> tagName = $request->input('tagName');
        $tag -> tagSlug = $request->input('tagSlug');

        $tag -> save();

        return redirect('/dashboard/tags') -> with('mssg', 'Tag updated!');
    }


    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect('/dashboard/tags') -> with('mssg', 'Tag deleted!');
    }
}
