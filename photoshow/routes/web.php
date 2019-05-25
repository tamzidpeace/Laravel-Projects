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

Route::get('/album', 'AlbumsController@index');
Route::get('/album/create', 'AlbumsController@create');
Route::post('/album', 'AlbumsController@store');
Route::get('/album/{id}/show', 'AlbumsController@show');
Route::delete('/album/{id}/show', 'AlbumsController@destroy');
Route::get('/album/{id}/edit', 'AlbumsController@edit');
Route::patch('/album/{id}', 'AlbumsController@update');

Route::resource('photo', 'PhotosController');
Route::get('/photo/creates/{id}', 'PhotosController@creates');
