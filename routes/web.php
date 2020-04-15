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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');


Route::prefix('admin')->group(function(){
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});

Route::prefix('superuser')->group(function(){
  Route::get('/', 'SuperuserController@index')->name('superuser.dashboard');
  Route::get('/login', 'Auth\SuperuserLoginController@ShowLoginForm')->name('superuser.login');
  Route::post('/login', 'Auth\SuperuserLoginController@login')->name('superuser.login.submit');
});
