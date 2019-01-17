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

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/user/profile/{user}', 'UserController@show')
    ->name('profile')
    ->middleware('auth');

Route::get('/character/create', 'CharacterController@new')
    ->name('character.sheet.new');

Route::post('/user/profile/{user}', 'CharacterController@create')
    ->name('character.store');
    
Route::get('/character/sheet/{character}', 'CharacterController@show')
    ->name('character.sheet.show')
    ->middleware('auth');

Route::post('/user/profile/{user}', 'CharacterController@update')
    ->name('character.update');
    
Route::post('character/update', 'CharacterController@update')
    ->name('character.sheet.update')
    ->middleware('auth');
