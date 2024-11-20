<?php

namespace App\DataTables;

use App\Models\Department;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DepartmentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->addColumn('action', 'departments.datatables_actions')
        ->editColumn('employee_no', function ($department) {
            return $department->employee ? $department->employee->title . ' ' . $department->employee->last_name : 'N/A';
        })
        ->editColumn('school_id', function ($department) {
            return $department->school ? $department->school->name : 'N/A';
        });
}

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Department $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Department $model)
    {
        return $model->newQuery()
        ->with(['employee:id,title,last_name', 'school:id,name']);
}

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
            'employee_no' => ['title' => 'Employee Name'],
            'school_id' => ['title' => 'School Name']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'departments_datatable_' . time();
    }
}
