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
        Schema::table('employees', function (Blueprint $table) {
            $table->foreign(['department_id'], 'fk_employees_departments')->references(['id'])->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['school_id'], 'fk_employees_school')->references(['id'])->on('schools')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('fk_employees_departments');
            $table->dropForeign('fk_employees_school');
        });
    }
};
