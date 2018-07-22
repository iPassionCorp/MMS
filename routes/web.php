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

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('admin', 'HomeController@index')->name('home');
Route::get('admin/create', 'HomeController@create')->name('create');
Route::post('store', 'HomeController@store')->name('store');
Route::get('admin/edit/{id}', 'HomeController@edit')->name('edit');
Route::post('update', 'HomeController@update')->name('update');
Route::delete('delete/{id}', 'HomeController@delete')->name('delete');