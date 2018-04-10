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
    return view('layouts.main');
});

Auth::routes();

Route::middleware('auth')->get('/home', function (){

    if (Auth::user()->is_admin) {
        return redirect()->route('excel_files.index');
    }

    return redirect()->route('prospects.theNext');

})->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'ExcelFileController@index')->name('home');

Route::get('/', function (){
    return redirect(url('/login'));
});

Route::prefix('excel_files')->group(function (){
    Route::get('/', 'ExcelFileController@index')->name('excel_files.index');
    //Route::get('/create', 'ExcelFileController@create')->name('excel_files.create');
    Route::post('/store', 'ExcelFileController@store')->name('excel_files.store');
    Route::get('/{id}/export', 'ExcelFileController@export')->name('excel_files.export');
    Route::get('/{id}/activate', 'ExcelFileController@activate')->name('excel_files.activate');
    /*Route::get('/{id}', 'ExcelFileController@show')->name('excel_files.show');
    Route::get('/{id}/edit', 'ExcelFileController@edit')->name('excel_files.edit');
    Route::post('/{id}/update', 'ExcelFileController@update')->name('excel_files.update');
    Route::get('/{id}/destroy', 'ExcelFileController@destroy')->name('excel_files.destroy');*/
});

Route::prefix('prospects')->group(function (){
    Route::get('/next', 'ProspectController@theNext')->name('prospects.theNext');
    Route::post('/next/{id}', 'ProspectController@next')->name('prospects.next');
    Route::get('/empty', 'ProspectController@empty')->name('prospects.empty');
    Route::get('/{id}', 'ProspectController@show')->name('prospects.show');
});

Route::prefix('customers')->group(function (){
    Route::get('/{id}/choice/', 'CustomerController@choice')->name('customers.choice');
    Route::get('/create', 'CustomerController@create')->name('customers.create');
    Route::post('/store', 'CustomerController@store')->name('customers.store');
});

Route::prefix('demands')->group(function (){
    Route::get('/', 'DemandController@index')->name('demands.index');
    Route::get('/create/{id}/type/{type}', 'DemandController@create')->name('demands.create');
    Route::post('/store/{id}', 'DemandController@store')->name('demands.store');
});

Route::prefix('offers')->group(function (){
    Route::get('/', 'OfferController@index')->name('offers.index');
    Route::get('/create/{id}/type/{type}', 'OfferController@create')->name('offers.create');
    Route::post('/store/{id}', 'OfferController@store')->name('offers.store');
});
