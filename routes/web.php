<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PageController@posts');
Route::get('blog/{post}', 'PageController@post')->name('post');

Auth::routes();

Route::resource('post', 'PostController')->middleware('auth')->except('show');
Route::get('/home', 'HomeController@index')->name('home');

//Muestra todos los datos del usuario
Route::get('information/user', 'PageController@information')->name('information')->middleware('auth');
Route::get('/pdf', 'PageController@pdf')->name('descarga')->middleware('auth');
