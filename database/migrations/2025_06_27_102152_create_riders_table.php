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
        Schema::create('riders', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 20);
            $table->string('mobile_number', 20);
            $table->string('email', 20)->nullable();
            $table->string('emirates_id_number', 15)->unique();
            $table->string('passport_number', 15)->unique();
            $table->date('visa_expiry_date');
            $table->string('date_of_birth');
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riders');
    }
};
