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

Route::resource('cart', 'CartController'); //'middleware' => 'cart.is.null'

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

    $cartContent = session('cart', collect());
    $cartContent->add($product);

    session(['cart' => $cartContent]);

    return response()->json([
        'session' => session('cart') ?? 'failed'
    ], 200);
});

Route::match(['GET', 'POST'], 'paysera/accept', 'CartController@accept')->name('paysera.accept');
Route::match(['GET', 'POST'], 'paysera/cancel', 'CartController@cancel')->name('paysera.cancel');
Route::match(['GET', 'POST'], 'paysera/callback', 'CartController@callback')->name('paysera.callback');
