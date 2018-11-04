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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/user')->group(function() {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/create', 'UserController@create')->name('user.create');
    Route::post('/store', 'UserController@store')->name('user.store');
    Route::get('/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/{id}/update', 'UserController@update')->name('user.update');
    Route::delete('/{id}/delete', 'UserController@destroy')->name('user.delete');
});

Route::prefix('/karya')->group(function() {
    Route::get('/', 'KaryaMahasiswaController@index')->name('karya.index');
    ROute::get('/create', 'KaryaMahasiswaController@create')->name('karya.create');
    Route::post('/store', 'KaryaMahasiswaController@store')->name('karya.store');
    Route::get('/{id}/edit', 'KaryaMahasiswaController@edit')->name('karya.edit');
    Route::put('/{id}/update', 'KaryaMahasiswaController@update')->name('karya.update');
    Route::delete('/{id}/delete', 'KaryaMahasiswaController@destroy')->name('karya.delete');
});

Route::prefix('/kompetisi')->group(function() {
    Route::get('/', 'KompetisiController@index')->name('kompetisi.index');
    ROute::get('/create', 'KompetisiController@create')->name('kompetisi.create');
    Route::post('/store', 'KompetisiController@store')->name('kompetisi.store');
    Route::get('/{id}/edit', 'KompetisiController@edit')->name('kompetisi.edit');
    Route::put('/{id}/update', 'KompetisiController@update')->name('kompetisi.update');
    Route::delete('/{id}/delete', 'KompetisiController@destroy')->name('kompetisi.delete');
});

Route::get('/{test}', function($test) {
    return $test;
})->name('ajax');