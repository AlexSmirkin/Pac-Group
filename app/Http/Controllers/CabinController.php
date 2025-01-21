<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabinStoreRequest;
use App\Http\Requests\CabinUpdateRequest;
use App\Models\Cabin;
use Illuminate\Http\Request;

class CabinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('cabin.create', ['ship_id' => $request->get('ship_id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CabinStoreRequest $request)
    {
        Cabin::create($request->validated());

        return redirect()->route('ships.edit', $request->get('ship_id'))
            ->with('success', 'Cabin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabin $cabin)
    {
        return view('ships.show', compact('cabin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cabin $cabin)
    {
        return view('ships.edit', compact('cabin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CabinUpdateRequest $request, Cabin $cabin)
    {
        $cabin->update($request->validated());

        return redirect()->route('ships.edit', $request->get('ship_id'))
            ->with('success', 'Cabin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Cabin $cabin)
    {
        $cabin->delete();

        return redirect()->route('ships.edit', $request->get('ship_id'))
            ->with('success', 'Cabin deleted successfully');
    }
}
