<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bku extends Model
{
    use HasRoles;

    protected $table = 'bku';
    protected $fillable = [
        'kdsatker', 'no_rekening', 'tanggal', 'bukti', 'uraian', 'debet', 'kredit', 'saldo'
    ];
}
