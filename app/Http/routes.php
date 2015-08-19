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

//API
Route::group(['prefix' => 'api'], function()
{
    // plans resources
	Route::resource('plans','Api\PlanController');

	// dimensions resources
	Route::resource('dimensions','Api\DimensionController');
	// objectives resources
	Route::resource('objectives','Api\ObjectiveController');
	// initiatives resources
	Route::resource('initiatives','Api\InitiativeController');
	// measures resources
	Route::resource('measures','Api\MeasureController');
});


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
