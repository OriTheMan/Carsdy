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

Route::view('/login', 'login')->name('login'); 
Route::post('/login', 'Auth\LoginController@processForm'); 

Route::post('/logout', 'Auth\LoginController@logoutUser')->name('logout'); 

Route::view('/register', 'register')->name('register');
Route::post('/register', 'Auth\RegisterController@processForm');

Route::view('/create_set', 'create_set')->middleware('auth')->name('create_set');
Route::post('/create_set', 'AppLogic\CardSetController@processForm');

Route::get('/user/{id}/card_sets', 'AppLogic\ProfileController@showCardSets')->where(['id' => '[0-9]+'])->name('show_sets');

Route::get('/user/{id}/set/{set_id}', 'AppLogic\CardSetController@viewSet')->middleware('set.access')->name('show_set');