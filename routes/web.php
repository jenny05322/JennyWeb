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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('database', 'DatabaseController@index')->name('database.index');
Route::get('table/{table}', 'TableController@index')->name('table.index');

Route::match(['get', 'post'],'vendor/random', 'VendorController@random')->name('vendor.random');
Route::resource('vendor', 'VendorController', ['middleware' => 'auth']);

Route::get('maze/{targetType}/{targetId}/{previewImage}/{showAnswer}/{timestamp}', 'MazeController@show')->name('maze.show');
