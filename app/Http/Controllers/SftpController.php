<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        // $path =Storage::disk('sftp')->path($file);
        $lastModified =Storage::disk('sftp')->lastModified($file);
        return view('sftp.show', compact('size', 'lastModified'));
    }
}
