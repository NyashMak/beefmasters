<?php

use Illuminate\Support\Facades\Route;

//Admin Controllers
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

//BeefMaster Controllers
use App\Http\Controllers\BMProductController;
use App\Http\Controllers\BMHomeController;
// use App\Http\Controllers\BMCartController;



// Shop_Front Routing
Route::get('/', [BMHomeController::class, 'index']
)->name('home');


Route::get('/about', function () {
    return view('shop_front.about');
})->name('about');

Route::resource('shop',BMProductController::class);
// Route::post('cart', BMCartController::class);


Route::get('/show', function () {
    return view('shop_front.show');
})->name('show');
Route::get('/cart', function () {
    return view('shop_front.cart');
})->name('cart');
Route::get('/contact', function () {
    return view('shop_front.contact');
})->name('contact');
//Checkout Routing
Route::get('/checkout', function () {
    return view('shop_front.checkout');
})->name('checkout');
Route::get('/payment', function () {
    return view('shop_front.payment');
})->name('payment');
Route::get('/receipt', function () {
    return view('shop_front.receipt');
})->name('receipt');



// Admin Routing
//Must prefix the routes with Admin when creating the middleware
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard');
// Categories Routing
Route:: resource('categories', CategoryController::class);
// Products Routing

Route::resource('products', ProductController::class);
Route::post('product/delete', [ProductController::class, 'delete'])->name('delete-product');

// BeefMasters Routing
// Must prefix the routes with BeefMasters when creating the middleware