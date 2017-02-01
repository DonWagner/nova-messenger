<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Nova the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\Messenger\Controllers\Admin'), function ()
{
    Route::get( 'posts',        array('before' => 'auth',      'as' => 'posts',        'uses' => 'Posts@index'));
    Route::get( 'posts/create', array('before' => 'auth',      'as' => 'posts.create', 'uses' => 'Posts@create'));
    Route::post('posts',        array('before' => 'auth|csrf', 'as' => 'posts.store',  'uses' => 'Posts@store'));
    Route::get( 'posts/{id}',   array('before' => 'auth',      'as' => 'posts.show',   'uses' => 'Posts@show'));
    Route::post('posts/{id}',   array('before' => 'auth|csrf', 'as' => 'posts.update', 'uses' => 'Posts@update'));
});
