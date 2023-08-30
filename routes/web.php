<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\HomeShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;

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

/*Route::resource('/',homeController::class)->names([
    'index' => 'home' ,
]);



Route::middleware('Admin')->group(function(){
*/
Route::resource('admin', AdminController::class);
Route::resource('AdminUser' , AdminUserController::class);
Route::resource('AdminProduct', AdminProductController::class);
Route::resource('AdminCategory' , AdminCategoryController::class);
Route::get('OrderStatus/{id}/{status}' , [AdminOrderController::class , 'status_update'])->name('UpdateStatus');
Route::resource('order', AdminOrderController::class);

/*});*/



