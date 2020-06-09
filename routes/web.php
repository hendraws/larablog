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
Route::group(['prefix'=>'admin'], function(){

    Auth::routes();
});



Route::get('/', 'BlogController@index');
Route::get('/{slug}', 'BlogController@detail');

Route::group(['middleware' => 'auth','prefix'=>'admin'], function(){
    Route::resource('/category','CategoryController');
    Route::get('/category/{id}/delete','CategoryController@delete');

    Route::resource('/tags','TagController');
    Route::get('/tags/{id}/delete','TagController@delete');

    Route::get('/post/recyclebin','PostController@recyclebin');
    Route::get('/post/{id}/trash','PostController@trash');
    Route::get('/post/{id}/restore','PostController@restore');
    Route::get('/post/{id}/delete','PostController@delete');
    Route::resource('/post','PostController');

    Route::get('/home', 'HomeController@index')->name('front');


});

