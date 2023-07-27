<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bku extends Model
{
    protected $table = 'bku';
    protected $fillable = [
        'tanggal', 'bukti', 'uraian', 'debet', 'kredit', 'saldo'
    ];
}
