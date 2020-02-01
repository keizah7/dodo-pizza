<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/modal/product', function (Request $request) {
    $group = \App\Group::findOrFail($request->group_id);
    $id = \request('product_id');

    if ($id) {
        $group
            ->load([
                'product' => function ($q) use ($id) {
                    $q->find($id);
                },
                'products' => function ($q) {
                    $q->oldest('priority');
                },
            ]);
    } else {
        $group->load([
            'product' => function ($q) {
                $q->oldest('priority')->first();
            },
            'products' => function ($q) {
                $q->oldest('priority');
            },
        ]);
    }

    return response()->json([
        'html' => view('modal.product', compact('group'))->render()
    ], 200);
});
