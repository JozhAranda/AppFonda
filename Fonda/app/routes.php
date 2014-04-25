<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function (){
   return Redirect::to('auth/welcome');
});

//Route::get('/','AuthController@getWelcome');
//Route::get('/', 'HomeController@index');
Route::controller('home', 'HomeController');
Route::controller('auth', 'AuthController');
Route::resource('type_user', 'TypeUserController');
Route::resource('users', 'UsersController');
Route::resource('foods', 'FoodsController');
Route::resource('orders', 'OrdersController');

Route::get('orders/show/{number}', 'OrdersController@show');