<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coursework extends Model
{
    public $table = 'courseworks';

    public $fillable = [
        'student_id',
        'marks',
        'enrolment_id'
    ];

    protected $casts = [
        'marks' => 'decimal:0'
    ];

    public static array $rules = [
        'student_id' => 'required',
        'marks' => 'required|numeric',
        'enrolment_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function enrolment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Enrolment::class, 'enrolment_id');
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Student::class, 'student_id');
    }
}
