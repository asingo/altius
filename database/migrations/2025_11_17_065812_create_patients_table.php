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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('email');
            $table->string('id_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_type')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('wa_number')->nullable();
            $table->text('address')->nullable();
            $table->string('province')->nullable();
            $table->foreign('province')->references('kode')->on('wilayah');
            $table->string('regency')->nullable();
            $table->foreign('regency')->references('kode')->on('wilayah');
            $table->string('subdistrict')->nullable();
            $table->foreign('subdistrict')->references('kode')->on('wilayah');;
            $table->string('rt_rw')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('street')->nullable();
            $table->text('photo')->nullable();
            $table->boolean('is_child')->default(false);
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
