<?php

/*
|--------------------------------------------------------------------------
| Queue Route
|--------------------------------------------------------------------------
|
*/

Route::post('queue/recieve', function()
{
	return Queue::marshal();
});


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

Route::get('/', array('as' => 'home', 'uses' => 'FrontEndController@home'));
Route::get('about', array('as' => 'about', 'uses' => 'FrontEndController@about'));