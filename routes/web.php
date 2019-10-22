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

Route::resource('document', 'DocumentController');
Route::get('/vue/{any}', 'VueController@index')->where('any','.*');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('doc','VuedocController@index');
Route::post('doc','VuedocController@store');
Route::patch('doc/{doc}','VuedocController@update');
Route::delete('doc/{doc}','VuedocController@destroy');
