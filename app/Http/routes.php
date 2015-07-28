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

// dimensions resources
Route::resource('dimensions','DimensionController');
// objectives resources
Route::resource('objectives','ObjectiveController');

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
Route::get('/dash-board',['as'=>'dash-board','uses'=>"DashBoardController@index"]);

Route::controller('/','Auth\AuthController');
