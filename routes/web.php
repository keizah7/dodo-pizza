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

Route::get('/', 'PageController@index')->name('index');

Route::get('show/{group}', 'PageController@show')->name('group.show');

Route::get('cart/cancel', 'CartController@destroy')->name('cart.destroy');
Route::get('cart/shipping', 'CartController@shipping')->name('cart.shipping');
Route::get('cart', 'CartController@index')->name('cart');
Route::get('cart/takeout', 'CartController@takeout')->name('cart.takeout');
//Route::get('cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('cart/{product}', 'CartController@delete')->name('cart.delete');

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

Route::post('cart', function (\Illuminate\Http\Request $request) {
    $product = \App\Product::findOrFail($request->product_id);

    $cartContent = session( 'cart', collect());
    $cartContent->add($product);

    session(['cart' => $cartContent]);

    return response()->json([
        'session' => session('cart') ?? 'failed'
    ], 200);
});
