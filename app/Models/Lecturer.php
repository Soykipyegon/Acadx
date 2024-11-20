<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public $table = 'lecturers';

    public $fillable = [
        'unit_id',
        'employee_no',
        'department_id'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'unit_id' => 'required',
        'employee_no' => 'required',
        'department_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function employeeNo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_no');
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Department::class, 'department_id');
    }

    public function unit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Unit::class, 'unit_id');
    }
    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_no');
    }
}
