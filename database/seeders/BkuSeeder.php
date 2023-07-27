<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Bku::create(
            [
            'kdsatker' => '411792',
            'no_rekening' => '002214211',
            'tanggal' => '27-07-2023',
            'bukti' => '121151',
            'uraian' => 'uang jaminan lelang',
            'debet' => '5234000',
            'kredit' => '1000000',
            'saldo' => '4234000',
            ]
        );
    }
}
