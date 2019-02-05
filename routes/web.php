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
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', 'Auth\LoginController@showForm')->name('login'); 
Route::post('/login', 'Auth\LoginController@processForm'); 

Route::post('/logout', 'Auth\LoginController@logoutUser')->name('logout'); 

Route::get('/register', 'Auth\RegisterController@showForm')->name('register');
Route::post('/register', 'Auth\RegisterController@processForm');

Route::get('/create_set', 'AppLogic\CardSetController@showForm')->middleware('auth')->name('create_set');
Route::post('/create_set', 'AppLogic\CardSetController@processForm');