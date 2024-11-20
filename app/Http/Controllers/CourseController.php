<?php

namespace App\Http\Controllers;

use App\DataTables\CourseDataTable;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Department;
use App\Models\Level;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use Flash;

class CourseController extends AppBaseController
{
    /** @var CourseRepository $courseRepository*/
    private $courseRepository;

    public function __construct(CourseRepository $courseRepo)
    {
        $this->courseRepository = $courseRepo;
    }

    /**
     * Display a listing of the Course.
     */
    public function index(CourseDataTable $courseDataTable)
    {
    return $courseDataTable->render('courses.index');
    }


    /**
     * Show the form for creating a new Course.
     */
    public function create()
    {
        // Fetch levels as an associative array with id as the key and name as the value
        $levels = Level::pluck('name', 'id');
        $departments = Department::pluck('name', 'id');
    
        // Return the view with levels data for the dropdown
        return view('courses.create', compact('levels', 'departments'));
    }

    /**
     * Store a newly created Course in storage.
     */
    public function store(CreateCourseRequest $request)
    {
        $input = $request->all();

        $course = $this->courseRepository->create($input);

        Flash::success('Course saved successfully.');

        return redirect(route('courses.index'));
    }

    /**
     * Display the specified Course.
     */
    public function show($id)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }
    $levels = Level::pluck('name', 'id');
    $departments = Department::pluck('name', 'id');

        return view('courses.show', compact('course','levels', 'departments'));
    }

    /**
     * Show the form for editing the specified Course.
     */
    public function edit($id)
    {
        $course = $this->courseRepository->find($id); // Fetch course using the repository
    
        if (empty($course)) {
            Flash::error('Course not found');
            return redirect(route('courses.index'));
        }
    
        $levels = Level::pluck('name', 'id');
        $departments = Department::pluck('name', 'id');
    
        // Return the view with course and levels data
        return view('courses.edit', compact('course', 'levels', 'departments'));
    }

    /**
     * Update the specified Course in storage.
     */
    public function update($id, UpdateCourseRequest $request)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }

        $course = $this->courseRepository->update($request->all(), $id);

        Flash::success('Course updated successfully.');

        return redirect(route('courses.index'));
    }

    /**
     * Remove the specified Course from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }

        $this->courseRepository->delete($id);

        Flash::success('Course deleted successfully.');

        return redirect(route('courses.index'));
    }
}
