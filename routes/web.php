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
    return view('home')->with('title','Home Page');
})->name('front');

Route::get('/home', function () {
    return view('home')->with('title','Home Page');
});

Route::resource('/category','CategoryController');
Route::get('/category/{id}/delete','CategoryController@delete');

Route::resource('/tags','TagController');
Route::get('/tags/{id}/delete','TagController@delete');

Route::get('/post/recyclebin','PostController@recyclebin');
Route::get('/post/{id}/trash','PostController@trash');
Route::get('/post/{id}/restore','PostController@restore');
Route::get('/post/{id}/delete','PostController@delete');
Route::resource('/post','PostController');
