<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->uuid('ticket_code')->unique();
            $table->foreignId('flight_id')->references('id')->on('flights')->cascadeOnDelete();
            $table->string('passenger_name');
            $table->string('passenger_phone', 14);
            $table->string('seat_number', 3);
            $table->integer('is_boarding')->default(0);
            $table->dateTime('boarding_time')->nullable();
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
