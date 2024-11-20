<?php

namespace App\Repositories;

use App\Models\Enrolment;
use App\Repositories\BaseRepository;

class EnrolmentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'student_id',
        'semester',
        'units_id',
        'course_id',
        'semester_status',
        'year'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Enrolment::class;
    }
}
