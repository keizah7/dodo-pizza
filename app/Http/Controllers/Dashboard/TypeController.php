<?php

namespace App\Http\Controllers\Dashboard;

use App\Type;
use Illuminate\View\View;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\CreateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view(
            'dashboard.type.index', [
                'types' => Type::paginate(10),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('dashboard.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTypeRequest $request
     * @return RedirectResponse
     */
    public function store(CreateTypeRequest $request)
    {
        Type::create($request->validated());

        return redirect()->back()->with('message', __('dashboard.store.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Type $type
     * @return Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Type $type
     * @return Factory|View
     */
    public function edit(Type $type)
    {
        return view('dashboard.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateTypeRequest $request
     * @param Type $type
     * @return RedirectResponse
     */
    public function update(CreateTypeRequest $request, Type $type)
    {
        $type->update($request->validated());

        return redirect()->back()->with('message', __('dashboard.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Type $type
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('dashboard.type.index')->with('message', __('dashboard.delete.success'));
    }
}
