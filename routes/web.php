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

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::group([ 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => [ 'auth', 'admin'] ], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('tag', 'TagController');
});

Route::group([ 'as' => 'author.', 'prefix' => 'author', 'namespace' => 'Author', 'middleware' => [ 'auth', 'author'] ], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
