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
