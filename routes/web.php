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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() 
      {
  // プロフィール画面表示
        Route::get('profile/create', 'Admin\ProfileController@add');
        Route::post('profile/create', 'Admin\ProfileController@create');
        Route::get('profile', 'Admin\ProfileController@index');
        Route::get('profile/edit', 'Admin\ProfileController@edit');
        Route::post('profile/edit', 'Admin\ProfileController@update');
        Route::get('profile/delete', 'Admin\ProfileController@delete');
      });
      
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() 
      {
  // プロフィール画面表示
        Route::get('portfolio/create', 'Admin\PortfolioController@add');
        Route::post('portfolio/create', 'Admin\PortfolioController@create');
        Route::get('portfolio', 'Admin\PortfolioController@index');
        Route::get('portfolio/edit', 'Admin\PortfolioController@edit');
        Route::post('portfolio/edit', 'Admin\PortfolioController@update');
        Route::get('portfolio/delete', 'Admin\PortfolioController@delete');
      });
  
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
