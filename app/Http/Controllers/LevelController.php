<?php

namespace App\Http\Controllers;

use App\DataTables\LevelDataTable;
use App\Http\Requests\CreateLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LevelRepository;
use Illuminate\Http\Request;
use Flash;

class LevelController extends AppBaseController
{
    /** @var LevelRepository $levelRepository*/
    private $levelRepository;

    public function __construct(LevelRepository $levelRepo)
    {
        $this->levelRepository = $levelRepo;
    }

    /**
     * Display a listing of the Level.
     */
    public function index(LevelDataTable $levelDataTable)
    {
    return $levelDataTable->render('levels.index');
    }


    /**
     * Show the form for creating a new Level.
     */
    public function create()
    {
        return view('levels.create');
    }

    /**
     * Store a newly created Level in storage.
     */
    public function store(CreateLevelRequest $request)
    {
        $input = $request->all();

        $level = $this->levelRepository->create($input);

        Flash::success('Level saved successfully.');

        return redirect(route('levels.index'));
    }

    /**
     * Display the specified Level.
     */
    public function show($id)
    {
        $level = $this->levelRepository->find($id);

        if (empty($level)) {
            Flash::error('Level not found');

            return redirect(route('levels.index'));
        }

        return view('levels.show')->with('level', $level);
    }

    /**
     * Show the form for editing the specified Level.
     */
    public function edit($id)
    {
        $level = $this->levelRepository->find($id);

        if (empty($level)) {
            Flash::error('Level not found');

            return redirect(route('levels.index'));
        }

        return view('levels.edit')->with('level', $level);
    }

    /**
     * Update the specified Level in storage.
     */
    public function update($id, UpdateLevelRequest $request)
    {
        $level = $this->levelRepository->find($id);

        if (empty($level)) {
            Flash::error('Level not found');

            return redirect(route('levels.index'));
        }

        $level = $this->levelRepository->update($request->all(), $id);

        Flash::success('Level updated successfully.');

        return redirect(route('levels.index'));
    }

    /**
     * Remove the specified Level from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $level = $this->levelRepository->find($id);

        if (empty($level)) {
            Flash::error('Level not found');

            return redirect(route('levels.index'));
        }

        $this->levelRepository->delete($id);

        Flash::success('Level deleted successfully.');

        return redirect(route('levels.index'));
    }
}
