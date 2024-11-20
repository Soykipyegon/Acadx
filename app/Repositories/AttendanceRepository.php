<?php

namespace App\Repositories;

use App\Models\Attendance;
use App\Repositories\BaseRepository;

class AttendanceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'student_id',
        'attendance_date',
        'attendance_status',
        'lesson_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Attendance::class;
    }
}
