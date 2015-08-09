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

// plans resources
Route::resource('plans','PlanController');

// dimensions resources
Route::resource('dimensions','DimensionController');
// objectives resources
Route::resource('objectives','ObjectiveController');
// users resources
Route::resource('users','UserController');
// initiatives resources
Route::resource('initiatives','InitiativeController');
// measures resources
Route::resource('measures','MeasureController');
// actual measures measures resources
Route::resource('measures.actual_measures','ActualMeasureController');


Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
Route::get('/dash-board',['as'=>'dash-board','uses'=>"DashBoardController@index"]);

Route::controller('/','Auth\AuthController');


Route::group(['prefix' => 'admin'], function () {
    // users resources
	// Route::resource('users','UserController');
});