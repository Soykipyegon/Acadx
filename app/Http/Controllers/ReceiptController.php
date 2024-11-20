<?php

namespace App\Http\Controllers;

use App\DataTables\ReceiptDataTable;
use App\Http\Requests\CreateReceiptRequest;
use App\Http\Requests\UpdateReceiptRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Invoice;
use App\Models\Student;
use App\Repositories\ReceiptRepository;
use Illuminate\Http\Request;
use Flash;

class ReceiptController extends AppBaseController
{
    /** @var ReceiptRepository $receiptRepository*/
    private $receiptRepository;

    public function __construct(ReceiptRepository $receiptRepo)
    {
        $this->receiptRepository = $receiptRepo;
    }

    /**
     * Display a listing of the Receipt.
     */
    public function index(ReceiptDataTable $receiptDataTable)
    {
    return $receiptDataTable->render('receipts.index');
    }


    /**
     * Show the form for creating a new Receipt.
     */
    public function create()
    {
        $students = Student::select('id', 'admn_no', 'surname', 'first_name')
        ->get()
        ->mapWithKeys(function ($student) {
            return [$student->id => $student->admn_no . ' ' . $student->surname . ' ' . $student->first_name];
        });
        $invoices = Invoice::pluck('amount','id');
        return view('receipts.create', compact('students', 'invoices'));
    }

    /**
     * Store a newly created Receipt in storage.
     */
    public function store(CreateReceiptRequest $request)
    {
        $input = $request->all();

        $receipt = $this->receiptRepository->create($input);

        Flash::success('Receipt saved successfully.');

        return redirect(route('receipts.index'));
    }

    /**
     * Display the specified Receipt.
     */
    public function show($id)
    {
        $receipt = $this->receiptRepository->find($id);

        if (empty($receipt)) {
            Flash::error('Receipt not found');

            return redirect(route('receipts.index'));
        }

        return view('receipts.show')->with('receipt', $receipt);
    }

    /**
     * Show the form for editing the specified Receipt.
     */
    public function edit($id)
    {
        $receipt = $this->receiptRepository->find($id);

        if (empty($receipt)) {
            Flash::error('Receipt not found');

            return redirect(route('receipts.index'));
        }
        $students = Student::select('id', 'admn_no', 'surname', 'first_name')
        ->get()
        ->mapWithKeys(function ($student) {
            return [$student->id => $student->admn_no . ' ' . $student->surname . ' ' . $student->first_name];
        });
        $invoices = Invoice::pluck('amount','id');
        return view('receipts.edit', compact('receipt',  'students', 'invoices'));
    }

    /**
     * Update the specified Receipt in storage.
     */
    public function update($id, UpdateReceiptRequest $request)
    {
        $receipt = $this->receiptRepository->find($id);

        if (empty($receipt)) {
            Flash::error('Receipt not found');

            return redirect(route('receipts.index'));
        }

        $receipt = $this->receiptRepository->update($request->all(), $id);

        Flash::success('Receipt updated successfully.');

        return redirect(route('receipts.index'));
    }

    /**
     * Remove the specified Receipt from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $receipt = $this->receiptRepository->find($id);

        if (empty($receipt)) {
            Flash::error('Receipt not found');

            return redirect(route('receipts.index'));
        }

        $this->receiptRepository->delete($id);

        Flash::success('Receipt deleted successfully.');

        return redirect(route('receipts.index'));
    }
}
