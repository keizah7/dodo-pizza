<?php

namespace App\Http\Controllers;

use App\Group;
use App\Product;
use App\Type;
use Illuminate\Http\Request;

use function foo\func;

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
        $id = \request('id');

        if($id) {
            $group->load([
                'product' => function($query) use ($id) {
                    $query->find($id);
                }
            ]);
        } else {
            $group
                ->load(['product' => function($q){
                    $q->orderBy('priority', 'desc')->first();
                }]);
            $id = $group->product->id;
        }

        return view('show', compact('group', 'id'));
    }
}
