<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->bigIncrements('nurse_id');

            $table->string('name');
            $table->string('phone');
            $table->text('address');
            $table->string('specialization');
            $table->string('status');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nurses');
    }
};
