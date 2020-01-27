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

Route::resource('posts', 'PostController');

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::namespace('Auth')->group(function(){
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');
    });
    Route::get('/dashboard','HomeController@index')->name('home')->middleware('auth:admin');
    Route::resource('/cms/categories','CategoryController')->middleware('auth:admin');
    Route::resource('/cms/posts','PostController')->middleware('auth:admin');
});

Auth::routes();
#Route::get('/home', 'HomeController@index')->name('home');
