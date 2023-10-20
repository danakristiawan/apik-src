<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningKoran extends Model
{
    use HasFactory;

    protected $table = 'data_rekening_koran';

    protected $fillable = ['bank','nomor', 'tanggal', 'tipe', 'nominal', 'uraian', 'status'];
}
