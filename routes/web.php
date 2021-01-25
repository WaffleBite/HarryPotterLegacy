<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\HomePageController;

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
Route::get('/shop', [ProductController::class, 'index']) ->name('shop.index');
Route::get('/shop/category/{id}', [ProductController::class, 'listByCat']) ->name('shop.category');
Route::get('/shop/{id}', [ProductController::class, 'show'])->name('shop.shop');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
