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

Route::group(['middleware' => ['web']], function() {
    
    Route::get('/', 'BlogController@homepage');
    Route::get('/post/{id}/{title}', ['as' => 'post', 'uses' => 'BlogController@show']);
    
    Route::get('/login', ['as' => 'login', 'uses' => 'AdminController@login']);
});