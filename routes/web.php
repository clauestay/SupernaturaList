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

Route::redirect('/', 'index'); 



Auth::routes();

//web
Route::get('/index', 'Web\PageController@index')->name('index');
Route::get('/index/{slug}', 'Web\PageController@character')->name('character');
Route::get('/categoria/{slug}', 'Web\PageController@category')->name('category');
Route::get('/temporada/{slug}', 'Web\PageController@season')->name('season');


//admin
Route::resource('seasons', 'Admin\SeasonController');
Route::resource('categories', 'Admin\CategoryController');
Route::resource('characters', 'Admin\CharacterController');


