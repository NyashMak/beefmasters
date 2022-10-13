<?php

use Illuminate\Support\Facades\Route;

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
    return view('shop_front.home');
})->name('home');
Route::get('/about', function () {
    return view('shop_front.about');
})->name('about');
Route::get('/shop', function () {
    return view('shop_front.shop-page');
})->name('shop-page');
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
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard');