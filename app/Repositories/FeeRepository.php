<?php

namespace App\Repositories;

use App\Models\Fee;
use App\Repositories\BaseRepository;

class FeeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'course_id',
        'expected_amount'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Fee::class;
    }
}
