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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/profile/{id}', 'UserController@show')->name('profile')->middleware('auth');;

Route::get('character/create', 'CharacterController@create')->middleware('auth');;
Route::get('character/sheet/{id}', 'CharacterController@show')->middleware('auth');;
Route::post('character/save', 'CharacterController@store')->middleware('auth');;
Route::post('character/update', 'CharacterController@update')->middleware('auth');;
