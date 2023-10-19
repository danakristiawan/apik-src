<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Tes;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = Storage::disk('public')->files();
        return view('tes.index', compact('files'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($file)
    {
        $contents = Storage::disk('public')->get($file);
        $lines = explode("\n", $contents);
        $collection1 = collect();
        $collection2 = collect();
        foreach ($lines as $line) {
            $report = explode(':', $line);
            if (isset($report[1]) && isset($report[2])) {
                //begin create array
                if ($report[1]==='61') {
                    $object = new stdClass();
                    $object = $report[2];
                    $collection1->push($object);
                }
                if ($report[1] === '86') {
                    $object = new stdClass();
                    $object = $report[2];
                    $collection2->push($object);
                }
            }

            // if (isset($report[1]) && isset($report[2])) {
            //     if ($report[1] === '61' || $report[1] === '86') {
            //         $object->code = $report[1];
            //         $object->detail = $report[2];
            //     }
            // }
        }

        $total = collect();
        foreach($collection1 as $col1) {
            $object = new stdClass();
            $object->data = $col1;
            $total->push($object);
        }

        dd($total);

        // return view('tes.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tes $tes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tes $tes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tes $tes)
    {
        //
    }
}
