<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    protected $table = [
        'pages',
        'articles',
        'news',
        'health_screenings',
        'offers'
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->table as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->text('seo_title')->nullable();
                $table->text('seo_keyword')->nullable();
                $table->text('seo_description')->nullable();
                $table->boolean('seo_index')->default(true);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->table as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('seo_title');
                $table->dropColumn('seo_keyword');
                $table->dropColumn('seo_description');
                $table->dropColumn('seo_index');
            });
        }
    }
};
