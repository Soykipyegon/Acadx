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
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('admn_no', 100)->nullable();
            $table->string('email')->nullable();
            $table->longText('full_name');
            $table->integer('phone_number');
            $table->string('address');
            $table->integer('id_number')->nullable();
            $table->date('date_of_admission')->default('curdate()');
            $table->integer('department_id')->nullable()->index('fk_students_department');
            $table->integer('course_id')->index('fk_students_course');
            $table->string('gender', 50);
            $table->boolean('status');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
