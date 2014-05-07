<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::group(array('before' => 'auth'), function()
{
   Route::get('admin', 'UserController@admin');
   Route::get('logout', 'UserController@logout');
});

/*
Route::get('admin', array('before' => 'auth',
            'uses' => 'UserController@admin'));*/


Route::get('login', 'UserController@login');
//Route::get('logout', 'UserController@logout');
Route::post('ajax', 'UserController@ajax');

