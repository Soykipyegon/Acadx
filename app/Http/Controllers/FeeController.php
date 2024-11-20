<?php

namespace App\Http\Controllers;

use App\DataTables\FeeDataTable;
use App\Http\Requests\CreateFeeRequest;
use App\Http\Requests\UpdateFeeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Course;
use App\Repositories\FeeRepository;
use Illuminate\Http\Request;
use Flash;

class FeeController extends AppBaseController
{
    /** @var FeeRepository $feeRepository*/
    private $feeRepository;

    public function __construct(FeeRepository $feeRepo)
    {
        $this->feeRepository = $feeRepo;
    }

    /**
     * Display a listing of the Fee.
     */
    public function index(FeeDataTable $feeDataTable)
    {
    return $feeDataTable->render('fees.index');
    }


    /**
     * Show the form for creating a new Fee.
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        return view('fees.create', compact( 'courses'));
    }

    /**
     * Store a newly created Fee in storage.
     */
    public function store(CreateFeeRequest $request)
    {
        $input = $request->all();

        $fee = $this->feeRepository->create($input);

        Flash::success('Fee saved successfully.');

        return redirect(route('fees.index'));
    }

    /**
     * Display the specified Fee.
     */
    public function show($id)
    {
        $fee = $this->feeRepository->find($id);

        if (empty($fee)) {
            Flash::error('Fee not found');

            return redirect(route('fees.index'));
        }

        return view('fees.show')->with('fee', $fee);
    }

    /**
     * Show the form for editing the specified Fee.
     */
    public function edit($id)
    {
        $fee = $this->feeRepository->find($id);

        if (empty($fee)) {
            Flash::error('Fee not found');

            return redirect(route('fees.index'));
        }
        $courses = Course::pluck('name', 'id');

        return view('fees.edit', compact('fee',  'courses'));
    }

    /**
     * Update the specified Fee in storage.
     */
    public function update($id, UpdateFeeRequest $request)
    {
        $fee = $this->feeRepository->find($id);

        if (empty($fee)) {
            Flash::error('Fee not found');

            return redirect(route('fees.index'));
        }

        $fee = $this->feeRepository->update($request->all(), $id);

        Flash::success('Fee updated successfully.');

        return redirect(route('fees.index'));
    }

    /**
     * Remove the specified Fee from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fee = $this->feeRepository->find($id);

        if (empty($fee)) {
            Flash::error('Fee not found');

            return redirect(route('fees.index'));
        }

        $this->feeRepository->delete($id);

        Flash::success('Fee deleted successfully.');

        return redirect(route('fees.index'));
    }
}
