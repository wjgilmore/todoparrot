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

Route::get('/', ['as' => 'home', 'uses' => 'WelcomeController@index']);

//Route::get('home', 'HomeController@index');

Route::get('about', 'AboutController@index');

Route::get('contact', 
[
	'as' => 'contact', 
	'uses' => 'AboutController@create'
]);

Route::post('contact', 
[
   'as' => 'contact_store', 
   'uses' => 'AboutController@store']
);

Route::group(
[
  'prefix' => 'admin', 
  'namespace' => 'Admin', 
  'middleware' => 'admin'
], 
function()
{
	Route::get('/', 'UserController@index');
    Route::resource('user', 'UserController');
});

Route::resource('lists', 'ListsController');

Route::resource('lists.tasks', 'TasksController');

Route::post('lists/{lists}/tasks/{tasks}/complete', 
[
	'as' => 'complete_task', 
	'uses' => 'TasksController@complete'
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
