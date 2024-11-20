<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $table = 'invoices';

    public $fillable = [
        'amount',
        'student_id',
        'year',
        'semester'
    ];

    protected $casts = [
        'semester' => 'string'
    ];

    public static array $rules = [
        'amount' => 'required',
        'student_id' => 'required',
        'year' => 'required',
        'semester' => 'required|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Student::class, 'student_id');
    }

    public function receipts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Receipt::class, 'invoice_id');
    }
}
