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
        Schema::table('enrolments', function (Blueprint $table) {
            $table->foreign(['course_id'], 'fk_enrolments_courses')->references(['id'])->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['units_id'], 'fk_enrolments_units')->references(['id'])->on('units')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enrolments', function (Blueprint $table) {
            $table->dropForeign('fk_enrolments_courses');
            $table->dropForeign('fk_enrolments_units');
        });
    }
};
