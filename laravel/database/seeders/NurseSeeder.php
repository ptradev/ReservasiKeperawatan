<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nurses')->insert([
            [
                'name' => 'Suster Maria',
                'phone' => '081234567801',
                'address' => 'Jl. Melati No. 12, Jakarta',
                'specialization' => 'Perawat Umum',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suster Dewi',
                'phone' => '081234567802',
                'address' => 'Jl. Kenanga No. 5, Bandung',
                'specialization' => 'Perawat Anak',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suster Rina',
                'phone' => '081234567803',
                'address' => 'Jl. Anggrek No. 20, Surabaya',
                'specialization' => 'Perawat Lansia',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
