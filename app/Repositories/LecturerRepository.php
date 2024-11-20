<?php

namespace App\Repositories;

use App\Models\Lecturer;
use App\Repositories\BaseRepository;

class LecturerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'unit_id',
        'employee_no',
        'department_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Lecturer::class;
    }
}
