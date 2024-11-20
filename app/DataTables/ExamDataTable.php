<?php

namespace App\DataTables;

use App\Models\Exam;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ExamDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'exams.datatables_actions')
                            ->addColumn('unit_name', function ($exam) {
                              return $exam->enrolment ? $exam->enrolment->unit->unit_name : 'N/A';
                            })
                            ->addColumn('student_name', function (Exam $exam) {
                                return $exam->student->admn_no . ' - ' . $exam->student->first_name . ' ' . $exam->student->surname;
                            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Exam $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Exam $model)
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
            'unit_name'=> ['title' => 'Enrolled Unit'],
            'marks',
            // 'enrolment_id'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'exams_datatable_' . time();
    }
}
