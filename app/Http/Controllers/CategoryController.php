<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = Category::all();

        return view('admin.shop.categories')->with([
            'categories' => $data
        ]);
    }


    public function create()
    {
        return view('admin.shop.createCategory');
    }


    public function store(Request $request)
    {
        $category = new Category();

        $category -> name = $request->input('name');
        $category -> slug = $request->input('slug');

        $category -> save();

        return redirect('/dashboard/categories') -> with('mssg', 'Category created!');
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
