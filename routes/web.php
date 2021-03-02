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

// 資料庫
Route::get('database', 'DatabaseController@index')->name('database.index');
Route::get('table/{table}', 'TableController@index')->name('table.index');
// 今天吃什麼
Route::match(['get', 'post'],'vendor/random', 'VendorController@random')->name('vendor.random');
Route::resource('vendor', 'VendorController', ['middleware' => 'auth']);
// 鍛鑰者
Route::get('keyforge', 'KeyForgeController@index')->name('keyforge.index');
// 股票資訊
Route::resource('rate', 'RateController', ['middleware' => 'auth']);
// line 機器人
Route::get('maze/{targetType}/{targetId}/{previewImage}/{showAnswer}/{timestamp}', 'MazeController@show')->name('maze.show');
Route::get('dice/merge/{dices}/{previewImage}/{timestamp}', 'DiceController@merge')->name('dice.merge');
