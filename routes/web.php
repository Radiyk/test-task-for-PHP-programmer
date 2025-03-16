<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::prefix('orders')->group(function () {
    Route::get('/', 'App\Http\Controllers\OrderController@listOrders')->name('orders');
    Route::post('/add', 'App\Http\Controllers\OrderController@addOrders')->name('orders.add');
    Route::get('/{id}', 'App\Http\Controllers\OrderController@order')->name('order');
    Route::post('/update/{id}', 'App\Http\Controllers\OrderController@updateOrderStatus')->name('updateOrderStatus');
});

Route::prefix('products')->group(function () {
    Route::get('/', 'App\Http\Controllers\ProductsController@listProducts')->name('products');
    Route::post('/add', 'App\Http\Controllers\ProductsController@addProduct')->name('products.add');
    Route::post('/edit', 'App\Http\Controllers\ProductsController@editProduct')->name('products.edit');
    Route::get('/{id}', 'App\Http\Controllers\ProductsController@product')->name('product');
    Route::post('/delete/{id}', 'App\Http\Controllers\ProductsController@deleteProduct')->name('products.delete');
});
