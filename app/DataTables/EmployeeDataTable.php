<?php

namespace App\DataTables;

use App\Models\Employee;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class EmployeeDataTable extends DataTable
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
            ->addColumn('school', function (Employee $employee) {
                return $employee->school->name ?? 'N/A'; // Display school name or 'N/A' if not available
            })
            ->addColumn('department', function (Employee $employee) {
                return $employee->department->name ?? 'N/A'; // Display department name or 'N/A' if not available
            })
            ->addColumn('action', 'employees.datatables_actions')
            ->rawColumns(['school', 'department', 'action']); // Ensure raw HTML rendering for custom columns if needed
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
    {
        // Eager load 'school' and 'department' relationships
        return $model->newQuery()->with(['school', 'department']);
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
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'first_name',
            'last_name',
            'email',
            'phone_number',
            'id_number',
            'title',
            'address',
            'school' => ['title' => 'School'],
            'department' => ['title' => 'Department']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'employees_datatable_' . time();
    }
}

