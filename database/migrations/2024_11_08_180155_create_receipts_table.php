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
        Schema::create('receipts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('student_id')->index('fk_receipt_students');
            $table->integer('receipt_no');
            $table->integer('amount_paid');
            $table->text('mode_of_payment');
            $table->integer('refrence_no');
            $table->integer('fees_id')->index('fk_receipt_fees');
            $table->integer('balance');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
