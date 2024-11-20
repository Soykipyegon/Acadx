<?php

namespace App\Repositories;

use App\Models\Receipt;
use App\Repositories\BaseRepository;

class ReceiptRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'student_id',
        'receipt_no',
        'amount_paid',
        'mode_of_payment',
        'refrence_no',
        'invoice_id',
        'balance'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Receipt::class;
    }
}
