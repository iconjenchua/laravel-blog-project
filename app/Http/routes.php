<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => []], function() {
    
    Route::get('/', 'BlogController@homepage');
    Route::get('/post/{id}/{title}', ['as' => 'post', 'uses' => 'BlogController@show']);
    
    Route::post('login', 'AdminController@postLogin');
    Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@dashboard']);
    Route::get('admin/post/edit/{id}', ['as' => 'post.edit', 'uses' => 'AdminController@editPost']);
});