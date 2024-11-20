<?php

namespace App\DataTables;

use App\Models\Fee;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class FeeDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'fees.datatables_actions')
                        ->editColumn('course_id', function ($student) {
                        return $student->course ? $student->course->name : 'N/A';
                        })
                        ->editColumn('expected_amount', function ($fee) {
                            return 'Kshs ' . number_format($fee->expected_amount, 2);
                        });
}

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Fee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Fee $model)
    {
        return $model->newQuery();
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
            'course_id'=> ['title' => 'Course'] ,
            'expected_amount'=> ['title' => 'Fees Per Semester'] 
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'fees_datatable_' . time();
    }
}
