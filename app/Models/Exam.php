<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $table = 'exams';

    public $fillable = [
        'student_id',
        'marks',
        'enrolment_id'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'student_id' => 'required',
        'marks' => 'required',
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
