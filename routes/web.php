<?php

use Illuminate\Support\Facades\Route;

//Admin Controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DiscountController;

//BeefMaster Controllers
use App\Http\Controllers\BMProductController;
use App\Http\Controllers\BMCartController;
use App\Http\Controllers\BMHomeController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentDetailController;



// Shop_Front Routing
Route::get('/', [BMHomeController::class, 'index']
)->name('home');


Route::get('/about', function () {
    return view('shop_front.about');
})->name('about');

Route::get('/test', function () {
    return view('shop_front.test');
})->name('test');

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login-user', [UserController::class, 'loginUser'])->name('login-user');
Route::get('/register-user', [UserController::class, 'create'])->name('register-user');
Route::post('/create-account', [UserController::class, 'store'])->name('create-user');

Route::resource('/shop',BMProductController::class);
Route::post('/add-to-cart', [BMCartController::class, 'add_to_cart'])->name('add-to-cart');
Route::get('/view-cart', [BMCartController::class, 'index'])->name('view-cart');
Route::post('/update-cart', [BMCartController::class, 'update'])->name('update-cart');
Route::post('/checkout', [BMCartController::class, 'checkout'])->name('checkout')->middleware('isLoggedIn');

// Route::get('/payment-successful/firstname/{firstname}/order_nr/{order_nr}/total/{total}', [PaymentDetailController::class, 'successful'])->name('successful');
Route::get('/payment-successful', [PaymentDetailController::class, 'successful'])->name('successful');
Route::get('/payment-cancelled', [PaymentDetailController::class, 'cancel'])->name('cancelled');
// Route::get('/payment-successful/{firstname}/{order_nr}/{total}', [PaymentDetailController::class, 'successful'])->name('successful');
// Route::get('/payment-cancelled', [PaymentDetailController::class, 'cancel'])->name('cancelled');


Route::get('/show', function () {
    return view('shop_front.show');
})->name('show');
// Route::get('/cart', function () {
//     return view('shop_front.cart');
// })->name('cart');
Route::get('/contact', function () {
    return view('shop_front.contact');
})->name('contact');
Route::get('/payment', function () {
    return view('shop_front.payment');
})->name('payment');
Route::get('/receipt', function () {
    return view('shop_front.receipt');
})->name('receipt');



// ADMIN Routing
Route::get('/admin/login', [AdminUserController::class, 'login'])->name('login-page');
Route::post('admin-login/login-user', [AdminUserController::class, 'checkUser'])->name('login-admin');

//Add Middleware
Route::middleware('isAdminUser')->prefix('/admin')->group(function () { 

Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

// Users Routing
Route::resource('users', AdminUserController::class);
Route::get('/admin-logout', [AdminUserController::class, 'logout'])->name('logout-admin');

// Orders Routing
Route::resource('orders', OrderDetailController::class);

// Categories Routing
Route:: resource('categories', CategoryController::class);
Route:: post('category/delete', [CategoryController::class, 'delete'])->name('delete-category');

// Products Routing
Route::resource('products', ProductController::class);
Route::post('product/delete', [ProductController::class, 'delete'])->name('delete-product');

// Discounts Routing
Route::resource('discounts', DiscountController::class);

// Customers Routing
Route::get('customers', [UserController::class, 'customers'])->name('list-customers');
Route::get('customer/{id}', [UserController::class, 'showCustomer'])->name('show-customer');

});
