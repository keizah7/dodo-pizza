<?php

namespace App\Http\Controllers;

use App\Pickup;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = session( 'cart', collect());
        $idCounts = $products->countBy('id')->toArray();

        $products = $products->unique('id')->each(fn($item) => $item->count = $idCounts[$item->id]);

        return view(
            'cart.index',
            [
                'products' => $products
            ]
        );
    }

    public function shipping()
    {
        return view('cart.shipping');
    }

    public function takeout()
    {
        $pickups = Pickup::all();

        return view('cart.takeout', compact('pickups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return string
     */
    public function update(Request $request, Product $product)
    {
        \request()->session()->push('cart', $product);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $cartContent = session( 'cart', collect());
        $cartContent = $cartContent->where('id', '!=', $product->id);

        session(['cart' => $cartContent]);

        return redirect()->back();
    }
}
