<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public $table = 'grades';

    public $fillable = [
        'score',
        'enrolment_id'
    ];

    protected $casts = [
        'score' => 'string'
    ];

    public static array $rules = [
        'score' => 'required|string|max:50',
        'enrolment_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function enrolment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Enrolment::class, 'enrolment_id');
    }
}
