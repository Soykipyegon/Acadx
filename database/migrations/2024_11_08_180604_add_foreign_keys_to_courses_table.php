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
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign(['department_id'], 'fk_courses_departments')->references(['id'])->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['level_id'], 'fk_courses_level')->references(['id'])->on('levels')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('fk_courses_departments');
            $table->dropForeign('fk_courses_level');
        });
    }
};
