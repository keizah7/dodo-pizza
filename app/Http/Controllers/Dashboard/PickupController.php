<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\CreatePickupRequest;
use App\Pickup;
use App\Http\Controllers\Controller;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.pickup.index', [
            'pickups' => Pickup::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.pickup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePickupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePickupRequest $request)
    {
        Pickup::create($request->validated());

        return redirect()->back()->with('message', __('dashboard.store.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Pickup $pickup
     * @return void
     */
    public function show(Pickup $pickup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pickup $pickup
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Pickup $pickup)
    {
        return view('dashboard.pickup.edit', compact('pickup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreatePickupRequest $request
     * @param Pickup $pickup
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreatePickupRequest $request, Pickup $pickup)
    {
        $pickup->update($request->validated());

        return redirect()->back()->with('message', __('dashboard.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pickup $pickup
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Pickup $pickup)
    {
        $pickup->delete();

        return redirect()->route('dashboard.pickup.index')->with('message', __('dashboard.delete.success'));
    }
}
