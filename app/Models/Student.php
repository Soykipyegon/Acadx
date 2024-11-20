<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = 'students';

    public $fillable = [
        'admn_no',
        'first_name',
        'surname',
        'other_names',
        'email',
        'phone_number',
        'address',
        'id_number',
        'date_of_admission',
        'date_of_birth',
        'level_id',
        'course_id',
        'gender',
        'status'
    ];

    protected $casts = [
        'admn_no' => 'string',
        'first_name' => 'string',
        'surname' => 'string',
        'other_names' => 'string',
        'email' => 'string',
        'address' => 'string',
        'date_of_admission' => 'date',
        'date_of_birth' => 'date',
        'gender' => 'string',
        'status' => 'string'
    ];

    public static array $rules = [
        'admn_no' => 'nullable|string|max:100',
        'first_name' => 'required|string|max:191',
        'surname' => 'required|string|max:191',
        'other_names' => 'nullable|string|max:191',
        'email' => 'nullable|string|max:255',
        'phone_number' => 'required',
        'address' => 'required|string|max:255',
        'id_number' => 'nullable',
        'date_of_admission' => 'required',
        'date_of_birth' => 'required',
        'level_id' => 'required',
        'course_id' => 'required',
        'gender' => 'required|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'status' => 'nullable|string|max:191'
    ];

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id');
    }
    public function level()
{
    return $this->belongsTo(Level::class);
}

    public function attendances(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Attendance::class, 'student_id');
    }

    public function courseworks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Coursework::class, 'student_id');
    }

    public function exams(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Exam::class, 'student_id');
    }

    public function invoices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Invoice::class, 'student_id');
    }

    public function receipts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Receipt::class, 'student_id');
    }

    public function department()
{
    return $this->hasOneThrough(
        Department::class,
        Course::class,
        'id',          // Foreign key on the Course table
        'id',          // Foreign key on the Department table
        'course_id',   // Local key on the Student table
        'department_id' // Local key on the Course table
    );
}

}
