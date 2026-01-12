<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transactions')->insert([
            [
                'patient_id' => 1,
                'service_id' => 1,
                'reservation_date' => '2026-01-15',
                'payment_method' => 'cash',
                'status' => 'paid',
                'notes' => 'Pasien minta jadwal pagi',
                'paid_at' => Carbon::now(),
            ],
            [
                'patient_id' => 2,
                'service_id' => 2,
                'reservation_date' => '2026-01-16',
                'payment_method' => 'transfer',
                'status' => 'pending',
                'notes' => null,
                'paid_at' => null,
            ],
            [
                'patient_id' => 3,
                'service_id' => 1,
                'reservation_date' => '2026-01-17',
                'payment_method' => 'cash',
                'status' => 'paid',
                'notes' => 'Perlu peralatan tambahan',
                'paid_at' => Carbon::now(),
            ],
        ]);
    }
}
