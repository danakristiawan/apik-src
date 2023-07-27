<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\SatkersDataTable;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SatkersDataTable $dataTable)
    {
        return $dataTable->render('satker.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                        'code' => 'required',
                        'name' => 'required',
                    ]);

        Satker::create($validated);

        return redirect()->route('satker.index')->with('success', 'Satker has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satker $satker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satker $satker)
    {
        return view('satker.edit', compact('satker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satker $satker)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $satker->fill($validated)->save();

        return redirect()->route('satker.index')->with('success', 'Satker has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satker $satker)
    {
        $satker->delete();

        return redirect()->route('satker.index')->with('success', 'Satker has been deleted successfully!');
    }
}
