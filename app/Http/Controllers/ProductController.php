<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $data = Product::all();
        $categories = Category::all();

        return view('shop.products')->with([
            'products' => $data,
            'categories' => $categories
        ]);
    }

    public function show($id){
        $data = Product::find($id);
        $categories = Category::all();

        return view('shop.productDetail', [
            'product' => $data,
            'categories' => $categories
        ]);
    }

    public function listByCat($slug){
        $listProducts = Product::where('categorySlug', $slug)->get();
        $categories = Category::all();
        $categoryName = Category::select('name')->where('slug', $slug)->first();

        return view('shop.category')->with([
            'listProducts' => $listProducts,
            'categories' => $categories,
            'categoryName' => $categoryName
        ]);
    }
}
