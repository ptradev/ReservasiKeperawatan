<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TranscationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patientIds = DB::table('patients')->pluck('patient_id');
        $serviceIds = DB::table('services')->pluck('service_id');

        if ($patientIds->isEmpty() || $serviceIds->isEmpty()) {
            return;
        }

        $transactions = [
            [
                'payment_method' => 'cash',
                'status' => 'waiting',
                'notes' => 'Menunggu konfirmasi perawat',
            ],
            [
                'payment_method' => 'cashless',
                'status' => 'approved',
                'notes' => 'Pembayaran via transfer',
            ],
            [
                'payment_method' => 'cashless',
                'status' => 'completed',
                'notes' => 'Layanan telah selesai',
            ],
            [
                'payment_method' => 'cash',
                'status' => 'cancelled',
                'notes' => 'Pasien membatalkan reservasi',
            ],
        ];

        foreach ($transactions as $trx) {
            DB::table('transactions')->insert([
                'patient_id' => $patientIds->random(),
                'service_id' => $serviceIds->random(),
                'reservation_date' => Carbon::now()->addDays(rand(1, 7))->toDateString(),
                'payment_method' => $trx['payment_method'],
                'status' => $trx['status'],
                'notes' => $trx['notes'],
                'paid_at' => in_array($trx['status'], ['approved', 'completed'])
                    ? Carbon::now()
                    : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
