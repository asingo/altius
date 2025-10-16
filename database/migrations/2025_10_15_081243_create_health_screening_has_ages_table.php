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
        Schema::create('health_screening_has_ages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('health_screening_id')->constrained('health_screenings')->cascadeOnDelete();
            $table->foreignId('age_id')->constrained('category_ages')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_screening_has_ages');
    }
};
