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
        Schema::table('lessons', function (Blueprint $table) {
            $table->foreign(['enrolment_id'], 'fk_lessons_enrolments')->references(['id'])->on('enrolments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['unit_id'], 'fk_lessons_units')->references(['id'])->on('units')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign('fk_lessons_enrolments');
            $table->dropForeign('fk_lessons_units');
        });
    }
};
