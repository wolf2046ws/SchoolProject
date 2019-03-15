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

Route::get('/','HomeController@index');


Route::post('/user-update-components/{id}','userController@updateComponents')->name('user.updateComponents');
Route::get('/user-print-data/{id}','userController@printUserData')->name('user.printPDF');

Route::resource('/user','userController');
Route::resource('/software', 'softwareController');
Route::resource('/hardware', 'hardwareController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
