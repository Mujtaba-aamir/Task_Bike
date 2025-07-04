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
        Schema::create('bike_rider', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bike_id')->references('id')->on('bikes')->cascadeOnDelete();
            $table->foreignId('rider_id')->references('id')->on('riders')->cascadeOnDelete();
            $table->date('assigned_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bike_rider');
    }
};
