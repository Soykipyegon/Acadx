<?php

namespace App\DataTables;

use App\Models\Lecturer;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LecturerDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'lecturers.datatables_actions')
                        ->editColumn('unit_id', function ($lecturer) {
                            return $lecturer->unit ? $lecturer->unit->unit_name : 'N/A';
                        })
                        ->editColumn('employee_no', function ($lecturer) {
                            return $lecturer->employee ? $lecturer->employee->title . ' ' . $lecturer->employee->last_name : 'N/A';
                        })
                        ->editColumn('department_id', function ($lecturer) {
                            return $lecturer->department ? $lecturer->department->name : 'N/A';
                        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Lecturer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Lecturer $model)
    {
        return $model->newQuery()
        ->with(['employee:id,title,last_name', 'department:id,name']);
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
            'unit_id' => ['title' => 'Unit Name'],
            'employee_no' => ['title' => 'Lecturer Name'],
            'department_id' => ['title' => 'Department'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'lecturers_datatable_' . time();
    }
}
