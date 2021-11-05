<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::post('/save_user', 'UsersController@save_user')->name('save_user');
Route::post('/save_accident', 'AccidentsController@save_accident')->name('save_accident');
Route::get('/eloquent', 'UsersController@eloquent')->name('eloquent');
Route::get('/reg_accident', 'AccidentsController@reg_accident')->name('reg_accident');
Route::get('/show_accident','AccidentsController@show_accident')->name('show_accident');
Route::get('/show_user','UsersController@show_user')->name('show_user');
Route::get('/reg_user','UsersController@reg_user')->name('reg_user');
Route::get('/delete_user/{us_id}','UsersController@delete_user')->name('delete_user');
Route::get('/delete_accident/{ac_id}','AccidentsController@delete_accident')->name('delete_accident');
Route::get('/edit_user/{us_id}','UsersController@edit_user')->name('edit_user');
Route::post('/save_user_changes','UsersController@save_user_changes')->name('save_user_changes');
Route::get('/edit_accident/{ac_id}','AccidentsController@edit_accident')->name('edit_accident');
Route::post('/save_accident_changes','AccidentsController@save_accident_changes')->name('save_accident_changes');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
