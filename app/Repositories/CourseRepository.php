<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\BaseRepository;

class CourseRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'level_id',
        'department_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Course::class;
    }
}
