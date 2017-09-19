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

Auth::routes();

Route::get('/', 'ArchiveController@index')->name('home');
Route::match(['get', 'post'], '/create', 'ArchiveController@create')->name('archive.create');
Route::get('/{id}', 'ArchiveController@detail')->where('id', '[0-9]+')->name('archive.detail');
Route::post('/edit', 'ArchiveController@edit');
Route::get('/map', 'ArchiveController@map')->name('archive.map');
Route::get('/map/{id}', 'ArchiveController@map')->where('id', '[0-9]+')->name('archive.map.detail');
Route::group(['prefix' => 'property'], function ()
{
	Route::get('/', 'PropertyController@index')->name('property');
	Route::match(['get', 'post'], '/create', 'PropertyController@create')->name('property.create');
	Route::get('/{id}', 'PropertyController@detail')->where('id', '[0-9]+')->name('property.detail');
	Route::post('/edit', 'PropertyController@edit');
});
