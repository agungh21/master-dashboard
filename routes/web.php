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

Route::redirect('/', '/login');
Route::get('/daftar', 'Controller@daftar')->name('daftar');

Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('is_admin')->group(function () {

    // ----------
    // Dashboard
    // ----------
    Route::get('/', 'AdminController@index')->name('admin');

    //  -----
    //  user
    //  -----
    Route::prefix('user')->group(function () {

        Route::get('/', 'AdminController@userIndex')->name('admin.user');
        Route::get('/add', 'AdminController@userAdd')->name('admin.user.add');
        Route::get('{user}/edit', 'AdminController@userEdit')->name('admin.user.edit');
        Route::get('/detail', 'AdminController@useDetail')->name('admin.user.detail');

        Route::post('store', 'AdminController@userStore')->name('admin.user.store');
        Route::put('{user}/update', 'AdminController@userUpdate')->name('admin.user.update');
        Route::delete('{user}/destroy', 'AdminController@userDestroy')->name('admin.user.destroy');
    });

    // Setting
    Route::prefix('pengaturan')->group(function () {
        Route::get('umum', 'AdminController@settingCommonIndex')->name('admin.setting.common');

        Route::group(['middleware' => 'requestAjax'], function () {
            Route::post('common/store', 'AdminController@settingCommonStore')->name('admin.setting.common.store');
        });
    });
});

Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@indexUsers')->name('users');
});
