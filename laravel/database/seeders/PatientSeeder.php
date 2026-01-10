<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            [
                'name' => 'Ahmad Fauzi',
                'nik' => 3201010101010001,
                'phone' => 812345678,
                'address' => 'Jl. Merdeka No. 1, Jakarta',
                'birth_date' => '1995-06-15',
                'gender' => 'male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Aisyah',
                'nik' => 3201010101010002,
                'phone' => 813456789,
                'address' => 'Jl. Sudirman No. 10, Bandung',
                'birth_date' => '1998-02-20',
                'gender' => 'female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso',
                'nik' => 3201010101010003,
                'phone' => 814567890,
                'address' => 'Jl. Ahmad Yani No. 5, Surabaya',
                'birth_date' => '1990-11-03',
                'gender' => 'male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
