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

Route::post('/login', 'UserController@authenticate');

Route::get('/tasks', 'TaskController@getAllTasks');
Route::get('/task/{id}', 'TaskController@getTask');
Route::delete('/task/{id}', 'TaskController@deleteTask');
Route::post('/task', 'TaskController@createTask');