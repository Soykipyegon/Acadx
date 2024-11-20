<?php

namespace App\Http\Controllers;

use App\DataTables\LecturerDataTable;
use App\Http\Requests\CreateLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Unit;
use App\Repositories\LecturerRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;

class LecturerController extends AppBaseController
{
    /** @var LecturerRepository $lecturerRepository*/
    private $lecturerRepository;

    public function __construct(LecturerRepository $lecturerRepo)
    {
        $this->lecturerRepository = $lecturerRepo;
    }

    /**
     * Display a listing of the Lecturer.
     */
    public function index(LecturerDataTable $lecturerDataTable)
    {
    return $lecturerDataTable->render('lecturers.index');
    }


    /**
     * Show the form for creating a new Lecturer.
     */
    public function create()
    {
        $departments = Department::pluck('name', 'id');
        $units = Unit::pluck('unit_name', 'id');
        $employees = Employee::pluck(DB::raw("CONCAT(title, ' ', last_name)"), 'id');

        return view('lecturers.create', compact('departments', 'units', 'employees'));
    }

    /**
     * Store a newly created Lecturer in storage.
     */
    public function store(CreateLecturerRequest $request)
    {
        $input = $request->all();

        $lecturer = $this->lecturerRepository->create($input);

        Flash::success('Lecturer saved successfully.');

        return redirect(route('lecturers.index'));
    }

    /**
     * Display the specified Lecturer.
     */
    public function show($id)
    {
        $lecturer = $this->lecturerRepository->find($id);

        if (empty($lecturer)) {
            Flash::error('Lecturer not found');

            return redirect(route('lecturers.index'));
        }

        return view('lecturers.show')->with('lecturer', $lecturer);
    }

    /**
     * Show the form for editing the specified Lecturer.
     */
    public function edit($id)
    {
        $lecturer = $this->lecturerRepository->find($id);

        if (empty($lecturer)) {
            Flash::error('Lecturer not found');

            return redirect(route('lecturers.index'));
        }
        $departments = Department::pluck('name', 'id');
        $units = Unit::pluck('unit_name', 'id');
        $employees = Employee::pluck(DB::raw("CONCAT(title, ' ', last_name)"), 'id');
        return view('lecturers.edit', compact('lecturer', 'units', 'departments', 'employees'));
    }

    /**
     * Update the specified Lecturer in storage.
     */
    public function update($id, UpdateLecturerRequest $request)
    {
        $lecturer = $this->lecturerRepository->find($id);

        if (empty($lecturer)) {
            Flash::error('Lecturer not found');

            return redirect(route('lecturers.index'));
        }

        $lecturer = $this->lecturerRepository->update($request->all(), $id);

        Flash::success('Lecturer updated successfully.');

        return redirect(route('lecturers.index'));
    }

    /**
     * Remove the specified Lecturer from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lecturer = $this->lecturerRepository->find($id);

        if (empty($lecturer)) {
            Flash::error('Lecturer not found');

            return redirect(route('lecturers.index'));
        }

        $this->lecturerRepository->delete($id);

        Flash::success('Lecturer deleted successfully.');

        return redirect(route('lecturers.index'));
    }
}
