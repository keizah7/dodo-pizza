<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use App\Pickup;
use App\Product;
use App\Services\Paysera;
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
        $totalPrice = $products->pluck('price')->sum();

        $idCounts = $products->countBy('id')->toArray();

        $products = $products->unique('id')->each(fn($item) => $item->count = $idCounts[$item->id]);

        return view('cart.index', compact('products', 'totalPrice'));
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
     * @param Paysera $paysera
     * @return void
     */
    public function store(Request $request, Paysera $paysera)
    {

        $user = Client::create($request->validate([
            'name' => 'required|min:3|max:255',
            'phone' => 'required_with:delivery|min:8|max:255',
            'email' => 'required|email|max:255',
            'delivery' => 'integer',
            'address' => 'required_with:delivery|min:5|max:255',
            'comment' => '',
            'pickup_id' => 'required_without:delivery'
        ]));

        $cart = session('cart');
        $deliveryPrice = 1;
        $price = $cart->pluck('price')->sum();
        $finalPrice = $deliveryPrice + $price;

        $order = Order::create([
            'status' => 0,
            'price' => $finalPrice,
            'delivery_price' => $deliveryPrice,
            'cart_price' => $price,
            'client_id' => $user->id,
        ]);

        $order->product()->attach(session('cart')->pluck('id')->toArray());
//        session()->flush();

        $paysera->pay(
            $request->email,
            $finalPrice,
            $order->id,
        );
    }

    /**
     * @param Paysera $paysera
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Paysera $paysera) {
        $info = $paysera->getPayment();
        $order = Order::findOrFail($info['id']);

        if($order->status != $info['status']) {
            $order->update([
                'status' => $info['status']
            ]);
        }
        session()->flush();

        return redirect()->route('cart.index')->with('message', 'Mokėjimas atliktas');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel() {
        return redirect()->route('cart.index')->with('message', 'Mokėjimas atšauktas');
    }

    /**
     * @param Paysera $paysera
     * @return string
     */
    public function callback(Paysera $paysera) {
        $info = $paysera->getPayment();

        return 'OK';
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
