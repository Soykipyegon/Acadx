<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $table = 'lessons';

    public $fillable = [
        'credits',
        'number_of_hours',
        'unit_id',
        'enrolment_id'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'credits' => 'required',
        'number_of_hours' => 'required',
        'unit_id' => 'required',
        'enrolment_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function enrolment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Enrolment::class, 'enrolment_id');
    }

    public function unit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Unit::class, 'unit_id');
    }

    public function attendances(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Attendance::class, 'lesson_id');
    }
}
