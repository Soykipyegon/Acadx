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
        Schema::table('departments', function (Blueprint $table) {
            $table->foreign(['employee_no'], 'fk_departments_employees')->references(['id'])->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['school_id'], 'fk_departments_school')->references(['id'])->on('schools')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign('fk_departments_employees');
            $table->dropForeign('fk_departments_school');
        });
    }
};
