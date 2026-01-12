<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'service_name' => 'Perawatan Luka',
                'description' => 'Perawatan luka ringan hingga sedang di rumah pasien',
                'price' => 150000,
                'duration' => 60,
                'nurse_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'service_name' => 'Suntik Vitamin',
                'description' => 'Layanan suntik vitamin sesuai kebutuhan pasien',
                'price' => 100000,
                'duration' => 30,
                'nurse_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'service_name' => 'Perawatan Lansia',
                'description' => 'Pendampingan dan perawatan lansia di rumah',
                'price' => 300000,
                'duration' => 120,
                'nurse_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
