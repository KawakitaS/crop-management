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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get('/', 'TasksController@index');
*/
Route::resource('histories', 'HistoriesController');


// ユーザ登録
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
});


Route::get('/', 'WelcomeController@index');


// 中略

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('histories', 'HistoriesController', ['only' => ['store', 'destroy']]);
});


Route::post('prediction/form', 'PredictionController@form')->name('prediction.form');
Route::post('prediction/prediction', 'PredictionController@prediction')->name('prediction.prediction');
Route::get('prediction/form', 'PredictionController@form')->name('prediction.form');
Route::get('prediction/prediction', 'PredictionController@prediction')->name('prediction.prediction');
