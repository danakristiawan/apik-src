<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use stdClass;
use App\Models\Tes;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
=======
use App\Models\tes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
>>>>>>> f971cc2a538daf6c05016ce867e36a98a95bfbcf

class TesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        $files = Storage::disk('public')->files();
        return view('tes.index', compact('files'));
=======
        $directory = '/Report/Incoming';
        $files = Storage::disk('sftp')->files();
        return view('sftp.index', compact('files'));
>>>>>>> f971cc2a538daf6c05016ce867e36a98a95bfbcf
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        //
=======
        
>>>>>>> f971cc2a538daf6c05016ce867e36a98a95bfbcf
    }

    /**
     * Store a newly created resource in storage.
     */
<<<<<<< HEAD
    public function store(Request $request)
    {
        //
=======
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
>>>>>>> f971cc2a538daf6c05016ce867e36a98a95bfbcf
    }

    /**
     * Display the specified resource.
     */
<<<<<<< HEAD
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
=======
    public function show(tes $tes)
    {
        //
>>>>>>> f971cc2a538daf6c05016ce867e36a98a95bfbcf
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
    public function edit(Tes $tes)
=======
    public function edit(tes $tes)
>>>>>>> f971cc2a538daf6c05016ce867e36a98a95bfbcf
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, Tes $tes)
=======
    public function update(Request $request, tes $tes)
>>>>>>> f971cc2a538daf6c05016ce867e36a98a95bfbcf
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(Tes $tes)
=======
    public function destroy(tes $tes)
>>>>>>> f971cc2a538daf6c05016ce867e36a98a95bfbcf
    {
        //
    }
}
