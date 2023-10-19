<?php

namespace App\Http\Controllers;

use App\Models\RekeningKoran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekeningKoranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekening_koran = RekeningKoran::all();
        return dd($rekening_koran);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(RekeningKoran $rekeningKoran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekeningKoran $rekeningKoran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekeningKoran $rekeningKoran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekeningKoran $rekeningKoran)
    {
        //
    }
}
