<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = Product::all();

        return view('admin.shop.products')->with([
            'products' => $data
        ]);
    }

    public function show($id){
        $data = Product::find($id);
        $categories = Category::all();

        return view('admin.shop.productDetail', [
            'product' => $data,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $data = Category::all();

        return view('admin.shop.create')->with([
            'categories' => $data
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'price' => 'required',
            'itemDescription' => 'required',
            'categorySlug' => 'required',
            'image' => 'required'
        ]);

        if($request->hasFile('image'))
        {
            $imageName = $request -> image->store('public');
        }

        $product = new Product();

        $product -> image = $imageName;
        $product -> name = $request->input('name');
        $product -> price = $request->input('price');
        $product -> itemDescription = $request->input('itemDescription');
        $product -> categorySlug = $request->input('categorySlug');

        $product -> save();

        return redirect('/dashboard/products') -> with('mssg', 'Product created!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $data = Category::all();

        return view('admin.shop.edit', [
            'product' => $product,
            'categories' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required',
            'price' => 'required',
            'itemDescription' => 'required',
            'categorySlug' => 'required'
        ]);

        $product = Product::find($id);

        if($request->hasFile('image'))
        {
            $imageName = $request -> image->store('public');
            $product -> image = $imageName;
        }else{
            $request->except(['image']);
        }

        $product -> name = $request->input('name');
        $product -> price = $request->input('price');
        $product -> itemDescription = $request->input('itemDescription');
        $product -> categorySlug = $request->input('categorySlug');

        $product -> save();

        return redirect('/dashboard/products') -> with('mssg', 'Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/dashboard/products') -> with('mssg', 'Product deleted!');
    }
}
