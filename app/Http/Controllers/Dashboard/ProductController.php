<?php

namespace App\Http\Controllers\Dashboard;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Ingredient;
use App\Product;
use App\ProductIngredient;
use App\Traits\UploadTrait;
use App\Type;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view(
            'dashboard.product.index',
            [
                'products' => Product::paginate(10),
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
        return view(
            'dashboard.product.create', [
                'groups' => Group::orderBy('priority')->get(),
                'ingredients' => Ingredient::all(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProductRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = $this->upload(request('photo'));

        $product = Product::create($data);
        if(isset($data['ingredients'])) {
            $product->ingredient()->attach($data['ingredients']);
        }

        return redirect()->back()->with('message', __('dashboard.store.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        $product->load('ingredient');

        return view('dashboard.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        return view('dashboard.product.edit', [
            'groups' => Group::orderBy('priority')->get(),
            'product' => $product,
            'ingredients' => Ingredient::all(),
            'currentIngredients' => $product->ingredient->pluck('id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateProductRequest $request
     * @param \App\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['photo'] = $this->upload(request('photo'), $product->photo);

        $product->update($data);
        $product->ingredient()->sync($data['ingredients']);

        return redirect()->back()->with('message', __('dashboard.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $this->delete($product->photo);
        $product->delete();

        return redirect()->route('dashboard.product.index')->with('message', __('dashboard.delete.success'));
    }
}
