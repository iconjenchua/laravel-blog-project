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
    Route::get('post/{id}/{title}', ['as' => 'post', 'uses' => 'BlogController@show']);
    
    Route::post('login', 'AdminController@postLogin');
    
    Route::group(['prefix' => 'admin'], function() {
        Route::get('', ['as' => 'admin', 'uses' => 'AdminController@dashboard'])->middleware('auth.basic');
        
        Route::group(['prefix' => 'post'], function() {
            Route::get('create', ['as' => 'post.create', 'uses' => 'AdminController@createPost']);
            Route::get('{id}/edit', ['as' => 'post.edit', 'uses' => 'AdminController@editPost']);
            Route::post('{id}', ['as' => 'post.save', 'uses' => 'AdminController@savePost']);
        });
    });
});