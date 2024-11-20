<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $table = 'courses';

    public $fillable = [
        'name',
        'level_id',
        'department_id'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:65535',
        'level_id' => 'required',
        'department_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Department::class, 'department_id');
    }

    public function level(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Level::class, 'level_id');
    }

    public function enrolments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Enrolment::class, 'course_id');
    }

    public function fees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Fee::class, 'course_id');
    }

    public function students(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Student::class, 'course_id');
    }

    public function units(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Unit::class, 'course_id');
    }
}
