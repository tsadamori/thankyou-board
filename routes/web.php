<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

// Route::get('/', function () {
//     return view('index');
// });

// Message Controller
Route::get('/', 'App\Http\Controllers\MessageController@index');

// Ajax Controller
Route::get('ajax/getMessages', 'App\Http\Controllers\AjaxController@getMessages');
Route::post('ajax/postMessage', 'App\Http\Controllers\AjaxController@postMessage');

// Login Controller
Route::get('login', 'App\Http\Controllers\Auth\LoginController@index');
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');

// Google Login Controller
Route::get('google/login', 'App\Http\Controllers\GoogleLoginController@redirectToGoogle');
Route::get('auth/google/callback', 'App\Http\Controllers\GoogleLoginController@handleGoogleCallback');

// Twitter Login Controller
Route::get('twitter/login', 'App\Http\Controllers\TwitterLoginController@index');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
