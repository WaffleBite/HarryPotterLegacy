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

//shop
Route::get('/shop', [ShopController::class, 'index']) ->name('shop.index');
Route::get('/shop/category/{id}', [ShopController::class, 'listByCat']) ->name('shop.category');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.shop');

//blog
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news/tag/{tag}', [NewsController::class, 'listByTag'])->name('tag');

//------------------------ admin pages
Route::get('/dashboard', function () {
    return view('admin.adminhome');
})->middleware(['auth'])->name('dashboard');

// -----------------------Blog
//articles
Route::get('/dashboard/posts', [BlogPostController::class, 'index'])->name('posts.index');
Route::get('/dashboard/createarticle', [BlogPostController::class, 'create'])->name('admin.create.article');
Route::post('/dashboard/posts', [BlogPostController::class, 'store'])->name('blog.store');
Route::get('/dashboard/editpost/{id}', [BlogPostController::class, 'edit'])->name('news.edit');
Route::put('/dashboard/posts/{id}', [BlogPostController::class, 'update'])->name('news.update');
Route::delete('/dashboard/posts/{id}', [BlogPostController::class, 'destroy'])->name('news.destroy');


//tags
Route::get('/dashboard/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/dashboard/createtag', [TagController::class, 'create'])->name('admin.create.tag');
Route::post('/dashboard/tags', [TagController::class, 'store'])->name('tag.store');
Route::get('/dashboard/edittag/{id}', [TagController::class, 'edit'])->name('tag.edit');
Route::put('/dashboard/tags/{id}', [TagController::class, 'update'])->name('tag.update');
Route::delete('/dashboard/tags/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

// -----------------------Shop
//products
Route::get('/dashboard/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/dashboard/createproduct', [ProductController::class, 'create'])->name('create.product');
Route::post('/dashboard/products', [ProductController::class, 'store'])->name('product.store');
Route::get('/dashboard/editproduct/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/dashboard/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/dashboard/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
//categories
Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/dashboard/createcategory', [CategoryController::class, 'create'])->name('create.category');
Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('/dashboard/editcategory/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/dashboard/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/dashboard/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

require __DIR__.'/auth.php';
