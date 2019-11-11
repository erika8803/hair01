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

// Admin 認証不要
Route::group(['prefix' => 'admin'], function() 
  {
      // home画面
      Route::get('home', 'Admin\Auth\HomeController@index')->name('admin.home');
      // login画面
      Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
      Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
      Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
      Route::post('register', 'Admin\Auth\RegisterController@create')->name('admin.register');
  });

// Adminログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() 
      {
        // ログアウト画面
        Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.auth.logout');
        Route::get('home','Admin\HomeController@index')->name('admin.auth.home');
        
  // プロフィール画面表示
        Route::get('profile/create', 'Admin\ProfileController@add');
        Route::post('profile/create', 'Admin\ProfileController@create');
        Route::get('profile', 'Admin\ProfileController@index');
        Route::get('profile/edit', 'Admin\ProfileController@edit');
        Route::post('profile/edit', 'Admin\ProfileController@update');
        Route::get('profile/delete', 'Admin\ProfileController@delete');
      });
  
 // ポートフォリオ 画面表示      
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() 
      {
        Route::get('portfolio/create', 'Admin\PortfolioController@add');
        Route::post('portfolio/create', 'Admin\PortfolioController@create');
        Route::get('portfolio', 'Admin\PortfolioController@index');
        Route::get('portfolio/edit', 'Admin\PortfolioController@edit');
        Route::post('portfolio/edit', 'Admin\PortfolioController@update');
        Route::get('portfolio/delete', 'Admin\PortfolioController@delete');
      });
  
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// User
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() 
      {
      Route::get('portfolio', 'UserController@index');
      Route::get('profile', 'UserController@show');
      });