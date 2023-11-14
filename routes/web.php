<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\FlashsaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/admin/login', [AccountController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AccountController::class, 'check_login'])->name('admin.login');
Route::get('/admin/register', [AccountController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AccountController::class, 'post_register'])->name('admin.register');

Route::group(['prefix' => 'admin', 'middleware' =>'auth'], function() {
    Route::get('/', [CategoryController::class, 'home'])->name('admin.home');
    Route::get('/admin/logout', [AccountController::class, 'logout'])->name('admin.logout');
    
    Route::group(['prefix' => 'category'], function() {
        Route::get('/list', [CategoryController::class, 'list'])->name('admin.category.list');
        Route::post('/list', [CategoryController::class, 'postlist'])->name('admin.category.list');

        Route::get('/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/{category}/id', [CategoryController::class, 'update'])->name('admin.category.update');

        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });

    Route::group(['prefix' => 'product'], function() {
        Route::get('/list', [ProductController::class, 'list'])->name('admin.product.list');

        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [ProductController::class, 'postcreate'])->name('admin.product.create');

        Route::get('/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/{product}/id', [ProductController::class, 'update'])->name('admin.product.update');


        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

    });
    
    Route::group(['prefix' => 'flash-sales'], function () {
        Route::get('/list',[FlashsaleController::class, 'list'])->name('flash-sales.list');
        Route::put('/update/{time}', [FlashsaleController::class, 'update'])->name('flash-sales.update');
      
    });
});


Route::group(['prefix' => ''], function () {
    Route::get('/', [CustomerController::class, 'home'])->name('customer.home');
    Route::get('/product', [CustomerController::class, 'product'])->name('customer.product');
    Route::get('/about', [CustomerController::class, 'about'])->name('customer.about');

    Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
    Route::post('/login', [CustomerController::class, 'check'])->name('customer.login');

    Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');


    Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
    Route::post('/register', [CustomerController::class, 'post_register'])->name('customer.register');
    
    
    Route::post('/', [CustomerController::class, 'contact'])->name('customer.contact');

    Route::get('/profile', [CustomerController::class, 'profile'])->name('customer.profile')->middleware('cus');
    Route::put('/profile/{profile_id}', [CustomerController::class, 'update_profile'])->name('customer.update_profile');
    Route::put('/customer/change-password',[CustomerController::class, 'changePassword'])->name('customer.changePassword');
});


Route::group(['prefix' => 'cart'], function(){
    Route::get('/view', [CartController::class, 'view'])->name('cart.view')->middleware('cus');
    Route::get('/add/{product}/{quantity?}', [CartController::class, 'add'])->name('cart.add')->middleware('cus');
    Route::get('/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/update/{product}/{quantity?}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');

    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/checkout', [CartController::class, 'post_checkout'])->name('cart.post_checkout');
    Route::get('/my_order', [CartController::class, 'my_order'])->name('cart.my_order');
    Route::get('/detail/{orders}', [CartController::class, 'detail'])->name('cart.detail');
    Route::get('/orderEmail/{token}', [CartController::class, 'orderEmail'])->name('cart.orderEmail');


});
Route::group(['prefix' => 'productDetail'], function(){
    Route::get('/{product}', [ProductDetailController::class, 'view'])->name('comment.view');
    Route::post('/add/{product}', [ProductDetailController::class, 'add'])->name('comment.add')->middleware('cus');
    Route::match(['get', 'post'],'/remove/{product}', [ProductDetailController::class, 'remove'])->name('comment.remove')->middleware('cus');
    // reply
    Route::post('/reply', [ProductDetailController::class, 'reply'])->name('comment.reply');
    Route::match(['get', 'post'],'/reply/remove/{reply_id}', [ProductDetailController::class, 'reply_remove'])->name('comment.reply_remove')->middleware('cus');
    Route::post('/ratting', [ProductDetailController::class, 'rate'])->name('rating.rate')->middleware('cus');
});

Route::group(['middleware' => 'cus'], function () {
    // Route để xem danh sách mục yêu thích
    Route::get('/favorites', [FavoriteController::class, 'view'])->name('favorites.view');


    // Route để thêm mục yêu thích
    Route::match(['get', 'post'],'/favorites/add/{product_id}', [FavoriteController::class, 'add'])->name('favorites.add');

    // Route để xóa mục yêu thích
    Route::match(['get', 'post'],'/favorites/remove/{product_id}', [FavoriteController::class, 'remove'])->name('favorites.remove');
});