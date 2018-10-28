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
    return view('landing');
});

Route::get('/landing', function() {
    return view('landing');
});

Route::get('/masuk', function() {
    return view('login');
});

Route::view('/admin', 'admin.users.index');

Route::get('/{test}', function($test) {
    return $test;
})->name('ajax');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
