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

Route::get('/','PageController@getIndex');
Route::get('about','PageController@getAbout');
Route::get('contact','PageController@getContact');
Route::post('contact','PageController@postContact')->name('contact.post');
Route::resource('posts','PostController');
Route::resource('categories','CategoryController',['except'=>['create']]);
Route::resource('tags','TagController',['except'=>['create']]);
Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
        ->where('slug','[\w\d\-\_]+');
Route::get('blog','BlogController@getIndex')->name('blog.index');


