<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateIngredientRequest;
use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view(
            'dashboard.ingredient.index',
            [
                'ingredients' => Ingredient::paginate(10),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.ingredient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateIngredientRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateIngredientRequest $request)
    {
        Ingredient::create($request->validated());

        return redirect()->back()->with('message', __('dashboard.store.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Ingredient $ingredient)
    {
        return view('dashboard.ingredient.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateIngredientRequest $request
     * @param \App\Ingredient $ingredient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateIngredientRequest $request, Ingredient $ingredient)
    {
        $data = $request->validated();
        $data['removable'] = (boolean) request('removable');

        $ingredient->update($data);

        return redirect()->back()->with('message', __('dashboard.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Ingredient $ingredient
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('dashboard.ingredient.index')->with('message', __('dashboard.delete.success'));
    }
}
