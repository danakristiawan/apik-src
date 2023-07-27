<?php

namespace App\Http\Controllers;

use App\Models\Bku;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBkuRequest;
use App\Http\Requests\UpdateBkuRequest;
use App\Datatables\BkuDataTable;

class BkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BkuDataTable $dataTable)
    {
        return $dataTable->render('bku.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBkuRequest $request)
    {
        $validated = $request->validated();

        Bku::create($validated);
        return redirect()->route('bku.index')->with('success', 'BKU has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bku $bku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bku $bku)
    {
        return view('bku.edit', compact('bku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBkuRequest $request, Bku $bku)
    {
        $validated = $request->validated();

        $bku->fill($validated)->save();

        return redirect()->route('bku.index')->with('success', 'BKU has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bku $bku)
    {
        $bku->delete();

        return redirect()->route('bku.index')->with('success', 'BKU has been deleted successfully!');
    }
}
