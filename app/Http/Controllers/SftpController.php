<?php

namespace App\Http\Controllers;

use stdClass;
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
        $size =Storage::disk('sftp')->size($file);
        $path =Storage::disk('sftp')->path($file);
        $lastModified =Storage::disk('sftp')->lastModified($file);
        // $get =Storage::disk('sftp')->get($file);

        // $contents = File::get($get);
        $contents = Storage::disk('sftp')->get($file);
        $lines = explode("\n", $contents);
        $collection = collect();
        foreach ($lines as $line) {
            $report = explode(':', $line);
            if (isset($report[1]) && isset($report[2])) {
                if ($report[1] === '61' || $report[1] === '86') {
                    $object = new stdClass();
                    $object->code = $report[1];
                    $object->detail = $report[2];
                    $collection->push($object);
                }
            }
            // array_push($array, $report);
        }

        return view('sftp.show', compact('collection'));
        // return dd($collection);
    }
}
