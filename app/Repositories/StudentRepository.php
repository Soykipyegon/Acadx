<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\BaseRepository;

class StudentRepository extends BaseRepository
{
    protected $fieldSearchable = [
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

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Student::class;
    }
}
