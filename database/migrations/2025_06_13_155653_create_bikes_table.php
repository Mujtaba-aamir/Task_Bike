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
        Schema::create('bikes', function (Blueprint $table) {
            $table->string('plate_number',6)->unique();
            $table->string('model', 10);
            $table->integer('model_year');
            $table->string('chassis_number',10)->unique();
            $table->string('engine_number', 10)->unique();
            $table->string('mulkiya_front_image');
            $table->string('mulkiya_back_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bikes');
    }
};
