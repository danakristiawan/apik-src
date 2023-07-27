<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Satker::create(
            [
            'code' => '411792',
            'name' => 'Kantor Pusat DJKN',
            ]
        );
        \App\Models\Satker::create(
            [
            'code' => '506101',
            'name' => 'Kanwil DJKN Riau, Sumatera Barat, dan Kepulauan Riau',
            ]
        );
    }
}
