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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_category_id')->nullable()->constrained('career_categories');
            $table->string('slug');
            $table->string('title');
            $table->foreignId('location_id')->nullable()->constrained('locations');
            $table->foreignId('department_id')->nullable()->constrained('departments');
            $table->longText('qualification')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
