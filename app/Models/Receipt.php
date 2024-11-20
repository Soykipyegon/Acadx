<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public $table = 'receipts';

    public $fillable = [
        'student_id',
        'receipt_no',
        'amount_paid',
        'mode_of_payment',
        'refrence_no',
        'invoice_id',
        'balance'
    ];

    protected $casts = [
        'mode_of_payment' => 'string'
    ];

    public static array $rules = [
        'student_id' => 'required',
        'receipt_no' => 'required',
        'amount_paid' => 'required',
        'mode_of_payment' => 'required|string|max:65535',
        'refrence_no' => 'required',
        'invoice_id' => 'required',
        'balance' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function invoice(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Invoice::class, 'invoice_id');
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Student::class, 'student_id');
    }
}
