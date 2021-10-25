<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;


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

Route::get('/product', [ProductController::class, 'list'])
->name('product-list');
Route::get('/product/{product}', [ProductController::class, 'show'])
->name('product-view');

Route::get('/shop', [ShopController::class, 'list'])
->name('shop-list');
Route::get('/shop/{shop}', [ShopController::class, 'show'])
->name('shop-view');

Route::get('/product/create',
[ProductController::class, 'createForm']
)->name('product-create-form');

Route::post('/product/create',
[ProductController::class, 'create']
)->name('product-create');

Route::get('/product/{product}/update',
[ProductController::class, 'updateForm']
)->name('product-update-form');

Route::post('/product/{product}/update',
[ProductController::class, 'update']
)->name('product-update');

Route::get('/product/{product}/delete',
[ProductController::class, 'delete']
)->name('product-delete');

Route::get('/product/{product}/shop',
[ProductController::class, 'showShop']
)->name('product-view-shop');

Route::get('/auth/login', [LoginController::class, 'loginForm'])
->name('login'); // name this route to login by default setting.

Route::post('/auth/login', [LoginController::class, 'authenticate'])
->name('authenticate');

Route::get('/auth/logout', [LoginController::class, 'logout'])
->name('logout');