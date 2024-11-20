<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    public $table = 'fees';

    public $fillable = [
        'course_id',
        'expected_amount'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'course_id' => 'required',
        'expected_amount' => 'required'
    ];

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id');
    }
}
