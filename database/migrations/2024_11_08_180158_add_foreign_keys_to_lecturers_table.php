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
        Schema::table('lecturers', function (Blueprint $table) {
            $table->foreign(['department_id'], 'fk_lecturer_department')->references(['id'])->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['unit_id'], 'fk_lecturer_units')->references(['id'])->on('units')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['employee_no'], 'fk_lecturers_employees')->references(['id'])->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lecturers', function (Blueprint $table) {
            $table->dropForeign('fk_lecturer_department');
            $table->dropForeign('fk_lecturer_units');
            $table->dropForeign('fk_lecturers_employees');
        });
    }
};
