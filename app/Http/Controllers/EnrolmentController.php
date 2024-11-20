<?php

namespace App\Http\Controllers;

use App\DataTables\EnrolmentDataTable;
use App\Http\Requests\CreateEnrolmentRequest;
use App\Http\Requests\UpdateEnrolmentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Course;
use App\Models\Student;
use App\Models\Unit;
use App\Repositories\EnrolmentRepository;
use Illuminate\Http\Request;
use Flash;

class EnrolmentController extends AppBaseController
{
    /** @var EnrolmentRepository $enrolmentRepository*/
    private $enrolmentRepository;

    public function __construct(EnrolmentRepository $enrolmentRepo)
    {
        $this->enrolmentRepository = $enrolmentRepo;
    }

    /**
     * Display a listing of the Enrolment.
     */
    public function index(EnrolmentDataTable $enrolmentDataTable)
    {
    return $enrolmentDataTable->render('enrolments.index');
    }


    /**
     * Show the form for creating a new Enrolment.
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        $units = Unit::pluck('unit_name', 'id');
        $students = Student::select('id', 'admn_no', 'surname', 'first_name')
        ->get()
        ->mapWithKeys(function ($student) {
            return [$student->id => $student->admn_no . ' ' . $student->surname . ' ' . $student->first_name];
        });
        return view('enrolments.create' , compact( 'courses', 'units', 'students'));
    }

    /**
     * Store a newly created Enrolment in storage.
     */
    public function store(CreateEnrolmentRequest $request)
    {
        $input = $request->all();

        $enrolment = $this->enrolmentRepository->create($input);

        Flash::success('Enrolment saved successfully.');

        return redirect(route('enrolments.index'));
    }

    /**
     * Display the specified Enrolment.
     */
    public function show($id)
    {
        $enrolment = $this->enrolmentRepository->find($id);

        if (empty($enrolment)) {
            Flash::error('Enrolment not found');

            return redirect(route('enrolments.index'));
        }

        return view('enrolments.show')->with('enrolment', $enrolment);
    }

    /**
     * Show the form for editing the specified Enrolment.
     */
    public function edit($id)
    {
        $enrolment = $this->enrolmentRepository->find($id);

        if (empty($enrolment)) {
            Flash::error('Enrolment not found');

            return redirect(route('enrolments.index'));
        }
        $courses = Course::pluck('name', 'id');
        $units = Unit::pluck('unit_name', 'id');
        $students = Student::select('id', 'admn_no', 'surname', 'first_name')
        ->get()
        ->mapWithKeys(function ($student) {
            return [$student->id => $student->admn_no . ' ' . $student->surname . ' ' . $student->first_name];
        });

        return view('enrolments.edit', compact('enrolment',  'courses', 'units','students'));
    }

    /**
     * Update the specified Enrolment in storage.
     */
    public function update($id, UpdateEnrolmentRequest $request)
    {
        $enrolment = $this->enrolmentRepository->find($id);

        if (empty($enrolment)) {
            Flash::error('Enrolment not found');

            return redirect(route('enrolments.index'));
        }

        $enrolment = $this->enrolmentRepository->update($request->all(), $id);

        Flash::success('Enrolment updated successfully.');

        return redirect(route('enrolments.index'));
    }

    /**
     * Remove the specified Enrolment from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $enrolment = $this->enrolmentRepository->find($id);

        if (empty($enrolment)) {
            Flash::error('Enrolment not found');

            return redirect(route('enrolments.index'));
        }

        $this->enrolmentRepository->delete($id);

        Flash::success('Enrolment deleted successfully.');

        return redirect(route('enrolments.index'));
    }
}
