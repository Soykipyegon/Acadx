<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Repositories\BaseRepository;

class InvoiceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'amount',
        'student_id',
        'year',
        'semester'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Invoice::class;
    }
}
