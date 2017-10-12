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

Route::get('/', 'ArchiveController@map')->name('map');
Route::get('/list', 'ArchiveController@index')->name('list');
Route::match(['get', 'post'], '/create', 'ArchiveController@create')->name('archive.create');
Route::get('/{id}', 'ArchiveController@detail')->where('id', '[0-9]+')->name('archive.detail');
Route::post('/edit', 'ArchiveController@edit');
Route::post('/upload/image/{type}', 'ArchiveController@uploadimage')->where('type', 'design|complete');
Route::get('/map', 'ArchiveController@map')->name('archive.map');
Route::get('/map/{id}', 'ArchiveController@map')->where('id', '[0-9]+')->name('archive.map.detail');
Route::get('/attach/{id}', 'AttachController@list')->where('id', '[0-9]+')->name('archive.attach.list');
Route::group(['prefix' => 'property'], function ()
{
    Route::get('/', 'PropertyController@index')->name('property');
    Route::match(['get', 'post'], '/create', 'PropertyController@create')->name('property.create');
    Route::get('/{id}', 'PropertyController@detail')->where('id', '[0-9]+')->name('property.detail');
    Route::post('/edit', 'PropertyController@edit');
});

Route::group(['prefix' => 'photo'], function ()
{
    Route::post('/changename', 'PhotoController@changename');
});
Route::group(['prefix' => 'admin'], function ()
{
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/index', 'AdminController@index');
    Route::match(['get', 'post'], '/user/create', 'AdminController@createUser')->name('admin.user.create');
    Route::post('/user/edit', 'AdminController@editUser')->name('admin.user.create');
    Route::post('/photo/delete/{id}', 'PhotoController@delete')->name('admin.photo.delete')->where('id', '[0-9]+');
});

Route::match(['get', 'post'], '/reset/{id}', 'AdminController@resetpassword')->where('id', '[0-9]+')->name('password.reset');

Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
