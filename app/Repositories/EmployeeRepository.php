<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'id_number',
        'title',
        'address',
        'school_id',
        'department_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Employee::class;
    }
}
