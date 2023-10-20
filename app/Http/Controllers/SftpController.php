<?php

namespace App\Http\Controllers;

use stdClass;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RekeningKoran;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SftpController extends Controller
{
    public function index()
    {
        $files = Storage::disk('sftp_bni')->files();
        return view('sftp.index', compact('files'));
    }

    public function show_old($file)
    {
        $contents = Storage::disk('sftp_bni')->get($file);

        $lines = explode("\n", $contents);
        $col1 = collect();
        $col2 = collect();
        $cols = collect();
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
        $i = 0;
        foreach($col1 as $item) {
            $object = new stdClass();
            $object = $item.'|'.$col2[$i];
            $object = explode('|', $object);
            $cols->push($object);
            $i++;
        }

        return view('sftp.show', compact('cols'));
    }


    public function show($file)
    {
        $contents = Storage::disk('sftp_bni')->get($file);

        $lines = explode("\n", $contents);
        $col0 = collect();
        $col1 = collect();
        $col2 = collect();
        $cols = collect();
        foreach ($lines as $line) {
            $report = explode(':', $line);
            if (isset($report[1]) && isset($report[2])) {
                if ($report[1] === '25') {
                    $object = new stdClass();
                    if(strlen($report[2])==7) {
                        $object = '000'.$report[2];
                    } elseif(strlen($report[2])==8) {
                        $object = '00'.$report[2];
                    } elseif(strlen($report[2])==9) {
                        $object = '0'.$report[2];
                    } else {
                        $object = $report[2];
                    }
                    $col0->push($object);
                }
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
        $i = 0;
        foreach($col1 as $item) {
            $object = new stdClass();
            $object = $col0[0].'//'.substr($item, 0, 6).'//'.substr($item, 6, 1).'//'.substr($item, 8, strlen($item)-14).'//'.$col2[$i];
            $object = explode('//', $object);
            $cols->push($object);
            $i++;
        }

        foreach ($cols as $col) {
            RekeningKoran::create([
                'bank' =>'BNI',
                'nomor' =>$col[0],
                'tanggal' => $col[1],
                'tipe' => $col[2],
                'nominal' =>$col[3],
                'uraian' => $col[4],
                'status' => '0',
            ]);
        }

        return dd($cols);

        // return view('sftp.show', compact('cols'));
    }



    public function tes()
    {
        $files = Storage::disk('sftp_mandiri')->files();
        return view('sftp.tes', compact('files'));
    }

    public function tes2_old($file)
    {
        $contents = Storage::disk('sftp_mandiri')->get($file);
        $lines = explode("\n", $contents);
        $col1 = collect();
        $col2 = collect();
        $cols = collect();
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


        $i = 0;
        foreach($col1 as $item) {
                $object = new stdClass();
                $object = $item.'|'.$col2[$i];
                $object = explode('|', $object);
                $cols->push($object);
                $i++;
            }

        return view('sftp.tes2', compact('cols'));
    }

    public function tes2($file)
    {
        $contents = Storage::disk('sftp_mandiri')->get($file);
        $lines = explode("\n", $contents);
        $col0 = collect();
        $col1 = collect();
        $col2 = collect();
        $cols = collect();
        foreach ($lines as $line) {
            $report = explode(':', $line);
            if (isset($report[1]) && isset($report[2])) {
                if ($report[1] === '25') {
                    $object = new stdClass();
                    $object = $report[2];
                    $col0->push(substr($object,15,13));
                }
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


        $i = 0;
        foreach($col1 as $item) {
                $object = new stdClass();
                $object = $col0[0].'//'.substr($item, 0, 6).'//'.substr($item, 10, 1).'//'.substr($item, 11, strlen($item)-46).'//'.$col2[$i];
                $object = explode('//', $object);
                $cols->push($object);
                $i++;
            }

            foreach ($cols as $col) {
                RekeningKoran::create([
                    'bank' =>'MANDIRI',
                    'nomor' =>$col[0],
                    'tanggal' => $col[1],
                    'tipe' => $col[2],
                    'nominal' =>$col[3],
                    'uraian' => $col[4],
                    'status' => '0',
                ]);
            }

            dd($cols);

        // return view('sftp.tes2', compact('cols'));
    }
}
