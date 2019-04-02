<?php

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

Auth::routes();

Route::resource('products','ProductController');

Route::get('/shop', 'ProductController@shop')->name('shop');

Route::get('/profile', 'UserController@profile')->middleware('auth')->name('profile');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/cart', 'CartController@index')->name('cart.index');
