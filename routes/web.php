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

Route::get('/', 'Admin\TaskController@about');
Route::get('about', 'Admin\TaskController@about');
Route::get('home', 'Admin\TaskController@about');

Route::group(['prefix' => 'admin'], function() {
    Route::get('task/create', 'Admin\TaskController@create')->middleware('auth');
    Route::post('task/create', 'Admin\TaskController@record')->middleware('auth');
    Route::get('task/index', 'Admin\TaskController@index')->middleware('auth');
    Route::get('task/edit', 'Admin\TaskController@edit')->middleware('auth');
    Route::post('task/edit', 'Admin\TaskController@update');
    Route::get('task/delete', 'Admin\TaskController@delete');
    
    Route::get('time/start', 'Admin\TimeController@start')->middleware('auth');
    Route::get('time/record', 'Admin\TimeController@record');
    Route::get('time/stop', 'Admin\TimeController@stop')->middleware('auth');
    Route::get('time/end', 'Admin\TimeController@end');
    Route::get('time/today', 'Admin\TimeController@today')->middleware('auth');
    Route::get('time/index', 'Admin\TimeController@index')->middleware('auth');
    Route::get('time/edit', 'Admin\TimeController@edit')->middleware('auth');
    Route::post('time/edit', 'Admin\TimeController@update');
    Route::get('time/delete', 'Admin\TimeController@delete');
});

Auth::routes();
