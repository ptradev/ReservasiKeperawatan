<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Menambah foreign key ke tabel reservations
        Schema::table('reservations', function (Blueprint $table) {
            // Pastikan tipe datanya adalah unsignedBigInteger agar cocok dengan users.id
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('nurse_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });

        // Menambah foreign key ke tabel schedules
        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('nurse_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Menambah foreign key ke tabel logs
        Schema::table('logs', function (Blueprint $table) {
            // Karena user_id di logs mungkin string/nullable dari input sebelumnya,
// kita pastikan referensinya ke users.id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['nurse_id']);
            $table->dropForeign(['service_id']);
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['nurse_id']);
        });

        Schema::table('logs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};