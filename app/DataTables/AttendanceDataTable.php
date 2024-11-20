<?php

namespace App\DataTables;

use App\Models\Attendance;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AttendanceDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'attendances.datatables_actions')
                            ->addColumn('student_name', function (Attendance $attendance) {
                                return $attendance->student->admn_no . ' - ' . $attendance->student->first_name . ' ' . $attendance->student->surname;
                            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Attendance $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Attendance $model)
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
            'attendance_date',
            'attendance_status',
            'lesson_id'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'attendances_datatable_' . time();
    }
}
