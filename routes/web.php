<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

//Route::get('/', function () {
//return view('top');
//});

//Auth::routes();


Route::get('/main', 'PostsController@index')->name('show');
Route::get('/share', 'ShareController@index');
Route::get('/top', 'TopController@index');
Route::post('/top', 'TopController@index');
Route::post('/main', 'PostsController@index')->name('show');
Route::post('/share', 'ShareController@store');
Route::get('/edit/{id}', 'UserController@edit');
Route::post('/update/{id}', 'UserController@update');
Route::get('/{id}/delete', 'PostsController@delete');
Route::get('/{id}/delete', 'UserController@delete');

Route::get('/user_edit/{id}', 'UserController@user_edit');
Route::post('/user_update/{id}', 'UserController@user_update');


Route::get('/user', 'UserController@index')->name('user');
Route::post('/user', 'UserController@index');
Route::get('/show', 'ShowController@index');
Route::post('/show', 'ShowController@index');


Route::get('/', 'PostsController@index')->name('main');

Route::get('/main/like/{id}', 'PostsController@like')->name('main.like');
Route::get('/main/unlike/{id}', 'PostsController@unlike')->name('main.unlike');


Route::get('/user/like/{id}', 'UsersController@like')->name('user.like');
Route::get('/user/unlike/{id}', 'UsersController@unlike')->name('user.unlike');

Route::resource('/show/{user_id}', 'UsersController', ['main' => ['show']]);
Route::get('/show', 'UsersController@index');
Route::post('/show', 'UsersController@index');
//新規登録
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

//ログアウト
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout');

//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//メール認証も実装している場合は以下も追加
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
