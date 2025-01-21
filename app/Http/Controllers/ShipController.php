<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipStoreRequest;
use App\Http\Requests\ShipUpdateRequest;
use App\Models\Ship;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ships = Ship::orderBy('ordering')->get();

        return view('ships.index', compact('ships'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShipStoreRequest $request)
    {
        Ship::create($request->validated());

        return redirect()->route('ships.index')
            ->with('success', 'Ship created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ship $ship)
    {
        return view('ships.show', compact('ship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ship $ship)
    {
        return view('ships.edit', compact('ship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShipUpdateRequest $request, Ship $ship)
    {
        $ship->update($request->validated());

        return redirect()->route('ships.index')
            ->with('success', 'Ship updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ship $ship)
    {
        $ship->delete();

        return redirect()->route('ships.index')
            ->with('success', 'Ship deleted successfully');
    }
}
