<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/product-details', function () {
    return view('product-details');
})->name('product-details');
Route::get('/admin', [UserController::class, 'showbanner'])->name('admin');
Route::post('/store',[UserController::class, 'store'])->name('store');
Route::get('/',[UserController::class, 'show'])->name('show');
Route::get('/delete/{id}',[UserController::class, 'delete'])->name('delete');
Route::get('/editbanner/{id}', [UserController::class, 'edit'])->name('editbanner');
Route::post('/update',[UserController::class, 'update'])->name('update');
Route::post('/admin',[UserController::class, 'prostore'])->name('prostore');
Route::get('/product',[UserController::class, 'prodshow'])->name('prodshow');
Route::get('/deleteproduct/{id}',[UserController::class, 'prodelete'])->name('prodelete');
Route::get('/editproduct/{id}', [UserController::class, 'showproduct'])->name('showproduct');
Route::post('/editproduct', [UserController::class, 'editproduct'])->name('editproduct');
Route::get('/product-details/{id}', [UserController::class, 'productdetails'])->name('productdetails');
Route::get('/cart', [UserController::class, 'cart'])->name('cart');
Route::get('deletecart/{id}', [UserController::class, 'deletecart'])->name('deletecart');
Route::get('/addcart/{id}', [UserController::class, 'addcart'])->name('addcart');