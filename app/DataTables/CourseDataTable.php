<?php

namespace App\DataTables;

use App\Models\Course;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CourseDataTable extends DataTable
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

        // Add the 'action' column
        return $dataTable->addColumn('action', 'courses.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Course $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Course $model)
    {
        // Eager load the level and department relationships
        return $model->newQuery()
            ->with(['level', 'department']);
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
            'name',
            // Display the related 'level' name instead of 'level_id'
            'level_name' => ['name' => 'level.name', 'data' => 'level.name'],
            // Display the related 'department' name instead of 'department_id'
            'department_name' => ['name' => 'department.name', 'data' => 'department.name'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'courses_datatable_' . time();
    }
}

