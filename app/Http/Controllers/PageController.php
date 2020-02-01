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
        $types = Type::oldest('priority')->with([
            'groups' => fn($q) => $q->oldest('priority'),
            'groups.product' => fn($q) => $q->oldest('priority')->with('ingredient'),
        ])->has('groups')->get();

        return view('index', [
            'types' => $types,
        ]);
    }

    public function show(Group $group)
    {
        $id = \request('id');

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

        return view('show', compact('group'));
    }
}
