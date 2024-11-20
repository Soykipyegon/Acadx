<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $table = 'levels';

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

    public function courses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Course::class, 'level_id');
    }
}
