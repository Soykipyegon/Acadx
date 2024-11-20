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
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email');
            $table->integer('phone_number');
            $table->integer('id_number');
            $table->char('title', 20);
            $table->string('address', 100);
            $table->integer('school_id')->index('fk_employees_school');
            $table->integer('department_id')->index('fk_employees_departments');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
