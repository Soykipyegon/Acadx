<?php

namespace App\Http\Controllers;

use App\DataTables\SchoolDataTable;
use App\Http\Requests\CreateSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SchoolRepository;
use Illuminate\Http\Request;
use Flash;

class SchoolController extends AppBaseController
{
    /** @var SchoolRepository $schoolRepository*/
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepo)
    {
        $this->schoolRepository = $schoolRepo;
    }

    /**
     * Display a listing of the School.
     */
    public function index(SchoolDataTable $schoolDataTable)
    {
    return $schoolDataTable->render('schools.index');
    }


    /**
     * Show the form for creating a new School.
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created School in storage.
     */
    public function store(CreateSchoolRequest $request)
    {
        $input = $request->all();

        $school = $this->schoolRepository->create($input);

        Flash::success('School saved successfully.');

        return redirect(route('schools.index'));
    }

    /**
     * Display the specified School.
     */
    public function show($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        return view('schools.show')->with('school', $school);
    }

    /**
     * Show the form for editing the specified School.
     */
    public function edit($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        return view('schools.edit')->with('school', $school);
    }

    /**
     * Update the specified School in storage.
     */
    public function update($id, UpdateSchoolRequest $request)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        $school = $this->schoolRepository->update($request->all(), $id);

        Flash::success('School updated successfully.');

        return redirect(route('schools.index'));
    }

    /**
     * Remove the specified School from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $school = $this->schoolRepository->find($id);

        if (empty($school)) {
            Flash::error('School not found');

            return redirect(route('schools.index'));
        }

        $this->schoolRepository->delete($id);

        Flash::success('School deleted successfully.');

        return redirect(route('schools.index'));
    }
}
