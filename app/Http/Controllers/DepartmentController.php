<?php

namespace App\Http\Controllers;

use App\DataTables\DepartmentDataTable;
use App\Http\Requests\CreateDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Models\School;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash as FlashFlash;

class DepartmentController extends AppBaseController
{
    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Department.
     */
    public function index(DepartmentDataTable $departmentDataTable)
    {
    return $departmentDataTable->render('departments.index');
    }


    /**
     * Show the form for creating a new Department.
     */
    public function create()
    {
        $schools = School::pluck('name', 'id');
        $employees = Employee::pluck(DB::raw("CONCAT(title, ' ', last_name)"), 'id');
        return view('departments.create', compact('schools', 'employees'));

    }

    /**
     * Store a newly created Department in storage.
     */
    public function store(CreateDepartmentRequest $request)
    {
        $input = $request->all();

        $department = $this->departmentRepository->create($input);

        Flash::success('Department saved successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Display the specified Department.
     */
    public function show($id)
    {
        $department = $this->departmentRepository->find($id);
    
        if (empty($department)) {
            Flash::error('Department not found');
            return redirect(route('departments.index'));
        }
    
        // Retrieve the employee’s title and last name using the `employee_no` (ID)
        $employeeName = Employee::where('id', $department->employee_no)
                                ->select(DB::raw("CONCAT(title, ' ', last_name) as full_name"))
                                ->value('full_name');
    
        return view('departments.show', compact('department', 'employeeName'));
    }
    

    /**
     * Show the form for editing the specified Department.
     */
    public function edit($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }
        $schools = School::pluck('name', 'id');
        $employees = Employee::pluck(DB::raw("CONCAT(title, ' ', last_name)"), 'id');

        return view('departments.edit', compact('department', 'employees', 'schools'));
    }

    /**
     * Update the specified Department in storage.
     */
    public function update($id, UpdateDepartmentRequest $request)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $department = $this->departmentRepository->update($request->all(), $id);

        Flash::success('Department updated successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified Department from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $this->departmentRepository->delete($id);

        Flash::success('Department deleted successfully.');

        return redirect(route('departments.index'));
    }
}
