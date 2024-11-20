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
        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign(['lesson_id'], 'fk_attendances_lessons')->references(['id'])->on('lessons')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['student_id'], 'fk_attendances_students')->references(['id'])->on('students')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign('fk_attendances_lessons');
            $table->dropForeign('fk_attendances_students');
        });
    }
};
