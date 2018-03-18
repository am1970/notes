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

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::prefix('projects')->middleware('auth')->group(function ()
{
    Route::get('/', 'ProjectController@index')->name('projects');
    Route::post('/', 'ProjectController@store')->name('store.project');
    Route::put('/{project}', 'ProjectController@edit')->name('edit.project');
    Route::delete('/{project}', 'ProjectController@delete')->name('delete.project');
});

Route::prefix('tasks')->middleware('auth')->group(function ()
{
    Route::post('/', 'TaskController@store')->name('store.task');
    Route::put('/{task}', 'TaskController@edit')->name('edit.task');
    Route::put('/{task}/change-position', 'TaskController@changePosition')->name('change.position.task');
    Route::delete('/{task}', 'TaskController@delete')->name('delete.task');
});
