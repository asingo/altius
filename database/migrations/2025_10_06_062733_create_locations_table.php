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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->text('heading')->nullable();
            $table->text('about_title')->nullable();
            $table->json('about_speciality')->nullable();
            $table->text('about_description')->nullable();
            $table->text('image')->nullable();
            $table->text('address')->nullable();
            $table->string('general_number')->nullable();
            $table->string('customer_care')->nullable();
            $table->text('link_maps')->nullable();
            $table->text('link_embedded')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
