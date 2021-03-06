<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', ['as' => 'app.fastTyping.index', 'uses' => 'Gm_fastTypingController@index']);
    Route::get('/statistic', ['as' => 'app.fastTyping.statistic', 'uses' => 'Gm_fastTypingController@statistic']);
    Route::post('/create', ['as' => 'app.fastTyping.store','uses' => 'Gm_fastTypingController@store']);
});


