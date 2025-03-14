<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('orders', 'App\Http\Controllers\OrderController@listOrders')->name('orders');
Route::get('order/{id}', 'App\Http\Controllers\OrderController@order')->name('order');
Route::get('orderUpdate/{id}', 'App\Http\Controllers\OrderController@updateOrderStatus')->name('updateOrderStatus');
Route::get('products', 'App\Http\Controllers\ProductsController@listProducts')->name('products');
Route::get('product/{id}', 'App\Http\Controllers\ProductsController@product');
Route::get('product_del/{id}', 'App\Http\Controllers\ProductsController@deleteProduct');

Route::post('orderAdd', 'App\Http\Controllers\OrderController@addOrders');
Route::post('productAdd', 'App\Http\Controllers\ProductsController@productAdd');
Route::post('productEdit', 'App\Http\Controllers\ProductsController@productEdit');
