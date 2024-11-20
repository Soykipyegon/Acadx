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
        Schema::create('enrolments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('semester');
            $table->integer('units_id')->index('fk_enrolments_units');
            $table->integer('course_id')->index('fk_enrolments_courses');
            $table->text('semester_status');
            $table->integer('year');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolments');
    }
};
