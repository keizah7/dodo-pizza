<?php

namespace App\Http\Controllers;

use App\Group;
use App\Product;
use App\Type;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $types = Type::orderBy('priority')->with([
            'groups' => function ($query) {
                $query->orderBy('priority')->with(['products', 'products.ingredient'])->has('products');
            }
        ])->has('groups')->get();

        return view('index', [
            'types' => $types,
        ]);
    }

    public function show(Group $group)
    {
        $group
//            ->load(
//            [
//                'product' => function ($query) use ($group) {
//                    $query->where('group_id', $group->id)->first();
//                }
//            ]
//        )
            ->load(['product' => function($q){
            $q->orderBy('priority');
    }]);

        return view('show', compact('group'));
    }
}
