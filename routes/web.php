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
    return view('index');
});

#-----------------------------------------
##       User Controller
#-----------------------------------------
Route::post('/', 'UserController@login');

Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@save');

Route::get('/logout', 'UserController@logout');

#-----------------------------------------
##       Exam Controller
#-----------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/exam', 'ExamController@show');

    Route::get('/exam/{id}', 'ExamController@info');
    Route::post('/exam/{id}', 'ExamController@submit');
});