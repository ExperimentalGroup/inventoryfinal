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



Route::get('/', 'loginController@showWelcome');

Route::get('/index', 'loginController@remembLog');

Route::post('/login', array('uses'=>'loginController@LogIn'));

Route::get('/logout', 'loginController@LogOut');

Route::get('/inventory', 'HomeController@inventoree');

Route::get('/employees', 'HomeController@employee');

Route::get('/branches', 'HomeController@branches');

Route::get('/suppliers', 'HomeController@suppliers');

Route::get('/delivery', 'HomeController@delivery');

Route::get('/release', 'HomeController@release');

Route::post('/branches', array('uses'=>'HomeController@createBranch'));

Route::post('/suppliers', array('uses'=>'HomeController@createSupp'));

Route::post('/employees', array('uses'=>'HomeController@createEmp'));

Route::post('/inventory', array('uses'=>'HomeController@createInv'));

Route::post('/delivery', array('uses'=>'HomeController@add_delivery'));

Route::post('/release', array('uses'=>'HomeController@minus_release'));

Route::post('/adjust', array('uses'=>'HomeController@adjustInv'));

Route::post('/supplierupdate',array('uses'=>'HomeController@update_supplier'));

Route::post('/branchupdate',array('uses'=>'HomeController@update_branch'));

Route::post('/employeeupdate',array('uses'=>'HomeController@update_employee'));

Route::get('/details/{id}', 'HomeController@details');

Route::get('/order', 'HomeController@order');

Route::get('/neworder', 'HomeController@newOrder');

Route::get('/smart', 'HomeController@smart');

Route::get('/request', function()
{
	return View::make('request');
});

Route::get('/product-load', 'HomeController@productTable');
