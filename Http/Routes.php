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

$router->group(array('prefix' => 'admin', 'namespace' => 'Admin'), function($router)
{
    $router->get( 'posts',        array('middleware' => 'auth',     'as' => 'posts',        'uses' => 'Posts@index'));
    $router->get( 'posts/create', array('middleware' => 'auth',     'as' => 'posts.create', 'uses' => 'Posts@create'));
    $router->post('posts',        array('middleware' => 'auth', 	'as' => 'posts.store',  'uses' => 'Posts@store'));
    $router->get( 'posts/{id}',   array('middleware' => 'auth',     'as' => 'posts.show',   'uses' => 'Posts@show'));
    $router->post('posts/{id}',   array('middleware' => 'auth', 	'as' => 'posts.update', 'uses' => 'Posts@update'));
});
