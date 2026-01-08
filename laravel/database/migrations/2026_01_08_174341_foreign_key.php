<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | SERVICES -> NURSES
        |--------------------------------------------------------------------------
        */
        Schema::table('services', function (Blueprint $table) {
            $table->foreign('nurse_id')
                ->references('nurse_id')
                ->on('nurses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        /*
        |--------------------------------------------------------------------------
        | TRANSACTIONS -> PATIENTS
        |--------------------------------------------------------------------------
        */
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('patient_id')
                ->references('patient_id')
                ->on('patients')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        /*
        |--------------------------------------------------------------------------
        | TRANSACTIONS -> SERVICES
        |--------------------------------------------------------------------------
        */
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('service_id')
                ->references('service_id')
                ->on('services')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['service_id']);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['nurse_id']);
        });
    }
};
