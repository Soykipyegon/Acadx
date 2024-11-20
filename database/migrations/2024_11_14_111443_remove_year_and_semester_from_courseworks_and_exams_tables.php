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
        Schema::table('courseworks', function (Blueprint $table) {
            $table->dropColumn(['year', 'semester']);
        });

        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn(['year', 'semester']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courseworks', function (Blueprint $table) {
            $table->integer('year')->nullable();
            $table->integer('semester')->nullable();
        });

        Schema::table('exams', function (Blueprint $table) {
            $table->integer('year')->nullable();
            $table->integer('semester')->nullable();
        });
    }
};
