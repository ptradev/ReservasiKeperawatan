<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'service_name' => 'Perawatan Luka',
                'description' => 'Perawatan luka ringan hingga sedang oleh perawat profesional',
                'price' => 150000,
                'duration' => 60,
                'nurse_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Perawatan Infus',
                'description' => 'Pemasangan dan perawatan infus di rumah pasien',
                'price' => 200000,
                'duration' => 90,
                'nurse_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Perawatan Lansia',
                'description' => 'Pendampingan dan perawatan lansia harian',
                'price' => 300000,
                'duration' => 120,
                'nurse_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
