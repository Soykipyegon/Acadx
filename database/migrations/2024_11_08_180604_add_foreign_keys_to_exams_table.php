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
        Schema::table('exams', function (Blueprint $table) {
            $table->foreign(['enrolment_id'], 'fk_exams_enrolments')->references(['id'])->on('enrolments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['student_id'], 'fk_exams_students')->references(['id'])->on('students')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropForeign('fk_exams_enrolments');
            $table->dropForeign('fk_exams_students');
        });
    }
};
