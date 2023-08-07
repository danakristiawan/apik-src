<?php

namespace App\Http\Controllers;

use App\Models\tes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directory = '/Report/Incoming';
        $files = Storage::disk('sftp')->files();
        return view('sftp.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($file)
    {
        $contents = Storage::disk('sftp')->get($file);
        $collection1 = collect();
        $collection2 = collect();
        $coll = collect();
        $lines = explode("\n", $contents);
        foreach($lines as $line) {
            if(substr($line, 0,3)===':61') {
                $object = new stdClass();
                $object = $line;
                $collection1->push($object);
            }
            if(substr($line, 0,3)===':86') {
                $object = new stdClass();
                $object = $line;
                $collection2->push($object);
            }
        }

        dd($collection1);
    }

    /**
     * Display the specified resource.
     */
    public function show(tes $tes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tes $tes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tes $tes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tes $tes)
    {
        //
    }
}
