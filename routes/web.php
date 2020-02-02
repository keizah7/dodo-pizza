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

//Route::group(['middleware' => 'cart.is.null'], function () {
    Route::resource('cart', 'CartController');
//    Route::post('cart', 'CartController@')
//    Route::get('cart', 'CartController@index')->name('cart');
//    Route::get('cart/create', 'CartController@create')->name('cart.create');
//    Route::delete('cart/{product}', 'CartController@destroy')->name('cart.destroy');
//});

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

Route::post('modal/add', function (\Illuminate\Http\Request $request) {
    $product = \App\Product::findOrFail($request->product_id);

    $cartContent = session( 'cart', collect());
    $cartContent->add($product);

    session(['cart' => $cartContent]);

    return response()->json([
        'session' => session('cart') ?? 'failed'
    ], 200);
});
