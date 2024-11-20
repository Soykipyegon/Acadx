<?php

namespace App\DataTables;

use App\Models\Enrolment;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class EnrolmentDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'enrolments.datatables_actions')
                        ->addColumn('student_name', function (Enrolment $enrolment) {
                         return $enrolment->student->admn_no . ' - ' . $enrolment->student->first_name . ' ' . $enrolment->student->surname;
                         })
                         ->addColumn('course_name', function (Enrolment $enrolment) {
                            return $enrolment->course ? $enrolment->course->name : 'N/A';
                        })
                        ->addColumn('formatted_year', function ($enrolment) {
                            return $enrolment->year . ($enrolment->year == 1 ? 'st' : ($enrolment->year == 2 ? 'nd' : ($enrolment->year == 3 ? 'rd' : 'th'))) . ' year';
                        })
                        ->addColumn('units', function (Enrolment $enrolment) {
                             return $enrolment->units ? $enrolment->units->pluck('unit_name')->implode(', ') : 'N/A';
                        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Enrolment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Enrolment $model)
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
            'student_name' => ['title' => 'Student Name'],
            'course_name' => ['title' => 'Course Name'],
            'units' => ['title' => 'Units'],
            'semester',
            'semester_status',
            'formatted_year' => ['title' => 'Year'] 
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'enrolments_datatable_' . time();
    }
}
