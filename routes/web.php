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

Route::get('/',  'HomeController@index');
Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);
Route::get('/vymaz1/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);
Route::get('/vymazcele/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.removeItem'
]);
Route::get('/shoppingCart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);
Route::get('/checkout', [
    'uses' => 'OrderController@getCheckout',
    'as' => 'checkout'
]);
Route::post('/checkout', [
    'uses' => 'OrderController@postCheckout',
    'as' => 'checkout'
]);

Route::resource('users', 'UserController');
Route::get('/products', 'ProductController@index');
Route::get('/products/sort', 'ProductController@sortDesc')->name('sorted');
Route::get('/products/sortAsc', 'ProductController@sortAsc')->name('sortedAsc');
Route::get('/productdetail/{id}', 'DetailController@index')->name('game');
Route::get('/shoppingCartDetail', 'ShoppingCartController@next');
Route::resource('orders', 'OrderController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('products/list/{page}', 'ProductTestController@list');
