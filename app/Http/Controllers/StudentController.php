<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Course;
use App\Models\Level;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Flash;

class StudentController extends AppBaseController
{
    /** @var StudentRepository $studentRepository*/
    private $studentRepository;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepository = $studentRepo;
    }

    /**
     * Display a listing of the Student.
     */
    public function index(StudentDataTable $studentDataTable)
    {
    return $studentDataTable->render('students.index');
    }


    /**
     * Show the form for creating a new Student.
     */
    public function create()
    {
        $levels = Level::pluck('name', 'id');
        $courses = Course::pluck('name', 'id');
        return view('students.create', compact('levels', 'courses'));
    }


    /**
     * Store a newly created Student in storage.
     */
    public function store(CreateStudentRequest $request)
    {
        $input = $request->all();

        $student = $this->studentRepository->create($input);

        Flash::success('Student saved successfully.');

        return redirect(route('students.index'));
    }

    /**
     * Display the specified Student.
     */
    public function show($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified Student.
     */
    public function edit($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }
        $levels = Level::pluck('name', 'id');
        $courses = Course::pluck('name', 'id');

        return view('students.edit', compact('student', 'courses', 'levels'));
    }


    /**
     * Update the specified Student in storage.
     */
    public function update($id, UpdateStudentRequest $request)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        $student = $this->studentRepository->update($request->all(), $id);

        Flash::success('Student updated successfully.');

        return redirect(route('students.index'));
    }

    /**
     * Remove the specified Student from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        $this->studentRepository->delete($id);

        Flash::success('Student deleted successfully.');

        return redirect(route('students.index'));
    }
}
