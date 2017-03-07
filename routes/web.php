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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    //用户认证
    Route::get('login', 'Auth\AuthController@getLogin')->name('admin.login');
    Route::post('login', 'Auth\AuthController@postLogin')->name('admin.login');
    Route::get('logout', 'Auth\AuthController@logout')->name('admin.logout');

    Route::get('/', 'HomeController@index')->name('admin.index');

});

Route::group(['prefix' => 'admin/api', 'namespace' => 'Admin\Api'], function () {

    //vue.js 接口
    Route::get('users', 'UserController@fetchUsers')->name('api.admin.users');

    Route::get('user/{id}', 'UserController@fetchUser')->name('api.admin.user.info');
    Route::post('user', 'UserController@store')->name('api.admin.user.store');
    Route::put('user', 'UserController@update')->name('api.admin.user.update');

    Route::get('buses', 'BusController@index');
    Route::post('bus', 'BusController@store');
    Route::put('bus', 'BusController@update');

    Route::get('bus/sign/users', 'BusController@showBusSignUsers');
    Route::post('user/sign/bus', 'BusController@userSignByBus');

    Route::get('me', 'UserController@fetchMe')->name('api.admin.me');

});


Auth::routes();
Route::get('/home', 'HomeController@index');
