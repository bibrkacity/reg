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

Route::get('/', function () {
    return view('mainpage');
})->name('main');

Route::group(['namespace'=> 'App\Http\Controllers'], function () {
    Route::post('/link', 'AuthController@link')->name('link');

    Route::get('/game/{zero}/{token}', 'GameController@index')->name('game');

    Route::group(['prefix'=> 'a','middleware'=>'auth'], function () {
        Route::get('', 'LinkController@a')->name('a');
        Route::get('deactivate/{id}', 'LinkController@deactivate')->name('deactivate');
        Route::get('add', 'LinkController@store')->name('new_link');
    });

    Route::group(['prefix'=> 'lucky','middleware'=>'auth'], function () {
        Route::get('{token}', 'GameController@lucky')->name('lucky');
        Route::get('{token}/history', 'GameController@history')->name('history');
    });

});


