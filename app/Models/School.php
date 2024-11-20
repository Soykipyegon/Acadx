<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $table = 'schools';

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function departments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Department::class, 'school_id');
    }

    public function employees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Employee::class, 'school_id');
    }
}
