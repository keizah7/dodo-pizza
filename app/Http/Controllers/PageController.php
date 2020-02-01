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
}
