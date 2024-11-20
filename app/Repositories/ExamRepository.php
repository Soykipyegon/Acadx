<?php

namespace App\Repositories;

use App\Models\Exam;
use App\Repositories\BaseRepository;

class ExamRepository extends BaseRepository
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
        return Exam::class;
    }
}
