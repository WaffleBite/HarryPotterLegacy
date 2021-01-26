<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\HomePageController;
use \App\Http\Controllers\BlogPostController;
use \App\Http\Controllers\TagController;
use \App\Http\Controllers\ShopController;
use \App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [HomePageController::class, 'index'])->name('home');
});

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index']) ->name('shop.index');
Route::get('/shop/category/{id}', [ShopController::class, 'listByCat']) ->name('shop.category');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.shop');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');


//------------------------ admin pages
Route::get('/dashboard', function () {
    return view('admin.adminhome');
})->middleware(['auth'])->name('dashboard');

// -----------------------Blog
Route::get('/dashboard/posts', [BlogPostController::class, 'index'])->name('posts.index');
Route::get('/dashboard/createarticle', [BlogPostController::class, 'create'])->name('admin.create.article');
Route::post('/dashboard/posts', [BlogPostController::class, 'store'])->name('blog.store');

Route::get('/dashboard/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/dashboard/createtag', [TagController::class, 'create'])->name('admin.create.tag');
Route::post('/dashboard/tags', [TagController::class, 'store'])->name('tag.store');

// -----------------------Shop
//products
Route::get('/dashboard/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/dashboard/createproduct', [ProductController::class, 'create'])->name('create.product');
Route::post('/dashboard/products', [ProductController::class, 'store'])->name('product.store');
//categories
Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/dashboard/createcategory', [CategoryController::class, 'create'])->name('create.category');
Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('category.store');

require __DIR__.'/auth.php';
