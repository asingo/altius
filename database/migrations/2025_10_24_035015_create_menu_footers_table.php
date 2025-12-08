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
        Schema::create('menu_footers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('page_id')->nullable()->constrained('pages')->cascadeOnUpdate();
            $table->string('slug')->nullable();
            $table->string('route_name')->nullable();
            $table->string('icon')->nullable();
            $table->string('index')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_footers');
    }
};
