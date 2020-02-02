<?php

namespace App\Http\Controllers;

use App\Client;
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

        return view('cart.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if($request->delivery) {
            return view('cart.shipping');
        }

        $pickups = Pickup::all();

        return view('cart.takeout', compact('pickups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create($request->validate([
            'name' => 'required|min:3|max:255',
            'phone' => 'required_with:delivery|min:8|max:255',
            'email' => 'required|email|max:255',
            'delivery' => 'integer',
            'address' => 'required_with:delivery|min:5|max:255',
            'comment' => '',
            'pickup_id' => 'required_without:delivery'
        ]));

//        dd($request->all());
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
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $cart)
    {
        $cartContent = session( 'cart', collect());
        $cartContent = $cartContent->where('id', '!=', $cart->id);

        session(['cart' => $cartContent]);

        return redirect()->back();
    }
}
