<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $table = 'departments';

    public $fillable = [
        'name',
        'employee_no',
        'school_id'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:100',
        'employee_no' => 'required',
        'school_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_no');
    }

    public function school(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\School::class, 'school_id');
    }

    public function courses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Course::class, 'department_id');
    }

    public function employees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Employee::class, 'department_id');
    }

    public function lecturers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Lecturer::class, 'department_id');
    }

    public function students(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Student::class, 'department_id');
    }
}
