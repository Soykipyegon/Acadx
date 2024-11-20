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
        Schema::table('students', function (Blueprint $table) {
            $table->foreign(['course_id'], 'fk_students_course')->references(['id'])->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['department_id'], 'fk_students_department')->references(['id'])->on('departments')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('fk_students_course');
            $table->dropForeign('fk_students_department');
        });
    }
};
