<?php

namespace App\Http\Controllers;

use App\Group;
use App\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $groups = Group::with('product', 'product.ingredient')->get();
        $products = Product::all();

        return view('index', [
            'products' => $products,
            'groups' => $groups,
        ]);
    }

    public function show(Group $group)
    {
        $id = request('id');

        $group->load(['product' => function ($query) use ($id) {
            $query->where('id', $id)->first();
        }]);

        return view('show', compact('group'));
    }
}
