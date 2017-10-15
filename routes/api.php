<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Auth\\LoginController@login');
Route::post('register', 'Auth\\RegisterController@register');
Route::post('logout', 'Auth\\LoginController@logout');

/** Книги */
Route::get('book', 'Api\\BookController@index');
Route::get('book/{id}', 'Api\\BookController@show');

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('book', 'Api\\BookController@store');
    Route::put('book/{id}', 'Api\\BookController@update');
    Route::delete('book/{id}', 'Api\\BookController@destroy');
    Route::get('myBooks', 'Api\\BookController@my');
});
/** Книги */

/** Заказы */
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('order', 'Api\\OrderController@index');
    Route::get('order/{id}', 'Api\\OrderController@show');
    Route::post('order', 'Api\\OrderController@store');
    Route::put('order/{id}', 'Api\\OrderController@update');
    Route::delete('order/{id}', 'Api\\OrderController@destroy');
    Route::get('order_in', 'Api\\OrderController@inOrders');
    Route::get('order_out', 'Api\\OrderController@outOrders');
});
/** Заказы */

/** Авторы */
Route::get('author', 'Api\\AuthorController@index');
Route::get('author/{id}', 'Api\\AuthorController@show');
/** Авторы */
