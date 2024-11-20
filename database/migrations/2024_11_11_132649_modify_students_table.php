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
            $table->dropForeign('fk_students_department');
            // Remove `department_id` and `full_name` columns
            $table->dropColumn(['department_id', 'full_name']);

            // Add `level_id` as a foreign key to `levels` table
            $table->Integer('level_id')->after('date_of_admission');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');

            // Add `first_name`, `surname`, and `other_names`
            $table->string('first_name', 191)->after('admn_no');
            $table->string('surname', 191)->after('first_name');
            $table->string('other_names')->nullable()->after('surname');

            // Add `date_of_birth`
            $table->date('date_of_birth')->after('date_of_admission');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Rollback changes
            $table->dropForeign(['level_id']);
            $table->dropColumn(['level_id', 'first_name', 'surname', 'other_names', 'date_of_birth']);
            $table->string('full_name');
            $table->unsignedBigInteger('department_id');
        });
    }
};
