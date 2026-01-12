<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NurseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nurses')->insert([
            [
                'name' => 'Siti Aminah',
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 10, Jakarta',
                'specialization' => 'Perawat Umum',
                'status' => 'aktif',
            ],
            [
                'name' => 'Dewi Lestari',
                'phone' => '082345678901',
                'address' => 'Jl. Sudirman No. 22, Bandung',
                'specialization' => 'Perawat Anak',
                'status' => 'aktif',
            ],
            [
                'name' => 'Rina Kurniawati',
                'phone' => '083456789012',
                'address' => 'Jl. Diponegoro No. 5, Surabaya',
                'specialization' => 'Perawat Gigi',
                'status' => 'nonaktif',
            ],
        ]);
    }
}
