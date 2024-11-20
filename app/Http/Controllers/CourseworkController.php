<?php

namespace App\Http\Controllers;

use App\DataTables\CourseworkDataTable;
use App\Http\Requests\CreateCourseworkRequest;
use App\Http\Requests\UpdateCourseworkRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Enrolment;
use App\Models\Student;
use App\Repositories\CourseworkRepository;
use Illuminate\Http\Request;
use Flash;

class CourseworkController extends AppBaseController
{
    /** @var CourseworkRepository $courseworkRepository*/
    private $courseworkRepository;

    public function __construct(CourseworkRepository $courseworkRepo)
    {
        $this->courseworkRepository = $courseworkRepo;
    }

    /**
     * Display a listing of the Coursework.
     */
    public function index(CourseworkDataTable $courseworkDataTable)
    {
    return $courseworkDataTable->render('courseworks.index');
    }


    /**
     * Show the form for creating a new Coursework.
     */
    public function create()
    {
        $students = Student::select('id', 'admn_no', 'surname', 'first_name')
        ->get()
        ->mapWithKeys(function ($student) {
            return [$student->id => $student->admn_no . ' ' . $student->surname . ' ' . $student->first_name];
        });

    // Pluck `unit.id` as the key and `unit.unit_name` as the value for the dropdown
    $enrolments = Enrolment::with('unit')->get()->pluck('unit.unit_name', 'id');
        return view('courseworks.create', compact('students', 'enrolments'));
    }

    /**
     * Store a newly created Coursework in storage.
     */
    public function store(CreateCourseworkRequest $request)
    {
        $input = $request->all();

        $coursework = $this->courseworkRepository->create($input);

        Flash::success('Coursework saved successfully.');

        return redirect(route('courseworks.index'));
    }

    /**
     * Display the specified Coursework.
     */
    public function show($id)
    {
        $coursework = $this->courseworkRepository->find($id);

        if (empty($coursework)) {
            Flash::error('Coursework not found');

            return redirect(route('courseworks.index'));
        }

        return view('courseworks.show')->with('coursework', $coursework);
    }

    /**
     * Show the form for editing the specified Coursework.
     */
    public function edit($id)
    {
        $coursework = $this->courseworkRepository->find($id);

        if (empty($coursework)) {
            Flash::error('Coursework not found');

            return redirect(route('courseworks.index'));
        }
        $students = Student::select('id', 'admn_no', 'surname', 'first_name')
        ->get()
        ->mapWithKeys(function ($student) {
            return [$student->id => $student->admn_no . ' ' . $student->surname . ' ' . $student->first_name];
        });

    // Pluck `unit.id` as the key and `unit.unit_name` as the value for the dropdown
    $enrolments = Enrolment::with('unit')->get()->pluck('unit.unit_name', 'id');

        return view('courseworks.edit',compact('coursework', 'students','enrolments'));
    }

    /**
     * Update the specified Coursework in storage.
     */
    public function update($id, UpdateCourseworkRequest $request)
    {
        $coursework = $this->courseworkRepository->find($id);

        if (empty($coursework)) {
            Flash::error('Coursework not found');

            return redirect(route('courseworks.index'));
        }

        $coursework = $this->courseworkRepository->update($request->all(), $id);

        Flash::success('Coursework updated successfully.');

        return redirect(route('courseworks.index'));
    }

    /**
     * Remove the specified Coursework from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $coursework = $this->courseworkRepository->find($id);

        if (empty($coursework)) {
            Flash::error('Coursework not found');

            return redirect(route('courseworks.index'));
        }

        $this->courseworkRepository->delete($id);

        Flash::success('Coursework deleted successfully.');

        return redirect(route('courseworks.index'));
    }
}
