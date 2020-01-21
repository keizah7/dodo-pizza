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

Route::get('/', 'PageController@index');

Route::get('show/{group}', 'PageController@show')->name('group.show');

Auth::routes();

Route::middleware('auth')->name('dashboard.')->namespace('Dashboard')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('type', 'TypeController', [
        'except' => 'show'
    ]);
    Route::resource('group', 'GroupController', [
        'except' => 'show'
    ]);
    Route::resource('product', 'ProductController');
    Route::resource('ingredient', 'IngredientController', [
        'except' => 'show'
    ]);
    Route::resource('pickup', 'PickupController', [
        'except' => 'show'
    ]);
});
