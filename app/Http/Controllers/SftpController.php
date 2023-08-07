<?php

namespace App\Http\Controllers;

use stdClass;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SftpController extends Controller
{
    public function index()
    {
        $directory = '/Report/Incoming';
        $files = Storage::disk('sftp')->files();
        return view('sftp.index', compact('files'));
    }

    public function show($file)
    {
        // $contents = File::get($get);
        $contents = Storage::disk('sftp')->get($file);
        // $lines = explode("\n", $contents);
        // $collection = collect();
        // foreach ($lines as $line) {
        //     $report = explode(':', $line);
        //     if (isset($report[1]) && isset($report[2])) {
        //         if ($report[1] === '61' || $report[1] === '86') {
        //             $object = new stdClass();
        //             $object->code = $report[1];
        //             $object->detail = $report[2];
        //             $collection->push($object);
        //         }
        //     }
        //     // array_push($array, $report);
        // }

        $lines = explode("\n", $contents);
        $col1 = collect();
        $col2 = collect();
        foreach ($lines as $line) {
            $report = explode(':', $line);
            if (isset($report[1]) && isset($report[2])) {
                if ($report[1] === '61') {
                    $object = new stdClass();
                    $object = $report[2];
                    $col1->push($object);
                }
                if ($report[1] === '86') {
                    $object = new stdClass();
                    $object = $report[2];
                    $col2->push($object);
                }
            }
        }
        $cols = collect();
        $i = 0;
        foreach($col1 as $item) {
            $object = new stdClass();
            $object = $item.'|'.$col2[$i];
            $object = explode('|', $object);
            $cols->push($object);
            $i++;
        }

        // dd($cols);

        return view('sftp.show', compact('cols'));
    }

    public function tes()
    {
        $contents = File::get('storage/202307270617-DJKN-MT940_H1-0010541288.csv');

        // $collection1 = collect();
        // $collection2 = collect();
        // $lines = explode("\n", $contents);
        // foreach($lines as $line) {
        //     if(substr($line, 0,3)===':61') {
        //         $object = new stdClass();
        //         $object = $line;
        //         $collection1->push($object);
        //     }
        //     if(substr($line, 0,3)===':86') {
        //         $object = new stdClass();
        //         $object = $line;
        //         $collection2->push($object);
        //     }
        // }
        
        // $cols1 = collect();
        // $i = 0;
        // foreach($collection1 as $col1) {
        //     $object = new stdClass();
        //     $object = $col1 . ' '. $collection2[$i];
        //     $cols1->push($object);
        //     $i++;
        // }

        // return dd($cols1);

        $lines = explode("\n", $contents);
        $col1 = collect();
        $col2 = collect();
        foreach ($lines as $line) {
            $report = explode(':', $line);
            if (isset($report[1]) && isset($report[2])) {
                if ($report[1] === '61') {
                    $object = new stdClass();
                    $object = $report[2];
                    $col1->push($object);
                }
                if ($report[1] === '86') {
                    $object = new stdClass();
                    $object = $report[2];
                    $col2->push($object);
                }
            }
        }
        $cols = collect();
        $i = 0;
        foreach($col1 as $item) {
            $object = new stdClass();
            $object = $item.'|'.$col2[$i];
            $object = explode('|', $object);
            $cols->push($object);
            $i++;
        }

        // dd($cols);

        return view('sftp.tes2', compact('cols'));

    }
}
