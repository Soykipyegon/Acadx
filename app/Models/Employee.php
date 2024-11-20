<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $table = 'employees';

    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'id_number',
        'title',
        'address',
        'school_id',
        'department_id'
    ];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'title' => 'string',
        'address' => 'string'
    ];

    public static array $rules = [
        'first_name' => 'required|string|max:100',
        'last_name' => 'required|string|max:100',
        'email' => 'required|string|max:255',
        'phone_number' => 'required',
        'id_number' => 'required',
        'title' => 'required|string|max:20',
        'address' => 'required|string|max:100',
        'school_id' => 'required',
        'department_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Department::class, 'department_id');
    }

    public function school(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\School::class, 'school_id');
    }

    public function departments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Department::class, 'employee_no');
    }

    public function lecturers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Lecturer::class, 'employee_no');
    }
}
