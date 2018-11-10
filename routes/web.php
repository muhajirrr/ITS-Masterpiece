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
})->name('landing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/dashboard')->group(function() {
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
    
    Route::prefix('/lomba')->group(function() {
        Route::get('/', 'LombaController@index')->name('lomba.index');
        Route::get('/create', 'LombaController@create')->name('lomba.create');
        Route::post('/store', 'LombaController@store')->name('lomba.store');
        Route::get('/{id}/edit', 'LombaController@edit')->name('lomba.edit');
        Route::put('/{id}/update', 'LombaController@update')->name('lomba.update');
        Route::delete('/{id}/delete', 'LombaController@destroy')->name('lomba.delete');
    });
    
    Route::prefix('/exchange')->group(function() {
        Route::get('/', 'ExchangeController@index')->name('exchange.index');
        Route::get('/create', 'ExchangeController@create')->name('exchange.create');
        Route::post('/store', 'ExchangeController@store')->name('exchange.store');
        Route::get('/{id}/edit', 'ExchangeController@edit')->name('exchange.edit');
        Route::put('/{id}/update', 'ExchangeController@update')->name('exchange.update');
        Route::delete('/{id}/delete', 'ExchangeController@destroy')->name('exchange.delete');
    });
    
    Route::prefix('/paper')->group(function() {
        Route::get('/', 'PaperController@index')->name('paper.index');
        Route::get('/create', 'PaperController@create')->name('paper.create');
        Route::post('/store', 'PaperController@store')->name('paper.store');
        Route::get('/{id}/edit', 'PaperController@edit')->name('paper.edit');
        Route::put('/{id}/update', 'PaperController@update')->name('paper.update');
        Route::delete('/{id}/delete', 'PaperController@destroy')->name('paper.delete');
    });

    Route::prefix('/pkm')->group(function() {
        Route::get('/', 'PKMController@index')->name('pkm.index');
        Route::get('/create', 'PKMController@create')->name('pkm.create');
        Route::post('/store', 'PKMController@store')->name('pkm.store');
        Route::get('/{id}/edit', 'PKMController@edit')->name('pkm.edit');
        Route::put('/{id}/update', 'PKMController@update')->name('pkm.update');
        Route::delete('/{id}/delete', 'PKMController@destroy')->name('pkm.delete');
    });
});

Route::get('/karya', 'FrontPageController@karya');
Route::get('/kompetisi', 'FrontPageController@kompetisi');
Route::get('/prestasi', 'FrontPageController@prestasi');

Route::get('/prestasi/lomba', 'FrontPageController@lomba');
Route::get('/prestasi/pkm', 'FrontPageController@pkm');
Route::get('/prestasi/paper', 'FrontPageController@paper');
Route::get('/prestasi/exchange', 'FrontPageController@exchange');

Route::get('/prestasi/{test}', function($test) {
    return $test;
})->name('ajax');