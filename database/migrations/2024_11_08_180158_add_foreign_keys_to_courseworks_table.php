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
            $table->foreign(['student_id'], 'fk_coursework_students')->references(['id'])->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['enrolment_id'], 'fk_courseworks_enrolments')->references(['id'])->on('enrolments')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courseworks', function (Blueprint $table) {
            $table->dropForeign('fk_coursework_students');
            $table->dropForeign('fk_courseworks_enrolments');
        });
    }
};
