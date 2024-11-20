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
        Schema::create('courseworks', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('student_id')->index('fk_coursework_students');
            $table->decimal('marks', 10, 0);
            $table->integer('year');
            $table->integer('semester');
            $table->integer('enrolment_id')->index('fk_courseworks_enrolments');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courseworks');
    }
};
