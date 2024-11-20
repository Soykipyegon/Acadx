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
        Schema::table('receipts', function (Blueprint $table) {
            $table->foreign(['fees_id'], 'fk_receipt_fees')->references(['id'])->on('invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['student_id'], 'fk_receipt_students')->references(['id'])->on('students')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropForeign('fk_receipt_fees');
            $table->dropForeign('fk_receipt_students');
        });
    }
};
