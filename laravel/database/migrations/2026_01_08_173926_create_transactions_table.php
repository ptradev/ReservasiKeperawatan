<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');

            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('service_id');

            $table->date('reservation_date');

            $table->enum('payment_method', ["cash", "cashless"]);
            $table->enum('status', ["waiting", "approved", "completed", "cancelled"]);
            $table->text('notes')->nullable();

            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
