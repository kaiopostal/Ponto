<?php

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

Route::get('/', 'Site\HomeController@index');


Route::prefix('painel')->group(function(){
    Route::get('/', 'Admin\HomeController@index')->name('admin');

    Route::get('login', 'Admin\Auth\LoginController@index')->name('login');
    Route::post('login', 'Admin\Auth\LoginController@authenticate');

    

    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::resource('users', 'Admin\UserController');
    Route::resource('pages', 'Admin\PageController');

    Route::get('profile', 'Admin\ProfileController@index')->name('profile');
    Route::put('profilesave', 'Admin\ProfileController@save')->name('profile.save');

    Route::get('settings', 'Admin\SettingController@index')->name('settings');
    Route::put('settingssave', 'Admin\SettingController@save')->name('settings.save');

    Route::get('ponto', 'Admin\PontoController@index')->name('ponto');
    Route::get('pontosave/{id}/entrada1', 'Admin\PontoController@save1')->name('ponto.save');
    Route::get('pontosave/{id}/entrada2', 'Admin\PontoController@save2')->name('ponto.save');
    Route::get('pontosave/{id}/entrada3', 'Admin\PontoController@save3')->name('ponto.save');
    Route::get('pontosave/{id}/entrada4', 'Admin\PontoController@save4')->name('ponto.save');
    Route::put('datasave', 'Admin\PontoController@saveData')->name('save.data');
   
   
});