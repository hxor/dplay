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

Route::get('/', 'HomeController@index');

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
/**
 * Registration Routes...
 * Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
 * Route::post('register', 'Auth\RegisterController@register');
 */
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/home', 'HomeController@admin')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('user', 'UserController');
    Route::resource('info', 'InfoController');
    Route::get('/setting', 'SettingController@index')->name('setting');
    Route::post('/setting', 'SettingController@store')->name('setting.store');
});

Route::group(['prefix' => 'table', 'as' => 'table.', 'middleware' => ['auth']], function () {
    Route::get('/user', 'UserController@dataTable')->name('user');
    Route::get('/info', 'InfoController@dataTable')->name('info');
});

Route::get('info', function () {
	echo phpinfo();
});
