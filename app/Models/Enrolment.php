<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    public $table = 'enrolments';

    public $fillable = [
        'student_id',
        'semester',
        'units_id',
        'course_id',
        'semester_status',
        'year'
    ];

    protected $casts = [
        'semester_status' => 'string'
    ];

    public static array $rules = [
        'student_id' => 'nullable',
        'semester' => 'required',
        'units_id' => 'required',
        'course_id' => 'required',
        'semester_status' => 'required|string|max:65535',
        'year' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Student::class, 'student_id');
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id');
    }

    public function units(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Unit::class, 'units_id');
    }
    public function unit()
{
    return $this->belongsTo(Unit::class, 'units_id');
}


    public function courseworks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Coursework::class, 'enrolment_id');
    }

    public function exams(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Exam::class, 'enrolment_id');
    }

    public function grades(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Grade::class, 'enrolment_id');
    }

    public function lessons(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Lesson::class, 'enrolment_id');
    }
}
