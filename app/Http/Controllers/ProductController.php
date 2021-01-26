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
        $product = new Product();

        $product -> name = $request->input('name');
        $product -> price = $request->input('price');
        $product -> itemDescription = $request->input('itemDescription');
        $product -> categorySlug = $request->input('categorySlug');
        $product -> image = $request->input('image');

        $product -> save();

        return redirect('/dashboard/products') -> with('mssg', 'Product created!');
    }
}
