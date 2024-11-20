<?php

namespace App\Http\Controllers;

use App\DataTables\LessonDataTable;
use App\Http\Requests\CreateLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LessonRepository;
use Illuminate\Http\Request;
use Flash;

class LessonController extends AppBaseController
{
    /** @var LessonRepository $lessonRepository*/
    private $lessonRepository;

    public function __construct(LessonRepository $lessonRepo)
    {
        $this->lessonRepository = $lessonRepo;
    }

    /**
     * Display a listing of the Lesson.
     */
    public function index(LessonDataTable $lessonDataTable)
    {
    return $lessonDataTable->render('lessons.index');
    }


    /**
     * Show the form for creating a new Lesson.
     */
    public function create()
    {
        return view('lessons.create');
    }

    /**
     * Store a newly created Lesson in storage.
     */
    public function store(CreateLessonRequest $request)
    {
        $input = $request->all();

        $lesson = $this->lessonRepository->create($input);

        Flash::success('Lesson saved successfully.');

        return redirect(route('lessons.index'));
    }

    /**
     * Display the specified Lesson.
     */
    public function show($id)
    {
        $lesson = $this->lessonRepository->find($id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        return view('lessons.show')->with('lesson', $lesson);
    }

    /**
     * Show the form for editing the specified Lesson.
     */
    public function edit($id)
    {
        $lesson = $this->lessonRepository->find($id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        return view('lessons.edit')->with('lesson', $lesson);
    }

    /**
     * Update the specified Lesson in storage.
     */
    public function update($id, UpdateLessonRequest $request)
    {
        $lesson = $this->lessonRepository->find($id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        $lesson = $this->lessonRepository->update($request->all(), $id);

        Flash::success('Lesson updated successfully.');

        return redirect(route('lessons.index'));
    }

    /**
     * Remove the specified Lesson from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lesson = $this->lessonRepository->find($id);

        if (empty($lesson)) {
            Flash::error('Lesson not found');

            return redirect(route('lessons.index'));
        }

        $this->lessonRepository->delete($id);

        Flash::success('Lesson deleted successfully.');

        return redirect(route('lessons.index'));
    }
}
