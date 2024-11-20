<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Repositories\BaseRepository;

class LessonRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'credits',
        'number_of_hours',
        'unit_id',
        'enrolment_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Lesson::class;
    }
}
