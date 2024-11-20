<?php

namespace App\Http\Controllers;

use App\DataTables\InvoiceDataTable;
use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Student;
use App\Repositories\InvoiceRepository;
use Illuminate\Http\Request;
use Flash;

class InvoiceController extends AppBaseController
{
    /** @var InvoiceRepository $invoiceRepository*/
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepository = $invoiceRepo;
    }

    /**
     * Display a listing of the Invoice.
     */
    public function index(InvoiceDataTable $invoiceDataTable)
    {
    return $invoiceDataTable->render('invoices.index');
    }


    /**
     * Show the form for creating a new Invoice.
     */
    public function create()
    {
        $students = Student::select('id', 'admn_no', 'surname', 'first_name')
        ->get()
        ->mapWithKeys(function ($student) {
            return [$student->id => $student->admn_no . ' ' . $student->surname . ' ' . $student->first_name];
        });
        return view('invoices.create', compact('students'));
    }

    /**
     * Store a newly created Invoice in storage.
     */
    public function store(CreateInvoiceRequest $request)
    {
        $input = $request->all();

        $invoice = $this->invoiceRepository->create($input);

        Flash::success('Invoice saved successfully.');

        return redirect(route('invoices.index'));
    }

    /**
     * Display the specified Invoice.
     */
    public function show($id)
    {
        $invoice = $this->invoiceRepository->find($id);

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        return view('invoices.show')->with('invoice', $invoice);
    }

    /**
     * Show the form for editing the specified Invoice.
     */
    public function edit($id)
    {
        $invoice = $this->invoiceRepository->find($id);

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }
        $students = Student::select('id', 'admn_no', 'surname', 'first_name')
        ->get()
        ->mapWithKeys(function ($student) {
            return [$student->id => $student->admn_no . ' ' . $student->surname. ' ' . $student->first_name];
        });

        return view('invoices.edit', compact('invoice',  'students'));
    }

    /**
     * Update the specified Invoice in storage.
     */
    public function update($id, UpdateInvoiceRequest $request)
    {
        $invoice = $this->invoiceRepository->find($id);

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        $invoice = $this->invoiceRepository->update($request->all(), $id);

        Flash::success('Invoice updated successfully.');

        return redirect(route('invoices.index'));
    }

    /**
     * Remove the specified Invoice from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $invoice = $this->invoiceRepository->find($id);

        if (empty($invoice)) {
            Flash::error('Invoice not found');

            return redirect(route('invoices.index'));
        }

        $this->invoiceRepository->delete($id);

        Flash::success('Invoice deleted successfully.');

        return redirect(route('invoices.index'));
    }
}
