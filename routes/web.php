<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\StatusUpdated;
use App\Requests;
use App\User;

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
    return view ('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('items','ItemController');

Route::get('index', 'ItemController@index')->name('items.index');

Route::get('create', 'ItemController@create')->name('items.create');

Route::post('store', 'ItemController@store')->name('items.store');

Route::get('image/{filename}', 'ItemController@show')->name('image.display');

Route::resource('requests','RequestController');

Route::get('create', 'RequestController@create')->name('requests.create');

Route::get('index', 'RequestController@index')->name('requests.index');

Route::get('/{id}', 'RequestController@edit')->name('requests.edit');

Route::post('/{id}', 'RequestController@update')->name('requests.update');

Route::get('/{id}', 'ItemController@edit')->name('items.edit');

Route::post('/{id}', 'ItemController@update')->name('items.update');

Route::delete('destroy/{id}', 'ItemController@destroy')->name('items.destroy');

Route::delete('destroy/{id}', 'RequestController@destroy')->name('requests.destroy');
