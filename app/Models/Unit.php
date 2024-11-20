<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public $table = 'units';

    public $fillable = [
        'unit_code',
        'unit_name',
        'course_id'
    ];

    protected $casts = [
        'unit_code' => 'string',
        'unit_name' => 'string'
    ];

    public static array $rules = [
        'unit_code' => 'required|string|max:100',
        'unit_name' => 'required|string|max:100',
        'course_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id');
    }

    public function enrolments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Enrolment::class, 'units_id');
    }

    public function lecturers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Lecturer::class, 'unit_id');
    }

    public function lessons(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Lesson::class, 'unit_id');
    }
}
