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
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', 'Auth\LoginController@showForm')->name('login'); 

Route::post('/login', 'Auth\LoginController@processForm'); 

Route::post('/logout', 'Auth\LoginController@logoutUser')->name('logout'); 

Route::get('/create_card')->middleware('auth')->name('create_card');