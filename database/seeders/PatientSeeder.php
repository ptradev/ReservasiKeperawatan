<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('patients')->insert([
            [
                'name' => 'Ahmad Fauzi',
                'nik' => '3276011203990001',
                'phone' => '081234567890',
                'address' => 'Jl. Melati No. 5, Bandung',
                'birth_date' => '1999-03-12',
                'gender' => 'Laki-laki',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'nik' => '3276012504980002',
                'phone' => '082345678901',
                'address' => 'Jl. Kenanga No. 10, Jakarta',
                'birth_date' => '1998-04-25',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Budi Santoso',
                'nik' => '3276010101950003',
                'phone' => '083456789012',
                'address' => 'Jl. Mawar No. 3, Surabaya',
                'birth_date' => '1995-01-01',
                'gender' => 'Laki-laki',
            ],
        ]);
    }
}
