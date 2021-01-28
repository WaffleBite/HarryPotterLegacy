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
        $this->validate($request, [
            'name'  => 'required',
            'slug' => 'required'
        ]);

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
        $category = Category::findOrFail($id);

        return view('admin.shop.editCategory', [
            'category' => $category
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required',
            'slug' => 'required'
        ]);

        $category = Category::find($id);

        $category -> name = $request->input('name');
        $category -> slug = $request->input('slug');

        $category -> save();

        return redirect('/dashboard/categories') -> with('mssg', 'Category updated!');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/dashboard/categories') -> with('mssg', 'Category deleted!');
    }
}
