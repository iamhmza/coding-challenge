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

// Product
Route::get('/products', 'ProductsController@index');
Route::post('/product/store', 'ProductsController@store');
Route::delete('/product/{product}', 'ProductsController@destroy');

// Category
Route::get('/categories', 'CategoryController@index');
Route::post('/category/store', 'CategoryController@store');
Route::delete('/category/{category}', 'CategoryController@destroy');

// Spa
Route::view('/{any}', 'app')->where('any', '.*');
