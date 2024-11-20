<?php

namespace App\Repositories;

use App\Models\Coursework;
use App\Repositories\BaseRepository;

class CourseworkRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'student_id',
        'marks',
        'enrolment_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Coursework::class;
    }
}
