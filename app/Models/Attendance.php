<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $table = 'attendances';

    public $fillable = [
        'student_id',
        'attendance_date',
        'attendance_status',
        'lesson_id'
    ];

    protected $casts = [
        'attendance_date' => 'date',
        'attendance_status' => 'string'
    ];

    public static array $rules = [
        'student_id' => 'required',
        'attendance_date' => 'required',
        'attendance_status' => 'required|string|max:255',
        'lesson_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function lesson(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Lesson::class, 'lesson_id');
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Student::class, 'student_id');
    }
}
