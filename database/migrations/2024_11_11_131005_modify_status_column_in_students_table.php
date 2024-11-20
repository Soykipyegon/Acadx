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
            // Drop the existing boolean 'status' column
            $table->dropColumn('status');
        });

        Schema::table('students', function (Blueprint $table) {
            // Re-add 'status' column as a text type
            $table->string('status')->nullable()->default('active'); // or default to another value like 'deferred', 'graduated', etc.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the text 'status' column
            $table->dropColumn('status');
        });

        Schema::table('students', function (Blueprint $table) {
            // Re-add 'status' column as a boolean type
            $table->boolean('status')->default(1);
        });
    }
};
